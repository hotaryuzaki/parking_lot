**App Name:**   Parking Lot\
**Framework:** PHP Laravel\
**Author:** Ahmad Amri Sanusi

## Server Requirements

The Laravel framework has a few system requirements. All of these requirements are satisfied by the [Laravel Homestead](https://laravel.com/docs/6.x/homestead) virtual machine, so it's highly recommended that you use Homestead as your local Laravel development environment.

However, if you are not using Homestead, you will need to make sure your server meets the following requirements:

 - PHP >= 7.2.0
 - BCMath PHP Extension
 - Ctype PHP Extension
 - JSON PHP Extension
 - Mbstring PHP Extension
 - OpenSSL PHP Extension
 - PDO PHP Extension
 - Tokenizer PHP Extension
 - XML PHP Extension

## Start The Game!

 1. Laravel utilizes [Composer](https://getcomposer.org/) to manage its dependencies. So, before using Laravel, make sure you have Composer installed on your machine.
 2. Install Laravel (*skip if you already installed*), open terminal and run:
    `composer global require laravel/installer`
 3. Extract application folder, put in your server (ex: htdocs folder)
 4. Import database:
    1. open phpmyadmin or other mysql apps
    2. create new database `parking_lot`
    3. import file `parking_lot.sql`
 5. open terminal and go to application root folder then run:
    `php artisan serve`
 6. open browser type: [http://localhost:8000/](http://localhost:8000/)
 
## How To Play!

 1. Before you start, you have to Setup Parking in Setup menu. Set `Parking Name` and `Parking Slot`, then click `Update Setup`.
 2. In Dashboard you will find all slots is ready with empty data.
 3. To Register Vehicle go to Parking menu, input `Vehicle No` & `Vehicle Color` then click `Add Vehicle`.
 4. To Checkout go to Checkout menu, input `Vehicle No` then click `Check Vehicle`.
 Vehicle detail data will show, here you can see Parking Time and Parking Bill.
 Set Payment Type then click Vehicle Checkout.
 5. You can check all parking slots status in Dashboard menu anytime.
 6. You can check all transactions data (vehicles) in Transactions menu.
 7. In Report menu you can check :
    - Registration numbers of all cars of a particular colour. Pick `Report Type: Vehicle Color` then click `Get Report`.
    - Slot number in which a car with a given registration number is parked. Pick `Report Type: Vehicle No` then click `Get Report`.
    - Slot numbers of all slots where a car of a particular colour is parked. Pick `Report Type: Vehicle Color` then click `Get Report`.

**Have Fun!**
*Call me if you need assistance!*

---
**Additional Doc**

## OOP & MVC

**Object-oriented programming (OOP)** refers to a type of computer programming (software design) in which programmers define the data type of a data structure, and also the types of operations (functions) that can be applied to the data structure. In programming standard is using Class & Functions

The **Model-View-Controller (MVC)** is an architectural pattern that separates an application into three main logical components: the *model*, the *view*, and the *controller*. Each of these components are built to handle specific development aspects of an application.

*Laravel is using both of that perfectly*!!

## Routing

The main Hero for good MVC is Routing. **Route** defines the URL pattern and handler information. All the configured routes of an application stored in *root/config/web.php* and will be used by Routing engine to determine appropriate handler class or file for an incoming request.

## Model

Data type and data structure definition is in **Migrations** (*root/database/migrations*) and **Model** ( *root/app/*), the Model component corresponds to all the data-related logic that the user works with. This can represent either the data that is being transferred between the View and Controller components or any other business logic-related data.

We using 3 tables:
1. **setup_parkings** => Store system setup, we set apps name & parking slots here.
2. **master_slots** => Store parking slots data & flag, rows of data is based on parking slots value in setup_parkings. If we set parking slots is 5 in Setup menu, we will get 5 rows of data here automatically.
3. **transactions** => Store transactions (all vehicles) data, we save vehicle detail data here.

## Controller

Controllers (*root/app/Http/Controllers*) act as an interface between Model and View components to process all the business logic and incoming requests, manipulate data using the Model component and interact with the Views to render the final output.

We using 4 controllers:
1. **SetupParkingController** => Class of Controller setup_parkings table, here we have some functions; *index, edit, & update*. This controller is using for Setup menu (Setup_parking View).
2. **MasterSlotController** => Class of Controller master_slots table, here we have an *index* function. This controller is using for Dashboard menu (Slot View).
3. **TransactionController** => Class of Controller transactions table, here we have a lot of functions; *index, create, store, show, edit, update, destroy, & checkout*. This controller is using for Setup menu (Setup_parking View).
4. **ReportController** => Class of Controller special for Report menu, here we have an *getReport* function. This controller is using for Setup menu (Setup_parking View).


## View

The View component is used for all the UI logic of the application. For example, the Customer view will include all the UI components such as text boxes, dropdowns, etc. that the final user interacts with. And of course, including data objects from controllers we created.

All views design is located in *root/resources/views*.

**Regards**