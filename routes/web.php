<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// frontend routes

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/viewreservation', function () {
    return view('frontend.viewreservation');
});

// User registration
Route::get('/signin', function () {
    return view('frontend.signin');
})->name('registerForm');

Route::post('registerSave', [UserController::class, 'register'])->name('registerSave');

// User login
Route::get('/user_login', function () {
    return view('frontend.user_login');
})->name('loginForm');

Route::post('/loginMatch', [UserController::class, 'login'])->name('loginMatch');
Route::get('/index', [UserController::class, 'indexPage'])->name('index');

// logout
Route::post('logout', [UserController::class, 'logout'])->name('logout');






// backend routes
Route::get('/table', function () {
    return view('backend.table');
});
Route::get('/sa.index', function () {
    return view('backend.index');
});

Route::get('/reservations', [FrontendController::class, 'showReservations'])->middleware('auth');

// ################################################## //
Route::get('/', 'App\Http\Controllers\FrontEndController@menu');
Route::get('/reservation', [FrontendController::class, 'reservation'])->name('frontend.reservation.form');
Route::post('/reservation/store', [FrontendController::class, 'store'])->name('frontend.reservation.store');



// ################################################## //


Route::get('/form', function () {
    return view('backend.form');
});
Route::get('/form', function () {
    return view('backend.form');
});
// Route::get('/paybill', function () {
//     return view('backend.paybill');
// });

Route::get('/orderitems', [MenuController::class, 'orderitems'])->name('orderitems');


Route::get('/orderitems', [CartController::class, 'orderItems'])->name('orderitems');

Route::get('/paybill', [CartController::class, 'showPayBill'])->name('paybill');


// #################################################################### //
// routes/web.php
Route::get('/profile', [UserController::class, 'showProfile'])->name('user.profile');
Route::get('/settings', [UserController::class, 'showSettings'])->name('user.settings');
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// #################################################################### //

Route::get('/bill', function () {
    return view('backend.bill');
});

Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/show', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');


// Route to store the bill and associated items in the database
Route::post('/bill/store', [BillController::class, 'store'])->name('bill.store');

// Route for marking the bill payment process as done (after the success message)
Route::get('/done', function () {
    // Clear the cart session or redirect to another page
    session()->forget('cart');
    return redirect()->route('orderitems')->with('success', 'Transaction Completed');
})->name('done');


Route::patch('/user/{id}/change-role', [UserController::class, 'changeRole'])->name('user.changeRole');



Route::get('/bill', [BillController::class, 'index'])->name('bill.index');

Route::get('/receipt/{id}', [BillController::class, 'downloadReceipt'])->name('receipt.download');

// Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');



Route::prefix('admin')->group(function () {
    Route::resource('/customer',  'App\Http\Controllers\CustomerController');
    Route::resource('/staff',  'App\Http\Controllers\StaffController');
    Route::resource('/administrator',  'App\Http\Controllers\AdminController');
    Route::resource('/menu', 'App\Http\Controllers\MenuController');
    Route::resource('/reservation', 'App\Http\Controllers\ReservationController');
});

Route::resource('user', App\Http\Controllers\UserController::class);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__ . '/auth.php';
