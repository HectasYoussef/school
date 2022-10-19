<?php

use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\Sections\SectionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Auth::routes();

Route::group(['middleware'=>['guest']], function(){
    Route::get('/', function () {
        return view('auth.login');
    });
}
);


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){ //...

        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
        Route::group(['namespace'=>'Grades'], function(){
            Route::resource('/Grades', GradeController::class);
        }
        );
  //==============================Classrooms============================
  Route::group(['namespace' => 'Classrooms'], function () {
    Route::resource('Classrooms', ClassroomController::class);
    Route::post('delete_all',[ClassroomController::class,"delete_all"])->name('delete_all');
    Route::post('Filter_Classes', [ClassroomController::class,"Filter_Classes"])->name('Filter_Classes');
});

Route::group(['namespace' => 'Sections'], function () {

    Route::resource('Sections', SectionController::class);

    Route::get('/classes/{id}', [SectionController::class,'getclasses']);

});


Route::view('add_parent','livewire.show_Form');
    });














