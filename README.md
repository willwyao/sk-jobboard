# SK Job Board

## Setup
* Install [Docker](https://docs.docker.com/get-started/)
* Build: `docker-compose build`
* Config: Set up .env in backend before running the container
* Run: `docker-compose up`
* Execute tasks: `docker-compose exec <container_name> <cmd>`. 
  * e.g. `docker-compose exec coding-challenge-backend php artisan migrate`

## Usage
* React frontend: http://localhost
* Lumen backend: http://localhost:8000

## CLI command
* The command to import a CSV file is `artisan importcsv <file_path/file_name>`

Execute this command inside the container.
  e.g. `docker-compose exec coding-challenge-backend php artisan importcsv ./jobs.csv`

