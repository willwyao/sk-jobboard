<?php

namespace App\Console\Commands;

use App\Http\Controllers\ApplicantsController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\JobsController;
use App\Models\Job;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class ImportCSV extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importcsv {file : CSV file path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import a CSV file to the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {   
        $this->processCSV($this->argument('file'));
    }

    public function processCSV($filePath)
    {
        $handle = fopen($filePath, 'r');
        while (!feof($handle)) {
            $data[] = fgetcsv($handle);
        }
        fclose($handle);

        for ($i=1;$i<count($data);$i++){
            $applicantsData = array_pop($data[$i]);
            $jobData = $data[$i];
                        
            $jobId = $this->createJob($jobData);
            $applicantsIds = $this->createApplicants($applicantsData);
            $this->updateApplying($jobId,$applicantsIds);
        }

    }

    public function createJob(array $data)
    {
        $request = Request::create('','POST',[
            'job_title'=>$data[0],
            'job_description'=>$data[1],
            'date'=>$data[2],
            'location'=>$data[3],                               
        ]);
        $jobsController = new JobsController();
        $jobId = $jobsController->store($request)->id;
        return $jobId;
    }

    public function createApplicants(string $data)
    {
        
        $applicantsIds=[];

        if (strlen(trim($data))) {
            $applicantsController = new ApplicantsController();
            $applicantsArr = explode(',',$data);
            foreach ($applicantsArr as $name) {
                $request = Request::create('','POST',[
                    'name'=>trim($name),                              
                ]);                
                $applicantsIds[] = $applicantsController->store($request)->id;
            }
        }
        return $applicantsIds;
    }

    public function updateApplying(int $jobId, array $applicantsIds)
    {
        if (count($applicantsIds)) {
            $applyController = new ApplyController();            
            $applyController->update($jobId,$applicantsIds);
        }
    }
}
