To initiate this project after cloning github repository and setting all nessesary data in .env file,
run following commands from terminal in project's core directory:
    1) reroute local website to another port (localhost:81 for example) 
    2) composer install
    3) npm install
    4) php artisan key:generate
    5) php artisan migrate --seed

If previous command did not give any result to database, run following commands:
    6) php artisan db:seed --class=TasksTableSeeder
    7) php artisan db:seed --class=PostsTableSeeder
    8) php artisan db:seed --class=CommentsTableSeeder
    9) php artisan db:seed --class=UsersTableSeeder
    
For testing.
1) In .env file change  
    DB_DATABASE=your-database
    to 
    DB_DATABASE=blog-testing
2) execute command 'php artisan migrate'
