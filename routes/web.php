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
Route::get('/',[AuthController::class,'GoLogin']);
Route::post('/',[AuthController::class,'Login'])->name('login.submit');

Route::get('/registration',[AuthController::class,'GoRegistration'])->name('registration');
Route::post('/registration',[AuthController::class,'Registration'])->name('registration.submit');


Route::get('/Profile/Admin',[AuthController::class,'profile'])->name('admin.profile');

Route::get('/StudentList',[StudentController::class,'List'])->name('list');

Route::get('/StudentAdd',[StudentController::class,'create'])->name('add');
Route::post('/StudentAdd',[StudentController::class,'StudentAdd'])->name('student.add');

Route::get('/StudentDelete/{id}',[StudentController::class,'delete'])->name('delete');

Route::get('/StudentEdit/{id}',[StudentController::class,'update'])->name('edit');
Route::post('/StudentEdit/{id}',[StudentController::class,'StudentEdit'])->name('student.edit');

Route::get('/StudentView/{id}',[StudentController::class,'view'])->name('view');


Route::get('/search',[StudentController::class,'GoSearch'])->name('student.search');
Route::get('/student/search',[StudentController::class,'search'])->name('search');
