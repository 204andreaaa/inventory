<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\categorieController;
use App\Http\Controllers\supplierController;
use App\Http\Controllers\warehouseController;
use App\Http\Controllers\RestockRequestController;
use App\Http\Controllers\stockController;
use App\Http\Controllers\requestFormController;

// Dashboard
Route::view('/', 'admin.indexAdmin')->name('admin');

// (opsional) akses langsung layout – biasanya ga dipakai
Route::view('/home', 'layouts.home');

// Cards (barang)


// Users (pakai controller kamu)
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::post('/users/bulk-delete', [UserController::class, 'bulkDestroy'])
    ->name('users.bulk-destroy');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::resource('products', ProductController::class)
    ->except(['show', 'create', 'edit']);

// tanpa prefix

Route::get('/categories', [categorieController::class, 'index'])->name('categories.index');
Route::get('/categories/datatable', [categorieController::class, 'datatable'])->name('categories.datatable');
Route::post('/categories', [categorieController::class, 'store'])->name('categories.store');
Route::put('/categories/{category}', [categorieController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [categorieController::class, 'destroy'])->name('categories.destroy');

// routes/web.php

Route::get('/suppliers/search',        [supplierController::class, 'search'])->name('suppliers.search');
Route::get('/suppliers',               [supplierController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/{supplier}',    [supplierController::class, 'show'])->name('suppliers.show');
Route::post('/suppliers',              [supplierController::class, 'store'])->name('suppliers.store');
Route::put('/suppliers/{supplier}',    [supplierController::class, 'update'])->name('suppliers.update');
Route::delete('/suppliers/{supplier}', [supplierController::class, 'destroy'])->name('suppliers.destroy');


/*
|--------------------------------------------------------------------------
| Master Data (placeholder dulu)
|--------------------------------------------------------------------------
*/


Route::get('/warehouses/search', [warehouseController::class,'search'])->name('warehouses.search');
Route::get('/warehouses', [warehouseController::class,'index'])->name('warehouses.index');
Route::get('/warehouses/{warehouse}', [warehouseController::class,'show'])->name('warehouses.show');
Route::post('/warehouses', [warehouseController::class,'store'])->name('warehouses.store');
Route::put('/warehouses/{warehouse}', [warehouseController::class,'update'])->name('warehouses.update');
Route::delete('/warehouses/{warehouse}', [warehouseController::class,'destroy'])->name('warehouses.destroy');


/*
|--------------------------------------------------------------------------
| Operations (placeholder dulu)
|--------------------------------------------------------------------------
*/
Route::get('/stock', [stockController::class, 'index'])->name('stock.index');
Route::post('/stock', [stockController::class, 'store'])->name('stock.store');
Route::get('/stock/json',[stockController::class, 'json'])->name('stock.json');      // ajax data + pagination
Route::put('/stock/{id}', [stockController::class, 'update'])->name('stock.update');
Route::delete('/stock/{id}', [stockController::class, 'destroy'])->name('stock.destroy');
Route::post('/stock/bulk-delete', [stockController::class, 'bulkDestroy'])->name('stock.bulkDestroy');





Route::get('/restocks',       [RestockRequestController::class, 'index'])->name('restocks.index');  // page
Route::get('/restocks/json',  [RestockRequestController::class, 'json'])->name('restocks.json');    // ajax + pagination
Route::post('/restocks',      [RestockRequestController::class, 'store'])->name('restocks.store');  // create
Route::post('/restocks/{id}/approve', [RestockRequestController::class,'approve'])->name('restocks.approve');
Route::post('/restocks/{id}/reject',  [RestockRequestController::class,'reject'])->name('restocks.reject');



// RF users

Route::get('/requestForm',        [requestFormController::class, 'index'])->name('requestForm.index'); // page user
Route::get('/requestForm/json',   [requestFormController::class, 'json'])->name('requestForm.json');   // ajax list + pagination
Route::post('/requestForm',       [requestFormController::class, 'store'])->name('requestForm.store'); // submit request







Route::view('/transactionDetail', 'admin.placeholder', ['title' => 'TransactionDetail'])->name('transactionDetail.index');
Route::view('/transactions', 'admin.placeholder', ['title' => 'Transactions'])->name('transactions.index');

/*
|--------------------------------------------------------------------------
| Reports (placeholder dulu)
|--------------------------------------------------------------------------
*/
Route::view('/reports',      'admin.placeholder', ['title' => 'Reports'])->name('reports.index');
