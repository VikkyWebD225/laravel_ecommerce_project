<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminAuthController;
use Illuminate\Support\Facades\Route;


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
//user Page
Route::get('/', [HomeController::class, 'index']);
Route::get('/home',[HomeController::class,'index2']);
Route::get('/Redirect',[HomeController::class,'redirect']);
Route::get('/adminhome',[HomeController::class,'adminhome']);
Route::post('/logout',[HomeController::class,'logout']);
Route::get('/product_details/{id}',[HomeController::class,'product_details']);
Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
Route::get('/show_cart',[HomeController::class,'show_cart']);
Route::post('/delivery_post',[HomeController::class,'delivery_post']);
Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);
Route::get('/cash_order',[HomeController::class,'cash_order']);
Route::get('/razorpay-payment', [HomeController::class, 'razor'])->name('razorpay-payment.razor');
Route::post('/razorpay-payment', [HomeController::class, 'store'])->name('razorpay.payment.store');
Route::get('/show_order',[HomeController::class,'show_order']);
Route::get('/cancelled/{id}',[HomeController::class,'cancelled']);
Route::post('/add_comment',[HomeController::class,'add_comment']);
Route::post('/add_reply',[HomeController::class,'add_reply']);
Route::get('/product_search',[HomeController::class,'product_search']);
Route::get('/products',[HomeController::class,'products']);
Route::get('/search_product',[HomeController::class,'search_product']);
Route::get('/contact',[HomeController::class,'contact']);
Route::post('/contact_post',[HomeController::class,'contact_post']);







//user ends


//Admin

Route::get('/view_category',[AdminController::class,'view_category']);
Route::post('/add_category',[AdminController::class,'add_category']);
Route::get('/delete_category/{id}',[AdminController::class,'delete_category']);
Route::get('/view_product',[AdminController::class,'view_product']);

Route::post('/add_product',[AdminController::class,'add_product']);
Route::get('/show_product',[AdminController::class,'show_product'])->name('show_product');
Route::get('/delete_product/{id}',[AdminController::class,'delete_product']);
Route::get('/update_product/{id}',[AdminController::class,'update_product']);
Route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm']);

Route::get('/order',[AdminController::class,'order']);
Route::get('/delivered/{id}',[AdminController::class,'delivered']);
Route::get('/print_pdf/{id}',[AdminController::class,'print_pdf']);
Route::get('/send_email/{id}',[AdminController::class,'send_email']);
Route::post('/send_user_email/{id}',[AdminController::class,'send_user_email']);

Route::get('/search',[AdminController::class,'searchdata']);

//Admin ends

//Auth Starts

Route::get('/admin/login1', [AdminAuthController::class, 'index'])->name('login1');
Route::post('/post-login', [AdminAuthController::class, 'postLogin'])->name('login.post'); 
Route::get('/admin/registration', [AdminAuthController::class, 'registration'])->name('register');
Route::post('/post-registration', [AdminAuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('/dashboard', [AdminAuthController::class, 'dashboard']); 
Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');


//Auth Ends

//dropdown starts
Route::post('getState', [HomeController::class, 'getState']);
Route::post('getCity', [HomeController::class, 'getCity']);

//dropdown Ends



//Auth
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Auth ends
