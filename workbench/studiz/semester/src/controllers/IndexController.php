<?php namespace Studiz\Semester\Controller;


use Studiz\Core\Controller\GenericResourceController;
use Studiz\Core\Controller\LoginRequired;
use Studiz\Core\Controller\Response;
use Studiz\Core\ORM\GenericORM;
use Studiz\Semester\Model\Semester;

class IndexController extends GenericResourceController implements LoginRequired
{
    /**
     * Get base view package string
     *
     * @return string
     */
    protected function getViewPackage()
    {
        return 'semester';
    }

    /**
     * Get base url
     *
     * @return string
     */
    protected function getBaseURL()
    {
        return 'semester';
    }

    /**
     * Get model
     *
     * @return \Studiz\Core\ORM\GenericORM
     */
    protected function getModel()
    {
        return new Semester();
    }

    /**
     * Get model data
     *
     * @param array $data
     *
     * @return array
     */
    protected function getModelData(array $data)
    {
        // Duration handling
        $duration = explode(' - ', \Input::get('duration', '2010-10-10 - 2010-10-10'));

        return array(
            'user_id'  => \Sentry::getUser()->id,
            'title'    => \Input::get('title'),
            'start_at' => $duration[ 0 ],
            'end_at'   => $duration[ 1 ],
        );
    }

    protected function getPageHeader()
    {
        return 'Semester';
    }

    protected function getPageSubHeader()
    {
        return 'Manage your semesters and associate them to subjects';
    }

    protected function afterUpdate(GenericORM $model)
    {
        $subjects = \Input::get('subjects');

        if (!is_array($subjects))
        {
            $subjects = array($subjects);
        }

        if (is_array($subjects) && count($subjects))
        {
            $model->subjects()->sync($subjects);
        }
    }

    protected function afterStore(GenericORM $model)
    {
        return $this->afterUpdate($model);
    }


}