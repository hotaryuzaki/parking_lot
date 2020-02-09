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
 2. Extract application folder, put in your server (ex: htdocs folder)
 3. Import database
 4. open terminal and run:
    `php artisan serve`
 5. open browser type: [http://localhost:8000/](http://localhost:8000/)
 
## How To Play!
 1. Before you start, you have to Setup Parking in Setup menu. Set `Parking Name` and `Parking Slot`, then click `Update Setup`.
 2. In Dashboard you will find all slots is ready.
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
