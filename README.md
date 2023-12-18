# FYP-Acadeymate
AcadeyMate - An Academic Management System (based on a Management System for Students and e-Learning) [by Ahmed Babar]

## TechStack
Built using the [TALL stack](https://tallstack.dev/), which consists of TailwindCSS, Alpine.js, Laravel and Livewire.
This project utilizes Laravel Jetstream as a starter kit.

Docs used for Development:
> TailwindCss [Tailwind Css Docs](https://tailwindcss.com/docs/installation)
> Alpine.js [Alpine.js Docs](https://alpinejs.dev/start-here)
> Laravel - [Laravel Docs](https://laravel.com/docs)
> Livewire [Livewire Docs](https://livewire.laravel.com/docs/)

### Extra
- List of all things related to TALL Stack, such as libraries, examples, learning materaial, tips, etc., = [Awesome TALL Stack](https://github.com/livewire/awesome-tall-stack)

## First Setup
- Install [Node and NPM](https://nodejs.org/en)
- Install [Laragon](https://laragon.org/index.html) for PHP and Apache + MySQL Servers 
- Install [Composer](https://getcomposer.org/) for Laravel and Artisan to work effectively.
- Follow [this webpage to install mailpit in Laragon](https://pen-y-fan.github.io/2023/02/23/how-to-install-mailpit-in-laragon/)

------------------------------------

## Live-server and Dev setup
### Essential Programs to run
1. Make sure to switch the Document Root in Laragon to FYP-Acadeymate/public
2. Run Laragon Apache and MySQL Servers.
3. run `Mailpit` (without quotes) in pwsh terminal
4. pwsh > `npm run build`
4. pwsh > `npm run dev` // Make sure the APP_URL is http://localhost:8079 in the .env file
5. pwsh > `php artisan serve --port 8080`

### Live server extention
Install "Live Server Web Extension" (on your preferred Browser [mine is msedge]) and set the following parameters:
- Actual Server Address: 
> http://localhost:8079/
- Live Server Address: 
> http://127.0.0.1:8080/

## Naming Conventions (Cases):
- Ensuring to use lowercase kebab-cased names for components
- Uppercase SNAKE_CASE for Database related actions such as creating tables and column names
- For variable, function, and method names, making sure to use PascalCase

## Updating dependancies for future use
Need to install a package which checks the package.json file for updates
> `npm install -g npm-check-updates`

This command needs to be run in the Main Directory where the project's source files are located, i.e. where the package.json file resides
- pwsh > `ncu -i --format group`
// this command and its parameters allow us to check for which packages to update, group by patches, minor fixes and major fixes. 