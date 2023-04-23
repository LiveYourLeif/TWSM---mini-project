<?php 

// establish a connection to Mysql server, with the server credentials with the function
// OpenCon
include 'db_connection.php';
$conn = OpenCon();

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//create a table for storing the memes
$sql = "CREATE TABLE memes (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    image_name VARCHAR(255) NOT NULL,
    top_text VARCHAR(255) NOT NULL,
    bottom_text VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "Table memes created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

?>