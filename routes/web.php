<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

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

Route::view(
    '',
    'index',
    [
        'description' => 'Бронирование туров, жилья, отелей, заказ авиа, ж/д и автобусных билетов, организация пассажирских перевозок. С нетерпением ждём Вас!', 
        'title' => 'Турагентство Белгород | Планета путешествий и развлечений'
    ]
);

Route::view(
    'tours',
    'tours',
    [
        'description' => 'Аренда комфортабельных автобусов и микроавтобусов по гибким ценам! Путешествие для больших групп людей. Выгодные условия, опытные водители и безопасное вождение!', 
        'title' => 'Пассажирские перевозки | Турагентство Белгород | Планета путешествий'
    ]
);

Route::view(
    'transport',
    'transport',
    [
        'description' => 'Забронировать туры по всем популярным направлёниям, лучшие предложения и низкие цены. С нетерпением ждём Вас!', 
        'title' => 'Горящие туры и путёвки | Планета путешествий и развлечений'
    ]
);
