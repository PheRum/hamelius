<?php

Route::auth();
Route::get('auth/{id}', 'Auth\LoginController@loginUsingId')->name('auth.id');

Route::get('/', 'HomeController@index')->name('home');

/**
 * Заявки
 */
Route::group(['prefix' => 'ticket', 'middleware' => ['auth']], function () {
    Route::get('/', 'TicketController@index')->name('ticket.index');
    Route::get('create', 'TicketController@create')->name('ticket.create');
    Route::post('store', 'TicketController@store')->name('ticket.store');

    Route::get('{ticket}', 'TicketController@show')->name('ticket.show');
    Route::get('{ticket}/edit', 'TicketController@edit')->name('ticket.edit');
    Route::patch('{ticket}/update', 'TicketController@update')->name('ticket.update');
    Route::delete('{ticket}/delete', 'TicketController@destroy')->name('ticket.delete');
});

/**
 * Мебель
 */
Route::group(['prefix' => 'furniture', 'middleware' => ['auth']], function () {
    Route::get('/', 'FurnitureController@index')->name('furniture.index');
    Route::get('create', 'FurnitureController@create')->name('furniture.create');
    Route::post('store', 'FurnitureController@store')->name('furniture.store');

    Route::get('{furniture}/edit', 'FurnitureController@edit')->name('furniture.edit');
    Route::patch('{furniture}/update', 'FurnitureController@update')->name('furniture.update');
    Route::delete('{furniture}/delete', 'FurnitureController@destroy')->name('furniture.delete');
});

/**
 * Категории
 */
Route::group(['prefix' => 'categories'], function () {
    Route::get('/', 'CategoryController@index')->name('category.index');
});
