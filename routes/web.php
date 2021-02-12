<?php

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


// Route::get('/', function () {
//     return view('loginpage');
// });

Route::get('loginpage','Admincontrol@adminlogin');
Route::get('/','Admincontrol@adminlogin');

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('loginpage','Admincontrol@adminlogin');
Route::get('studentregisterform','Studentcontroll@create');
Route::post('studentstore','Studentcontroll@store')->name('student.store');

Route::post('islogin','Admincontrol@adminloged');

Route::view('dashboard','dashboard');
Route::get('studentdetails','Studentcontroll@show')->name('student.detail');

Route::post('studentdetails2','Studentcontroll@show');

Route::get('studentdetails3','Studentcontroll@show2');

Route::get('student_edit/{id}',['as'=>'student.edit', 'uses'=>'Studentcontroll@edit']);
Route::post('student_edit/{id}',['as'=>'student.update', 'uses'=>'Studentcontroll@update']);
Route::get('student_delete/{id}',['as'=>'student.delete', 'uses'=>'Studentcontroll@destroy']);
Route::post('student/courses','Studentcontroll@courses');
Route::get('studentdetails-ajax','Studentcontroll@ajax_show');
Route::get('single-student/{id}',['as'=>'single.student', 'uses'=>'Studentcontroll@single_student']);
Route::get('student-fee',['as' => 'student.fee', 'uses' => 'Studentcontroll@fee_form']);
Route::post('fee-add','Studentcontroll@feeadd');

Route::get('addbranch','BranchController@create');
Route::post('addbranch','BranchController@store')->name('add.branch');
Route::get('branchshow','BranchController@show');

Route::get('edit_branch/{id}','BranchController@edit')->name('edit.branch');
Route::get('delete_branch/{id}','BranchController@destroy')->name('delete.branch');

Route::post('update_branch/{id}','BranchController@update')->name('update.branch');
Route::get('delete_branch/{id}','BranchController@destroy')->name('delete.branch');

Route::get('courseadd','CourseController@create');
Route::post('coursestore','CourseController@store');
Route::get('courseshow','CourseController@show');





