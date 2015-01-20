<?php namespace Studiz\Subject\Controller;


use Studiz\Core\Controller\GenericResourceController;
use Studiz\Core\Controller\LoginRequired;
use Studiz\Core\Controller\Response;
use Studiz\Subject\Model\Subject;

class IndexController extends  GenericResourceController implements LoginRequired {
    /**
     * Get base view package string
     *
     * @return string
     */
    protected function getViewPackage()
    {
        return 'subject';
    }

    /**
     * Get base url
     *
     * @return string
     */
    protected function getBaseURL()
    {
        return 'subject';
    }

    /**
     * Get model
     *
     * @return \Studiz\Core\ORM\GenericORM
     */
    protected function getModel()
    {
        return new Subject();
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
        $data['user_id'] = \Sentry::getUser()->id;

        return $data;
    }

    protected function getPageHeader()
    {
        return 'Subjects';
    }

    protected function getPageSubHeader()
    {
        return 'Manage your subjects';
    }
}