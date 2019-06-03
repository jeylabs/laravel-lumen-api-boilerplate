# Lumen API Boilerplate with OAuth2

This is a boilerplate for lumen 5.8 if you are using lumen to write REST api it will help you.

This project use `dusterio/lumen-passport`.

Write some easy APIs.

## USEFUL LINKS

- Lumen [https://lumen.laravel.com/docs/5.8](https://lumen.laravel.com/docs/5.8)
- dusterio/lumen-passport [https://github.com/dusterio/lumen-passport](https://github.com/dusterio/lumen-passport)
- flipbox/lumen-generator [https://github.com/flipboxstudio/lumen-generator](https://github.com/flipboxstudio/lumen-generator)
- pearl/lumen-request-validate [https://github.com/pearlkrishn/lumen-request-validate](https://github.com/pearlkrishn/lumen-request-validate)
- Rest API Debug [Postman](https://www.getpostman.com/)

## Installation

### Install the project

#### Using GIT

``` bash
git clone git@github.com:jeylabs/laravel-lumen-api-boilerplate.git api_service
cd api_service
```


### Environment Files

This package ships with a .env.example file in the root of the project.
You must rename this file to just .env
Note: Make sure you have hidden files shown on your system.

### Composer 
Laravel project dependencies are managed through the PHP [Composer tool](https://getcomposer.org/). The first step is to install the depencencies by navigating into your project in terminal and typing this command:

``` bash
composer install
```

### Create Database

You must create your database on your server and on your .env file update the following lines:

``` bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```
Change these lines to reflect your new database settings.

### Artisan Commands

The first thing we are going to so is set the key that Laravel will use when doing encryption.

``` bash
php artisan key:generate
```

You should see a green message stating your key was successfully generated. As well as you should see the APP_KEY variable in your .env file reflected.

It's time to see if your database credentials are correct.

We are going to run the built in migrations to create the database tables:

``` bash
php artisan migrate
```

You should see a message for each table migrated, if you don't and see errors, than your credentials are most likely not correct.


``` bash
php artisan db:seed
```

You should get a message for each file seeded, you should see the information in your database tables.

Next, you should run the passport:install command. This command will create the encryption keys needed to generate secure access tokens. In addition, the command will create "personal access" and "password grant" clients which will be used to generate access tokens:

``` bash
php artisan passport:install
```

#### Available Command

```
key:generate      Set the application key

make:command      Create a new Artisan command
make:controller   Create a new controller class
make:event        Create a new event class
make:job          Create a new job class
make:listener     Create a new event listener class
make:mail         Create a new email class
make:middleware   Create a new middleware class
make:migration    Create a new migration file
make:model        Create a new Eloquent model class
make:policy       Create a new policy class
make:provider     Create a new service provider class
make:seeder       Create a new seeder class
make:test         Create a new test class
```

#### Additional Useful Command

```
clear-compiled    Remove the compiled class file
serve             Serve the application on the PHP development server
tinker            Interact with your application
optimize          Optimize the framework for better performance
route:list        Display all registered routes.
```


### Installed routes

This boilerplate have following routes after you call routes() method (see instructions below):

Verb | Path | NamedRoute | Controller | Action | Middleware
--- | --- | --- | --- | --- | ---
POST   | /oauth/token                             |            | \Laravel\Passport\Http\Controllers\AccessTokenController           | issueToken | -
GET    | /oauth/tokens                            |            | \Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController | forUser    | auth
DELETE | /oauth/tokens/{token_id}                 |            | \Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController | destroy    | auth
POST   | /oauth/token/refresh                     |            | \Laravel\Passport\Http\Controllers\TransientTokenController        | refresh    | auth
GET    | /oauth/clients                           |            | \Laravel\Passport\Http\Controllers\ClientController                | forUser    | auth
POST   | /oauth/clients                           |            | \Laravel\Passport\Http\Controllers\ClientController                | store      | auth
PUT    | /oauth/clients/{client_id}               |            | \Laravel\Passport\Http\Controllers\ClientController                | update     | auth
DELETE | /oauth/clients/{client_id}               |            | \Laravel\Passport\Http\Controllers\ClientController                | destroy    | auth
GET    | /oauth/scopes                            |            | \Laravel\Passport\Http\Controllers\ScopeController                 | all        | auth
GET    | /oauth/personal-access-tokens            |            | \Laravel\Passport\Http\Controllers\PersonalAccessTokenController   | forUser    | auth
POST   | /oauth/personal-access-tokens            |            | \Laravel\Passport\Http\Controllers\PersonalAccessTokenController   | store      | auth
DELETE | /oauth/personal-access-tokens/{token_id} |            | \Laravel\Passport\Http\Controllers\PersonalAccessTokenController   | destroy    | auth

Please note that some of the Laravel Passport's routes had to 'go away' because they are web-related and rely on sessions (eg. authorise pages). Lumen is an
API framework so only API-related routes are present.


### Login

After your project is installed and you can access it in a browser, click the login button on the right of the navigation bar.

The user credentials are:

Username: admin@admin.com
Password: secret


### TODO

- [ ] phpunit

### Tips

Test the project

```bash
php artisan serve
```
Laravel development server will start: [http://127.0.0.1:8000](http://127.0.0.1:8000)

## License
[MIT license](http://opensource.org/licenses/MIT)
