<?php namespace Studiz\Dashboard;

use Studiz\Core\Provider\Component\View\Navigationable;
use Studiz\Core\View\Navigation\Navigation;
use Studiz\Core\View\Navigation\NavigationNode;
use Studiz\Core\View\Navigation\TopNavigation;
use Studiz\Core\View\Navigation\TopNavigationNode;

class DashboardView extends \Studiz\Core\Provider\Component\View implements Navigationable
{
    /**
     * Get navigation nodes
     *
     * @param Navigation $navigation
     *
     * @return NavigationNode
     */
    public function addNavigationNodes(Navigation $navigation)
    {
        return $navigation->addChild(NavigationNode::factory('Dashboard', 'dashboard', 'dashboard', 'fa fa-dashboard'));
    }

    /**
     * Add top navigation nodes
     *
     * @param TopNavigation $navigation
     * @return \Studiz\Core\View\Navigation\TopNavigationNode
     */
    public function addTopNavigationNodes(TopNavigation $navigation)
    {

    }
}