<?php
 $filename = $_GET['filename'];
$image_path = 'images/'. $filename;
$image = file_get_contents($image_path);
$image_info = getimagesize($image_path); 

if ($image_info) {
    $mime_type = $image_info['mime']; // get the mime type
    $base64_image = base64_encode($image);
    $data = array ( 
        'mime_type' => $mime_type,
        'base64_image' => $base64_image
    );
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    header("HTTP/1.0 404 Not Found");
    echo "Error: File not found";
} 

/* $filename = $_GET['filename'];
$image_path = 'images/'. $filename;

if (file_exists($image_path)) {
    $mime_type = mime_content_type($image_path); // get the mime type
    header("Content-Type: {$mime_type}");
    readfile($image_path);
} else {
    header("HTTP/1.0 404 Not Found");
    echo "Error: File not found";
} */
?>

