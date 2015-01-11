<?php namespace Studiz\Core\View\Navigation;

/**
 * Class TopNavigation
 *
 * @package Studiz\Core\View\Navigation
 */
class TopNavigation extends TopNavigationNode
{
    /**
     * Instance holder
     *
     * @var Navigation
     */
    protected static $instance = null;

    /**
     * Get singleton instance
     *
     * @return static
     */
    public static function getInstance()
    {
        if (is_null(self::$instance))
        {
            self::$instance = self::factory('Navigation', '', 'navigation');
        }

        return self::$instance;
    }
}