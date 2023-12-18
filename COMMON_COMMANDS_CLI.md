# Common Commands to use in pwsh cli and their usages

## Livewire Commands

> php artisan make:livewire test
This command crates new components files, namely the Class and the View files. These can be individually found under:
- app/Livewire/test.php
- resources/views/livewire/test.blade.php
We also have to make sure that we register a route for the created component manually, this will be added in the file under "routes/web.php"

> php artisan make:livewire CreatePost --inline
This command creates an inline component within the class file.

## Creating the project for the first time
Start PWSH
> laravel new
1. What is the name of your project?:
 > FYP-Acadeymate
2. Would you like to install a starter kit?:
 > jetstream
3. Which Jetstream stack would you like to install?:
 > livewire
4. Would you like any optional features? [None]:
 > api, dark, verification, teams 
5. Which testing framework do you prefer?:
 > 0
6. Would you like to initialize a Git repository? (yes/no) [no]:
 > no
7. Which database will your application use? [MySQL]:
 > mysql
------------------------------------
> npm run build
> php artisan migrate

## Testing Mailpit
Test Mailpit
> php artisan tinker
> Mail::send('welcome', [], fn($message) => $message->to('admin@example.com')->subject('Testing mailpit'));

## Factory
To create a new factory user
>php artisan tinker
>User::Factory()->Create() // to create a factory user. Default password will be 'password' without the quotes

## Refreshing Migrations
This will reset all entries into the database and return to default, run this in pwsh
> php artisan migrate:fresh