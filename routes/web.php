<?php
use App\Http\Controllers\ControllerCalendar;
use Illuminate\Support\Facades\Route;
Route::view('/', 'welcome')->name('home');
Route::get('/',[ControllerCalendar::class, 'index']);
Route::post('/action', [ControllerCalendar::class, 'action']);