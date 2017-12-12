# lib-proj
## Staff application for New Paltz library

# config.php
```
Use the following code for config.php file, fill in personal credentials
<?php
   define('servername', 'your_host_here');
   define('username', 'your_usename_here');
   define('password', 'your_password_here');
   define('dbname', 'your_db_name_here');

   $conn = mysqli_connect(servername, username, password, dbname)
  or die('Error connecting to MySQL server.');
?>
```

# SQL tables
Create 'Staff'table:
```
CREATE TABLE Staff(ID int, UserName varchar(255), Password varchar(255), Email varchar(255));
```

Create 'Visit' table:
```
CREATE TABLE Visit(Time varchar(255), Area_1 int, Area_2 int, Area_3 int);
```
