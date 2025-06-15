<?php

use App\Http\Controllers\Admin\BrandAdminController;
use App\Http\Controllers\Admin\CategoryAdminController;
use App\Http\Controllers\Admin\CustomerAdminController;
use App\Http\Controllers\Admin\PenjualanAdminController;
use App\Http\Controllers\Admin\ProdukAdminController;
use App\Http\Controllers\Admin\ReviewAdminController;
use App\Http\Controllers\Admin\SettingAdminController;
use App\Http\Controllers\Admin\ShippingAdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\AboutController;
use App\Http\Controllers\User\BrandController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/user/category', [CategoryController::class, 'index'])->name('user.category');
    Route::get('/user/brand', [BrandController::class, 'index'])->name('user.brand');
    Route::get('/user/about', [AboutController::class, 'index'])->name('user.about');
    Route::get('/user/contact', [ContactController::class, 'index'])->name('user.contact');

});
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('admin.dashboard');

    Route::get('/admin/category', [CategoryAdminController::class, 'index'])->name('admin.category');

    Route::get('/admin/product', [ProdukAdminController::class, 'index'])->name('admin.product');
    Route::get('/admin/product/create', [ProdukAdminController::class, 'create'])->name('admin.product.create');
    Route::post('/admin/product/store', [ProdukAdminController::class, 'store'])->name('admin.product.store');
    Route::get('/admin/product/{product}/edit', [ProdukAdminController::class, 'edit'])->name('admin.product.edit');
    Route::put('/admin/product/{product}', [ProdukAdminController::class, 'update'])->name('admin.product.update');
    Route::delete('/admin/product/{product}', [ProdukAdminController::class, 'destroy'])->name('admin.product.destroy');

    Route::get('/admin/brand', [BrandAdminController::class, 'index'])->name('admin.brand');
    Route::get('/admin/contact', [ContactController::class, 'index'])->name('admin.contact');
   
    Route::get('/admin/penjualan', [PenjualanAdminController::class, 'index'])->name('admin.sales');

    Route::get('/admin/customer', [CustomerAdminController::class, 'index'])->name('admin.customer.index');
    Route::get('/admin/customer/create', [CustomerAdminController::class, 'create'])->name('admin.customer.create');
    Route::post('/admin/customer', [CustomerAdminController::class, 'store'])->name('admin.customer.store');
    Route::delete('/admin/customer/{customer}', [CustomerAdminController::class, 'destroy'])->name('admin.customer.destroy');
    Route::put('/admin/customer/{customer}', [CustomerAdminController::class, 'update'])->name('admin.customer.update');
    Route::get('/admin/customer/{customer}/edit', [CustomerAdminController::class, 'edit'])->name('admin.customer.edit');


    Route::get('/admin/shipping', [ShippingAdminController::class, 'index'])->name('admin.shipping');
    Route::get('/admin/review', [ReviewAdminController::class, 'index'])->name('admin.review');
    Route::get('/admin/setting', [SettingAdminController::class, 'index'])->name('admin.settings');
});

require __DIR__.'/auth.php';