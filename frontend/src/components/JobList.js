import React from 'react'
import JobItem from './JobItem';
import Loading from './Loading';
import JobDetails from './JobDetails';
import { useGlobalContext } from '../context';

const JobList = () => {
  const {loading, jobs, showDetails} = useGlobalContext();
  if (loading) {
    return <Loading/>
  }
  if (jobs.length<1) {
    return <h2 className="text-center">No job data found!</h2>
  }
  return (
    <div className="container job-list">
      <div className="row">
        <div className="col-12 col-lg-8 offset-lg-2">
          {jobs.map((job)=>{
            return <JobItem key={job.id} job={job} />
          })}
        </div>
      </div>
      { showDetails && <JobDetails /> }
    </div>
  )
}

export default JobList
