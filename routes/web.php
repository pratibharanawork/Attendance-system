<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/register', function() {
    return redirect('/login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [App\Http\Controllers\AdminController::class, 'handleAdmin'])->name('admin.route')->middleware('admin');
Route::middleware([Admin::class])->group(function(){
   Route::resource('employees', EmployeeController::class);
   Route::get('admin/home', [App\Http\Controllers\AdminController::class, 'handleAdmin'])->name('admin.route');
   Route::get('attendance', [App\Http\Controllers\AttendanceController::class, 'index'])->name('attendance');
});
//employees
// Route::get('/abc', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('admin');;