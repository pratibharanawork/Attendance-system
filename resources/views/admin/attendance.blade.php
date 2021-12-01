@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Attendance
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Attendance</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th>Date</th>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Attendance</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>Attendance based on IP</th>
                            </thead>
                            <tbody>
                                @foreach( $attendances as $attendance)

                                <tr>
                                    <td>{{$attendance->attendance_date}}</td>
                                    <td>{{$attendance->user_id}}</td>
                                    <td>{{$attendance->user->name}}</td>
                                    <td>
                                        @if( $attendance->status == 1 )
                                        <span class="label label-warning pull-right">On Time</span>
                                        @else
                                        <span class="label label-danger pull-right">Late</span>
                                        @endif
                                    </td>
                                    <td>{{$attendance->attendance_time}} </td>
                                    <td>6:30</td>
                                      <td>
                                        @if( $attendance->attendance_count == 1 )
                                        <span class="label label-warning pull-right">Present</span>
                                        @else
                                        <span class="label label-danger pull-right">Absent</span>
                                        @endif
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
