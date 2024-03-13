<?php

use App\Models\Client;
use App\Models\Reservation;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ReservationController;

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


Route::get('/dashboard', function () {
    return view('dashboard');
});





Route::post('/dash', [EventsController::class, 'store'])->name('events.store');
Route::get('/Users', [AdminController::class, 'show'])->name('Users');
Route::get('/events/show', [EventsController::class, 'show'])->name('events.show');
Route::post('/events/{id}/update', [EventsController::class, 'update'])->name('events.update');
Route::get('/index', [CategoriesController::class, 'index'])->name('index');
Route::get('/index', [EventsController::class, 'index'])->name('index');
Route::get('/dashboard', [AdminController::class, 'index'])->name('index');
Route::get('/dash', [EventsController::class, 'showDashboard'])->name('showDashboard');
// Route::get('/dash', [CategoriesController::class, 'showCategories'])->name('dash');
Route::get('/events', [CategoriesController::class, 'showCategories'])->name('showCategories');
// Route::get('/event', [EventsController::class, 'filterEvents'])->name('filterEvents');
// Route::get('/index/filter/{category_id}', 'EventsController@filterEvents')->name('filterEvents');
// Route::get('/categories', 'Event\EventsController@showCategories')->name('categories');
Route::get('/filterEvents', [EventsController::class, 'filterEvents'])->name('filterEvents');
Route::get('searchname', [\App\Http\Controllers\EventsController::class, 'search'])->name('searchname');
Route::get('/tickets/{ticket}', [ReservationController::class, 'show'])->name('tickets.show');

Route::delete('/events/{id}', [EventsController::class, 'delete'])->name('events.delete');
Route::post('/index/{event}', [ReservationController::class, 'store'])->name('store');

Route::patch('/dashboard/{event}', [EventsController::class, 'accept'])->name('admin.accept');
Route::patch('/users/dashboard/{organizers}', [OrganizerController::class, 'unblock'])->name('organizer.unblock');

Route::patch('/users/{organizers}', [AdminController::class, 'ban'])->name('user.ban');
Route::patch('/clients/dashboard/{clients}', [AdminController::class, 'unblock'])->name('client.unblock');

Route::patch('/clients/{clients}', [AdminController::class, 'block'])->name('client.ban');
Route::patch('/admin/dashboard/{event}', [EventsController::class, 'deny'])->name('admin.deny');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/index', [UserController::class, 'index'])->name('index')->middleware('user');
Route::get('/dash', [OrganizerController::class, 'index'])->name('dash')->middleware('organizer');
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard')->middleware('admin');

require __DIR__ . '/auth.php';
