<?php
include 'db_connection.php';
$conn = OpenCon();
if (!$conn) {
    die("Connection to database failed" .mysqli_connect_error());
}
$data = file_get_contents('php://input');
parse_str($data, $params);
$memeImage = $params['memeImage'];
$topText = $params['topText'];
$bottomText = $params['bottomText'];

echo $topText;


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

?>