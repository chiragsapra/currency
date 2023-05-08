# Symfony App for Currency Exchange System

### The app is created in Symfony framework.

#### Steps to run the applicarion:
1. User can create clone of the code and run `composer update` to install the framework and its dependancies.
2. Copy the .env.example file and rename it as .env and change the database credentials to connect with database.
3. Run `php bin/console doctrine:schema:update --force` to create the required tables in database.
4. Can also import the exchange.sql file to database which has some sample data.

#### To access the website use below mentioned urls to get or add respective data
1. Get Currency: /currency
This URL gives the table containing all the currencies available to convert in the application.
2. Add Currency: /currency/add
User can add the currencies in the system with the help of this URL.
3. Exchanges History: /exchange/
This URL gives the table containing all the past currencies converion with date.
4. Get Exchange Rate: /exchange/add
User can check the conversion rate with the help of this URL and will also save the data in the database.

#### To scale the application
1. User can add as many currencies as want according to the requirement in the system so there are more options avilable to check for the conversions.
2. Can create the API endpoints so it will be easily integrated with different systems.
