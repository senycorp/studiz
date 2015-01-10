<?php namespace Studiz\Core\Provider;

/**
 * Interface Initializable
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package Studiz\Core\Provider
 */
interface Initializable extends Providable {

    /**
     * Initialize and set up common dependencies
     * while provider is booting
     *
     * @return string
     */
    public function initializeProvider();
}