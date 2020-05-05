# Property Store

<p align="center">
    <a href="https://github.styleci.io/repos/261395670">
        <img src="https://github.styleci.io/repos/261395670/shield?branch=master" alt="StyleCI">
    </a>
</p>

## About

This app is an example of my work.

## Key features of this project

* TDD
* Middleware AcceptJsonOnly for API endpoints
* Using Vue.js with Bootstrap-Vue on frontend.

## Installation

This is a typical Laravel application.
So, you can just follow to official [instruction](https://laravel.com/docs/7.x/installation).

### Configure MySQL

You need to create a database specific for your project, and a user to access it.
You may create a separate user, granting only specific privileges.

### Settings

1. Copy the `.env.example` file to a new file named `.env`.
2. Run `php artisan key:generate`.
3. Edit your `.env` file.
4. Run `composer install`.
5. Run `php artisan migrate`.
6. Optional. Run `php artisan db:seed` if you want scaffold database with test data.

## Tests

To run tests use `php artisan test` command.
