<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobCollection;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobsController extends Controller
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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'job_title'=>['required','string','max:100'],
            'job_description'=>['required','string','max:500'],
            'date'=>['required'],
            'location'=>['required'], 
        ]);

        $validated = $validator->validated();

        return Job::firstOrCreate($validated);
    }

    public function showAllJobs()
    {
        return new JobCollection(Job::all());
    }
}
