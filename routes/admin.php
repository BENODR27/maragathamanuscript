<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SegmentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;

Route::get('/dashboard', function () {
    return view('admin.screens.dashboard');
});
Route::get('/adminlogout', function () {
    Auth::Logout();
    return redirect()->route('login');

})->name('admin.logout');

Route::group(['prefix' => 'user'], function () {
    Route::get('browse', [UserController::class,'browse'])->name('user.browse');
    Route::get('edit', [UserController::class,'edit'])->name('user.edit');
    Route::get('view', [UserController::class,'view'])->name('user.view');
    Route::put('update', [UserController::class,'update'])->name('user.update');
    Route::get('delete', [UserController::class,'delete'])->name('user.delete');
    Route::get('status/toggle', [UserController::class,'useStatusToggle'])->name('user.status.toggle');

});
Route::group(['prefix' => 'order'], function () {
    Route::get('browse', [OrderController::class,'browse'])->name('order.browse');
    Route::get('add', [OrderController::class,'add'])->name('order.add');
    Route::post('save', [OrderController::class,'save'])->name('order.save');
    Route::get('edit', [OrderController::class,'edit'])->name('order.edit');
    Route::put('update', [OrderController::class,'update'])->name('order.update');
    Route::get('delete', [OrderController::class,'delete'])->name('order.delete');
    Route::get('view', [OrderController::class,'view'])->name('order.view');
    Route::get('complete', [OrderController::class,'completeorder'])->name('order.complete');
});
Route::group(['prefix' => 'genre'], function () {
    
    Route::get('browse', [GenreController::class,'browse'])->name('genre.browse');
    Route::get('add', [GenreController::class,'add'])->name('genre.add');
    Route::post('save', [GenreController::class,'save'])->name('genre.save');
    Route::get('edit', [GenreController::class,'edit'])->name('genre.edit');
    Route::put('update', [GenreController::class,'update'])->name('genre.update');
    Route::get('delete', [GenreController::class,'delete'])->name('genre.delete');
    Route::get('products/view/list', [GenreController::class,'viewProductsByGenre'])->name('genre.products.view');
});
Route::group(['prefix' => 'category'], function () {
    Route::get('browse', [CategoryController::class,'browse'])->name('category.browse');
    Route::get('add', [CategoryController::class,'add'])->name('category.add');
    Route::post('save', [CategoryController::class,'save'])->name('category.save');
    Route::get('edit', [CategoryController::class,'edit'])->name('category.edit');
    Route::put('update', [CategoryController::class,'update'])->name('category.update');
    Route::get('delete', [CategoryController::class,'delete'])->name('category.delete');
    Route::get('products/view', [CategoryController::class,'viewProducts'])->name('category.products.view');

});
Route::group(['prefix' => 'segment'], function () {
    Route::get('browse', [SegmentController::class,'browse'])->name('segment.browse');
    Route::get('add', [SegmentController::class,'add'])->name('segment.add');
    Route::post('save', [SegmentController::class,'save'])->name('segment.save');
    Route::get('edit', [SegmentController::class,'edit'])->name('segment.edit');
    Route::put('update', [SegmentController::class,'update'])->name('segment.update');
    Route::get('delete', [SegmentController::class,'delete'])->name('segment.delete');
    Route::get('products/view/list', [SegmentController::class,'viewProductsBySegment'])->name('segment.products.view');

});
Route::group(['prefix' => 'department'], function () {
    Route::get('browse', [DepartmentController::class,'browse'])->name('department.browse');
    Route::get('add', [DepartmentController::class,'add'])->name('department.add');
    Route::post('save', [DepartmentController::class,'save'])->name('department.save');
    Route::get('edit', [DepartmentController::class,'edit'])->name('department.edit');
    Route::put('update', [DepartmentController::class,'update'])->name('department.update');
    Route::get('delete', [DepartmentController::class,'delete'])->name('department.delete');
});

Route::group(['prefix' => 'product'], function () {
    Route::get('browse', [ProductController::class,'browse'])->name('product.browse');
    Route::get('add', [ProductController::class,'add'])->name('product.add');
    Route::post('save', [ProductController::class,'save'])->name('product.save');
    Route::get('edit', [ProductController::class,'edit'])->name('product.edit');
    Route::put('update', [ProductController::class,'update'])->name('product.update');
    Route::get('delete', [ProductController::class,'delete'])->name('product.delete');
    Route::get('view', [ProductController::class,'view'])->name('product.view');
    Route::get('toggleStatus', [ProductController::class,'toggleStatus'])->name('product.toggleStatus');

});
Route::group(['prefix' => 'submission'], function () {
    Route::get('view', [WorkController::class,'view'])->name('submission.view');
    Route::post('publishWork', [WorkController::class,'publishWork'])->name('publish.work');

    Route::get('browse', [WorkController::class,'browse'])->name('submission.browse');
    Route::get('toggleStatus', [WorkController::class,'toggleStatus'])->name('submission.toggleStatus');

});
Route::group(['prefix' => 'appointment'], function () {
    Route::get('browse', [AppointmentController::class,'browse'])->name('appointment.browse');
    Route::get('view', [AppointmentController::class,'view'])->name('appointment.view');
    Route::get('toggleStatus', [AppointmentController::class,'toggleStatus'])->name('appointment.toggleStatus');
});
Route::get('/product/rating/view', [RatingController::class,'productRatingView'])->name('product.review.view');
Route::get('/view/custom/notification', [NotificationController::class,'viewNotificationMessagePage'])->name('view.custom.notification');
Route::post('/send/custom/notification', [NotificationController::class,'sendNotificationMessage'])->name('send.custom.notidication');
