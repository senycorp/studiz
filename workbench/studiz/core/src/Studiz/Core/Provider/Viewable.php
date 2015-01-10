<?php namespace Studiz\Core\Provider;

/**
 * Interface Viewable
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package Studiz\Core\Provider
 */
interface Viewable extends Providable {

    /**
     * Register navigation nodes of module
     *
     * @return void
     */
    public function registerNavigationNode();

    /**
     * Register navigation nodes of top nav
     *
     * @return void
     */
    public function registerTopNavigationNodes();
}