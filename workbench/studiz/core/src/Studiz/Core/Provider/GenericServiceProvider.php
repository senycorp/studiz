<?php namespace Studiz\Core\Provider;

use Illuminate\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

/**
 * Class GenericServiceProvider
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package Studiz\Core\Provider
 */
abstract class GenericServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @throws \Illuminate\Filesystem\FileNotFoundException
	 * @throws \Studiz\Core\Exception\InvalidClassException
	 */
	public function boot()
	{
		// Register package
		$this->package($this->getPackageName());

		// Routable
		if ($this instanceof \Studiz\Core\Provider\Routable)
		{
			if (file_exists($this->getRouter()))
			{
				require_once $this->getRouter();
			}
			else
			{
				throw new FileNotFoundException('Router not found');
			}
		}

		// Filterable
		if ($this instanceof \Studiz\Core\Provider\Filterable)
		{
			if (file_exists($this->getFilter()))
			{
				require_once $this->getFilter();
			}
			else
			{
				throw new FileNotFoundException('Filter not found');
			}
		}

		// Eventable
		if ($this instanceof \Studiz\Core\Provider\Eventable)
		{
			// Get subscriber
			$eventSubscriber = $this->getEventSubscriber();

			if ($eventSubscriber instanceof \Studiz\Core\Event\Subscriber)
			{
				// Register event subscriber
				Event::subscribe($this->getEventSubscriber());
			}
			else
			{
				throw new \Studiz\Core\Exception\InvalidClassException(
					'The given event subscriber is not a child of \Studiz\Core\Event\Subscriber'
				);
			}
		}

		// Bootable
		if ($this instanceof \Studiz\Core\Provider\Bootable)
		{
			// Get Booter
			$booter = $this->getBootable();

			if ($booter instanceof \Studiz\Core\Provider\Component\Boot)
			{
				// Register actions
				App::before(function($request) use($booter) {
					$booter->before($request);
				});

				App::after(function($request, $response) use($booter) {
					$booter->after($request, $response);
				});
			}
		}

		// Initializable
		if ($this instanceof \Studiz\Core\Provider\Initializable)
		{
			// Initialize
			$this->initializeProvider();
		}
	}

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
	abstract protected function getPackageName();

	/**
	 * Get root directory of package
	 *
	 * @return string
	 */
	abstract protected function getPackageDirectory();
}