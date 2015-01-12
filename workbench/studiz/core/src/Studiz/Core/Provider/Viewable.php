<?php namespace Studiz\Core\Provider;

/**
 * Interface Viewable
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package Studiz\Core\Provider
 */
interface Viewable extends Providable
{

    /**
     * Get view component
     *
     * @return \Studiz\Core\Provider\Component\View
     */
    public function getView();
}