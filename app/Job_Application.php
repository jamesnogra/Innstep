<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job_Application extends Model
{
    protected $guarded = ['id'];
    protected $table = 'job_applications';

    public function _job()
    {
        return $this->belongsTo('App\Job', 'job_id', 'id');
    }

}
