<?php

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

// Test Route
// Route::get('/test', 'TestController@index');

// Pages
Route::get('/', 'PageController@index')->name('home');
// Announcement
Route::get('/announcement', 'AnnouncementController@index')->name('announcements');
Route::get('/announcement/{id}', 'AnnouncementController@show')->name('announcement.show');
Route::get('/announcement/getimage/{filename}', 'AnnouncementController@getImage')->name('announcement.image');

// Admin
Route::prefix('admin')->name('admin.')->group(function()
{
	// Login
	Route::get('/login', 'Admin\AdminLoginController@showLoginForm')->name('login');
	Route::post('/login', 'Admin\AdminLoginController@login')->name('login.submit');
	Route::get('/logout', 'Admin\AdminLoginController@logout')->name('logout');

	// Dashboard
	Route::get('/', 'Admin\AdminController@index')->name('dashboard');

	// Password Reset
	Route::post('/password/email', 'Admin\AdminForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('/password/reset', 'Admin\AdminForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('/password/reset', 'Admin\AdminResetPasswordController@reset');
	Route::get('/password/reset/{token}', 'Admin\AdminResetPasswordController@showResetForm')->name('password.reset');

	// Add Teacher
	Route::resource('/teacher', 'Admin\AddTeacherController');

	// Department
	Route::get('/department/getData', 'Department\ManageController@getData')->name('department.getData');
	Route::resource('/department', 'Department\ManageController');

	// Subject
	Route::get('/subject/getData', 'Subject\ManageController@getData')->name('subject.getData');
	Route::resource('/subject', 'Subject\ManageController');

	// Announcement
	Route::get('/announcement/getimage/{filename}', 'Announce\AdminController@getImage')->name('announcement.image');
	Route::resource('/announcement', 'Announce\AdminController');

	// Setting
	Route::resource('/setting', 'Setting\AdminController');

	// Classload
	Route::get('/load/getClassload', 'Department\LoadTeacherController@getClassload')->name('load.getclassload');
	Route::resource('/load', 'Department\LoadTeacherController');

	// Record
	Route::resource('/record', 'Admin\RecordController');
	Route::get('record/subject/{term}/{id}', 'Admin\RecordController@showClass')->name('record.subject');

});

// Registrar
Route::prefix('registrar')->name('registrar.')->group(function()
{	
	// Login
	Route::get('/login', 'Registrar\RegistrarLoginController@showLoginForm')->name('login');
	Route::post('/login', 'Registrar\RegistrarLoginController@login')->name('login.submit');
	Route::get('/logout', 'Registrar\RegistrarLoginController@logout')->name('logout');

	// Dashboard
	Route::get('/', 'Registrar\RegistrarController@index')->name('dashboard');

	// Password Reset
	Route::post('/password/email', 'Registrar\RegistrarForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('/password/reset', 'Registrar\RegistrarForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('/password/reset', 'Registrar\RegistrarResetPasswordController@reset');
	Route::get('/password/reset/{token}', 'Registrar\RegistrarResetPasswordController@showResetForm')->name('password.reset');

	// Add Student
	Route::get('/student/getData', 'Registrar\AddStudentController@getStudents')->name('student.getdata');
	Route::get('/student/change/{id}', 'Registrar\AddStudentController@change')->name('student.change');
	Route::put('/student/change/{id}', 'Registrar\AddStudentController@changeUpdate')->name('student.changeupdate');
	Route::resource('/student', 'Registrar\AddStudentController');

	// Section
	Route::resource('/section', 'Section\ManageController');
	Route::post('/section/{id}', 'Section\ManageController@storeSection')->name('section.store.section');
	Route::get('/section/{id}/create', 'Section\ManageController@createSection')->name('section.create.section');
	Route::get('/section/{id}/getSection', 'Section\ManageController@getSection')->name('section.getSection');

	// Semester
	Route::get('semester/getData','Semester\TermController@getData')->name('semester.getData');
	Route::resource('/semester', 'Semester\TermController');
	
	// Announcement
	Route::get('/announcement/getimage/{filename}', 'Announce\RegistrarController@getImage')->name('announcement.image');
	Route::resource('/announcement', 'Announce\RegistrarController');

	// Setting
	Route::resource('/setting', 'Setting\RegistrarController');

	// Load Student
	Route::resource('/load', 'Section\LoadController');
	Route::get('/load/{id}/getStudents', 'Section\LoadController@getStudents')->name('load.getstudents');

	// Irregular
	Route::resource('/irregular', 'Irregular\StudentController');

	// Record
	Route::resource('/record', 'Registrar\RecordController');
	Route::get('record/subject/{id}', 'Registrar\RecordController@showClass')->name('record.subject');
	Route::get('record/subject/{id}/{sid}', 'Registrar\RecordController@gradeEdit')->name('record.grade');

	// Print
	Route::get('/printlist/{id}', 'Printrecord\MasterlistController@printList')->name('print.list');
	Route::get('/print/{id}', 'Printrecord\GradeslipController@printSlip')->name('print.slip');

});

// Teacher
Route::prefix('teacher')->name('teacher.')->group(function()
{
	// Register
	Route::get('/register', 'Teacher\TeacherRegisterController@showRegistrationForm')->name('register');
	Route::post('/register', 'Teacher\TeacherRegisterController@register');

	// Login
	Route::get('/login', 'Teacher\TeacherLoginController@showLoginForm')->name('login');
	Route::post('/login', 'Teacher\TeacherLoginController@login')->name('login.submit');
	Route::get('/logout', 'Teacher\TeacherLoginController@logout')->name('logout');

	// Dashboard
	Route::get('/', 'Teacher\TeacherController@index')->name('dashboard');

	// Password Reset
	Route::post('/password/email', 'Teacher\TeacherForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('/password/reset', 'Teacher\TeacherForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('/password/reset', 'Teacher\TeacherResetPasswordController@reset');
	Route::get('/password/reset/{token}', 'Teacher\TeacherResetPasswordController@showResetForm')->name('password.reset');

	// Setting
	Route::resource('/setting', 'Setting\TeacherController');

	// Formula
	Route::resource('/matrix', 'Subject\FormulaController');

	// Grade
	Route::resource('/grade', 'Subject\GradeController');
	Route::get('/grade/{id}/{tid}', 'Subject\GradeController@showTerm')->name('grade.term');
	Route::post('/grade/student', 'Subject\GradeController@storeGrade')->name('grade.storegrade');
	Route::post('/grade/student/{id}', 'Subject\GradeController@updateGrade')->name('grade.updategrade');

	// Limit
	Route::resource('/limit', 'Subject\LimitController');
	Route::get('/limit/{id}/{lid}', 'Subject\LimitController@showLimit')->name('limit.term');

	// Print
	Route::get('/print/{id}', 'Printrecord\GradesheetController@printSheet')->name('print.sheet');

});

// Student
Route::prefix('student')->name('student.')->group(function()
{
	// Register
	Route::get('/register', 'Student\StudentRegisterController@showRegistrationForm')->name('register');
	Route::post('/register', 'Student\StudentRegisterController@register');

	// Login
	Route::get('/login', 'Student\StudentLoginController@showLoginForm')->name('login');
	Route::post('/login', 'Student\StudentLoginController@login')->name('login.submit');
	Route::get('/logout', 'Student\StudentLoginController@logout')->name('logout');

	// Dashboard
	Route::get('/', 'Student\StudentController@index')->name('dashboard');

	// Password Reset
	Route::post('/password/email', 'Student\StudentForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('/password/reset', 'Student\StudentForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('/password/reset', 'Student\StudentResetPasswordController@reset');
	Route::get('/password/reset/{token}', 'Student\StudentResetPasswordController@showResetForm')->name('password.reset');

	// Setting
	Route::resource('/setting', 'Setting\StudentController');

});

// Guardian
Route::prefix('guardian')->name('guardian.')->group(function()
{
	// Register
	Route::get('/register', 'Guardian\GuardianRegisterController@showRegistrationForm')->name('register');
	Route::post('/register', 'Guardian\GuardianRegisterController@register');

	//Login
	Route::get('/login', 'Guardian\GuardianLoginController@showLoginForm')->name('login');
	Route::post('/login', 'Guardian\GuardianLoginController@login')->name('login.submit');
	Route::get('/logout', 'Guardian\GuardianLoginController@logout')->name('logout');

	// Dashboard
	Route::get('/', 'Guardian\GuardianController@index')->name('dashboard');
	Route::post('/', 'Guardian\GuardianController@store')->name('store');
	Route::get('/{id}', 'Guardian\GuardianController@show')->name('show');
	Route::delete('/{sid}/{gid}', 'Guardian\GuardianController@destroy')->name('destroy');

	// Password Reset
	Route::post('/password/email', 'Guardian\GuardianForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('/password/reset', 'Guardian\GuardianForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('/password/reset', 'Guardian\GuardianResetPasswordController@reset');
	Route::get('/password/reset/{token}', 'Guardian\GuardianResetPasswordController@showResetForm')->name('password.reset');

	// Setting
	Route::resource('/setting', 'Setting\GuardianController');
	
});