# Restoran - Laravel Project

## What's inside of this repos??

This repository contains the Laravel project development process, namely a restaurant management system. This project uses Laravel 11 for development, Bootstrap template as the front end, and MySQL as the database.

Template Bootstrap source: [Restoran Theme](https://themewagon.com/themes/restoran-free-responsive-bootstrap-5-restaurant-website-template/)

## How can you clone the project??:

You can clone this repository with this methods:

-   HTTPS: Use Git checkout by making use of this URL: https://github.com/Obyyyy/restoran.git
    ```sh
    git clone https://github.com/Obyyyy/restoran.git
    ```

## Setup the Database

-   Start your web server and sql using XAMPP, Laragon, Laravel Herd or etc.
-   Open the repository in VSCode, and run this command in terminal to create the database schema
    ```sh
    php artisan migrate
    ```
-   Run this command to add data to the database tables
    ```sh
    php artisan db:seed --class=DatabaseSeeder
    ```

## Run the Application

-   In terminal type `npm install` to download all the Libraries.
-   After that, type `npm run dev`
-   Open a another terminal tab, and run `php artisan serve` to run the application
