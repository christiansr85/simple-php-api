<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as MongoModel;

class Employee extends MongoModel {

    protected $collection = 'employees';
    public $timestamps = false;
}