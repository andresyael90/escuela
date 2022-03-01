<?php
use App\Http\Controllers\ControllerCalendar;
use Illuminate\Support\Facades\Route;
Route::view('home', 'welcome')->name('home');
Route::get('home',[ControllerCalendar::class, 'index']);
Route::post('home/action', [ControllerCalendar::class, 'action']);