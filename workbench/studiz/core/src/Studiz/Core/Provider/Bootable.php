<?php namespace Studiz\Core\Provider;

/**
 * Interface Bootable
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package Studiz\Core\Provider
 */
interface Bootable extends Providable {

    /**
     * Get booter
     *
     * @return \Studiz\Core\Provider\Component\Boot
     */
    public function getBootable();
}