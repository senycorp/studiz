<?php namespace Studiz\Core\Controller;

/**
 * Class ResourceController
 *
 * The ResourceController helps you implementing
 * an restfull controller based on the needs of
 * laravel.
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package Studiz\Core\Controller
 */
abstract class ResourceController extends GenericController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    abstract public function index();


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    abstract public function create();


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    abstract public function store();


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    abstract public function show($id);


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    abstract public function edit($id);


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    abstract public function update($id);


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    abstract public function destroy($id);
}
