<?php

namespace App\Http\Controllers;

use App\Models\Job;

class ApplyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(int $jobId, array $applicantsIds)
    {
        $job = Job::find($jobId);
        $job->applicants()->syncWithoutDetaching($applicantsIds);
    }
}
