<?php namespace Studiz\Core\ORM;

class GenericORM extends CoreORM
{
    /**
     * Factory a new instance of model
     *
     * @param array $attributes
     * @return static
     */
    public static function factory(array $attributes = array())
    {
        return new static($attributes);
    }
}