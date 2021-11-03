<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project

The Project handles authentication using sanctum to authorise actions for the user.It is an Api endpoints which consists of simple crud;

---------+
| Domain | Method    | URI                           | Name              | Action                                                     | Middleware                               |
+--------+-----------+-------------------------------+-------------------+------------------------------------------------------------+------------------------------------------+
|        | GET|HEAD  | /                             |                   | Closure                                                    | web                                      |
|        | GET|HEAD  | api/companies                 | companies.index   | App\Http\Controllers\Api\CompanyController@index           | api                                      |
|        |           |                               |                   |                                                            | App\Http\Middleware\Authenticate:sanctum |
|        | POST      | api/companies                 | companies.store   | App\Http\Controllers\Api\CompanyController@store           | api                                      |
|        |           |                               |                   |                                                            | App\Http\Middleware\Authenticate:sanctum |
|        | GET|HEAD  | api/companies/create          | companies.create  | App\Http\Controllers\Api\CompanyController@create          | api                                      |
|        |           |                               |                   |                                                            | App\Http\Middleware\Authenticate:sanctum |
|        | GET|HEAD  | api/companies/{company}       | companies.show    | App\Http\Controllers\Api\CompanyController@show            | api                                      |
|        |           |                               |                   |                                                            | App\Http\Middleware\Authenticate:sanctum |
|        | PUT|PATCH | api/companies/{company}       | companies.update  | App\Http\Controllers\Api\CompanyController@update          | api                                      |
|        |           |                               |                   |                                                            | App\Http\Middleware\Authenticate:sanctum |
|        | DELETE    | api/companies/{company}       | companies.destroy | App\Http\Controllers\Api\CompanyController@destroy         | api                                      |
|        |           |                               |                   |                                                            | App\Http\Middleware\Authenticate:sanctum |
|        | GET|HEAD  | api/companies/{company}/edit  | companies.edit    | App\Http\Controllers\Api\CompanyController@edit            | api                                      |
|        |           |                               |                   |                                                            | App\Http\Middleware\Authenticate:sanctum |
|        | GET|HEAD  | api/employees                 | employees.index   | App\Http\Controllers\Api\EmployeeController@index          | api                                      |
|        |           |                               |                   |                                                            | App\Http\Middleware\Authenticate:sanctum |
|        | POST      | api/employees                 | employees.store   | App\Http\Controllers\Api\EmployeeController@store          | api                                      |
|        |           |                               |                   |                                                            | App\Http\Middleware\Authenticate:sanctum |
|        | GET|HEAD  | api/employees/create          | employees.create  | App\Http\Controllers\Api\EmployeeController@create         | api                                      |
|        |           |                               |                   |                                                            | App\Http\Middleware\Authenticate:sanctum |
|        | GET|HEAD  | api/employees/{employee}      | employees.show    | App\Http\Controllers\Api\EmployeeController@show           | api                                      |
|        |           |                               |                   |                                                            | App\Http\Middleware\Authenticate:sanctum |
|        | PUT|PATCH | api/employees/{employee}      | employees.update  | App\Http\Controllers\Api\EmployeeController@update         | api                                      |
|        |           |                               |                   |                                                            | App\Http\Middleware\Authenticate:sanctum |
|        | DELETE    | api/employees/{employee}      | employees.destroy | App\Http\Controllers\Api\EmployeeController@destroy        | api                                      |
|        |           |                               |                   |                                                            | App\Http\Middleware\Authenticate:sanctum |
|        | GET|HEAD  | api/employees/{employee}/edit | employees.edit    | App\Http\Controllers\Api\EmployeeController@edit           | api                                      |
|        |           |                               |                   |                                                            | App\Http\Middleware\Authenticate:sanctum |
|        | POST      | api/login                     |                   | App\Http\Controllers\Api\AuthController@login              | api                                      |
|        | POST      | api/register                  |                   | App\Http\Controllers\Api\AuthController@register           | api                                      |
|        | GET|HEAD  | sanctum/csrf-cookie           |                   | 
