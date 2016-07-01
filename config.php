 <?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (empty ($conn->query("SHOW DATABASES LIKE 'mytest' ")->fetch_array())){
		// Create database
	$sql = "CREATE DATABASE mytest";
	if ($conn->query($sql) === FALSE) {
		die("Error creating database: " . $conn->error);
	}
}
$conn->select_db("mytest");

if (empty ($conn->query("SHOW TABLES")->fetch_array())) {
	// sql to create table
	$sql1 = "CREATE TABLE mytest.contact (
	id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(30) NOT NULL,
	email VARCHAR(30) NOT NULL,
	message VARCHAR(500) NOT NULL,
	file_lien VARCHAR(50),
	stat INT (1),
	code_disable INT(5) NOT NULL
	)";

	if ($conn->query($sql1) === FALSE) {
		die("Error creating table: " . $conn->error);
	} 

}



?> 
