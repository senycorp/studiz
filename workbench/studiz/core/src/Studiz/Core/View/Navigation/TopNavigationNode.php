<?php namespace Studiz\Core\View\Navigation;

use Studiz\Core\Exception\InvalidParameterException;
use Studiz\Core\Exception\LogicalException;
use Studiz\Core\Exception\NotExistingEntityException;

/**
 * Class NavigationNode
 *
 * @package Studiz\Core\View\Navigation
 */
class TopNavigationNode extends Node
{
    /**
     * @var TopNavigationNode[]
     */
    protected $children = array();

    /**
     * @var TopNavigationNode[]
     */
    protected static $childrenRegister = array();

    /**
     * Title of node
     *
     * @var string
     */
    public $title = '';

    /**
     * URL of node
     *
     * @var string
     */
    public $url = '';

    /**
     * Identifier of node
     *
     * @var string
     */
    public $identifier = '';

    /**
     * Icon of node
     *
     * @var string
     */
    public $icon = '';

    /**
     * Text for header
     *
     * @var string
     */
    public $header = '';

    /**
     * Text for footer
     *
     * @var string
     */
    public $footer = '';

    /**
     * Count for badge
     *
     * @var int
     */
    public $badge = null;

    /**
     * Parent node
     *
     * @var \Studiz\Core\View\Navigation\TopNavigationNode
     */
    public $parentNode = null;

    /**
     * Create a node
     *
     * @param string $title
     * @param string $url
     * @param string $identifier
     * @param null $icon
     * @param \Studiz\Core\View\Navigation\TopNavigationNode $parentNode
     *
     * @throws \Studiz\Core\Exception\InvalidParameterException
     * @throws \Studiz\Core\Exception\LogicalException
     */
    protected function __construct($title, $url, $identifier, $icon = null, TopNavigationNode $parentNode = null)
    {
        // Set node data
        $this->title = $title;
        $this->url = $url;
        $this->icon = $icon;
        $this->parentNode = $parentNode;

        // Identifier handling
        if (!empty($identifier) && is_string($identifier))
        {
            // Prevent duplicates
            if (!isset(self::$childrenRegister[$identifier]))
            {
                $this->identifier = $identifier;
            }
            else
            {
                throw new LogicalException('Duplicate node identifier detected.');
            }
        }
        else
        {
            throw new InvalidParameterException('Node identifier is not a valid string.');
        }

        // Add node to register
        self::$childrenRegister[$this->identifier] = $this;
    }

    /**
     * Create a new navigation node
     *
     * @param string $title
     * @param string $url
     * @param string $identifier
     * @param string $icon
     * @param \Studiz\Core\View\Navigation\TopNavigationNode $parentNode
     *
     * @return \Studiz\Core\View\Navigation\TopNavigationNode
     */
    public static function factory($title, $url, $identifier, $icon = null, TopNavigationNode $parentNode = null)
    {
        // Create new node
        $node = new static($title, $url, $identifier, $icon, $parentNode);

        return $node;
    }

    /**
     * Add new child node
     *
     * @param \Studiz\Core\View\Navigation\TopNavigationNode $childNode
     *
     * @return \Studiz\Core\View\Navigation\TopNavigationNode
     */
    public function addChild(TopNavigationNode $childNode)
    {
        // Add child node to register
        //$this->children[] = $childNode;

        // Set parent node
        $childNode->parentNode = $this;

        return $this;
    }

    /**
     * Retrieve node
     *
     * @param string $identifier
     *
     * @return \Studiz\Core\View\Navigation\TopNavigationNode
     * @throws \Studiz\Core\Exception\NotExistingEntityException
     */
    public static function retrieveNode($identifier)
    {
        if (isset(self::$childrenRegister[$identifier]))
        {
            return self::$childrenRegister[$identifier];
        }

        throw new NotExistingEntityException('Unable to retrieve node for given identifier');
    }

    /**
     * Check whether a node exist or not
     *
     * @param string $identifier
     *
     * @return bool
     */
    public static function nodeExists($identifier)
    {
        return isset(self::$childrenRegister[$identifier]);
    }

    /**
     * Get nodes of navigational component
     *
     * @return array
     */
    protected function getNodeRegister()
    {
        return self::$childrenRegister;
    }

    /**
     * Set header
     *
     * @param string $header
     *
     * @return $this
     */
    public function setHeader($header)
    {
        $this->header = $header;

        return $this;
    }

    /**
     * Set footer
     *
     * @param string $footer
     *
     * @return $this
     */
    public function setFooter($footer)
    {
        $this->footer = $footer;

        return $this;
    }

    /**
     * Set badge count
     *
     * @param int $badge
     *
     * @return $this
     */
    public function setBadge($badge)
    {
        $this->badge = $badge;

        return $this;
    }
}