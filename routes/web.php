<?php

use App\Http\Controllers\CategoriesController;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryModelController;

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
    return view('welcome');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/events', function () {
    return view('events');
});
Route::get('/dash', function () {
    return view('dash');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/events/store', [EventsController::class, 'store'])->name('events.store');
Route::post('/events/{id}/update', [EventsController::class, 'update'])->name('events.update');
Route::get('/index', [CategoriesController::class, 'index'])->name('index');
Route::get('/index', [EventsController::class, 'index'])->name('index');
Route::get('/dash', [EventsController::class, 'showDashboard'])->name('showDashboard');
// Route::get('/dash', [CategoriesController::class, 'showCategories'])->name('dash');
Route::get('/events', [CategoriesController::class, 'showCategories'])->name('showCategories');
// Route::get('/event', [EventsController::class, 'filterEvents'])->name('filterEvents');
// Route::get('/index/filter/{category_id}', 'EventsController@filterEvents')->name('filterEvents');
// Route::get('/categories', 'Event\EventsController@showCategories')->name('categories');
Route::get('/filterEvents', [EventsController::class, 'filterEvents'])->name('filterEvents');

Route::delete('/events/{id}', [EventsController::class, 'delete'])->name('events.delete');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
