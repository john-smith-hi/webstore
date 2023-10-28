<?php

use App\Http\Controllers\User\UserAboutusController;
use App\Http\Controllers\User\UserBrandController;
use App\Http\Controllers\User\UserCartController;
use App\Http\Controllers\User\UserCheckoutController;
use App\Http\Controllers\User\UserContactController;
use App\Http\Controllers\User\UserHomeController;
use App\Http\Controllers\User\UserOrderController;
use App\Http\Controllers\User\UserProductController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\User\UserReviewController;
use App\Http\Controllers\User\UserSearchController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUser;
use Illuminate\Support\Facades\Route;

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

//User unlogged in
Route::get('', [UserHomeController::class, 'index'])->name('user.home');
Route::get('search', [UserSearchController::class, 'index'])->name('user.search');
Route::get('aboutus', [UserAboutusController::class, 'index'])->name('user.aboutus');
Route::prefix('contact')->group(function(){
    Route::get('', [UserContactController::class, 'index'])->name('user.contact.index');
    Route::post('', [UserContactController::class, 'send'])->name('user.contact.send');
});
Route::prefix('product')->group(function(){
    Route::get('/{slug}', [UserProductController::class, 'index'])->name('user.product.index');
});
Route::prefix('brand')->group(function(){
    Route::get('', [UserBrandController::class, 'index'])->name('user.brand.index');
    Route::get('detail/{slug}', [UserBrandController::class,'detail'])->name('user.brand.detail');
});
Route::prefix('checkout')->group(function(){
    Route::get('', [UserCheckoutController::class, 'index'])->name('user.checkout.index');
    Route::post('', [UserCheckoutController::class,'submit'])->name('user.checkout.submit');
});



//User logged in
Route::middleware([IsUser::class])->group(function(){
    Route::prefix('profile')->group(function(){
        Route::get('', [UserProfileController::class, 'index'])->name('user.profile.index');
        Route::post('edit', [UserProfileController::class, 'edit'])->name('user.profile.edit');
    });
    Route::prefix('cart')->group(function(){
        Route::get('', [UserCartController::class, 'index'])->name('user.cart.index');
        Route::post('add', [UserCartController::class, 'add'])->name('user.cart.add');
        Route::post('edit', [UserCartController::class, 'edit'])->name('user.cart.edit');
        Route::post('editmulti', [UserCartController::class, 'editmulti'])->name('user.cart.editmulti');
        Route::post('delete',[UserCartController::class, 'delete'])->name('user.cart.delete');
    });
    Route::prefix('checkout')->group(function(){
        Route::get('history', [UserCheckoutController::class,'history'])->name('user.checkout.history');
        Route::get('allcart', [UserCheckoutController::class,'allcart'])->name('user.checkout.allcart');
    });
    Route::prefix('order')->group(function(){
        Route::get('/{id}', [UserOrderController::class, 'index'])->name('user.order.index');
        Route::post('delete', [UserOrderController::class, 'delete'])->name('user.order.delete');
    });

    Route::prefix('review')->group(function(){
        Route::post('submit', [UserReviewController::class, 'submit'])->name('user.review.submit');
    });
});

