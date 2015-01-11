<?php namespace Studiz\Core\View\Navigation;

/**
 * Class Node
 *
 * @package Studiz\Core\View\Navigation
 */
abstract class Node
{

    /**
     * Get nodes of navigational component
     *
     * @return array
     */
    abstract protected function getNodeRegister();

    /**
     * Return nodes
     *
     * @return array
     */
    public function getNodes() {
        return $this->getNodeRegister();
    }
}