<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\AdminAboutusController;
use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\AdminDocumentController;
use App\Http\Controllers\Admin\AdminGlobalVariableController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLogController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminRatingController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminSlideController;
use App\Http\Controllers\Admin\AdminStorageController;
use App\Http\Controllers\AdminSaleController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SildeController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\StorageHistoryController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsCustomer;
use App\Http\Middleware\UnLogin;
use App\Models\StorageHistory;
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

Route::get('/test', [TestController::class, 'index'])->middleware([IsAdmin::class])->name('admin.test.index');
Route::get('/link', function () {
    Artisan::call('storage:link');
})->middleware([IsAdmin::class])->name('admin.link.index');

Route::middleware([UnLogin::class])->group(function(){
    Route::prefix('login')->group(function(){
        Route::get('', [LoginController::class, 'index'])->name('login.index');
        Route::post('', [LoginController::class, 'submit'])->name('login.submit');
        Route::get('confirm',[LoginController::class, 'confirm'])->name('login.confirm');
    });
});
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

//Admin
Route::middleware(IsAdmin::class)->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('', [AdminHomeController::class, 'index'])->name('admin.home.index');
        Route::prefix('profile')->group(function(){
            Route::get('', [AdminProfileController::class, 'index'])->name('admin.profile.index');
            Route::post('update', [AdminProfileController::class, 'update'])->name('admin.profile.update');
        })->name('admin.profile');
        Route::prefix('slide')->group(function(){
            Route::get('', [AdminSlideController::class, 'index'])->name('admin.slide.index');
            Route::post('store', [AdminSlideController::class, 'store'])->name('admin.slide.store');
            Route::post('update/{id}', [AdminSlideController::class, 'update'])->name('admin.slide.update');
            Route::post('delete/{id}', [AdminSlideController::class, 'delete'])->name('admin.slide.delete');
        })->name('admin.slide');
        Route::prefix('brand')->group(function(){
            Route::get('', [AdminBrandController::class, 'index'])->name('admin.brand.index');
            Route::get('create', [AdminBrandController::class, 'create'])->name('admin.brand.create');
            Route::post('store', [AdminBrandController::class, 'store'])->name('admin.brand.store');
            Route::get('update/{id}', [AdminBrandController::class, 'update'])->name('admin.brand.update');
            Route::post('edit/{id}', [AdminBrandController::class, 'edit'])->name('admin.brand.edit');
            Route::post('delete/{id}', [AdminBrandController::class, 'delete'])->name('admin.brand.delete');
        })->name('admin.brand');
        Route::prefix('category')->group(function(){
            Route::get('', [AdminCategoryController::class, 'index'])->name('admin.category.index');
            Route::get('create', [AdminCategoryController::class, 'create'])->name('admin.category.create');
            Route::post('store', [AdminCategoryController::class, 'store'])->name('admin.category.store');
            Route::get('update/{id}', [AdminCategoryController::class, 'update'])->name('admin.category.update');
            Route::post('edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');
            Route::post('delete/{id}', [AdminCategoryController::class, 'delete'])->name('admin.category.delete');
        })->name('admin.category');
        Route::prefix('product')->group(function(){
            Route::get('', [AdminProductController::class, 'index'])->name('admin.product.index');
            Route::get('create', [AdminProductController::class, 'create'])->name('admin.product.create');
            Route::post('store', [AdminProductController::class, 'store'])->name('admin.product.store');
            Route::get('update/{id}', [AdminProductController::class, 'update'])->name('admin.product.update');
            Route::post('edit/{id}', [AdminProductController::class, 'edit'])->name('admin.product.edit');
            Route::post('delete/{id}', [AdminProductController::class, 'delete'])->name('admin.product.delete');
            Route::post('delete/image/{id}', [AdminProductController::class, 'deleteImage'])->name('admin.product.delete.image');
            //api
            Route::get('search_name/{search_name}', [AdminProductController::class, 'search_name'])->name('admin.product.search_name');
        })->name('admin.product');
        Route::prefix('sale')->group(function(){
            Route::get('', [AdminSaleController::class, 'index'])->name('admin.sale.index');
            Route::get('create', [AdminSaleController::class, 'create'])->name('admin.sale.create');
            Route::post('store', [AdminSaleController::class, 'store'])->name('admin.sale.store');
            Route::get('update/{id}', [AdminSaleController::class, 'update'])->name('admin.sale.update');
            Route::post('edit/{id}', [AdminSaleController::class, 'edit'])->name('admin.sale.edit');
            Route::post('delete/{id}', [AdminSaleController::class, 'delete'])->name('admin.sale.delete');
        })->name('admin.sale');
        Route::prefix('storage')->group(function(){
            Route::prefix('input')->group(function(){
                Route::get('', [AdminStorageController::class, 'inputIndex'])->name('admin.storage.input.index');
                Route::get('create', [AdminStorageController::class, 'inputCreate'])->name('admin.storage.input.create');
                Route::post('store', [AdminStorageController::class, 'inputStore'])->name('admin.storage.input.store');
                Route::get('update/{id}', [AdminStorageController::class, 'inputUpdate'])->name('admin.storage.input.update');
                Route::post('edit/{id}', [AdminStorageController::class, 'inputEdit'])->name('admin.storage.input.edit');
                Route::post('delete/{id}', [AdminStorageController::class, 'inputDelete'])->name('admin.storage.input.delete');
            });
            Route::prefix('output')->group(function(){
                Route::get('', [AdminStorageController::class, 'outputIndex'])->name('admin.storage.output.index');
                Route::get('create', [AdminStorageController::class, 'outputCreate'])->name('admin.storage.output.create');
                Route::post('store', [AdminStorageController::class, 'outputStore'])->name('admin.storage.output.store');
                Route::get('update/{id}', [AdminStorageController::class, 'outputUpdate'])->name('admin.storage.output.update');
                Route::post('edit/{id}', [AdminStorageController::class, 'outputEdit'])->name('admin.storage.output.edit');
                Route::post('delete/{id}', [AdminStorageController::class, 'outputDelete'])->name('admin.storage.output.delete');
            });
        })->name('admin.storage');
        Route::prefix('order')->group(function(){
            Route::get('', [AdminOrderController::class, 'index'])->name('admin.order.index');
            Route::get('update/{id}', [AdminOrderController::class, 'update'])->name('admin.order.update');
            Route::post('edit/{id}', [AdminOrderController::class, 'edit'])->name('admin.order.edit');
            Route::post('delete/{id}', [AdminOrderController::class, 'delete'])->name('admin.order.delete');
        })->name('admin.order');
        Route::prefix('review')->group(function(){
            Route::get('', [AdminReviewController::class, 'index'])->name('admin.review.index');
            Route::get('update/{id}', [AdminReviewController::class, 'update'])->name('admin.review.update');
            Route::post('edit/{id}', [AdminReviewController::class, 'edit'])->name('admin.review.edit');
            Route::get('delete/{id}',[AdminReviewController::class, 'delete'])->name('admin.review.delete');
        })->name('admin.review');
        Route::prefix('account')->group(function(){
            Route::get('', [AdminAccountController::class, 'index'])->name('admin.account.index');
            Route::get('create', [AdminAccountController::class, 'create'])->name('admin.account.create');
            Route::post('store', [AdminAccountController::class, 'store'])->name('admin.account.store');
            Route::get('update/{id}', [AdminAccountController::class, 'update'])->name('admin.account.update');
            Route::post('edit/{id}', [AdminAccountController::class, 'edit'])->name('admin.account.edit');
            Route::post('delete/{id}', [AdminAccountController::class, 'delete'])->name('admin.account.delete');
        })->name('admin.account');
        Route::prefix('aboutus')->group(function(){
            Route::get('', [AdminAboutusController::class,'index'])->name('admin.aboutus.index');
            Route::post('edit', [AdminAboutusController::class,'edit'])->name('admin.aboutus.edit');
        })->name('admin.aboutus');
        Route::prefix('doc')->group(function(){
            Route::get('', [AdminDocumentController::class, 'index'])->name('admin.doc.index');
            Route::post('store', [AdminDocumentController::class, 'store'])->name('admin.doc.store');
            Route::get('download/{id}', [AdminDocumentController::class,'download'])->name('admin.doc.download');
            Route::post('delete/{id}', [AdminDocumentController::class,'delete'])->name('admin.doc.delete');
        })->name('admin.doc');
        Route::prefix('global_var')->group(function(){
            Route::get('', [AdminGlobalVariableController::class,'index'])->name('admin.global_var.index');
            Route::get('create', [AdminGlobalVariableController::class,'create'])->name('admin.global_var.create');
            Route::post('store', [AdminGlobalVariableController::class,'store'])->name('admin.global_var.store');
            Route::post('update_all', [AdminGlobalVariableController::class,'update_all'])->name('admin.global_var.update_all');
            Route::get('update/{id}', [AdminGlobalVariableController::class,'update'])->name('admin.global_var.update');
            Route::post('edit/{id}', [AdminGlobalVariableController::class,'edit'])->name('admin.global_var.edit');
            Route::post('delete/{id}', [AdminGlobalVariableController::class,'delete'])->name('admin.global_var.delete');
        })->name('admin.global_var');
    });
});
