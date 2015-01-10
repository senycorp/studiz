<?php namespace Studiz\Core\View\Navigation;

/**
 * Class Node
 *
 * @package Studiz\Core\View\Navigation
 */
class Node {
    /**
     * @var Node[]
     */
    protected $children = array();

    /**
     * @var Node[]
     */
    public static $childrenRegister = array();

    /**
     * Title of node
     *
     * @var string
     */
    protected $title = '';

    /**
     * URL of node
     *
     * @var string
     */
    protected $url    = '';

    /**
     * Create a node
     *
     * @param string $title
     * @param string $url
     */
    protected function __construct($title, $url) {
        $this->title = $title;
        $this->url = $url;
    }

    /**
     * Create a new navigation node
     *
     * @param string $title
     * @param strin  $url
     *
     * @return \Studiz\Core\View\Navigation\Node
     */
    public static function factory($title, $url) {
        $node = new self($title, $url);

        return $node;
    }

    /**
     * Add new child node
     *
     * @param \Studiz\Core\View\Navigation\Node $childNode
     *
     * @return \Studiz\Core\View\Navigation\Node
     */
    public function addChild(Node $childNode)
    {
        $this->children[] = $childNode;

        self::$childrenRegister[] = $childNode;

        return $this;
    }
}