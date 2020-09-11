<?php


namespace App;

/**
 * @mixin \Eloquent
 */
class Model extends \Illuminate\Database\Eloquent\Model
{
    /* For all models that extend this class turn off mass assignment */
    protected $guarded = [];
}