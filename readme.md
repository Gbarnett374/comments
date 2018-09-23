# Commenting System.
- This is a website commenting system that allows for nested comments(3 level's below root). 

- Developed using macOS 10.13.6, MYSQL 5.7.23, PHP 7.1.16(system), jQuery 3.3.1, Bootstrap, Composer 1.2.4, and Laravel 5.7.5

## Getting Started

1. Make sure you have Composer installed.
2. Clone this repo. 
3. Inside the project run `composer install`.
4. Create an .env file. You can do `cp .env.example .env`.
5. Generate a key `php artisan key:generate`.
6. Log into your local mysql server and create a comments database. `CREATE DATABASE comments;`
7. Configure your .env file to point to your local mysql server with the correct hostname, username, password, and database.
8. Run the migrations `php artisan migrate`.
9. Start the server `php artisan serve`.
10. Navigate to `localhost:8000/comments`. 