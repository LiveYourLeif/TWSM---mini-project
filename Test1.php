<?php
include 'db_connection.php';
$conn = OpenCon();
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Website</title>
	<link rel="stylesheet" href="Test1.css">
	<meta charset="UTF-8">
</head>
<body>
    <div class="logo-container">
        <img src="LogoDark.png">
    </div>
	<div>
		<img id="drake" src="Drake-Hotline-Bling.jpg"/>
	</div>
	<div class="container">
		<div class="left-container">
			<h2>Top Text</h2>
			<input type="text" placeholder="Enter top text here">
			<h2>Bottom Text</h2>
			<input type="text" placeholder="Enter bottom text here">
                  <div class="controls">
                      <button id="thisButton" class="generate-button" onclick="loadDoc()">Generate Meme</button>
                      <button class="share-button">Share Meme</button>
                  </div>
		</div>
		<div class="right-container">
			<img src="https://via.placeholder.com/500x500" alt="Arbitrary Image" class="image">
		</div>
	</div>
	<script src="data-html.js"></script>
</body>
</html>

<?php 
	if ($conn) {
		CloseCon($conn);
	} else {
		echo "Connection Failed";
	}
?>