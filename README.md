Follow the below steps to run it in your local environment

Clone the repository using git clone
git clone https://github.com/himurules/lyke-demo.git ./pk





Then run composer install



composer install



create .env file using following command




cp .env.example .env



Set your local database configuration in the .env file




DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=yourdatabasename
DB_USERNAME=username
DB_PASSWORD=password

Then run the following migrate command to create user and user-events table
php artisan migrate



Then run the seed command to seed the tables from the csv file




php artisan db:seed



This will populate the data in the users table and the user_events table based on the csv file



then run the server



php artisan serve





To get the list of users you can go to the url

http://127.0.0.1:8000/api/users



to get user events go to



http://127.0.0.1:8000/api/user-events/2



and to get user events grouped by event type go to



http://127.0.0.1:8000/api/user-event-groups/234
