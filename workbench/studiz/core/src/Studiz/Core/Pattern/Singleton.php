<?php namespace Studiz\Core\Pattern;

/**
 * Interface Singleton
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @package Studiz\Core\Pattern
 */
interface Singleton
{

    /**
     * Get singleton instance
     *
     * @return static
     */
    public static function getInstance();
}