<?php

use Illuminate\Support\Facades\Route;



Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    //Dashboard
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    //Country
    Route::resource('/country', App\Http\Controllers\CountryController::class);
    Route::get('load_autocomplete/country',[App\Http\Controllers\CountryController::class, 'load_autocomplete'])->name('load_autocomplete.country');

    //State
    Route::resource('/state', App\Http\Controllers\StateController::class);
    Route::get('load_autocomplete/state',[App\Http\Controllers\StateController::class, 'load_autocomplete'])->name('load_autocomplete.state');

    //City
    Route::resource('/city', App\Http\Controllers\CityController::class);
    Route::get('load_autocomplete/city',[App\Http\Controllers\CityController::class, 'load_autocomplete'])->name('load_autocomplete.city');
    Route::get('get_state_data',[App\Http\Controllers\CityController::class, 'getStateData'])->name('city.get_state_data');

    //Customer
    Route::resource('/customers', App\Http\Controllers\CustomerController::class);
    Route::get('load_autocomplete/customer',[App\Http\Controllers\CustomerController::class, 'load_autocomplete'])->name('load_autocomplete.customer');
    Route::get('load_autocomplete/payment_terms',[App\Http\Controllers\CustomerController::class, 'load_autocomplete_payment_terms'])->name('load_autocomplete.payment_terms');
    Route::get('load_autocomplete/designation',[App\Http\Controllers\CustomerController::class, 'load_autocomplete_designation'])->name('load_autocomplete.designation');
    Route::get('get_city_data',[App\Http\Controllers\CustomerController::class, 'getCityData'])->name('customer.get_city_data');

});
