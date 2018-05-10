To initiate this project after cloning github repository and setting all nessesary data in .env file,
run following commands from terminal in project's core directory:
    1) composer install
    2) npm install
    3) php artisan key:generate
    4) php artisan migrate --seed

If previous command did not give any result to database, run following commands:
    5) php artisan db:seed --class=TasksTableSeeder
    6) php artisan db:seed --class=PostsTableSeeder
    7) php artisan db:seed --class=CommentsTableSeeder

