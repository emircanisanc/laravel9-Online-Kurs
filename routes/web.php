<?php

use App\Http\Controllers\AdminPanel\AdminContentController;
use App\Http\Controllers\AdminPanel\AdminCourseController;
use App\Http\Controllers\AdminPanel\AdminUserController;
use App\Http\Controllers\AdminPanel\CategoryController;
use App\Http\Controllers\AdminPanel\CommentController;
use App\Http\Controllers\AdminPanel\FaqController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminPanel\HomeController as AdminHomeController;
use App\Http\Controllers\AdminPanel\ImageController;
use App\Http\Controllers\AdminPanel\MessageController;
use App\Http\Controllers\AdminPanel\OrderController;
use App\Http\Controllers\UserController;

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

//// ****************** HOME PANEL ROUTES ******************
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/references', [HomeController::class, 'references'])->name('references');
Route::post('/storemessage', [HomeController::class, 'storemessage'])->name('storemessage');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::post('/storecomment', [HomeController::class, 'storecomment'])->name('storecomment');
Route::get('/loginuser', [HomeController::class, 'loginuser'])->name('loginuser');
Route::get('/registeruser', [HomeController::class, 'registeruser'])->name('registeruser');
Route::get('/logoutuser', [HomeController::class, 'logout'])->name('logoutuser');
Route::view('/loginadmin', 'admin.login')->name('loginadmin');
Route::post('/loginadmincheck', [HomeController::class, 'loginadmincheck'])->name('loginadmincheck');

//4- Route-> Controller-> View
Route::get('/test', [HomeController::class, 'test'])->name('test');

//5- Route with parameters
Route::get('/param/{id}', [HomeController::class, 'param'])->name('param');

//6- Route with post
Route::post('/save', [HomeController::class, 'save'])->name('save');

Route::get('/course/{id}', [HomeController::class, 'course'])->name('course');
Route::get('/categorycourses/{id}/{slug}', [HomeController::class, 'categorycourses'])->name('categorycourses');
Route::get('/userpage/{id}', [HomeController::class, 'userpage'])->name('userpage');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


/// AUTH CONTROL ///
Route::middleware('auth')->group(function () {

    //// USER PANEL ROUTES ******************
    Route::prefix('userpanel')->name('userpanel.')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/comments', 'comments')->name('comments');
        Route::get('/courses', 'courses')->name('courses');
        Route::get('/createdcourses', 'createdcourses')->name('createdcourses');
        Route::get('/commentdestroy/{id}', 'commentdestroy')->name('commentdestroy');
        Route::get('/shopcart/{id}', 'shopcart')->name('shopcart');
        Route::get('/orders', 'orders')->name('orders');
        Route::get('/ordercomplete', 'ordercomplete')->name('ordercomplete');
        Route::post('/storeorder', 'storeorder')->name('storeorder');

        Route::get('/createcourse', 'createcourse')->name('createcourse');
        Route::get('/showcourse/{id}', 'showcourse')->name('showcourse');
        Route::post('/storecourse', 'storecourse')->name('storecourse');
        Route::get('/coursedestroy/{id}', 'coursedestroy')->name('coursedestroy');
        Route::get('/courseedit/{id}', 'courseedit')->name('courseedit');
        Route::post('/courseupdate/{id}', 'courseupdate')->name('courseupdate');

        Route::get('/contentindex/{id}', 'contentindex')->name('contentindex');
        Route::get('/contentcreate/{pid}', 'contentcreate')->name('contentcreate');
        Route::get('/showcontent/{id}', 'showcontent')->name('showcontent');
        Route::post('/contentstore', 'contentstore')->name('contentstore');
        Route::get('/contentdestroy/{pid}/{id}', 'contentdestroy')->name('contentdestroy');
        Route::get('/contentedit/{id}', 'contentedit')->name('contentedit');
        Route::post('/contentupdate/{id}', 'contentupdate')->name('contentupdate');

        Route::get('/videopage/{id}', [HomeController::class, 'videopage'])->name('videopage');
    });


    //// ADMIN PANEL ROUTES ******************
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminHomeController::class, 'index'])->name('index');
        //// ADMIN GENERAL ROUTES ******************
        Route::get('/setting', [AdminHomeController::class, 'setting'])->name('setting');
        Route::post('/setting', [AdminHomeController::class, 'settingUpdate'])->name('setting.update');
        //// ADMIN CATEGORY ROUTES ******************
        Route::prefix('/category')->name('category.')->controller(CategoryController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
        });

        //// ADMIN COURSE ROUTES ******************
        Route::prefix('/course')->name('course.')->controller(AdminCourseController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
        });

        //// ADMIN CONTENT ROUTES ******************
        Route::prefix('/content')->name('content.')->controller(AdminContentController::class)->group(function () {
            Route::get('/{pid}', 'index')->name('index');
            Route::get('/create/{pid}', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/destroy/{pid}/{id}', 'destroy')->name('destroy');
        });

        //// ADMIN CONTENT IMAGE GALLERY ROUTES ******************
        Route::prefix('/image')->name('image.')->controller(ImageController::class)->group(function () {
            Route::get('/{pid}', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store/{pid}', 'store')->name('store');
            Route::get('/destroy/{pid}/{id}', 'destroy')->name('destroy');
        });

        //// ADMIN MESSAGE ROUTES ******************
        Route::prefix('/message')->name('message.')->controller(MessageController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/show/{id}', 'show')->name('show');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
        });

        //// ADMIN FAQ ROUTES ******************
        Route::prefix('/faq')->name('faq.')->controller(FaqController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
        });

        //// ADMIN COMMENT ROUTES ******************
        Route::prefix('/comment')->name('comment.')->controller(CommentController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/show/{id}', 'show')->name('show');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
        });

        //// ADMIN USER ROUTES ******************
        Route::prefix('/user')->name('user.')->controller(AdminUserController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::get('/show/{id}', 'show')->name('show');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
            Route::post('/addrole/{id}', 'addrole')->name('addrole');
            Route::get('/destroyrole/{uid}/{rid}', 'destroyrole')->name('destroyrole');
        });

        //// ADMIN ORDER ROUTES ******************
        Route::prefix('/order')->name('order.')->controller(OrderController::class)->group(function () {
            Route::get('/{slug}', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/destroy/{id}/{slug}', 'destroy')->name('destroy');
        });

    }); //admin panel routes
}); //auth control