## Larva

[![Build Status](https://travis-ci.org/ipavl/larva.svg)](https://travis-ci.org/ipavl/larva)

Larva is a forum web application built with [Laravel](https://laravel.com).

## Setup

To install the necessary dependencies, run:

    $ composer install

To prepare the database, run:

    $ php artisan migrate

To run the application without setting up a web server:

    $ php artisan serve

## Tests

Testing is done with PHPUnit and tests can be run with:

    $ ./vendor/bin/phpunit

Tests use an in-memory SQLite database by default, so installing the php5-sqlite driver may be necessary:

    # For Debian/Ubuntu
    $ sudo apt-get install php5-sqlite
