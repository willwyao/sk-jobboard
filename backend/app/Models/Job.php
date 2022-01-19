<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Job extends Model
{
    protected $fillable = [
        'job_title', 'job_description','date','location',
    ];

    public function applicants()
    {
        return $this->belongsToMany(Applicant::class);
    }
}
