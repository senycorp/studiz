<?php namespace Studiz\Core\Event;

use Illuminate\Support\Facades\Event;

/**
 * Interface Subscriber
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package Studiz\Core\Event
 */
interface Subscriber
{
    /**
     * Subscribe to events.
     *
     * @return void
     */
    public function subscribe(Event $events);
}