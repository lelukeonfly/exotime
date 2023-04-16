laravel new ExoTime_v2 --jet
LICENSE
composer require itsgoingd/clockwork
composer require laravel-lang/publisher laravel-lang/lang laravel-lang/attributes --dev                                                                                         ─╯
php artisan lang:add de it en
php artisan make:model -a Post
php artisan make:model -a Service
php artisan make:model -a Demand
php artisan make:model -a Feedback
php artisan make:model -a Category
composer require laravel/sail --dev
php artisan sail:install
php artisan make:migration create_category_post_table
php artisan make:model TemporaryBan --all
php artisan make:model PermanentBan --all
php artisan make:model UnBan --all
php artisan make:middleware CheckBan
php artisan make:middleware BanPermanent
