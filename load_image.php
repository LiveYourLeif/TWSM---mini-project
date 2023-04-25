<?php
$filename = $_GET['filename'];
$imagePath = 'images/'. $filename;
$image = file_get_contents($imagePath);
$imageInfo = getimagesize($imagePath); 

//if there is an image file loaded,
if ($imageInfo) {  
    $mimeType = $imageInfo['mime']; //Gets the mime type of the image, e.g. image/png or image/jpg. We have to do this because we have images of both types.
    $base64Image = base64_encode($image); //we have to convert the binary image data to a string. Only then can it be sent over the internet.
    $data = array ( 
        'mimeType' => $mimeType,
        'base64Image' => $base64Image
    );
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    header("HTTP/1.0 404 Not Found");
    echo "Error: File not found";
} 
?>

