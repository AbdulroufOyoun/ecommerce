# Local Container Setup


## Application ports

The container setup is allocating ports *3001* to *8000* for applications. This will be available under  localhost.

*Note:* While running the container with make local, the setup will try to kill the running processes in your PC. So if you are running any applications with the mentioned port range (8000), please re-allocate them.

## Project Setup

shell
    run command: composer install          # To install your Vendor file.
    run command: install npm               # To install node module.
    Setup .env file           # To setup your .env, kindly duplicate your .env.example file and rename the duplicated file to .env.
    run command: npm run dev
    run command: php artisan key:generate
    run command: php artisan migrate
    run command: php artisan server

   
