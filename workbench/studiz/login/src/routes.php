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
 * Route: checkCredentials
 *
 * Responsible for checking given credentials
 */
Route::get('login/checkCredentials', array('before' => 'unauthenticated', function () {
    try
    {
        if (!Sentry::check()) {
            // Login credentials
            $credentials = array(
                'email'    => Input::get('email'),
                'password' => Input::get('password'),
            );

            // Authenticate the user
            return Response::json(array('success' => Sentry::authenticate($credentials, false)));
        }
        else
        {
             // User is allready logged in. Redirect him to dashboard
            return "You are allready authed";
        }
    }
    catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
    {
        echo 'Login field is required.';
    }
    catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
    {
        echo 'Password field is required.';
    }
    catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
    {
        echo 'Wrong password, try again.';
    }
    catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
    {
        echo 'User was not found.';
    }
    catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
    {
        echo 'User is not activated.';
    }

// The following is only required if the throttling is enabled
    catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
    {
        echo 'User is suspended.';
    }
    catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
    {
        echo 'User is banned.';
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }
}));

/**
 * Route: logout
 *
 * Logs out if user is authenticated already
 */
Route::get('logout', function() {
    if (Sentry::check())
    {
        Sentry::logout();

        return Redirect::to('/');
    }

    return Redirect::to('/');
});

/**
 * Route: login
 *
 * Displays the login page
 */
Route::get('login', array('before' => 'unauthenticated', 'uses' => '\Studiz\Login\Controller\IndexController@index'));
