<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardDivisionController;
use App\Http\Controllers\DashboardStatusController;
use App\Http\Controllers\DashboardEmployeeController;
use App\Http\Controllers\DashboardITController;
use App\Models\Category;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardSalesController;
use App\Http\Controllers\DashboardTicketingController;
use App\Http\Controllers\DashboardUserController;

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
    return view('home', [
        "title" => "Home",
        "active" => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => 'about',
        "name" => "Deni Ruhyadi",
        "email" => "dryd78@gmail.com",
        "image" => "dryd.jpg"
    ]);
});

Route::get('/page-top', function () {
    return view('dashboard.ticketings.index', [
        // "title" => "About",
        // "active" => 'about',
        // "name" => "Deni Ruhyadi",
        // "email" => "dryd78@gmail.com",
        // "image" => "dryd.jpg"
    ]);
});


Route::get('/posts', [PostController::class, 'index']);

// halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('admin');
Route::post('/register', [RegisterController::class, 'store'])->middleware('admin');


//DASHBORD POSTS->>>
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::get('/dashboard/users/checkSlug', [DashboardUserController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/users', DashboardUserController::class)->middleware('admin');

Route::get('/dashboard/employees/checkSlug', [DashboardEmployeeController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/employees', DashboardEmployeeController::class)->middleware('admin');

Route::get('/dashboard/ticketings/checkSlug', [DashboardTicketingController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/ticketings', DashboardTicketingController::class)->middleware('admin');

Route::get('/dashboard/divisions/checkSlug', [DashboardDivisionController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/divisions', DashboardDivisionController::class)->middleware('admin');

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/sales', DashboardSalesController::class)->middleware('auth');

Route::get('/dashboard/statuses/checkSlug', [DashboardStatusController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/statuses', DashboardStatusController::class)->middleware('admin');
