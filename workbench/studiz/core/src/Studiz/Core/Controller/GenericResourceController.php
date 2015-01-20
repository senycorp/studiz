<?php namespace Studiz\Core\Controller;
use Illuminate\Support\Facades\Redirect;

/**
 * Class GenericResourceController
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package Studiz\Core\Controller
 */
abstract class GenericResourceController extends GenericController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $view = $this->getViewIndex();

        $view->models = $this->getModel()->all();

        return $view;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $view = $this->getViewCreate();
        $view->model = $this->getModel();

        return $view;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $model = $this->getModel();
        $model->setRawAttributes($this->getModelData(\Input::all()));
        $model->save();

        return $this->show($model->id);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $view = $this->getViewShow();
        $view->model = $this->getModel()->findOrFail($id);

        return $view;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $view = $this->getViewEdit();

        $view->model = $this->getModel()->findOrFail($id);

        return $view;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $data = $this->getModelData(\Input::all());
        if (isset($data['_method'])) unset($data['_method']);
        $model = $this->getModel()->findOrFail($id);
        $model->setRawAttributes($data);
        $model->save();

        return $this->show($id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id=NULL)
    {
        $model = $this->getModel();

        if ($foundModel = $model->find($id))
        {
            $foundModel->delete();
        }

        return $this->index();
    }

    /**
     * Get base view package string
     *
     * @return string
     */
    abstract protected function getViewPackage();

    /**
     * Get View for index
     *
     * @return \Illuminate\View\View
     */
    protected function getViewIndex()
    {
        return \View::make($this->getViewPackage() . '::' . 'index', array('pageHeader' => $this->getPageHeader(), 'pageSubHeader' => $this->getPageSubHeader()));
    }

    /**
     * Get view for create
     *
     * @return \Illuminate\View\View
     */
    protected function getViewCreate()
    {
        return \View::make($this->getViewPackage() . '::' . 'create', array('pageHeader' => $this->getPageHeader(), 'pageSubHeader' => $this->getPageSubHeader()));
    }

    /**
     * Get view for edit
     *
     * @return \Illuminate\View\View
     */
    protected function getViewEdit()
    {
        return \View::make($this->getViewPackage() . '::' . 'create', array('pageHeader' => $this->getPageHeader(), 'pageSubHeader' => $this->getPageSubHeader()));
    }

    protected function getViewShow()
    {
        return \View::make($this->getViewPackage() . '::' . 'view', array('pageHeader' => $this->getPageHeader(), 'pageSubHeader' => $this->getPageSubHeader()));
    }

    /**
     * Get model
     *
     * @return \Studiz\Core\ORM\GenericORM
     */
    abstract protected function getModel();

    /**
     * Get data for model
     *
     * @param array $data
     *
     * @return array
     */
    protected function getModelData(array $data)
    {
        return $data;
    }

    abstract protected function getBaseURL();

    abstract protected function getPageHeader();

    abstract protected function getPageSubHeader();
}
