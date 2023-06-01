<?php

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\DiscountController;
use App\Http\Controllers\Api\FollowController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ChatController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;

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

//--------------REGISTER, LOGIN/OUT, SEE USER -------------
//------------------------ (Auth) --------------------------

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'register']);

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']); //User actual 
    });
});





Route::middleware('auth:sanctum')->group(function () {

    //----------------------CATEGORIAS--------------
    Route::apiResource('categories', CategoryController::class)->except([
        'index', 'show'
    ]);

    //----------------------PRODUCTOS-------------------
    Route::apiResource('products', ProductController::class)->except([
        'index', 'show'
    ]);


    //===============RELACIONADOS CON USER==================

    Route::group(['prefix' => 'user/{user}'], function () {
        //Direcciones 
        Route::apiResource('/address', AddressController::class);
    
        //Carrito 
        Route::apiResource('/cart', CartController::class);
    
        //Teléfono
        Route::apiResource('/phone', CartController::class);
    
        //Seguidores 
        Route::apiResource('/followers', FollowController::class);
        Route::apiResource('/followed', FollowController::class);
    
        //Pedidos
        Route::apiResource('/order', OrderController::class);
    
        //Chats
        Route::get('/chats', [ChatController::class, 'getChatsFromUser']);
        Route::apiResource('chats', ChatController::class);
    
        //Productos
        Route::get('/products', [ProductController::class, 'getProductsFromUser']);    
    });


    
        //Encontrar X TOKEN!
        Route::get('/token/{token}', [UserController::class, 'findByToken']);


    //================================================================


    //MENSAJES, "" DE LOS CHATS)
    Route::apiResource('messages', MessageController::class);
    Route::get('chat/{chat}/messages', [MessageController::class, 'getAllMessagesFromChat']);
//    Route::apiResource('chat', ChatController::class);

});

//#################### Grupo que no requiere autorizacion ####################

//Ver todas las categorías
Route::apiResource('categories', CategoryController::class)->only([
    'index', 'show'
]);

//Ver todos los productos
Route::apiResource('products', ProductController::class)->only([
    'index', 'show'
]);

//Imágenes de producto
Route::apiResource('{product}/image', ProductController::class);

//Ver todos los usuarios
Route::apiResource('users', UserController::class)->only([
    'index'
]);
