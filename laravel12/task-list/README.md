<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo"></a></p>

# Task List Project  

This is a simple task management app built with Laravel. The goal of this project is to help me get more familiar with the Laravel framework by building a CRUD-style application where users can create, update, and delete tasks.  

## Getting Started  

To run the project locally, follow these steps:  

1. Clone the repository:  
git clone
cd task-list  

2. Install PHP dependencies:  
composer install  

3. Copy the .env file and generate the application key:  
cp .env.example .env  
php artisan key:generate  

4. Update your .env file with the correct database credentials:  
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=your_database_name  
DB_USERNAME=your_username  
DB_PASSWORD=your_password  

5. Run the database migrations:  
php artisan migrate  

6. Start the development server:  
php artisan serve  

Once the server is running, go to http://localhost:8000 in your browser to view the application.  

## Features  

- Add new tasks  
- Mark tasks as completed  
- Edit and delete tasks  
- Simple interface using Blade templates  

## Purpose  

This project was created for learning purposes to become more familiar with Laravel’s core features, including routing, controllers, Eloquent models, Blade templates, and database migrations.  

## License  

This project is open-source and available under the MIT license: https://opensource.org/licenses/MIT
