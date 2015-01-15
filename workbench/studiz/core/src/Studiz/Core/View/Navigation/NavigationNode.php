<?php namespace Studiz\Core\View\Navigation;

use Studiz\Core\Exception\InvalidParameterException;
use Studiz\Core\Exception\LogicalException;
use Studiz\Core\Exception\NotExistingEntityException;

/**
 * Class NavigationNode
 *
 * @package Studiz\Core\View\Navigation
 */
class NavigationNode extends Node
{
    /**
     * @var NavigationNode[]
     */
    protected $children = array();

    /**
     * @var NavigationNode[]
     */
    public static $childrenRegister = array();

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
     * Icon of node
     *
     * @var string
     */
    public $icon = '';

    /**
     * Identifier of node
     *
     * @var string
     */
    public $identifier = '';

    /**
     * Parent node
     *
     * @var \Studiz\Core\View\Navigation\NavigationNode
     */
    public $parentNode = null;

    /**
     * Create a node
     *
     * @param string $title
     * @param string $url
     * @param string $identifier
     * @param null $icon
     * @param \Studiz\Core\View\Navigation\NavigationNode $parentNode
     *
     * @throws \Studiz\Core\Exception\InvalidParameterException
     * @throws \Studiz\Core\Exception\LogicalException
     */
    protected function __construct($title, $url, $identifier, $icon = null, NavigationNode $parentNode = null)
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
     * @param \Studiz\Core\View\Navigation\NavigationNode $parentNode
     *
     * @return \Studiz\Core\View\Navigation\NavigationNode
     */
    public static function factory($title, $url, $identifier, $icon = null, NavigationNode $parentNode = null)
    {
        // Create new node
        $node = new static($title, $url, $identifier, $icon, $parentNode);

        return $node;
    }

    /**
     * Add new child node
     *
     * @param \Studiz\Core\View\Navigation\NavigationNode $childNode
     *
     * @return \Studiz\Core\View\Navigation\NavigationNode
     */
    public function addChild(NavigationNode $childNode)
    {
        // Add child node to register
        //$this->children[] = $childNode;

        // Set parent node
        $childNode->parentNode = $this;

        // Use default icon
        if (empty($childNode->icon))
        {
            $childNode->icon = 'fa fa-angle-double-right';
        }

        return $this;
    }

    /**
     * Retrieve node
     *
     * @param string $identifier
     *
     * @return \Studiz\Core\View\Navigation\NavigationNode
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
}