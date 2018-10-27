<?php

use App\Http\Middleware\CheckUserSession;
use App\Http\Middleware\CheckCoordinatorSession;
use App\Http\Middleware\CheckStudentSession;

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

//get pag kukuha ng webpage
//post pag kukuha ka ng values from forms

Route::get('/', function () {
    return view('navigation/guest/login');
});

Route::post('/register/send', 'SignInSignUpController@Register');

Route::post('/login', 'SignInSignUpController@Login');

Route::get('/register', function(){
  return view('navigation/guest/register');
});

Route::resource('/Coordinator/subjects','SubjectsController')->middleware(CheckCoordinatorSession::class);
Route::post('/Coordinator/subjects/Edit','SubjectsController@EditSubject');
Route::post('/Coordinator/subjects/Delete','SubjectsController@DeleteSubject');
Route::post('/student/subjects/enroll','SubjectsController@enroll');
Route::post('/Coordinator/student/approve','SubjectsController@approveEnrollment');

Route::get('/student/subjects', 'PagesController@StudentSubjects')->middleware(CheckStudentSession::class);;

Route::get('/student/profile', 'PagesController@StudentProfile')->middleware(CheckStudentSession::class);;


Route::get('/Coordinator/acceptStudent', 'PagesController@CollabotorAcceptStudentRequest')->middleware(CheckCoordinatorSession::class);
Route::get('/Coordinator/AddStudentToSubject', 'PagesController@CollaboratorAddStudentToSubject')->middleware(CheckCoordinatorSession::class);

Route::get('/logout','SignInSignUpController@LogOut');

Route::get('/admin/dashboard','PagesController@AdminDashBoard')->middleware(CheckUserSession::class);
Route::get('/admin/students','PagesController@AdminStudents')->middleware(CheckUserSession::class);
Route::get('/admin/subjects','PagesController@AdminSubjects')->middleware(CheckUserSession::class);
Route::post('/admin/coordinator','SignInSignUpController@newCoordinator');
Route::post("/student/editprofile",'SignInSignUpController@editStudentProfile');