<?php namespace Studiz\Core\Controller;

/**
 * Class GenericController
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package Studiz\Core\Controller
 */
abstract class GenericController extends CoreController
{

    public function __construct()
    {
        // Filterable
        if ($this instanceof Filterable)
        {
            $this->setFilter();
        }

        // Loginable
        if ($this instanceof Login)
        {
            /**
             * @todo Check for valid login
             */
        }
    }
}
