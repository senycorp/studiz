<?php namespace Studiz\Core\Controller;

use Illuminate\Support\Facades\Redirect;
use Studiz\Core\ORM\GenericORM;

/**
 * Class GenericResourceController
 *
 * This GenericResourceController implements
 * all common procedures needed by a restfull
 * controller.
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
        // Get index view
        $view = $this->getViewIndex();

        // Set models to appear in the listing
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
        // Get create form view
        $view = $this->getViewCreate();

        // Set empty model
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
        // Get Model
        $model = $this->getModel();

        // Set attributes of model
        $model->setRawAttributes($this->getModelData(\Input::all()));

        $this->beforeStore($model);

        // Save it!
        $model->save();

        $this->afterStore($model);

        // Show the resource
        return $this->show($model->id);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        // Get view mode view
        $view = $this->getViewShow();

        // Set model in view
        $view->model = $this->getModel()->findOrFail($id);

        return $view;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        // Get edit view
        $view = $this->getViewEdit();

        // Set model
        $view->model = $this->getModel()->findOrFail($id);

        return $view;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update($id)
    {
        // Get model data
        $data = $this->getModelData(\Input::all());

        // Replace hidden _method field
        if (isset( $data[ '_method' ] )) unset( $data[ '_method' ] );

        // Find model
        $model = $this->getModel()->findOrFail($id);

        // Set data
        $model->setRawAttributes($data);

        $this->beforeUpdate($model);

        // Save model
        $model->save();

        $this->afterUpdate($this->getModel()->find($id));

        return $this->show($id);
    }

    /**
     * Callback before update
     *
     * @param \Studiz\Core\ORM\GenericORM $model
     *
     * @return bool
     */
    protected function beforeUpdate(GenericORM $model)
    {
        return true;
    }

    /**
     * Callback before store
     *
     * @param \Studiz\Core\ORM\GenericORM $model
     *
     * @return bool
     */
    protected function beforeStore(GenericORM $model)
    {
        return true;
    }

    /**
     * Callback for afterUpdate
     *
     * @param \Studiz\Core\ORM\GenericORM $model
     *
     * @return mixed
     */
    protected function afterUpdate(GenericORM $model) {
        return true;
    }

    /**
     * Callback for afterStore
     *
     * @param \Studiz\Core\ORM\GenericORM $model
     *
     * @return mixed
     */
    protected function afterStore(GenericORM $model) {
        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id = null)
    {
        // Get empty model
        $model = $this->getModel();

        // Check for existing model first
        if ($foundModel = $model->find($id)) {
            // Delete it
            $foundModel->delete();
        }

        // Show index page
        return $this->index();
    }

    /**
     * Get base view package string
     *
     * This should return the packages
     * base name as string.
     *
     * @return string
     */
    abstract protected function getViewPackage();

    /**
     * Get View for index
     *
     * @return \Illuminate\View\View    Index view for list all entities
     */
    protected function getViewIndex()
    {
        return \View::make($this->getViewPackage() . '::' . 'index', array( 'pageHeader'    => $this->getPageHeader(),
                                                                            'pageSubHeader' => $this->getPageSubHeader()
        ));
    }

    /**
     * Get view for create
     *
     * @return \Illuminate\View\View    Create/Edit view for manipulating resources
     */
    protected function getViewCreate()
    {
        return \View::make($this->getViewPackage() . '::' . 'create', array( 'pageHeader'    => $this->getPageHeader(),
                                                                             'pageSubHeader' => $this->getPageSubHeader()
        ));
    }

    /**
     * Get view for edit
     *
     * @return \Illuminate\View\View    Create/Edit view for manipulating resources
     */
    protected function getViewEdit()
    {
        return $this->getViewCreate();
    }

    protected function getViewShow()
    {
        return \View::make($this->getViewPackage() . '::' . 'view', array( 'pageHeader'    => $this->getPageHeader(),
                                                                           'pageSubHeader' => $this->getPageSubHeader()
        ));
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
     * This method ist responsible for adding
     * and removing unnecessary stuff from
     * global data provider.
     *
     * @param array $data
     *
     * @return array
     */
    abstract protected function getModelData(array $data);

    /**
     * Get the base url to package
     *
     * @return string
     */
    abstract protected function getBaseURL();

    /**
     * Get main page header
     *
     * @return string
     */
    abstract protected function getPageHeader();

    /**
     * Get sub page header
     *
     * @return string
     */
    abstract protected function getPageSubHeader();
}
