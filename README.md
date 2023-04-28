# Meme generator
Start up with loading up your XAMPP control panel, and press run on "Apache" and "MySQL"

## Setting up the database
In your browser, open up http://localhost/phpmyadmin/
- Press "new" to create a new database
- Call that database: twsm---mini-project
- for the UTF-8 character encoding choose: utf8mb4_general_ci
Now you have created the database.

## Setting up the project
Start with copying the folder called "TWSM---mini-project" and place it under the xampp/htdocs folder. 
Open the project folder "TWSM---mini-project" and in the file "db_connection.php" you will see the following code: 
```
$dbhost = "localhost";     #db host where we are running the server.
$dbuser = "root";          #username
$dbpass = "test123";          #password
$db = "TWSM---mini-project";
```
If you have a password for your phpmyadmin, it is important that you change the $dpbass = "your password" and also change the $dbuser to your username. You can see all this information under localhost/phpmyadmin. If you don't have a password just leave that field empty like so: $dbpass = "";

## Creating a table
Once the project folder has been moved to the correct folder, and you have edited db_connection.php to your credentials you can move on to create a table in your database.
If you haven't already, in your XAMPP control panel, press start on "Apache" and "MySQL" respectively. Go into your browser and run the file "meme_storage.php" like so: http://localhost/TWSM---mini-project/meme_storage.php
This will create a new table in your database called "memes".

## Running the application
Lastly to run the application, run the script called main_page.php
In it, you can choose a meme template, add some text and then press "Generate" to create the image. Press "save" to store the meme in the database, and press "Storage" to see the last meme you created.
