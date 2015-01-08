<?php

/*
|--------------------------------------------------------------------------
| Bootstrap for `local` environment
|--------------------------------------------------------------------------
|
| Please place all environment specific bootstrap code here. So it
| is separated from general stuff which is placed in app/start/global.php
|
*/

/*
|--------------------------------------------------------------------------
| FirePHP registration
|--------------------------------------------------------------------------
|
| Register FirePHP as additional handler.
|
*/

Log::getMonolog()->pushHandler(new \Monolog\Handler\FirePHPHandler());

/*
|--------------------------------------------------------------------------
| FirePHP registration
|--------------------------------------------------------------------------
|
| Register FirePHP as additional handler.
|
*/

App::fatal(function($exception)
{
    Log::error($exception);
});