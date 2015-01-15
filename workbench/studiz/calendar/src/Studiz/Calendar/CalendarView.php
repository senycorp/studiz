<?php namespace Studiz\Calendar;

use Studiz\Core\Provider\Component\View\Navigationable;
use Studiz\Core\View\Navigation\Navigation;
use Studiz\Core\View\Navigation\NavigationNode;
use Studiz\Core\View\Navigation\TopNavigation;
use Studiz\Core\View\Navigation\TopNavigationNode;

class CalendarView extends \Studiz\Core\Provider\Component\View implements Navigationable
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
        return $navigation->addChild(NavigationNode::factory('Calendar', 'calendar', 'calendar', 'fa fa-calendar'));
    }

    /**
     * Add top navigation nodes
     *
     * @param TopNavigation $navigation
     * @return \Studiz\Core\View\Navigation\TopNavigationNode
     */
    public function addTopNavigationNodes(TopNavigation $navigation)
    {
        return $navigation->addChild(
            TopNavigationNode::factory('Calendar', '#', 'calendar', 'fa fa-calendar')->setHeader('Todays subjects')
                ->setBadge('3')
                ->setFooter('4 remaining for morning')
        );
    }
}