<?php namespace Studiz\Core;

use Studiz\Core\Provider\GenericServiceProvider;

/**
 * Class CoreServiceProvider
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package Studiz\Core
 */
class CoreServiceProvider extends GenericServiceProvider {

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
}
