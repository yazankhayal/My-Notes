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

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/page/details/{id?}/{slug?}', [App\Http\Controllers\IndexController::class, 'page'])->name('page');
Route::post('/contact/post', [App\Http\Controllers\IndexController::class, 'contact'])->name('contact');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sign_out', [App\Http\Controllers\HomeController::class, 'sign_out'])->name('sign_out');

Route::group(['prefix' => 'home', 'middleware' => 'web'], function () {

    //Notes
    Route::group(['prefix' => '/notes'], function () {
        Route::get('/', [\App\Http\Controllers\NotesController::class, 'index'])->name('notes.index');
        Route::get('create', [\App\Http\Controllers\NotesController::class, 'create'])->name('notes.create');
        Route::get('{id?}-edit', [\App\Http\Controllers\NotesController::class, 'edit'])->name('notes.edit');
        Route::get('/details/{id?}', [\App\Http\Controllers\NotesController::class, 'details'])->name('notes.details');
        Route::get('/deleted', [\App\Http\Controllers\NotesController::class, 'deleted'])->name('notes.deleted');
        Route::post('/get_data', [\App\Http\Controllers\NotesController::class, 'get_data'])->name('notes.get_data');
        Route::post('/post_data', [\App\Http\Controllers\NotesController::class, 'post_data'])->name('notes.post_data');
    });

    //Reminder
    Route::group(['prefix' => '/reminder'], function () {
        Route::get('/', [\App\Http\Controllers\ReminderController::class, 'index'])->name('reminder.index');
        Route::get('create', [\App\Http\Controllers\ReminderController::class, 'create'])->name('reminder.create');
        Route::get('{id?}-edit', [\App\Http\Controllers\ReminderController::class, 'edit'])->name('reminder.edit');
        Route::get('/details/{id?}', [\App\Http\Controllers\ReminderController::class, 'details'])->name('reminder.details');
        Route::get('/deleted', [\App\Http\Controllers\ReminderController::class, 'deleted'])->name('reminder.deleted');
        Route::post('/get_data', [\App\Http\Controllers\ReminderController::class, 'get_data'])->name('reminder.get_data');
        Route::post('/post_data', [\App\Http\Controllers\ReminderController::class, 'post_data'])->name('reminder.post_data');
    });

    //Reminder
    Route::group(['prefix' => '/to-do-list'], function () {
        Route::get('/', [\App\Http\Controllers\ToDoListController::class, 'index'])->name('to_do_list.index');
        Route::get('create', [\App\Http\Controllers\ToDoListController::class, 'create'])->name('to_do_list.create');
        Route::get('{id?}-edit', [\App\Http\Controllers\ToDoListController::class, 'edit'])->name('to_do_list.edit');
        Route::get('/details/{id?}', [\App\Http\Controllers\ToDoListController::class, 'details'])->name('to_do_list.details');
        Route::get('/deleted', [\App\Http\Controllers\ToDoListController::class, 'deleted'])->name('to_do_list.deleted');
        Route::post('/get_data', [\App\Http\Controllers\ToDoListController::class, 'get_data'])->name('to_do_list.get_data');
        Route::post('/post_data', [\App\Http\Controllers\ToDoListController::class, 'post_data'])->name('to_do_list.post_data');
    });

    //Profile
    Route::group(['prefix' => '/profile'], function () {
        Route::get('/', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
        Route::post('/update', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    });

});

Route::group(['prefix' => 'home', 'middleware' => 'admin'], function () {

    //Setting
    Route::group(['prefix' => '/setting'], function () {
        Route::get('/', [\App\Http\Controllers\SettingController::class, 'index'])->name('setting');
        Route::post('/update', [\App\Http\Controllers\SettingController::class, 'update'])->name('setting.update');
    });

    //Intro
    Route::group(['prefix' => '/intro'], function () {
        Route::get('/', [\App\Http\Controllers\IntroController::class, 'index'])->name('intro');
        Route::post('/update', [\App\Http\Controllers\IntroController::class, 'update'])->name('intro.update');
    });

    //Services
    Route::group(['prefix' => '/services'], function () {
        Route::get('/', [\App\Http\Controllers\ServicesController::class, 'index'])->name('services.index');
        Route::get('create', [\App\Http\Controllers\ServicesController::class, 'create'])->name('services.create');
        Route::get('{id?}-edit', [\App\Http\Controllers\ServicesController::class, 'edit'])->name('services.edit');
        Route::get('/details/{id?}', [\App\Http\Controllers\ServicesController::class, 'details'])->name('services.details');
        Route::get('/deleted', [\App\Http\Controllers\ServicesController::class, 'deleted'])->name('services.deleted');
        Route::post('/get_data', [\App\Http\Controllers\ServicesController::class, 'get_data'])->name('services.get_data');
        Route::post('/post_data', [\App\Http\Controllers\ServicesController::class, 'post_data'])->name('services.post_data');
    });

    //Pages
    Route::group(['prefix' => '/pages'], function () {
        Route::get('/', [\App\Http\Controllers\PagesController::class, 'index'])->name('pages.index');
        Route::get('create', [\App\Http\Controllers\PagesController::class, 'create'])->name('pages.create');
        Route::get('{id?}-edit', [\App\Http\Controllers\PagesController::class, 'edit'])->name('pages.edit');
        Route::get('/details/{id?}', [\App\Http\Controllers\PagesController::class, 'details'])->name('pages.details');
        Route::get('/deleted', [\App\Http\Controllers\PagesController::class, 'deleted'])->name('pages.deleted');
        Route::post('/get_data', [\App\Http\Controllers\PagesController::class, 'get_data'])->name('pages.get_data');
        Route::post('/post_data', [\App\Http\Controllers\PagesController::class, 'post_data'])->name('pages.post_data');
    });

});
