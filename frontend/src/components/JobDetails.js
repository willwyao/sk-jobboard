import React from 'react';
import { useGlobalContext } from '../context';

const JobDetails = () => {
  const {closeDetail,jobDetails}=useGlobalContext();
  const {job_title:title, job_description:description, date, location, applicants}=jobDetails;
  return (
    <div className="job-details">
      <article className="">
        <h3 className="text-center">{title}</h3>
        <p>{description}</p>
        <div className="d-flex justify-content-between">
          <div>{location}</div>
          <div>{date}</div>
        </div>
        <hr />
        <strong>Applicants</strong>
        <div className="row  mb-4">
          {applicants.map((applicant,index)=>{
            return <span key={index} className="col-6 col-md-3">{applicant.name}</span>
          })}
        </div>
        <div className="text-center">
          <button className="btn btn-danger" onClick={()=>closeDetail()}>Close</button>
        </div>
        
      </article>      
    </div>
  )
}

export default JobDetails
