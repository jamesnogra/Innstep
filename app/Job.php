<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    protected $guarded = ['id'];
    protected $table = 'jobs';

    public function _applicants()
    {
        return $this->hasMany(Job_Application::class);
    }

    public function _number_of_applicants($job_id)
    {
        return $this
            ->_applicants()
            ->where('job_id', $job_id)
            ->count();
    }

}
