<?php 
require_once $base."db/DatabaseClass.php";

$tableUsers = "
	CREATE TABLE Users (
	ID INT(6) AUTO_INCREMENT PRIMARY KEY,
	LastName VARCHAR(30) NOT NULL,
	FirstName VARCHAR(30) NOT NULL,
	Email VARCHAR(30) NOT NULL,
	Password VARCHAR(255) NOT NULL,
	reg_date TIMESTAMP
	);
";

$db->query($tableUsers); /* Create users table*/

$tableCats = "
	CREATE TABLE Cats (
	ID INT(6) AUTO_INCREMENT PRIMARY KEY,
	Name VARCHAR(30) NOT NULL,
	Age INT(3) NOT NULL,
	Poroda VARCHAR(30) ,
	User_id INT(3) NOT NULL
	);
";

$db->query($tableCats); /* Create cats table*/

?>