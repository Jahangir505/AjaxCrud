<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxCrudController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MailSendController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [AjaxCrudController::class, 'index']);

Route::post('/insert',[AjaxCrudController::class, 'store'])->name('insert');

Route::get('contact',[ContactController::class, 'index'])->name('contact');
Route::post('contacts',[ContactController::class, 'store'])->name('contacts');
Route::post('update/{id}',[ContactController::class,'update'])->name('update');
Route::get('mailsend',[MailSendController::class, 'index']);
Route::post('mail-sending',[MailSendController::class, 'sendMail'])->name('mail-sending');