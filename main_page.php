<?php
include 'db_connection.php';
$conn = OpenCon(); /* Opens connection to the data-base */
?>
<!DOCTYPE html>
<html>

<head>
    <title>Best Meme Generator</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class="logo-container">
        <img src="images/LogoDark.png">
    </div>
    <div class="container">
        <!--Creates two text fields for top- and bottom text-->
        <h2>Top Text</h2>
        <input type="text" id="topText" placeholder="Enter text here">
        <h2>Bottom Text</h2>
        <input type="text" id="bottomText" placeholder="Enter text here">
        <div class="centered" id="inputTopText"> </div>
        <div class="centered" id="inputBottomText"> </div>
        <!--Loads a placeholder image, whose src gets overridden by meme templates-->
        <img img id="placeholder" src="images/PlaceHolder.jpg" data-image="placeholder.jpg" alt="doesn't work">
        <!--Creates a button container with three buttons and adds their functionalities as on-click events-->
        <div class="button-container">
            <button class="generate-button" id="generateButton" onclick="generateMeme()">Generate</button>
            <button class="save-button" id=" saveButton" name="saveButton" onclick="storeMeme()">Save</button>
            <button class="storage-button" id="storageButton" name="storageButton"
                onclick="window.location.href='saved_memes.php'">Storage</button>
        </div>
    </div>
    <!--Creates a container with a grid of four meme templates-->
    <div class="meme-container">
        <h2>Choose meme template:</h2>
        <div class="grid-container">
            <div class="grid-item"><img src="images/spongebob.png" data-image="spongebob.png" alt="spongebob.png">
            </div>
            <!--We use the data-* attribute to store custom data, and also add alt attribute if the image does not load -->
            <div class="grid-item"><img src="images/videnskab.png" data-image="videnskab.png" alt="videnskab.png">
            </div>
            <div class="grid-item"><img src="images/toystory.png" data-image="toystory.png" alt="toystory.png"> </div>
            <div class="grid-item"><img src="images/fist.png" data-image="fist.png" alt="fist.png"> </div>
        </div>
    </div>
    <!-- .js file imported to call the loadImage function, which provides AJAX functionality to dynamically load memes  -->
    <script src="Event-handler.js"></script>
    <script>
        loadImage();
    </script>
</body>

</html>

<?php
/* close the connection in the end, if there is one */
if ($conn) {
    CloseCon($conn);

} else {
    echo "Connection Failed";
}
?>