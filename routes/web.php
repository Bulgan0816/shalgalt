<?php

use App\Http\Controllers\NewsController;
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

// Route::get('/', function () {
//     return view('news.index');
// });

Route::get('news',[NewsController::class, 'index']);
Route::get('news/create',[NewsController::class, 'news.create']);


Route::get('/news1', function () {
    return view('news.news1');
});
