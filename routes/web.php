<?php

use App\Http\Controllers\BillingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return "<h1>To the masters with love</h1><a href='plans'>clique para começar.</a>";
});

Route::get('/plans', function () {
    return view('plans');
});

Route::get('/thanks',function(Request $request){
    return view('thanks', $request->all());
});

Route::get('/customers',function(Request $request){
    return view('customers', $request->all());
});
