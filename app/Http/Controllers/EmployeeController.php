<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\EmployeeRec;
use App\Mail\SendDemoMail;
use Mail;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(User $users)
    {
        $this->users = $users;
    }
    public function index()
    {
        $employees = User::all();
        return view('admin.employee')->with( ['employees' => $employees] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRec $request)
    {
      $email = 'pratibharana596@gmail.com';
      $request->validated();
      $password = Str::random(10);
      $user =  User::create([
            'name' =>$request->name,
            'email' => $request->email,
            'password' =>  bcrypt($password),
            'is_admin' => 0
        ]);
       $mailData =[
        'password'=>$password,
        'userEmail'=>$request->email,
       ];
        // Test mail...
        

        Mail::to('pratibharana596@gmail.com')->send(new SendDemoMail($mailData));
        echo 'Mail send successfully';
        return redirect()->route('employees.index')->with('success', 'Employee Has Been Created Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   \App\User  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRec $request ,User $employee)
    {

         $request->validated();

        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->password = bcrypt($request->password);
        $employee->is_admin = 0;
        $employee->save();

        if ($request->schedule) {

            $employee->schedules()->detach();

            $schedule = Schedule::whereSlug($request->schedule)->first();

            $employee->schedules()->attach($schedule);
        }



        return redirect()->route('employees.index')->with('success', 'Employee Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param   \App\User  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee Has Been Deleted Successfully');
    }
}
