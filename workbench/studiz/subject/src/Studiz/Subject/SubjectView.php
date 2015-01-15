<?php namespace Studiz\Subject;

use Studiz\Core\Provider\Component\View\Navigationable;
use Studiz\Core\View\Navigation\Navigation;
use Studiz\Core\View\Navigation\NavigationNode;
use Studiz\Core\View\Navigation\TopNavigation;
use Studiz\Core\View\Navigation\TopNavigationNode;

class SubjectView extends \Studiz\Core\Provider\Component\View implements Navigationable
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
        return $navigation->addChild(NavigationNode::factory('Subjects', 'subject', 'subject', 'fa fa-file-text'));
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