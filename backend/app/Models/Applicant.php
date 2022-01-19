<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Applicant extends Model
{
    protected $fillable = [
        'name', 
    ];

    public function applying()
    {
        return $this->belongsToMany(Job::class);
    }
}
