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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/new-question', [App\Http\Controllers\QuestionController::class, 'new_question'])->name('new_question');
Route::get('/person-time-expired', [App\Http\Controllers\PersonController::class, 'time_exipred'])->name('person.time_exipred');

Route::get('/admin', function () {
    return redirect()->route('home');
});


Auth::routes([
    'register' => false
]);


Route::group(['middleware' => ['auth'] ], function()
{
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/generate-pdf', [App\Http\Controllers\HomeController::class, 'generatePDF'])->name('generatePDF');

    Route::resource('/person', App\Http\Controllers\PersonController::class);

    Route::get('/delete-person/{id}', [App\Http\Controllers\PersonController::class, 'delete_person'])->name('person.delete_person');

    Route::post('/select-person', [App\Http\Controllers\PersonController::class, 'select_person'])->name('person.select_person');

    Route::resource('/question', App\Http\Controllers\QuestionController::class);
    Route::get('/delete-question/{id}', [App\Http\Controllers\QuestionController::class, 'delete_question'])->name('delete_question');



});
