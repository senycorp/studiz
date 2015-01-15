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
 * Route: BASE
 *
 * This base route makes a basic redirect to the dashboard module
 */
Route::get('/', function ()
{
    return Redirect::to('dashboard');
});

/**
 * Route: navigationNodes
 *
 * This route delivers the nodes AS JSON for the navigation on the left side
 */
Route::get('navigationNodes', function ()
{
    return \Illuminate\Http\JsonResponse::create(\Studiz\Core\View\Navigation\Navigation::getInstance()->getNodes());
});

/**
 * Route: topNavigationNodes
 *
 * Delivers nodes for the top navigation as JSON
 */
Route::get('topNavigationNodes', function ()
{
    return \Illuminate\Http\JsonResponse::create(\Studiz\Core\View\Navigation\TopNavigation::getInstance()->getNodes());
});

/**
 * Route: breadCrumbNodes
 *
 * Delivers crumbs for breadcrumb navigation as JSON
 */
Route::get('breadcrumbNodes', function ()
{
    return \Illuminate\Http\JsonResponse::create(\Studiz\Core\View\Navigation\Breadcrumb::getInstance()->getNodes());
});