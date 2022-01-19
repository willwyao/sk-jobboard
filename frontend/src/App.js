import './App.css';
import JobList from './components/JobList';

function App() {
  return (
    <div className="App">
      <div className="container p-4">
        <div className="row">
          <div className="col-12"><h1 className="text-center">Job Board</h1></div>
        </div>       
      </div>
      <JobList></JobList>
    </div>
  );
}

export default App;
