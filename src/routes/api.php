<?php

use Illuminate\Support\Facades\Route;
use Nika\FakerPay\Http\Controllers\PayController;

Route::prefix('api/fakerpay')->group(function () {
    Route::get('orders', [PayController::class, 'list']);
    Route::get('orders/{pay}', [PayController::class, 'show']);
    Route::post('orders/{pay}', [PayController::class, 'update']);
    Route::delete('orders/{pay}', [PayController::class, 'delete']);
});
