<?php namespace Studiz\Core\Provider;

/**
 * Interface Routable
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package Studiz\Core\Provider
 */
interface Routable extends Providable
{

    /**
     * Get path to router file
     *
     * @return string
     */
    public function getRouter();
}