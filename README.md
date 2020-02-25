# LILLYDOO TASK

This Repo is the implementation for the following task : "Address book for LILLYDOO"

The main requirements where to implement the following in php.

Develop an address book in which you can add, edit and delete entries. You should also have an overview of all contacts.

Address Book contain the following data
  - Firstname
  - Lastname
  - Street and number
  - Zip
  - City
  - Country
  - Phonenumber
  - Birthday
  - Email address
  - Picture (optional)

The bonus features that I implemented where.
  - Fixture file to seed in 50 contacts for easy testing
  - Integration test for the whole scenario includes (show ,create, edit).
  
#  Features!

  - CRUD for contants
  - FRONTEND with gentelella admin panel for (index, show ,edit ,delete)
  - Testing usescases for automation 
  - 50 contacts seeded into the database through a Fixture file


# Design

I have used the normal MVC pattern

This mainly divides it into three parts

- Models: the contact entity
- Views : found in app/Resources/views (base,edit,index,new,show)
- Controller: Contact controller in src/AppBundle/Controller 

The sqlite database is in app folder name lillydo-addressbook.sqlite

Considering the database design i have created one table.
 - contact (firstname,lastname,address,...) etc
 
Considering the frontend I have used [Gentelella] template for the dashboard view,
I have used bootstrap 4 for the grid layout and also JQuery, I have created a webpack file to build the app.js and app.css files


### Tech

This task uses a number of open source projects to work properly:

* [Symfony] - Framework for developing php web applications
* [Doctrine] - ORM for Symfony
* [Faker] - Library that generates fake data.
* [Fixtures] - Composer package for seeding data into the database
* [Gentelella] - Gentelella Admin is a free to use Bootstrap admin template.
* [Bootsrap4] - Bootstrap is an open source toolkit for developing with HTML, CSS, and JS
* [Webpack] - Static module bundler for modern JavaScript applications.


### Installation

This Task requires [PHP] v7.2.0+ to run.
I was running it on a Mac with Composer installed

Install the dependencies and start the server.

```sh
cd project
composer install
php bin/console server:run
```
Navigate to this url to check that everything is running correctly it should redirect to the contacts page.

```sh
127.0.0.1:8000
```

I am using SQLite as required the database name is lillydo-addressbook.sqlite

```sh
./bin/console doctrine:fixtures:load --no-interaction
```

To rebuild the frontend run the following commands.

I am using webpack so you will need NodeJS installed
mine was v10.19.0  on a MACOS machine, you will also need yarn for encore.

```sh
npm install
yarn encore dev 
```

### Testing
I have created a single test case to cover the full scenario (show, creation, edit).

To Run the tests (Note that running tests will remove all the entries in the DB)
```sh
./vendor/bin/simple-phpunit
```
It should then output OK (1 test, 4 assertions)


### Todos

 - Implement more tests to cover all the scenarios.
 - Create a docker file for easy installation

License
----

MIT



   [Gentelella]: <https://github.com/ColorlibHQ/gentelella>
   [Fixtures]: <https://github.com/doctrine/data-fixtures>
   [Faker]: <https://github.com/fzaninotto/Faker>
   [Symfony]: <https://symfony.com/>
   [Doctrine]: <https://www.doctrine-project.org/>
   [PHP]: <http://php.net/>
   [Bootsrap4]: <https://getbootstrap.com/>
   [Webpack]: <https://webpack.js.org/>
   [yarn]: <https://yarnpkg.com/>
   [NodeJS]: <https://nodejs.org/en/>
