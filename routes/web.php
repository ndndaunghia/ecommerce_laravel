<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get("/", [HomeController::class, "index"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get("/redirect", [HomeController::class, "redirect"])->middleware('auth', 'verified');

Route::get("/view_category", [AdminController::class, "view_category"]);

Route::post("/add_category", [AdminController::class, "add_category"]);

Route::get("/delete_category/{id}", [AdminController::class, "delete_category"]);

Route::get("/view_product", [AdminController::class, "view_product"]);

Route::post("/add_product", [AdminController::class, "add_product"]);

Route::get("/show_product", [AdminController::class, "show_product"]);

Route::get("/delete_product/{id}", [AdminController::class, "delete_product"]);

Route::get("/update_product/{id}", [AdminController::class, "update_product"]);

Route::get("/order", [AdminController::class, "order"]);

Route::get("/delivered/{id}", [AdminController::class, "delivered"]);

Route::get("/search", [AdminController::class, "search_data"]);

Route::get("/send_email/{id}", [AdminController::class, "send_email"]);

Route::post("/send_user_email/{id}", [AdminController::class, "send_user_email"]);



Route::post("/update_product_confirm/{id}", [AdminController::class, "update_product_confirm"]);

Route::get("/product_details/{id}", [HomeController::class, "product_details"]);

Route::post("/add_cart/{id}", [HomeController::class, "add_cart"]);

Route::get("/show_cart", [HomeController::class, "show_cart"]);

Route::get("/remove_product_cart/{id}", [HomeController::class, "remove_product_cart"]);

Route::patch("/update_cart/{id}", [HomeController::class, "update_cart"]);

Route::get("/cash_order", [HomeController::class, "cash_order"]);

Route::get("/stripe/{subTotal}", [HomeController::class, "stripe"]);

Route::post('stripe/{subTotal}', [HomeController::class, 'stripePost'])->name('stripe.post');

Route::get("/get_product_by_category/{category_name}", [HomeController::class, "get_product_by_category"]);

Route::get("/get_profile", [HomeController::class, "get_profile"]);

Route::get("/get_all_products", [HomeController::class, "get_all_products"]);


