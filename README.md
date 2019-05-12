# faq

TO Clone this project
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