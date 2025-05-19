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

6. Adding Product to Cart 
     1. Add the add to cart link inside a form to handle form submission
     2. Create a route for this form post method
     3. Create the Contoller Function for this route (form submission process) ie addtoCart
     4. Create the Cart model and migration file
     5. Edit the Cart Model fillables 
     6. Edit the migration file to include all the cart model columns
     7. Run migrations to create the cart table
     8. Test adding an item to cart
     9. Add the return redirect to the same page ie, return redirect()->back()->with('success', 'Item added to Cart');

7. Validating Cart
     1. A user can only add a specific product to the cart only once.
     2. First hide the inputs fields of the add to cart form. change fields type from text to hidden
     3. For validating the cart, validate in the product controller. 
     4. Make a counter wc count the # of the current product present in the cart with the same user id. 
     5. If its != 0, then the add to cart button will be disabled. 
     6. Otherwise, its active

8. Displaying Products in Cart
      1. Modify the cart link in the nav to be active
      2. Create the 'cart' route in the web.php
      3. Create the 'cart' function in the ProductController 
      4. In the cart function, get the products in the cart for the current user
      5. Pass the products to the cart blade
      6. Create the cart.blade.php in products folder
      7. In the cart blade, loop thru the products and display them
