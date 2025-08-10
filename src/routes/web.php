<?php

use Illuminate\Support\Facades\Route;
use Nika\FakerPay\Http\Controllers\PayController;

Route::prefix('fakerpay')->group(function () {
    Route::get('orders', [FakerpayController::class, 'index']);
    Route::get('order/{pay}', [FakerpayController::class, 'show']);
    Route::post('order/{pay}/update', [FakerpayController::class, 'update']);
    Route::post('order/{pay}/delete', [FakerpayController::class, 'delete']);
});
