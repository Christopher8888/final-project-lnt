<?php

use Illuminate\Support\Facades\Route;
Use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');

    // User::create([
    //     'nama' => 'admin',
    //  ])
    // User::create([
    //     'name' => 'admin',
    //     'email' => 'admin@role.com',
    //     'password' => bcrypt('1234578'),
    //     'role' => 'Admin'
    //   ]);

    // $user = User::create([
    //     'name' => 'User',
    //     'email' => 'user@role.com',
    //     'password' => bcrypt('12345678'),
    // ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('product', 'App\Http\Controllers\productsController');



Route::get('/Products', 'App\Http\Controllers\ProductsController@index');

//CRUD

//create bagian tampilkan 
Route::get('/create', 'App\Http\Controllers\ProductsController@create');


//store data ke database
Route::post('/store', 'App\Http\Controllers\ProductsController@store')->name('uploaddata');

//edit bagian menampilkan
Route::get('/edit/{id}', 'App\Http\Controllers\ProductsController@edit');

//update 
Route::put('/update/{id}' , 'App\Http\Controllers\ProductsController@update');

//delete 
Route::get('/delete/{id}', 'App\Http\Controllers\ProductsController@delete');
