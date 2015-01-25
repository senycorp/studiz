<?php namespace Studiz\Semester\Model;

use Studiz\Core\ORM\GenericORM;

class Semester extends GenericORM
{
    protected $fillable = array('*');

    public function subjects()
    {
        return $this->belongsToMany('\Studiz\Subject\Model\Subject');
    }
}