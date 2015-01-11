<?php namespace Studiz\Core\Provider\Component\View;

use Studiz\Core\View\Navigation\Navigation;
use Studiz\Core\View\Navigation\TopNavigation;

/**
 * Interface Navigationable
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package Studiz\Core\Provider
 */
interface Navigationable {
    /**
     * Add navigation nodes
     *
     * @param Navigation $navigation
     *
     * @return \Studiz\Core\View\Navigation\TopNavigationNode
     */
    public function AddNavigationNodes(Navigation $navigation);

    /**
     * Add top navigation nodes
     *
     * @param TopNavigation $navigation
     * @return \Studiz\Core\View\Navigation\TopNavigationNode
     */
    public function addTopNavigationNodes(TopNavigation $navigation);
}