# faq
Prerequisites:

Developer Accounts on Facebook
Heroku Hosting Account
TO Clone this project:
git clone https://github.com/mpolobe/is601finalproject.git
CD into FAQ and run composer install
cp .env.example to .env
run: php artisan key:generate
setup database / with sqlite or other https://laravel.com/docs/5.6/database
Run: php artisan migrate
Run: unit tests: phpunit
Run: seeds php artisan migrate:refresh --seed

User will be able to login using social media accounts
Google and FaceBook login has been implemented.
An Avatar is imported from the Facebook account and the email address of the logged in user is displayed 
above their profile picture, similarly to what you would see in Facebook or Google.

We can add multiple social providers to a Laravel app using Socialite a package built by Laravel for social authentication. 
Socialite currently supports authentication with Facebook, Twitter, LinkedIn, Google, GitHub, and Bitbucket. 

In this project I have added Facebook,  and Google Signups to the FAQ project.

I’m using Laravel 5.8 for this project.

Migrations
If you look inside database/migrations of your project, you will notice that Laravel already comes with some migrations for creating the users’ and password resets tables.

We will use the migration for creating the users’ table in this example but you can use any migration of your choice. 

There are a few things we need  to make changes to before creating the users’ table.

A user created via OAuth will have a provider and we also need a provider_id which should be unique. 
With Facebook, there are cases where the user does not have an email set up but a phone number and thus the hash sent back by the callback will not have an email resulting to an error. 
To counter this, you can set the email field to nullable but because the aim of this project is to 
make it possible for a user to signup using any of Facebook, Twitter or Google with the same email and retain their profile, 
we will not make the email field nullable. Also, when creating users via OAuth we will not be passing any passwords, therefore, we need to set the password field in the migration nullable.

Here, we are doing the following: adding provider and provider_id columns to the users’ table. 
We also make the password field in the users’ table nullable.

In order to host the site on Heroku: The following commands had to be run:
git init
echo web: vendor/bin/heroku-php-apache2 public/ > Procfile
app_name=is601b
heroku apps:create $app_name
heroku addons:create heroku-postgresql:hobby-dev --app $app_name
heroku config:set APP_KEY=$(php artisan --no-ansi key:generate --show)
heroku config:set APP_LOG=errorlog
heroku config:set APP_ENV=development APP_DEBUG=true APP_LOG_LEVEL=debug
heroku config:set DB_CONNECTION=pg-heroku
git push heroku master
heroku run php artisan migrate

When the app has been successfully added to heroku .env file has to be modified to show the local host:
For the call back URL, e.g.
http://127.0.0.1:8000/login/twitter/callback
http://127.0.0.1:8000/login/facebook/callback
http://127.0.0.1:8000/login/google/callback