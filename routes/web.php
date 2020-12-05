<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;

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

Route::get('/', function () { return view('home'); });

//Products
Route::get('/products', function () {
    $count_product = DB::table('products')
                    ->count();
    $product = DB::table('products')
                ->orderBy('id', 'asc')
                ->get();
    return view('/products/products')
            ->with(['count' => $count_product])
            ->with(['products' => $product]);
});
Route::get('/products/input', function () { return view('/products/input'); });
Route::post('/products/input/storeProduct',[ProductsController::class,'storeProduct']);
Route::get('/products/details/{id}', function ($id) {
    $product = DB::table('products')
                ->where('id', $id)
                ->first();
    return view('/products/update')
            ->with(['product' => $product]);
});
Route::post('/products/update/{id}',[ProductsController::class,'updateProduct']);
Route::get('/products/delete/{id}',[ProductsController::class,'deleteProduct']);

//Orders
Route::get('/order', function() {
    $count_product = DB::table('products')
                    ->count();
    $product = DB::table('products')
                ->orderBy('id', 'asc')
                ->get();
    return view('/order/order')
            ->with(['count' => $count_product])
            ->with(['products' => $product]);
});
Route::get('/order/detail/{id}', function($id) {
    $product = DB::table('products')
                ->where('id', $id)
                ->first();
    return view('/order/detail')
            ->with(['product' => $product]);
});
Route::post('/orders/detail/storeOrder',[OrdersController::class,'storeOrder']);

//History
Route::get('/history', function() {
    $count_orders = DB::table('orders')
                    ->count();
    $orders = DB::table('orders')
                    ->orderBy('orders.id', 'asc')
                    ->join('products', 'orders.product_id', '=', 'products.id' )
                    ->get();
    return view('/history/history')
                ->with(['count' => $count_orders])
                ->with(['orders' => $orders]);
});
