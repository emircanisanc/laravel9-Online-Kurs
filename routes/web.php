<?php

use App\Http\Controllers\AdminPanel\CategoryController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminPanel\HomeController as AdminHomeController;

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
// 1- Do something in route
Route::get('/hello', function () {
    return 'Hello World';
});

// 2- Call view in route
Route::get('/welcome', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//3- Call Controller Function
Route::get('/', [HomeController::class, 'index'])->name('home');

//4- Route-> Controller-> View
Route::get('/test', [HomeController::class, 'test'])->name('test');

//5- Route with parameters
Route::get('/param/{id}', [HomeController::class, 'param'])->name('param');

//6- Route with post
Route::post('/save', [HomeController::class, 'save'])->name('save');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

//// ADMIN PANEL ROUTES ******************

Route::prefix('admin')->name('admin.')->group(function ()
{
    Route::get('/', [AdminHomeController::class, 'index'])->name('index');
//// ADMIN CATEGORY ROUTES ******************
    Route::prefix('/category')->name('category.')->controller(CategoryController::class)->group(function ()
    {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });
});