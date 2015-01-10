<?php namespace Studiz\Core\Provider\Component;

/**
 * Class View
 *
 * @package Studiz\Core\Provider\Component
 */
abstract class View {

    /**
     * Get navigation nodes
     *
     * @return \Studiz\Core\View\Navigation\Node
     */
    abstract public function getNavigationNodes();

    /**
     * Get top navigation nodes
     *
     * @return mixed
     */
    abstract public function getNavigationTopNodes();
}