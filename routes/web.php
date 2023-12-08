<?php

use App\Livewire\Category;
use App\Livewire\Dashbord;
use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\Logout;
use App\Livewire\Product;
use App\Livewire\SignUp;
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

Route::get('/login', Login::class)->name('login');
Route::get('/sign_up', SignUp::class);
Route::get('/', Home::class);


Route::get('/dashbord/category', Category::class);
Route::get('/dashbord/product', Product::class);
Route::get('/dashbord/admins', Dashbord::class);
