<?php

use App\Http\Controllers\Admin\BrandAdminController;
use App\Http\Controllers\Admin\CategoryAdminController;
use App\Http\Controllers\Admin\ProdukAdminController;
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
    Route::get('/admin/brand', [BrandAdminController::class, 'index'])->name('admin.brand');
    Route::get('/admin/contact', [ContactController::class, 'index'])->name('admin.contact');
});

require __DIR__.'/auth.php';