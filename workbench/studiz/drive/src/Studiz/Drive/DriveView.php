<?php namespace Studiz\Drive;

use Studiz\Core\Provider\Component\View\Navigationable;
use Studiz\Core\View\Navigation\Navigation;
use Studiz\Core\View\Navigation\NavigationNode;
use Studiz\Core\View\Navigation\TopNavigation;
use Studiz\Core\View\Navigation\TopNavigationNode;

class DriveView extends \Studiz\Core\Provider\Component\View implements Navigationable
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
        return $navigation->addChild(NavigationNode::factory('Drive', 'drive', 'drive', 'fa fa-hdd-o'));
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