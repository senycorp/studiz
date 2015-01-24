<?php namespace Studiz\Core\Component\OAuth;

use Studiz\Core\Pattern\Singleton;

abstract class Generic implements Singleton
{
    /**
     * @var Studiz\Core\Component\OAuth\Generic
     */
    protected static $instance;

    /**
     * Instance of consumer
     *
     * @var \OAuth
     */
    protected $consumer;

    /**
     * Holder for requested userdata
     *
     * @var array
     */
    protected $userData;

    /**
     * Get consumer
     *
     * @return \OAuth
     */
    abstract protected function getConsumer();

    /**
     * Get URL to request
     *
     * @return string
     */
    abstract protected function getRequestURL();

    abstract protected function getUserEmail();
    abstract protected function getUserFirstname();
    abstract protected function getUserLastname();
    abstract protected function getUserPictureURL();

    /**
     * Get singleton instance
     *
     * @return static
     */
    public static function getInstance()
    {
        if (!static::$instance)
        {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function __construct()
    {
        $this->consumer = $this->getConsumer();
    }

    public function handle($codeToken)
    {
        $this->consumer = $this->getConsumer();

        // Get the request token
        $token = $this->consumer->requestAccessToken( $codeToken );

        // Request user data
        $this->requestData();

        // Try to retrieve user first
        $users = \Studiz\Login\Model\User::where('email', '=', $this->getUserEmail())
            ->where('first_name', '=', $this->getUserFirstname())
            ->where('last_name', '=', $this->getUserLastname());

        if ($users->count() == 0)
        {
            // We found no user with given data. Let us create a new one
            $user = \Sentry::register(array(
                'email' => $this->getUserEmail(),
                'first_name' => $this->getUserFirstname(),
                'last_name' => $this->getUserLastname(),
                'password' => md5(time()),
                'picture' => $this->getUserPictureURL(),
            ), true);
        }
        else
        {
            // There is already an existing user
            $user = \Sentry::findUserByCredentials(array(
                'email' => $users->first()->email,
            ));
        }

        return $user;
    }

    /**
     * Request user data
     *
     * @return array
     */
    public function requestData()
    {
        $this->userData = json_decode( $this->consumer->request( $this->getRequestURL() ), true );
        return $this->userData;
    }

    public function getAuthURL()
    {
        return $this->consumer->getAuthorizationUri();
    }
}