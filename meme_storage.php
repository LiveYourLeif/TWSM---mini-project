<?php 

// establish a connection to Mysql server, with the server credentials 
// OpenCon
include 'db_connection.php';
$conn = OpenCon();

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//create a table for storing the memes
$sql = "CREATE TABLE memes (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    memePath VARCHAR(255) NOT NULL,
    topText VARCHAR(255) NOT NULL,
    bottomText VARCHAR(255) NOT NULL,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "Table memes created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

?>