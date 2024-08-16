<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contacts;


Route::get('/', function () {
    return view('welcome');
});
// contacts Routing
Route::get('/contacts',[contacts::class,'index']); 
Route::get('/contacts/create',[contacts::class,'create'])->name('contacts.create'); 
Route::post('/contacts/store',[contacts::class,'store'])->name('contacts.store'); 
Route::get('/contact/edit/{id}',[contacts::class,'edit'])->name('contact.edit'); 
Route::get('/contact/show/{id}',[contacts::class,'show'])->name('contact.show'); 
Route::post('/contact/update/{id}',[contacts::class,'update'])->name('contact.update'); 
Route::get('/contact.delete/{id}',[contacts::class,'delete'])->name('contact.delete'); 
