<?php namespace Studiz\Dashboard;

use Studiz\Core\Provider\GenericServiceProvider;
use Studiz\Core\Provider\Routable;
use Studiz\Core\Provider\Viewable;

/**
 * Class DashboardServiceProvider
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package Studiz\Dashboard
 */
class DashboardServiceProvider extends GenericServiceProvider implements Routable, Viewable
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
        return "studiz/dashboard";
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
     * Get view component
     *
     * @return \Studiz\Core\Provider\Component\View
     */
    public function getView()
    {
        return new DashboardView();
    }
}
