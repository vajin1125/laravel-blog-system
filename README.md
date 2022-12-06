# ![Laravel Example App](logo.png)

[![Build Status](https://img.shields.io/travis/gothinkster/laravel-realworld-example-app/master.svg)](https://travis-ci.org/gothinkster/laravel-realworld-example-app) [![Gitter](https://img.shields.io/gitter/room/realworld-dev/laravel.svg)](https://gitter.im/realworld-dev/laravel) [![GitHub stars](https://img.shields.io/github/stars/gothinkster/laravel-realworld-example-app.svg)](https://github.com/gothinkster/laravel-realworld-example-app/stargazers) [![GitHub license](https://img.shields.io/github/license/gothinkster/laravel-realworld-example-app.svg)](https://raw.githubusercontent.com/gothinkster/laravel-realworld-example-app/master/LICENSE)

> ### Example Laravel codebase containing real world blog examples (CRUD, auth, advanced patterns and more) that adheres to the [BlogSystem](https://github.com/vajin1125/laravel-blog-system) spec and API.

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://https://laravel.com/docs/9.x/installation)

Clone the repository

    git clone git@github.com:vajin1125/laravel-blog-system.git

Switch to the repo folder

    cd laravel-blog-system

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:vajin1125/laravel-blog-system.git
    cd laravel-blog-system
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

**Populate the database with seed data with relationships which includes users, articles, comments, tags, favorites and follows. This can help you to quickly start testing the api or couple a frontend and start using it with ready content.**

Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh
    
## Login Accounts

Login with Admininistrator account

    email: admin@laravelblog.com
    password: admin@password

Login with Moderator account

    email: modera@laravelblog.com
    password: modera@password

Login with Common User account

    email: common@laravelblog.com
    password: common@password

## API Specification

This application adheres to the api specifications set by the [Thinkster](https://github.com/vajin1125) team. This helps mix and match any backend with any other frontend without conflicts.

> [Full API Spec](https://github.com/vajin1125)
More information regarding the project can be found here https://github.com/vajin1125/laravel-blog-system

----------

# Testing API

Run the laravel development server

    php artisan serve

The api can now be accessed at

    http://localhost:8000/api

The api urls

| **Method** | **URL**              	| **Description**            	               |
|----------	|---------------------------|----------------------------------------------|
| POST     	| /api/authenticate     	| Login user with posted value 	               |
| POST    	| /api/register         	| Register user with posted value              |
| GET    	| /api/users    	        | Get all registered users     	               |
| GET       | /api/blogs                | Get all blogs                                |
| POST      | /api/blogs                | Create a blog with posted value              |
| PUT       | /api/blogs/{blog_id}      | Update a blog with updated value of blog_id  |
| DELETE    | /api/blogs/{blog_id}      | Destroy a blog with blog_id                  |
| GET       | /api/comments             | Get all comments                             |
| POST      | /api/comments/{comment_id}| Create a comment with values of comment_id   |
| PUT       | /api/comments/{comment_id}| Update a comment with value of comment_id    |
| DELETE    | /api/comments/{comment_id}| Destroy a comment with comment_id            |


Refer the [api specification](#api-specification) for more info.
