<?php namespace Studiz\Login;

use Studiz\Core\Provider\Filterable;
use Studiz\Core\Provider\GenericServiceProvider;
use Studiz\Core\Provider\Routable;

class LoginServiceProvider extends GenericServiceProvider implements Routable, Filterable {

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
		return 'studiz/login';
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
	 * Get path to filter file
	 *
	 * @return string
	 */
	public function getFilter()
	{
		return $this->getPackageDirectory() . 'src/filters.php';
	}
}
