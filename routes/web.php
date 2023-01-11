<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Student\StudentController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[AuthController::class,'GoLogin'])->name('login');
Route::post('/',[AuthController::class,'Login'])->name('login.submit');

Route::get('/registration',[AuthController::class,'GoRegistration'])->name('registration');
Route::post('/registration',[AuthController::class,'Registration'])->name('registration.submit');


Route::get('/Profile/Admin',[AuthController::class,'profile'])->name('admin.profile')->middleware('admin');

Route::get('/StudentList',[StudentController::class,'List'])->name('list')->middleware('admin');

Route::get('/StudentAdd',[StudentController::class,'create'])->name('add')->middleware('admin');
Route::post('/StudentAdd',[StudentController::class,'StudentAdd'])->name('student.add')->middleware('admin');

Route::get('/StudentDelete/{id}',[StudentController::class,'delete'])->name('delete')->middleware('admin');

Route::get('/StudentEdit/{id}',[StudentController::class,'update'])->name('edit')->middleware('admin');
Route::post('/StudentEdit/{id}',[StudentController::class,'StudentEdit'])->name('student.edit')->middleware('admin');

Route::get('/StudentView/{id}',[StudentController::class,'view'])->name('view')->middleware('admin');


Route::get('/search',[StudentController::class,'GoSearch'])->name('student.search')->middleware('admin');
Route::get('/student/search',[StudentController::class,'search'])->name('search')->middleware('admin');
