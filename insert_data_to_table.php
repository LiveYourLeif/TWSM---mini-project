<?php
include 'db_connection.php';
$conn = OpenCon();

if (!$conn) {
    die("Connection to database failed" .mysqli_connect_error());
}

$sql = "INSERT INTO memes (image_name, top_text, bottom_text) VALUES ('pog.png', 'Romme', 'Lava')";

if (mysqli_query($conn, $sql)){
    echo "data has been inserted";
} else {
    echo "an error was made during insertion of data:" . mysqli_error($conn);
}
mysqli_close($conn);
?>