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

2. Intergrating the UI theme to the project
    1. Copy all static files ( css, js, img, fonts, etc) & paste them under public folder in our project (create a new folder there called assets and paste them there)
    2. Grab all links to link our static files from the index HTML file and add them in the <header> of the app.blade.php file of our project. App.blade file is in the folder resources/views/layouts
    3. Configure these links to render our static files in blsde files like as follow.
        <link href="{{ asset('assets/css/style.css') }}">
    4. Do for both css and js files 
    4. Edit the login, Register and home.blade with the designs from our theme's html files (the login, register & index.html files.)

3. Displaying Products in the home page (dynamic data)
    1. Create Product model & migration file
    2. Edit the model as well as the migration file with the data required to create the Product table
    3. Run migrations to create the table
    4. Create some products for testing
    5. Edit the index fn in the Home controller to get and return the products
    6. In the HTML file (home.blade), loop thru products to display them dynamically, (@foreach ($Products as Product))
        {{ Product->name }}
    @endforeach