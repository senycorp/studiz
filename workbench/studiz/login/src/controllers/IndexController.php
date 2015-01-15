<?php namespace Studiz\Login\Controller;


use Studiz\Core\Controller\LoginRequired;
use Studiz\Core\Controller\ResourceController;
use Studiz\Core\Controller\Response;

class IndexController extends  ResourceController implements LoginRequired {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return \Response::view('login::main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // TODO: Implement create() method.
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // TODO: Implement store() method.
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        // TODO: Implement show() method.
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        // TODO: Implement update() method.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

}