<?php

/*
|--------------------------------------------------------------------------
| Module Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for your module.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * Route: Index
 *
 * Display dashboard main page
 */
Route::get('dashboard', array('before' => 'authenticated', 'uses' => '\Studiz\Dashboard\Controller\IndexController@index'));