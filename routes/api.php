<?php

use App\Http\Controllers\Simple;
use App\Mail\NsjTech;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/data', [Simple::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('user', function()
{
    return 'Hello World';
});

Route::middleware('auth:sanctum')->get('/inquire', function (Request $request) {
    return $request->inquire();
});

Route::post('inquire', function (Request $request) {

    Mail::to('inquiry@shiftminds.com.ph')->send(
        new NsjTech( 
            $request->name,
            $request->email,
            $request->contact,
            $request->company,
            $request->messages,
        )
    );

    return response()->json(['message' => 'success']);
});