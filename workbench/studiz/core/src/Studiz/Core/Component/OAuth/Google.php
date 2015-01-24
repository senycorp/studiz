<?php namespace Studiz\Core\Component\OAuth;

class Google extends Generic
{
    /**
     * Get consumer
     *
     * @return \OAuth
     */
    protected function getConsumer()
    {
        return \OAuth::consumer('Google');
    }

    /**
     * Get URL to request
     *
     * @return string
     */
    protected function getRequestURL()
    {
        return 'https://www.googleapis.com/oauth2/v1/userinfo';
    }

    protected function getUserEmail()
    {
        return $this->userData['email'];
    }

    protected function getUserFirstname()
    {
        return $this->userData['given_name'];
    }

    protected function getUserLastname()
    {
        return $this->userData['family_name'];
    }

    protected function getUserPictureURL()
    {
        return $this->userData['picture'];
    }
}