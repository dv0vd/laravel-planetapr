<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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
Route::controller(IndexController::class)->group(function () {
    Route::get('', 'index');
    Route::get('news', 'news')->name('news');
});

Route::view(
    'tours',
    'tours',
    [
        'description' => 'Аренда комфортабельных автобусов и микроавтобусов по гибким ценам! Путешествие для больших групп людей. Выгодные условия, опытные водители и безопасное вождение!',
        'title' => 'Пассажирские перевозки | Турагентство Белгород | Планета путешествий и развлечений'
    ]
);

Route::view(
    'transport',
    'transport',
    [
        'description' => 'Забронировать туры по всем популярным направлёниям, лучшие предложения и низкие цены. С нетерпением ждём Вас!',
        'title' => 'Горящие туры и путёвки | Турагентство Белгород | Планета путешествий и развлечений'
    ]
);