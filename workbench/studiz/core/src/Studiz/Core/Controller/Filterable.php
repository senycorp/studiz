<?php namespace Studiz\Core\Controller;

/**
 * Interface Filterable
 *
 * Indicates controller has filters to
 * automatically trigger them.
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package Studiz\Core\Controller
 */
interface Filterable
{
    /**
     * Set needed filter
     *
     * @return bool
     */
    public function setFilter();
}
