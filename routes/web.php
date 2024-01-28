<?php

use App\Http\Controllers\DashboardEventController;
use App\Models\User;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('home',[
        "title" => "Home",
        "nama" => "Gerak ID",
        "image" => "pdip.png",
        "email" => "gerakid@gmail.com",
        "active" => "home"
    ]);
});

Route::get('/about', function () {
    return view('about',[
        "title" => "About",
        "nama" => "Gerak Indonesia",
        "image" => "pdip.png",
        "active" => "about"
    ]);
});

Route::get('/events', [EventController::class, 'index']);
Route::get('events/{event:slug}', [EventController::class, 'show']);

Route::get('/categories', function()
{
    return view('categories',[
        'title' => 'Event Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category)
{
    return view('events', [
        'title' => "Event by Category : $category->name",
        'active' => 'categories',
        'events' => $category->events->load('category', 'author')
    ]);
});

Route::get('/authors/{author:username}', function(User $author)
{
    return view('events', [
        'title' => "Event by Author : $author->name",
        'active' => "event",
        'events' => $author->events->load('category', 'author'),
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function()
{
    return view('dashboard.index', [
        'active' => "dashboard",
        'title' => "Dashboard"
    ]);
})->middleware('auth');

Route::get('/dashboard/events/checkSlug', [DashboardEventController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/events', DashboardEventController::class)->middleware('auth');