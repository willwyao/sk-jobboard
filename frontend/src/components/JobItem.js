import React from 'react';
import { useGlobalContext } from '../context';

const JobItem = ({job}) => {
  const {openDetail}= useGlobalContext();
  const {job_title:title, date,location}=job;
  return (
    <div className="job-item row align-items-center m-2 border-light border rounded">
      <div className="job-title col-12 col-md-6 text-left">{title}</div>
      <div className="job-location col-4 col-md-2">{location}</div>
      <div className="job-date col-4 col-md-2">{date}</div>
      <div className="col-4 col-md-2 text-right">
        <button className="btn btn-primary btn-sm" onClick={()=>openDetail(job)}>Details</button></div>
    </div>
  )
}

export default JobItem
