<?php
$filename = $_GET['filename'];
$image = file_get_contents('images/' . $filename);

$image_info = getimagesize('images/' . $filename); // get the image info

if ($image_info) {
    $mime_type = $image_info['mime']; // get the mime type
    header("Content-Type: {$mime_type}");
    echo $image;
} else {
    header("HTTP/1.0 404 Not Found");
    echo "Error: File not found";
}
?>

