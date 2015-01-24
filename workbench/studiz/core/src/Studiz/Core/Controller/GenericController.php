<?php namespace Studiz\Core\Controller;

/**
 * Class GenericController
 *
 * This generic controller triggers procedures
 * based on implemented interfaces.
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package Studiz\Core\Controller
 */
abstract class GenericController extends CoreController
{

    /**
     * Constructor
     */
    public function __construct()
    {
        // Filterable
        if ($this instanceof Filterable)
        {
            $this->setFilter();
        }

        // Loginable
        if ($this instanceof LoginRequired)
        {
            $this->beforeFilter('authenticated');
        }
    }
}
