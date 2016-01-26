Movies Viewer App
=================

This application can help you to display list of your favorite movies. You can also add new items or delete them.

***

## Usage

First of all, you need to start this application on a webserver. As usualy, you should place this app the following path - `/var/www/html/`. Then start **Apache** (of course, if you have installed it on your machine) - `service apache2 start`. After this you can get access to this app throught browser, if you'll type `http://localhost:8000` in address bar.

If you do not want to install **apache** on your computer, php has built-in webserver! With this, you can convert any local folder into a server and host a site locally there. Navigate to root folder using terminal and run 'php -S localhost:8000'. This will make that folder into a local web server. Now access 'http://localhost:8000' from your browser and you will see my app.

But something went wrong? Of course! For this app you'll need **mysql**. Before start application, you must make sure you have `mysql-client` and `mysql-server` installed. If not, from terminal, run the following:

```
sudo apt-get install mysql-client
sudo apt-get install mysql-server
```

You will be prompted for a root password, which you should enter, with which you will be logging in to phpmyadmin as well. In my application I used **root** as *username*, and **password** as *password*. You should have the same user, or change 7th and 8th rows in `inc/db.php`.

After you installed mysql, you need to import data inside database:

```
mysql -u root -p webbylab_movies < dump.sql
```

**dump.sql*** you'll find in root folder of my app.

After you performed all this things, my application should work by you.:wink:

***

## About

On the main page you'll find full list of movies already inserted in database. To remove some item from table, just press `X` button in Options column or select item and press `Delete this movie from list`. 

To add new movie, press `Add new Item` on main page. You'll navigate to the page, where you can manually insert data about movie or upload data from the file. Test file you can find in root folder of this project - `data.xml`.

Also, you can search your movies from the list by title or by actor.

## Structure

+ Inside `css` folder you'll find stylesheets for this project. 
+ In `js` folder locate JavaScript files.
+ Images used for this project you can find inside `img` folder.
+ PHP scenarios are inside `inc` folder.

`index.php` is the main page with list of movies. You can find links in main page to `add.php` and `detail.php`. First file used for inserting data to the list, and second for displaying data about recent item. `insert.php` used for insert data to DB from user inputs, and `file_handler.php` used for insert data from XML file uploaded to form. 

`database.class.php` has a class called `database` with realization of methods to communicate with database. `db.php` creates an object of class `database` and define connection this database. File `functions.php` has functions to display data and communicate with database throught `database` class.

```
root_folder/
├── css/
│   ├── bootstrap.css
│   └── main.css
├── js/
│   └── script.js
├── img/
│   ├── 300x300.gif
│   ├── arrows_sm.jpg
│   └── 1453586210_17.svg
├── inc/
│   ├── database.class.php
│   ├── db.php
│   ├── functions.php
│   └── header.php
├── index.php
├── add.php
├── insert.php
├── file_handler.php
├── delete.php
└── detail.php
```

## Database

The database for this project has two table with the following structure:

+ `info` table has columns `id`, `title`, `year` (stand for Released year) and `format`.

| id  | title        | year  | format    |
| --- |:------------:| -----:| ---------:|
| 1   | Movie First  | 2000  | DVD       |
| 2   | Movie Second | 2001  | VHS       |
| 3   | Movie Third  | 2002  | Blu-Ray   |

+ `cast` table has columns `id`, `name`, `surname`, `info_id` linked to `info.id`.

| id  | name          | surname      | info_id  |
| --- |:-------------:| ------------:| --------:|
| 1   | Actor Name 1  | Lastname 1   | 1        |
| 2   | Actor Name 2  | Lastname 2   | 3        |
| 3   | Actor Name 3  | Lastname 3   | 1        |
| 4   | Actor Name 4  | Lastname 4   | 2        |