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
Route::get('/', function () {
    //return view('auth_new.login');
    return redirect(route('login'));
});

Auth::routes();
Route::get('/test', function () {
    return view('admin.test');
});

Route::prefix('admin')->middleware(['auth', 'is-admin'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/topic', 'LessonController@list_category')->name('topic.hh');
    Route::get('/lessonlist/{topic}', 'LessonController@list_lesson')->name('lesson.hh');
    Route::get('/lessonfull/{slug}', 'LessonController@list_clesson')->name('lesson.hh2');

    Route::prefix('user')->group(function() {
        Route::resource('/user', 'UserController');
    });

    Route::prefix('acm')->group(function() {
        Route::get('/ladder/{id}/problem','LadderController@showProblem')->name('problem.index');
        Route::post('/ladder/{id}/problem','LadderController@problem')->name('problem.create');
        Route::delete('/ladder/{id}/problem','LadderController@deleteProblem')->name('problem.delete');
        Route::resource('/ladder','LadderController');
        Route::get('/home', 'HomeController@homeAcm')->name('acm.home');
        Route::resource('/lesson', 'LessonController');
            Route::resource('/topic', 'TopicController');
            Route::resource('/level', 'LevelController');

    });

    Route::prefix('calender')->group(function() {
        Route::resource('/venue','VenueController');
        Route::resource('/event','EventController');
        Route::resource('/meeting','MeetingController');
        Route::get('show-calendar', 'Calender@index')->name('ShowCalendar');
    });
    Route::prefix('exam')->group(function() {
        Route::resource('/category','CategoryController');
        Route::resource('/question','QuestionController');
        Route::resource('/option','OptionController');
        Route::resource('/result','ResultController');


    });

});
Route::prefix('user')->middleware(['auth', 'is-user'])->group(function(){
    Route::get('/home', 'HomeUserController@index')->name('user.home');
});
Route::prefix('exam')->middleware(['auth'])->group(function() {
    Route::get('test', 'TestController@index')->name('exam.test');
    Route::post('test', 'TestController@store')->name('exam.test.store');
    Route::get('results/{result_id}', 'FinalResultController@index')->name('exam.results.show');
    //Route::get('send/{result_id}', 'ResultsController@send')->name('exam.results.send');


});
Route::get('/handel','UserController@handel')->middleware(['auth'])->name('handle.index');
Route::patch('/handel/update','UserController@updateHandel')->middleware(['auth'])->name('handel.update');

