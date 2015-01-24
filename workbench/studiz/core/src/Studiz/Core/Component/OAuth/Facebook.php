<?php namespace Studiz\Core\Component\OAuth;

class Facebook extends Generic
{
    /**
     * Get consumer
     *
     * @return \OAuth
     */
    protected function getConsumer()
    {
        return \OAuth::consumer('Facebook');
    }

    /**
     * Get URL to request
     *
     * @return string
     */
    protected function getRequestURL()
    {
        return '/me';
    }

    protected function getUserEmail()
    {
        return $this->userData['email'];
    }

    protected function getUserFirstname()
    {
        return $this->userData['first_name'];
    }

    protected function getUserLastname()
    {
        return $this->userData['last_name'];
    }

    protected function getUserPictureURL()
    {
        return 'https://graph.facebook.com/'.$this->userData['id'].'/picture?type=small';
    }
}