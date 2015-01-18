<?php namespace Studiz\Theme;

use Studiz\Core\Provider\GenericServiceProvider;
use Studiz\Core\Provider\Initializable;

/**
 * Class ThemeServiceProvider
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package Studiz\Theme
 */
class ThemeServiceProvider extends GenericServiceProvider implements Initializable
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
        return 'studiz/theme';
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
     * Initialize and set up common dependencies
     * while provider is booting
     *
     * @return string
     */
    public function initializeProvider()
    {
        /**
         * Delete url
         *
         * @param title
         * @param url
         * @param class
         */
        \Blade::extend(function ($view, $compiler) {
            $pattern = $compiler->createMatcher('a.deletor');
            $baseURL = \URL::to('/');
            $compiler = '$1 <?php
		$params= array$2;
		echo "<a href=\'' . $baseURL . '/{$params[1]}\' data-method=\'DELETE\' class=\'".array_get($params, \'2\', \'\')."\'>{$params[0]}</a>"
	?>';

            return preg_replace($pattern, $compiler, $view);
        });

        /**
         * Delete url
         *
         * @param title
         * @param url
         * @param class
         */
        \Blade::extend(function ($view, $compiler) {
            $pattern = $compiler->createMatcher('a.creator');
            $baseURL = \URL::to('/');
            $compiler = '$1 <?php
		$params= array$2;
		echo "<a href=\'' . $baseURL . '/{$params[1]}\' data-method=\'PUT\' class=\'".array_get($params, \'2\', \'\')."\'>{$params[0]}</a>"
	?>';

            return preg_replace($pattern, $compiler, $view);
        });
    }


}
