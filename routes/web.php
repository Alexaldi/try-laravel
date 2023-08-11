<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Http\Request;
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

/*
Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return response('<h1>Hello Word</h1>',200)
    ->header('foo','bar');
});
Route::get('/post/{id}', function ($id) {
    ddd($id);
  return response('Post '.$id,200);
})  ->where('id','[0-9]+');
Route::get('/post/{id}', function ($id) {
    ddd($id);
  return response('Post '.$id,200);
})  ->where('id','[0-9]+');
Route::get('search',function(Request $request){
    return $request->name.' '.$request->city.' '.$request->kelas;
});
*/
//? All Listing
Route::get('/',[ListingController::class,'index']);

//? create
Route::get('/listings/create',[ListingController::class,'create'])->middleware('auth');

//? store data
Route::post('/listings',[ListingController::class,'store'])
->middleware('auth');

///? Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])
->middleware('auth');;

//? edit
Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])
->middleware('auth');;

//? delete data
Route::delete('/listings/{listing}',[ListingController::class,'remove'])
->middleware('auth');;

//?manage
Route::get('/listings/manage',[ListingController::class,'manage'])
->middleware('auth');;

//? Single Listing
Route::get('/listings/{listing}',[ListingController::class,'show']);

//! Register
Route::get('/register',[UserController::class,'create'])->middleware('guest');

//? store user
Route::post('/users',[UserController::class,'store']);

//?
Route::post('/logout',[UserController::class,'logout'])
->middleware('auth');;

//?login
Route::get('/login',[UserController::class,'login'])->name('login')
->middleware('guest');

Route::post('/users/authenticate',[UserController::class,'authenticate']);



