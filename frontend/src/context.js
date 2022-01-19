import React, { useState, useContext, useEffect } from 'react'

const url = 'http://localhost:8000/api/jobs';
const AppContext = React.createContext();

const AppProvider= ({children})=>{
  const [loading, setLoading] = useState(true);
  const [jobs, setJobs]=useState([]);
  const [showDetails, setShowDetails] = useState(false);
  const [jobDetails, setJobDetails] = useState({});

  const fetchJobs = async ()=>{
    setLoading(true)
    try {
      const response =await fetch(url);
      const data = await response.json();
      console.log(data);
      const {data:jobs} = data;
      if (jobs) {
        setJobs(jobs);
      }else{
        setJobs([]);
      }
      setLoading(false)
    } catch (error) {
      console.log(error);
      setLoading(false)
    }
  }

  const openDetail = (job)=>{
    setJobDetails(job);
    setShowDetails(true);
  }

  const closeDetail = ()=>{
    setShowDetails(false);
  }

  useEffect(()=>{
    fetchJobs();
  },[]);

  return (
    <AppContext.Provider
      value={{ loading, jobs, showDetails, jobDetails, openDetail, closeDetail }}
    >
      {children}
    </AppContext.Provider>
  )
}

export const useGlobalContext = () => {
  return useContext(AppContext)
}

export { AppContext, AppProvider }