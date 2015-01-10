<?php namespace Studiz\Core\Provider;

/**
 * Interface Eventable
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package Studiz\Core\Provider
 */
interface Eventable extends Providable {

    /**
     * Get event subscriber
     *
     * @return \Studiz\Core\Event\Subscriber
     */
    public function getEventSubscriber();
}