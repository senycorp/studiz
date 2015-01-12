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
 * IndexRoute
 */
Route::get('/', function ()
{
    return View::make('theme::main');
});

/**
 * Get navigation nodes as JSON
 */
Route::get('navigationNodes', function ()
{
    return \Illuminate\Http\JsonResponse::create(\Studiz\Core\View\Navigation\Navigation::getInstance()->getNodes());
});

/**
 * Get TopNavigationNodes as JSON
 */
Route::get('topNavigationNodes', function ()
{
    return \Illuminate\Http\JsonResponse::create(\Studiz\Core\View\Navigation\TopNavigation::getInstance()->getNodes());
});

/**
 * Get BreadcrumbNodes as JSON
 */
Route::get('breadcrumbNodes', function ()
{
    return \Illuminate\Http\JsonResponse::create(\Studiz\Core\View\Navigation\Breadcrumb::getInstance()->getNodes());
});