<?php

use App\Http\Controllers\AdminPanel\AdminContentController;
use App\Http\Controllers\AdminPanel\AdminCourseController;
use App\Http\Controllers\AdminPanel\CategoryController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminPanel\HomeController as AdminHomeController;
use App\Http\Controllers\AdminPanel\ImageController;

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

Route::get('/course/{id}', [HomeController::class, 'course'])->name('course');
Route::get('/categorycourses/{id}/{slug}', [HomeController::class, 'categorycourses'])->name('categorycourses');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

//// ADMIN PANEL ROUTES ******************

Route::prefix('admin')->name('admin.')->group(function ()
{
    Route::get('/', [AdminHomeController::class, 'index'])->name('index');
    //// ADMIN GENERAL ROUTES ******************
    Route::get('/setting', [AdminHomeController::class, 'setting'])->name('setting');
    Route::post('/setting', [AdminHomeController::class, 'settingupdate'])->name('setting.update');
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

    //// ADMIN COURSE ROUTES ******************
    Route::prefix('/course')->name('course.')->controller(AdminCourseController::class)->group(function ()
    {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    //// ADMIN CONTENT ROUTES ******************
    Route::prefix('/content')->name('content.')->controller(AdminContentController::class)->group(function ()
    {
        Route::get('/{pid}', 'index')->name('index');
        Route::get('/create/{pid}', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/destroy/{pid}/{id}', 'destroy')->name('destroy');
    });

    //// ADMIN CONTENT IMAGE GALLERY ROUTES ******************
    Route::prefix('/image')->name('image.')->controller(ImageController::class)->group(function ()
    {
        Route::get('/{pid}', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store/{pid}', 'store')->name('store');
        Route::get('/destroy/{pid}/{id}', 'destroy')->name('destroy');
    });
});