<?php namespace Studiz\Core\View\Navigation;

/**
 * Class Navigation
 *
 * @package Studiz\Core\View\Navigation
 */
class Navigation extends NavigationNode
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

    /**
     * Add a node but prevent setting the parent to Navigation
     *
     * @param NavigationNode $childNode
     *
     * @return \Studiz\Core\View\Navigation\NavigationNode
     */
    public function addChild(NavigationNode $childNode)
    {
        return $this;
    }
}