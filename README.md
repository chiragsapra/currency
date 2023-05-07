# Symfony App for Currency Exchange System

The app is created in Symfony framework.
You can download the code and run `composer update` to install the dependancies.

Change the mysql credentials in .env file and run `php bin/console doctrine:schema:update --force` to create the required tables in db

Here are the details of application

1. User can access the app via api with different endpoints. Below is the urls [All are GET requests]
    1. All Currencies: /api/currency.
    2. Get Exchange: /api/exchange/{cur}/{date} cur: currency code, date: date in format YYYY-MM-DD, or latest for today date.

2. To add the entry in database use below urls also can access the app .
    1. Add Currency: /currency/add
    2. Add Exchange: /exchange/add
    3. Get Exchange: /exchange/data/{cur}/{date}
    4. Get Currency: /currency

To scale the application
    1. User can add different currencies exchange that will store the data and just have to pass the code to url to get data accordingly.
    2. Can add validation for currency code check and avilability in system.
    3. In add exchange data form can add dropdowns of avilable currency exchange rate that are allowed to add.

For refrence here is the attached db with file name exchang.sql
