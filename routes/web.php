<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Livewire\ChatComponent;
use App\Models\Contact;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->resource('contacts', ContactController::class)->except(['show']);

Route::get('/chat', ChatComponent::class)->middLeware('auth')->name('chat.index');

// Route::middleware([
//     'auth:sanctum',
//     // config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// Route::get('prueba', function(){
//     // $user = User::find(1);

//     // $messages= $user->messages()->where(function($query){
//     //     $query->where('chat_id', 1)
//     //         ->orWhere('chat_id',2);
//     // })->get();
//     // return $messages;

//     $users =User::whereHas('messages', function ($query){
//         $query->where('body', 'Prueba');
//     })->get();
//     return $users;
// });
