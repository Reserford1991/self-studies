To initiate this project after cloning github repository and setting all nessesary data in .env file,
run following commands from terminal in project's core directory:
    1) composer install
    2) php artisan migrate --seed

If previous command did not give any result to database, run following command:
    3) php artisan db:seed --class=TasksTableSeeder
