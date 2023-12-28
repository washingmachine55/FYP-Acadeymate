# Commands 
Commands to use in pwsh cli and their usages (these also include the commands used for initializing the project for the first time).

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
> `npm run build`
> `php artisan migrate`

## Testing Mailpit
Test Mailpit
> `php artisan tinker`
> `Mail::send('welcome', [], fn($message) => $message->to('admin@example.com')->subject('Testing mailpit'));`

## Factory
To create a new factory user
> `php artisan tinker`
> `User::Factory()->Create()` // to create a factory user. Default password will be 'password' without the quotes

## Refreshing Migrations
This will reset all entries into the database and return to default, run this in pwsh
> `php artisan migrate:fresh`

## Livewire Commands

> `php artisan make:livewire test`
This command crates new components files, namely the Class and the View files. These can be individually found under:
- app/Livewire/test.php
- resources/views/livewire/test.blade.php
We also have to make sure that we register a route for the created component manually, this will be added in the file under "routes/web.php"

> `php artisan make:livewire CreatePost --inline`
This command creates an inline component within the class file.

# Other Commands
- Used to create the model, migration, factory, seeder, policy, controller, and form requests. 
> php artisan make:model Student --all
> php artisan make:model Guardian --all
> php artisan make:model Lecturer --all
> php artisan make:model EducationalInstituteAdmin --all
> php artisan make:model DevAdmin --all

- Used to inspect the models and its available attributes and relationships
> php artisan model:show Student
> php artisan model:show Guardian
> php artisan model:show Lecturer
> php artisan model:show EducationalInstituteAdmin
> php artisan model:show DevAdmin

# Other Tinker Commands
- App\Models\DevAdmin::create(['name' => 'Admin', 'email' => 'Admin2@admin.com', 'password' => 'password',]);  