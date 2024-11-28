<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MejaControler;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;

Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'Clogin']);
Route::get('/dashboard', [UserController::class, 'dashboard']);
Route::get('/logout', [UserController::class, 'logout']);

Route::get('/entri_meja', [MejaControler::class, 'entri_meja']);
Route::post('/entri_meja', [MejaControler::class, 'Centri_meja']);
Route::get('/entri_meja/edit/{id_meja}', [MejaControler::class, 'edit_meja']);
Route::post('/entri_meja/edit/{id_meja}', [MejaControler::class, 'update_meja']);
Route::get('/entri_meja/delete/{id_meja}', [MejaControler::class, 'delete_meja']);

Route::get('/entri_menu', [MenuController::class, 'entri_menu']);
Route::post('/entri_menu', [MenuController::class, 'entri_menu_store']);
Route::get('/entri_menu/edit/{id_menu}', [MenuController::class, 'edit_menu']);
Route::post('/entri_menu/edit/{id_menu}', [MenuController::class, 'update_menu']);
Route::get('/entri_menu/delete/{id_menu}', [MenuController::class, 'delete_menu']);

Route::get('/entri_order', [OrderController::class, 'entri_order']);
Route::post('/entri_order', [OrderController::class, 'store'])->name('store');
Route::get('/entri_order/edit/{id_pesanan}', [OrderController::class, 'edit']);
Route::post('/entri_order/edit/{id_pesanan}', [OrderController::class, 'update']);
Route::get('/entri_order/delete/{id_pesanan}', [OrderController::class, 'delete']);
