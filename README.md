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
     5. Edit the login, Register and home.blade with the designs from our theme's html files (the login, register & index.html files.)

3. Displaying Products in the home page (dynamic data)
     1. Create Product model & migration file
     2. Edit the model as well as the migration file with the data required to create the Product table
     3. Run migrations to create the table
     4. Create some products for testing
     5. Edit the index fn in the Home controller to get and return the products
     6. In the HTML file (home.blade), loop thru products to display them dynamically, (@foreach ($Products as Product))
        {{ Product->name }}
    @endforeach

4. Displaying a Single Product {Link for product details}
     1. Create route to show a single product in the web.php, pass in the {id} in the route
     2. Add this route to the anchor tag in the HTML file (home blade)
     3. Create the ProductController
     4. In the ProductController, create the function to display the single product details i.e singleProduct{id} function NB. Remember to import the Product Model
     5. Create the view blade to display singleproduct details, i.e productSingle.blade.php
     6. Edit the blade to inherit from app.blade and also to dynamicaly display product details for the passed product id

5. Displaying Related Products In the Sing Product Details Page
     1. This is to display products with the same cartegory as the selected product, under the related Products section. NOTE: the selected product wont be shown in the related products section
     2. Add a new column in the products table called 'type' that will hold the category of the product
     3. Create the migration file and a new column 
            php artisan make:migration add_type_to_products_table --table=product
     4. Open the generated migration file and update the up and down methods to add the type column and allow nullable value for already existing data.
     5. Update the Model fillables -  add 'type' to the fillables
     6. Run migrations : php artisan migrate
     7. In the ProductController, update the singleProduct function to get the related products
     8. In the productSingle.blade.php, loop thru the related products and display them