# coffee_shop
Laravel Coffeshop Management System

1. Creating the Auth System 
    1. Used the classic way wc is by using the ui package
        - Installed the ui package using the command - composer require ui package
        - the php artisan ui bootstrap --auth #for frontend Bootstrap theme
        - then npm install && npm run dev
    2. Create the Database
        - Configured the database details in the .env file
        - Created the database in phpmyadmin (xamp) using the same name as the one set in the project
        - Run migrations to create tables in the db - php artisan migrate
        - Register a new user using the register link in the browser
        - Check the new created user details in the db users table.

