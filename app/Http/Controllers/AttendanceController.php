<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
   /**
     * Display a listing of the attendance.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.attendance')->with(['attendances'=> Attendance::all()]);
    }
}
