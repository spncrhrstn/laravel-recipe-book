# Laravel Recipe Book

An example of using the Laravel framework to create a recipe book application.

## Database
The application looks for a MySQL database called `laravel_recipes` running on `localhost`. **Create this first!**  

In the root of the project, there is a file `.env` where you need to set the database connection. Modify it so your `DB` settings are like this:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_recipes
DB_USERNAME=root
DB_PASSWORD=''
```

Create the database tables and seed it by running `php artisan migrate:refresh --seed` from a command prompt while in the root directory of the project.

## Running the Application

__NOTE: I don't know how to package up the project with all the dependencies, or know of a way to restore the packages, a simple clone may not work!__  

Run the application by running `php artisan serve` from a command prompt while in the root directory of the project.  

In order to create and edit recipes, you must be logged in. You can register for an account by navigating to the Register page in the nav bar.

## Todo:
* Recipes linked to user account (currently just a string in the recipe table)
* Error and duplicate checking in create/edit functions is incomplete

### Credits and Resources
[Laravel Framework](https://laravel.com/)  
[Bootstrap](https://getbootstrap.com/)  
[Font Awesome](https://fontawesome.com/)  
[Favicon.io](https://favicon.io)
