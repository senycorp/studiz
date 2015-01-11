<?php namespace Studiz\Core\View\Navigation;

/**
 * Class Node
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package Studiz\Core\View\Navigation
 */
abstract class Node
{

    /**
     * Return nodes
     *
     * @return array
     */
    public function getNodes()
    {
        return $this->getNodeRegister();
    }

    /**
     * Get nodes of navigational component
     *
     * @return array
     */
    abstract protected function getNodeRegister();
}