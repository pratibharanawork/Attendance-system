<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use Hash;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
     public function login(Request $request)
     {  
        $inputVal = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $inputVal['email'], 'password' => $inputVal['password']))){
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('admin.route');
            }else{
                        if ($employee = User::where('email',request('email'))->where('is_admin',0)->first()){
                            //dd(date('Y-m-d H:i:s'));exit;
                            if (Hash::check($request->password, $employee->password)) {
                                    if (!Attendance::where('attendance_date',date("Y-m-d"))->where('user_id',$employee->id)->first()){
                                        $attendance = new Attendance;
                                        $attendance->user_id = $employee->id;
                                        $attendance->attendance_time = date('Y-m-d H:i:s');
                                        $attendance->attendance_date = date("Y-m-d");
                                        if($request->ip() != '103.149.20.202')
                                            {
                                        $attendance->attendance_count =0 ;
                                            }
                                        $attendance->save();

                                    }else{
                                        return redirect()->route('login')->with('error','You have already assigned your attendance before.');
                                    }
                                } else {
                                return redirect()->route('login')->with('error', 'Failed to assign the attendance');
                            }
                        }

                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email & Password are incorrect.');
        }     
    }
}
