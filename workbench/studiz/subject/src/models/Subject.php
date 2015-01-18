<?php namespace Studiz\Subject\Model;

use Studiz\Core\ORM\GenericORM;

class Subject extends GenericORM
{
    protected $fillable = array('*');

//    public function user()
//    {
//        return $this->belongsTo('User');
//    }
}