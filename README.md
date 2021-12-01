<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel Attendance Management System
Description:
A dashboard to manage all the employees along with their attendance.
Admin (Company) User:
- CRUD for employees
- Fields: Employee name, Email (unique), Date of Joining
- On new employee addition, an onboarding mail will be sent to the employee along with the
password. Passwords will be auto generated by the system.
- Company user can log in and check daily attendance of all the employees
- Company can set IP address of office and attendance will not be counted if any employee logs in
from another IP address
- CRUD for admin is not required
- Mail server setup is not required. Optionally you can use mailtrap or In-browser mail for testing Employees:
- Employees can log in and mark attendance
Additional Requirements:
- Eloquent relationships & collections methods can be utilized wherever necessary
- Migrations for all the tables
- Seeders for generating company & employee users
- README file for project setup
Technology stack:
- Laravel 7+
- MySQL
- HTML (You can use any HTML website template for the UI part) - UI is not important
- Any CSS Framework (Bootstrap / Tailwind / Material UI ...)
- Vanilla JS / JQuery / Alpine

## Steps Of Installation

Installation step:

- take pull
- setup env and db
- php artisan key:generate
- php artisan migrate
- php artisan db:seed --class=CreateUsersSeeder
- php artisan serve
- Login for admin with password:admin@gmail.com || 12345678
- Login for user with email Password When a new user craeted from admin dashboard :



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
