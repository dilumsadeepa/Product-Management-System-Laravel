# Product-Management-System-Laravel

This is a simple product management system built with Laravel.

## Setup

1. Clone the repository:

        git clone <repository-url>

2. Navigate into the project directory:

        cd product-management-system

3. Install composer dependencies:

        composer install
    
4. Copy the `.env.example` file to `.env`:

        cp .env.example .env

5. Generate an application key:

        php artisan key:generate

6. Set up your database in the `.env` file:

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=your_database_name
        DB_USERNAME=your_database_username
        DB_PASSWORD=your_database_password

7. Migrate the database:

        php artisan migrate

8. Seed the database

        php artisan db:seed


## Usage

To start the development server, run:

        php artisan serve

You can now access the application in your web browser at `http://localhost:8000`.