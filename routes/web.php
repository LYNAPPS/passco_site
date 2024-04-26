<?php

use App\Http\Controllers\Admin\AdminClassesController;
use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\Admin\AdminSubjectsController;
use App\Http\Controllers\Admin\AdminQuestionTypeController;
use App\Http\Controllers\Admin\ExaminationTypeController;
use App\Http\Controllers\HomePagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\VarDumper\Caster\ResourceCaster;

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


// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['visitor'])->group(function () {
    Route::controller(HomePagesController::class)->group(function () {
        Route::get('/', 'index')->name('homepage');
        Route::get('/libraries', 'libraries')->name('libraries');
        Route::get('/all-subjects', 'allSubjects')->name('subjects-all');
        Route::get('/{slug}/{id}/pasco-all', 'viewSubjectPasco')->name('view-subject-pasco');
        Route::get('/{slug}/{id}/view-library', 'viewExamLibrary')->name('view-exams-library');
        Route::get('/exams/{examType}/content', 'fetchContent')->name('exams.content');
        Route::get('/subjects/all', 'fetchAllSubjects')->name('exams.content');
        Route::get('/download/step-one', 'submitNumber')->name('submit.phone');
        Route::get('/download/step-two', 'submitOtherDetails')->name('submit.details');
        Route::get('/download/preview', 'downloadPreview')->name('submit.details');
    });
});

Route::middleware('auth', 'verified')->group(function () {
    Route::middleware('verified')->group(function () {

        Route::controller(AdminPagesController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('dashboard');
            Route::get('/classes', 'levels')->name('levels.index');
            Route::get('/subjects', 'subjects')->name('subjects.index');
            Route::get('/exams-types', 'examsTypes')->name('exams.index');

            Route::post('/update-timezone', 'getUserTimezone')->name('get-user-timezone');
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
            Route::get('/subject-create', 'create')->name('subjects.create');
            Route::post('/subject/store', 'store')->name('subjects.store');
            Route::get('/subject/{subject}/edit', 'edit')->name('subjects.edit');
            Route::put('/subject/{subject}/update', 'update')->name('subjects.update');

            Route::delete('/subject/{subject}destory', 'destroy')->name('subjects.destroy');
        });

        Route::controller(ResourceController::class)->group(function () {
            Route::get('/resources', 'index')->name('resources');
            Route::get('/resources_create', 'create')->name('resoures.create');
        });

        Route::controller(AdminQuestionTypeController::class)->group(function() {
            Route::get('/type-create', 'index')->name('question_type');
            Route::get('/type-create', 'create')->name('question_type.create');
            Route::post('/type/store', 'store')->name('question_type.store');
            Route::get('/type/{type}/edit', 'edit')->name('question_type.edit');
            Route::put('/type/{type}/update', 'update')->name('question_type.update');

            Route::delete('/type/{type}destory', 'destroy')->name('question_type.destroy');
        });
    });



    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});

require __DIR__ . '/auth.php';
