<?php
include 'db_connection.php';
$conn = OpenCon();
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Website</title>
	<link rel="stylesheet" href="Test1.css">
</head>
<body>
    <div class="logo-container">
        <img src="LogoDark.png">
    </div>
    <div class="container">
        <h2>Top Text</h2>
        <input type="text" placeholder="Enter text here">
        <h2>Bottom Text</h2>
        <input type="text" placeholder="Enter text here">
        <img img id="placeholder" src="PlaceHolder.jpg">
        <div class="button-container">
            <button class="generate-button">Generate</button>
            <button class="share-button">Share</button>
        </div>
    </div>
    <div class="meme-container">
        <h2>Choose meme template:</h2>
          <div class="grid-container">
              <div class="grid-item"><img src="Stramt.png" data-image = "Stramt.png" alt = "Stramt.png"> </div> <!--we use the data-* attribute to store cutom data, and also add alt attribute if the image does not load -->
              <div class="grid-item"><img src="chad.png" data-image = "chad.png" alt = "chad.png"> </div>
              <div class="grid-item"><img src="pov.png" data-image = "pov.png" alt = "pov.png"> </div>
              <div class="grid-item"><img src="Pog.png" data-image = "Pog.png" alt = "Pog.png"> </div>
          </div>
    </div>
</body>
</html>

<?php 
	if ($conn) {
		CloseCon($conn);
	} else {
		echo "Connection Failed";
	}
?>