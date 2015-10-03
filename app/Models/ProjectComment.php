<?php

namespace App\Models;
use Jenssegers\Mongodb\Model as Eloquent;
//use Illuminate\Database\Eloquent\Model;

class ProjectComment extends Eloquent
{
  protected $collection = 'project_comments';
}
