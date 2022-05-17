# Movies shared


### Description
- The place sharing youtube videos
- Using laravel 9, bootstrap css 

# Requirements
* PHP version >= 8.0

# Installation
1. Clone the repo : https://github.com/accretech-bggs-aris/NxG-Tickets.git 
```sh
git clone https://github.com/accretech-bggs-aris/NxG-Tickets.git
git checkout develop
```

2. Connection DB
Open .env file and update infomation below:
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=YOUR_DB_NAME
DB_USERNAME=YOUR_ACOUNT
DB_PASSWORD=YOUR_PASSWORD
```


3. Run Migration
```sh
php artisan migrate
```

4. To run the webapp
```sh
php artisan serve 
```

Open browser with the link: http://localhost:8000
