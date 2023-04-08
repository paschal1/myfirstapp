<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DriverController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'redirect']);
Route::get('/about_us', [HomeController::class, 'about_page']);
Route::get('/high_p', [HomeController::class, 'higher_page']);
Route::get('/car_p', [HomeController::class, 'car_page']);
Route::get('/blog_p', [HomeController::class, 'blog_page']);
Route::get('/contact_p', [HomeController::class, 'contact_page']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/add_driver_view', [AdminController::class, 'add_driver']);

Route::get('/add_user_view', [AdminController::class, 'add_user']);

Route::post('/driver_upload', [AdminController::class, 'upload']);

Route::post('/add_user_view', [AdminController::class, 'upload_user']);

Route::post('/booking', [HomeController::class, 'upload_book']);

Route::get('/booking_p', [HomeController::class, 'book_page']);
