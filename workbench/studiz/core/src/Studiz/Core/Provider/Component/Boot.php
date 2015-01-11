<?php namespace Studiz\Core\Provider\Component;

/**
 * Class Boot
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @package Studiz\Core\Provider\Component
 */
abstract class Boot
{

    /**
     * Before
     *
     * @param \Studiz\Core\Provider\Component\Request $request
     * @todo refactor params
     *
     * @return void
     */
    abstract public function before(Request $request);

    /**
     * After
     *
     * @param \Studiz\Core\Provider\Component\Request $request
     * @param \Studiz\Core\Provider\Component\Response $response
     * @todo refactor params
     *
     * @return void
     */
    abstract public function after(Request $request, Response $response);
}