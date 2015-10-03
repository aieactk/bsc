<?php

namespace App;
use Jenssegers\Mongodb\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
//use Illuminate\Database\Eloquent\Model;

class Project extends Eloquent
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];
  protected $collection = 'project_collection';
    //
}
