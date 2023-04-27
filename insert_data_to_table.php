<?php
include 'db_connection.php';
$conn = OpenCon();
if (!$conn) {
    die("Connection to database failed" . mysqli_connect_error());
}

/*
    the function storeMeme() in Event-handler.js sends the data (path to image, topText and bottomText) to the server using AJAX request
    we use $_POST to retrieve those values and insert them into the table called "memes"
*/
$memePath = $_POST['memePath'];
$topText = $_POST['topText'];
$bottomText = $_POST['bottomText'];

$sql = "INSERT INTO memes (memePath, topText, bottomText) 
VALUES ('$memePath',
        '$topText',
        '$bottomText')";
if (mysqli_query($conn, $sql)) {
    echo "data has been inserted";

} else {
    echo "an error was made during insertion of data:" . mysqli_error($conn);
}
mysqli_close($conn);
?>