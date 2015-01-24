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
 * Route: OAuth2 for facebook
 *
 */
Route::get('oauth/facebook', function () {
    // get data from input
    $code = \Input::get( 'code' );

    // get fb service
    $fb = \OAuth::consumer( 'Facebook' );

    // check if code is valid

    // if code is provided get user data and sign in
    if ( !empty( $code ) ) {

        try
        {
            // This was a callback request from facebook, get the token
            $token = $fb->requestAccessToken( $code );
        }
        catch (Exception $e)
        {
            unset($_GET['code']);

            return Redirect::refresh();
        }

        // Send a request with it
        $result = json_decode( $fb->request( '/me' ), true );

        $users = \Studiz\Login\Model\User::whereMod(array(
            'email' => $result['email'],
            'first_name' => $result['first_name'],
            'last_name' => $result['last_name'],
        ));

        if ($users->count() == 0)
        {
            $user = Sentry::register(array(
                'email' => $result['email'],
                'first_name' => $result['first_name'],
                'last_name' => $result['last_name'],
                'password' => md5(time())
            ), true);
        }
        else
        {
            $user = $users->first();
            $user = Sentry::findUserByCredentials(array(
                'email' => $user->email,
            ));
        }

        Sentry::login($user, true);

        return Redirect::to('/');
    }
    // if not ask for permission first
    else {
        // get fb authorization
        $url = $fb->getAuthorizationUri();

        // return to facebook login url
        return Redirect::to( (string)$url );
    }
});

/**
 * Route: OAuth2
 *
 * Sync and login user from
 */
Route::get('oauth/google', function () {
    // get data from input
    $code = Input::get( 'code' );

    // get google service
    $googleService = OAuth::consumer( 'Google' );

    // check if code is valid

    // if code is provided get user data and sign in
    if ( !empty( $code ) ) {

        try
        {
            // This was a callback request from google, get the token
            $token = $googleService->requestAccessToken( $code );
        }
        catch (Exception $e)
        {
            unset($_GET['code']);

            return Redirect::refresh();
        }

        // Send a request with it
        $result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );


        $users = \Studiz\Login\Model\User::whereMod(array(
            'email' => $result['email'],
            'first_name' => $result['first_name'],
            'last_name' => $result['last_name'],
        ));

        if ($users->count() == 0)
        {
            $user = Sentry::register(array(
                'email' => $result['email'],
                'first_name' => $result['first_name'],
                'last_name' => $result['last_name'],
                'password' => md5(time())
            ), true);
        }
        else
        {
            $user = $users->first();
            $user = Sentry::findUserByCredentials(array(
                'email' => $user->email,
            ));
        }

        Sentry::login($user, true);

        return Redirect::to('/');
    }
    // if not ask for permission first
    else {
        // get fb authorization
        $url = $fb->getAuthorizationUri();

        // return to facebook login url
        return Redirect::to( (string)$url );
    }
});

/**
 * Route: login
 *
 * Displays the login page
 */
Route::get('login', array('before' => 'unauthenticated', 'uses' => '\Studiz\Login\Controller\IndexController@index'));
