<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\EnrollmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
});

//Student route
Route::get('/student/index',[StudentController::class,'index'])->name('student.index');
Route::get('/student/create',[StudentController::class,'create'])->name('student.create');
Route::post('/student/store',[StudentController::class,'store'])->name('student.store');
Route::delete('/student/delete/{studentlist}',[StudentController::class,'delete'])->name('student.delete');
Route::get('/student/edit/{studentlist}',[StudentController::class,'edit'])->name('student.edit');
Route::put('/student/update/{studentlist}',[StudentController::class,'update'])->name('student.update');
Route::get('/student/search',[StudentController::class,'search'])->name('student.search');
Route::get('/student/showsingle/{studentlist}',[StudentController::class,'showsingle'])->name('student.showsingle');
//Student route end


//teacher route
Route::get('/teacher/index',[TeacherController::class,'index'])->name('teacher.index');
Route::get('/teacher/create',[TeacherController::class,'create'])->name('teacher.create');
Route::post('/teacher/store',[TeacherController::class,'store'])->name('teacher.store');
Route::delete('/teacher/delete/{teacherlist}',[TeacherController::class,'delete'])->name('teacher.delete');
Route::get('/teacher/signleteacher/{teacherlist}',[TeacherController::class,'signleteacher'])->name('teacher.signle');
Route::get('/teacher/edit/{teacherlist}',[TeacherController::class,'edit'])->name('teacher.edit');
Route::put('/teacher/update/{teacherlist}',[TeacherController::class,'update'])->name('teacher.update');
Route::get('/teacher/search',[TeacherController::class,'search'])->name('teacher.search');
//teacher route end

//Course route 
Route::get('/course/index',[CourseController::class,'index'])->name('course.index');
Route::get('/course/create',[CourseController::class,'create'])->name('course.create');
Route::post('/course/store',[CourseController::class,'store'])->name('course.store');
Route::get('/course/single/{courselist}',[CourseController::class,'single'])->name('course.single');
Route::delete('/course/delete/{courselist}',[CourseController::class,'delete'])->name('course.delete');
Route::get('/course/edit/{courselist}',[CourseController::class,'edit'])->name('course.edit');
Route::put('/course/update/{courselist}',[CourseController::class,'update'])->name('course.update');
Route::get('/course/search',[CourseController::class,'search'])->name('course.search');
//Course route end

//batch route start
Route::get('/batch/index',[BatchController::class,'index'])->name('batch.index');
Route::get('/batch/create',[BatchController::class,'create'])->name('batch.create');
Route::post('/batch/store',[BatchController::class,'store'])->name('batch.store');
Route::get('/batch/single/{batchlist}',[BatchController::class,'single'])->name('batch.single');
Route::delete('/batch/delete/{batchlist}',[BatchController::class,'delete'])->name('batch.delete');
Route::get('/batch/edit/{batchlist}',[BatchController::class,'edit'])->name('batch.edit');
Route::put('/batch/update/{batchlist}',[BatchController::class,'update'])->name('batch.update');
Route::get('/batch/search',[BatchController::class,'search'])->name('batch.search');
//batch route end

//enrollment start
Route::get('/enrollment/index',[EnrollmentController::class,'index'])->name('enrollment.index');
Route::get('/enrollment/single/{enrollmentlist}',[EnrollmentController::class,'single'])->name('enrollment.single');
Route::get('/enrollment/create',[EnrollmentController::class,'create'])->name('enrollment.create');
Route::post('/enrollment/store',[EnrollmentController::class,'store'])->name('enrollment.store');
Route::delete('/enrollment/delete/{enrollmentlist}',[EnrollmentController::class,'delete'])->name('enrollment.delete');
Route::get('/enrollment/edit/{enrollmentlist}',[EnrollmentController::class,'edit'])->name('enrollment.edit');
Route::put('/enrollment/update/{enrollmentlist}',[EnrollmentController::class,'update'])->name('enrollment.update');
Route::get('/enrollment/enrollmentpdf',[PdfController::class,'enrollmentpdf'])->name('enrollment.pdf');
//enrollment end

//payment start here
Route::get('/payment/index',[PaymentController::class,'index'])->name('payment.index');
Route::get('/payment/create',[PaymentController::class,'create'])->name('payment.create');
Route::post('/payment/store',[PaymentController::class,'store'])->name('payment.store');
Route::delete('/payment/delete/{payments}',[PaymentController::class,'delete'])->name('payment.delete');
Route::get('/payment/single/{payments}',[PaymentController::class,'single'])->name('payment.single');
Route::get('/payment/edit/{payments}',[PaymentController::class,'edit'])->name('payment.edit');
Route::put('/payment/update/{payments}',[PaymentController::class,'update'])->name('payment.update');
Route::get('/payment/makepdf/{payments}',[PdfController::class,'makepdf'])->name('payment.makepdf');

//payment end here