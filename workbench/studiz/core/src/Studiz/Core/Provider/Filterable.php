<?php namespace Studiz\Core\Provider;

/**
 * Interface Filterable
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package Studiz\Core\Provider
 */
interface Filterable extends Providable
{

    /**
     * Get path to filter file
     *
     * @return string
     */
    public function getFilter();
}