<?php namespace Studiz\Core\View\Navigation;

/**
 * Class Breadcrumb
 *
 * @package Studiz\Core\View\Navigation
 */
class Breadcrumb extends BreadcrumbNode
{
    /**
     * Instance holder
     *
     * @var Breadcrumb
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
     * @param BreadcrumbNode $childNode
     *
     * @return \Studiz\Core\View\Navigation\BreadcrumbNode
     */
    public function addChild(BreadcrumbNode $childNode)
    {
        return $this;
    }
}