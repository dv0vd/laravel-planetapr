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
    'transport',
    'transport',
    [
        'description' => 'Аренда комфортабельных автобусов и микроавтобусов по гибким ценам! Путешествие для больших групп людей. Выгодные условия, опытные водители и безопасное вождение!', 
        'title' => 'Пассажирские перевозки | Турагентство Белгород | Планета путешествий'
    ]
);
