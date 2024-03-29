<?php

use App\Http\Controllers\Admin\AdminClassesController;
use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\Admin\AdminSubjectsController;
use App\Http\Controllers\Admin\ExaminationTypeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

/*--

    dashboard
    classes
    subjects


*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::middleware('verified')->group(function () {

        Route::controller(AdminPagesController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('dashboard');
            Route::get('/classes', 'levels')->name('levels.index');
            Route::get('/subjects', 'subjects')->name('subjects');
            Route::get('/exams-types', 'examsTypes')->name('exams.index');
        });

        Route::controller(ExaminationTypeController::class)->group(function () {
            Route::get('/exams-types/create', 'create')->name('exams.create');
            Route::post('/exams-types/store', 'store')->name('exams.store');
            Route::get('/exams/{examType}/edit', 'edit')->name('exams.edit');
            Route::put('/exams/{examType}', 'update')->name('exams.update');

            Route::delete('/exams/{examType}', 'destroy')->name('exams.destroy');
        });

        Route::controller(AdminClassesController::class)->group(function () {
            Route::get('/level-create', 'create')->name('levels.create');
            Route::post('/level/store', 'store')->name('levels.store');
            Route::get('/level/{level}/edit', 'edit')->name('levels.edit');
            Route::put('/level/{level}/update', 'update')->name('levels.update');

            Route::delete('/level/{level}destory', 'destroy')->name('levels.destroy');
        });


        Route::controller(AdminSubjectsController::class)->group(function () {
        });
    });



    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});

require __DIR__ . '/auth.php';
