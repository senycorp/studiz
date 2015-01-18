<?php namespace Studiz\Core;

use Studiz\Core\Provider\GenericServiceProvider;
use Studiz\Core\Provider\Initializable;
use Studiz\Core\Provider\Routable;

/**
 * Class CoreServiceProvider
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package Studiz\Core
 */
class CoreServiceProvider extends GenericServiceProvider implements Routable, Initializable
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    /**
     * Get package name
     *
     * @return string
     */
    protected function getPackageName()
    {
        return 'studiz/core';
    }

    /**
     * Get root directory of package
     *
     * @return string
     */
    protected function getPackageDirectory()
    {
        return __DIR__ . '/../../../';
    }

    /**
     * Get path to router file
     *
     * @return string
     */
    public function getRouter()
    {
        return $this->getPackageDirectory() . 'src/routes.php';
    }

    /**
     * Initialize and set up common dependencies
     * while provider is booting
     *
     * @return string
     */
    public function initializeProvider()
    {
        // Disable view cache in local environment
        \App::before(function($request)
        {
            // Clear view cache in sandbox (only) with every request
            if (\App::environment() == 'local') {
                $cachedViewsDirectory=app('path.storage').'/views/';
                $files = glob($cachedViewsDirectory.'*');
                foreach($files as $file) {
                    if(is_file($file)) {
                        @unlink($file);
                    }
                }
            }
        });
    }


}
