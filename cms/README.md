
composer require laravel/jetstream

php artisan jetstream:install livewire

npm install
npm run build
php artisan migrate

php artisan make:model Post -m -c -f
php artisan make:model Category -m -f

php artisan make:migration create_category_post_table

php artisan migrate:refresh --seed


php artisan make:controller HomeController -i (invoke)

php artisan make:component Posts/PostCard --view

php artisan livewire:publish --assets

php artisan storage:link (already exists)

php artisan make:component Posts/postItem --view

php artisan livewire:make PostList
