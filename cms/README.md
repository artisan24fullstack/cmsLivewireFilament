
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

php artisan livewire:make SearchBox

php artisan make:filament-resource Category

php artisan make:filament-resource Post --soft-deletes

php artisan make:component Badge --view 


npm i concurrently -g

(update scripts package json)

"start": "concurrently  \"php artisan config:cache\" \"php artisan serve\" \"npm run dev \"  "


php artisan make:migration create_post_like_table

php artisan livewire:make LikeButton

php artisan make:component posts/categoryBadge --view

php artisan make:component posts/author --view

php artisan livewire:make PostComments

php artisan make:model Comment -m 

php artisan make:migration add_role_to_users

php artisan make:filament-resource User --generate

php artisan make:policy UserPolicy --model=User

php artisan make:policy PostPolicy --model=Post

php artisan make:policy CategoryPolicy --model=Category

php artisan make:filament-resource Comment

php artisan make:filament-relation-manager
(resource) PostResource 
(relationship) comments
(attribute) comment 

php artisan make:filament-relation-manager PostResource comments comment

Eager Loading (with) HomeController PostList PostComments

php artisan cache:clear

php artisan make:filament-widget UserStatsWidget --stats-overview
UserResource
Admin Panel

php artisan make:filament-widget PostPerMonthChart --chart
PostResource
Admin
Line Chart

composer require flowframe/laravel-trend

php artisan make:filament-widget LatestCommentsWidget --table

CommentResource
admin panel

Translation
php artisan lang:publish

composer require outhebox/blade-flags

php artisan make:middleware SetLocale




