<?php

Route::auth();

Route::get('/', 'HomeController@index')->name('home');
