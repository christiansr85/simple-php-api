# API REST PHP
Rest API built with PHP, Laravel and Jenssegers' mongodb plugin.

## Requirements
- php 7.3.4
- composer 1.8.5
- mongodb 4.0.6

## Launch service
1. Launch mongodb server by executing `mongod` command from command line.
    - `mongod` command should be accessible globally through cli.
    - By default, a database called `starshot` will be created once you perform the migrate action or use the application. You can change its name from `.env` file, but take care of it if you want that java service to use the same database (you should change its name also in the `application.properties` file of java project.).
2. Unzip the source code.
3. Go to the unzipped folder through a terminal and execute this command to install all dependencies: `composer install`.
4. At this point, the server already could work, but as we want to use login feature too, we have to execute this command: `php artisan migrate --seed`. This creates the database structure neede to perform login functions. It also populates the user's collection with a document neede to perform login. These are the credentials needed to do it:
    - email: `admin@admin.com`
    - password: `adminadmin`
5. Execute the command `php artisan serve` and you'll have the server running.

## What can we find now?
___
Server is running in the url <http://127.0.0.1:8000>
___

Once you have started the serve, you can test it through `Postam` or through the web application.

From `Postman` you have to import the json collection and environment files to your postman application and then you should be able to try the api services.

