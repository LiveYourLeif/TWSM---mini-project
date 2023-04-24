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
        <img src="images/LogoDark.png">
    </div>
    <div class="container">
        <h2>Top Text</h2>
        <input type="text" placeholder="Enter text here">
        <h2>Bottom Text</h2>
        <input type="text" placeholder="Enter text here">
        <img img id="placeholder" src="images/PlaceHolder.jpg" data-image = "placeholder.jpg" alt ="shit aint work">
        <div class="button-container">
            <button class="generate-button">Generate</button>
            <button class="share-button">Share</button>
        </div>
    </div>
    <div class="meme-container">
        <h2>Choose meme template:</h2>
          <div class="grid-container">
              <div class="grid-item"><img src="images/Stramt.png" data-image = "Stramt.png" alt = "Stramt.png"> </div> <!--we use the data-* attribute to store cutom data, and also add alt attribute if the image does not load -->
              <div class="grid-item"><img src="images/chad.png" data-image = "chad.png" alt = "chad.png"> </div>
              <div class="grid-item"><img src="images/pov.png" data-image = "pov.png" alt = "pov.png"> </div>
              <div class="grid-item"><img src="images/Pog.png" data-image = "Pog.png" alt = "Pog.png"> </div>
          </div>
    </div>
    <script src="Event-handler.js"></script>
    <script>
        loadImage();
    </script>
</body>
</html>

<?php 
	if ($conn) {
		CloseCon($conn);
        
	} else {
		echo "Connection Failed";
	}
?>