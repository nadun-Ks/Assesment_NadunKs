# Project Title

This is a simple web application with Docker support, allowing you to manage tasks using a PHP backend and Html, css, Javascript and Bootstrap for the frontend.

## Project Structure

- `.gitattributes`: Git configuration file for managing attributes and end-of-line settings.
- `dbconnection.php`: PHP file for database connection setup.
- `docker-compose.yml`: Docker Compose configuration for setting up the environment.
- `index.php`: Main entry point of the application.
- `README.md`: Documentation for setting up and running the project.
- `script.js`: JavaScript file for handling client-side interactions.
- `test.php`: Testing script for checking functionality.

### Directories:
- `api/`: Contains the PHP API scripts for task management.
  - `addTasks.php`: API endpoint for adding tasks.
  - `getTasks.php`: API endpoint for retrieving tasks.
  - `markTaskAsDone.php`: API endpoint for marking tasks as done.
- `bootstrap-5.0.2/`: Bootstrap 5 files.
  - `css/`: Contains Bootstrap CSS files.
  - `js/`: Contains Bootstrap JavaScript files.
- `css/`: Custom CSS for styling.
  - `styles.css`: Custom styles for the project.
- `db/`: Database-related files.
  - `task.sql`: SQL file for creating the database and tables.

# Setup Instructions

## 1. Using Docker

## Setup mysqli on docker using
    - docker-php-ext-install mysqli

### Clone the repository:
- bash
- Copy code
- git clone <repository-url>
- cd project

### Start the application:
- bash
- Copy code
- docker-compose up --build
- Access the app in your browser at http://localhost.
- Access the phpMyAdmin in your browser at http://localhost:8001.
    - UserName : dbadmin
    - Password : 1234

## 2. Using XAMPP
- Copy the project folder to C:/xampp/htdocs/.
- Start Apache and MySQL in the XAMPP Control Panel.
- Import the database:
- Open phpMyAdmin at http://localhost/phpmyadmin.
- Create a database named todo_app.
- Import db/task.sql to create the task table.
- Access the app at http://localhost/ASSESMENT_NADUNKS/public.