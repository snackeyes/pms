<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RateTypeController;
use App\Http\Controllers\RoomTariffController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\RoomAmenityController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SettlementTypeController;
use App\Http\Controllers\ExtraChargeController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('floors', FloorController::class);
    Route::resource('room-types', RoomTypeController::class);
    Route::resource('rate-types', RateTypeController::class);
    //Route::resource('room-tariffs', RoomTariffController::class);
    Route::resource('taxes', TaxController::class);
    Route::resource('room-amenities', RoomAmenityController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('admin/settlement-types', SettlementTypeController::class);
    Route::resource('extra-charges', ExtraChargeController::class);
    Route::resource('reservations', ReservationController::class);
   Route::get('reservations/{reservation}/checkin', [ReservationController::class, 'checkin'])->name('reservations.checkin');
    Route::post('reservations/{reservation}/checkin', [ReservationController::class, 'storeCheckin'])->name('reservations.storeCheckin');



});

Route::get('admin/room-tariffs', [RoomTariffController::class, 'index'])->name('admin.room-tariffs.index');
Route::post('admin/room-tariffs/update', [RoomTariffController::class, 'update'])->name('admin.room-tariffs.update');



require __DIR__.'/auth.php';
