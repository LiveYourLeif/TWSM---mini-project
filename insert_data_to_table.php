<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["saveButton"])) {
    echo "we are inside insertotasdasd";
include 'db_connection.php';
$conn = OpenCon();
if (!$conn) {
    die("Connection to database failed" .mysqli_connect_error());
}

$memeImage = file_get_contents($_FILES['memeImage']['tmp_name']);
$topText = $_POST['topText'];
$bottomText = $_POST['bottomText'];


$sql = "INSERT INTO memes (memeCreated, topText, bottomText) 
VALUES ('$memeImage',
        '$topText',
        '$bottomText')";
if (mysqli_query($conn, $sql)){
    echo "data has been inserted";
    print_r($_FILES);

} else {
    echo "an error was made during insertion of data:" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>