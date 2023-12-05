<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DraftController;
use Illuminate\Support\Facades\Auth;

use App\Livewire\DraftList;


Route::get('/userlogin', function () {
    return view('website.auth.login');
})->name('website.auth.login');

Route::post('/userlogin',[WebsiteController::class,'userLoginCheck'])->name('website.auth.login');

Route::get('/userregister', function () {
    return view('website.auth.register');
})->name('website.auth.register');

Route::get('/websitelogout', function () {
    Auth::Logout();
    return redirect()->route('website.auth.login');
})->name('website.logout');

Route::post('/userregister',[WebsiteController::class,'userRegisterSave'])->name('website.auth.register');

Route::get('/',[WebsiteController::class,'LandingCategoryList'])->name('website.screens.landing');



Route::group(['prefix' => 'category'], function () {
    Route::get('segments',[WebsiteController::class,'categorySegmentsList'])->name('category.segments');
    Route::get('publications/products',[WebsiteController::class,'publicationProductsList'])->name('category.publications_comics_others.products');
    Route::get('publications/product',[WebsiteController::class,'publicationProduct'])->name('category.publications_comics_others.product');
});

Route::get('/product', function () {
    return view('website.screens.product');
})->name('category.others');

Route::post('/product/search',[ProductController::class,'productSearch'])->name('product.search');


Route::get('/genre/list',[GenreController::class,'genresList'])->name('genres.list');
Route::get('/genre/products/{genre_id}',[GenreController::class,'genresProductsList'])->name('genres.products.list');

Route::group(['middleware' => 'webwatchman'], function (){

    Route::get('/mark-as-read', [NotificationController::class,'markAsRead'])->name('mark-as-read');
    Route::get('/product/rating/self/delete', [RatingController::class,'deleteRatingSelf'])->name('rating.delete.self');

    Route::group(['prefix' => 'submission'], function () {
        Route::get('list', [WorkController::class,'list'])->name('submission.list');
        Route::get('add', [WorkController::class,'add'])->name('submission.add');
        Route::post('save', [WorkController::class,'save'])->name('submission.save');
    });
    Route::group(['prefix' => 'production'], function () {
        Route::get('home', [ProductionController::class,'home'])->name('production.home');
    });
    Route::group(['prefix' => 'appointment'], function () {
        Route::get('list', [AppointmentController::class,'list'])->name('appointment.list');
        Route::get('add', [AppointmentController::class,'add'])->name('appointment.add');
        Route::post('save', [AppointmentController::class,'save'])->name('appointment.save');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('about', [WebsiteController::class,'about'])->name('website.user.about');
        Route::get('notifications', [WebsiteController::class,'notifications'])->name('website.user.notifications');
        Route::get('publicToggle', [WebsiteController::class,'publicToggle'])->name('website.user.publicToggle');
    });
   
    Route::group(['prefix' => 'product'], function () {
        Route::group(['prefix' => 'cart'], function () {
            Route::get('list',[CartController::class,'cartList'] )->name('product.cart.list');
            Route::get('add',[CartController::class,'addToCart'] )->name('product.cart.add');
            Route::get('delete',[CartController::class,'delete'] )->name('cart.product.delete');
        });
        Route::get('placeorder', [CartController::class,'proceedCheckout'])->name('products.placeorder');
    });

    Route::post('confirm/order', [OrderController::class,'confirmorder'])->name('confirmorder');
    Route::post('confirm/singleorder', [OrderController::class,'confirmsingleorder'])->name('confirmsingleorder');
    Route::get('order/list', [OrderController::class,'orderlist'])->name('order.list');

    Route::get('subject/home', [SubjectController::class,'home'])->name('subject.home');
    Route::post('review/add', [RatingController::class,'add'])->name('review.add');
});


Route::get('list/subjects/filter/{isTamilSelected}/{isEnglishSelected}/{selectedDepartmentId}',[SubjectController::class,'subjectsFilter'])->name('subject.filter');
Route::get('/genre/product/reviews/{product_id}', [RatingController::class,'reviewsList'])->name('review.list');
Route::get('/cart/updateQuantity/{cart_id}/{quantity}', [CartController::class,'updateQuantity'])->name('cart.updateQuantity');


Route::any('/draft/edit', [DraftController::class,'draftEdit'])->name('draft.edit');
Route::get('/draft/list',DraftList::class)->name('draft.list');
