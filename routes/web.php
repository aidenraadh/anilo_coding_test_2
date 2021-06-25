<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;

use App\Http\Controllers\ScoreController;

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


Route::resources([
    'scores' => ScoreController::class,
]);

Route::get('/', function(){
    $arr = [
        1, [10,4,[50,25],3],12,[3,21,8]
    ];
});