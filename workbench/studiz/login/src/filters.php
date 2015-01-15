<?php

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

/**
 * Filter: authenticated
 *
 * Allow only authenticated access
 */
Route::filter('authenticated', function()
{
	// Check for authentification
	if (!Sentry::check())
	{
		// Redirect to login
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('login');
		}
	}
});

/**
 * Filter: unauthenticated
 *
 * Redirect to root if user is already authenticated
 */
Route::filter('unauthenticated', function()
{
	// Check for authentication
	if (Sentry::check())
	{
		// Redirect to root
		return Redirect::to('/');
	}
});