<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group([

    'middleware' => 'api'

], function ($router) {

    //Auth
    Route::post('login', [AuthController::class,'login']);
    //Unit
    Route::get('unit', [UnitController::class,'index']);
    //Category
    Route::get('category', [CategoryController::class,'index']);
    //Product
    Route::resource('product',ProductController::class)->except('edit','show','update','destroy','create');
    //Solicity
    Route::resource('solicit',SolicitController::class)->except('edit','show','update','destroy','create');


});
