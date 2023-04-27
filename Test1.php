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
        <input type="text" id="topText"
            placeholder="Enter text here">
        <h2>Bottom Text</h2>
        <input type="text" id="bottomText"
            placeholder="Enter text here">
        <div class="centered" id="inputTopText"> </div>
        <img img id="placeholder" src="images/PlaceHolder.jpg" data-image="placeholder.jpg" alt="shit aint work">
        <div class="centered" id="inputBottomText"> </div>
        <div class="button-container">
            <button class="generate-button" onclick="generateMeme()" >Generate</button>
            <button class="share-button" id=" saveButton" name="saveButton" onclick="storeMeme()" >Save</button>
            <button class="storage-button" id="storageButton" name="storageButton" onclick="window.location.href='meme_storage.php'">Storage</button>
        </div>
    </div>
    <div class="meme-container">
        <h2>Choose meme template:</h2>
        <div class="grid-container">
            <div class="grid-item"><img src="images/spongebob.png" data-image="spongebob.png" alt="spongebob.png"> </div>
            <!--we use the data-* attribute to store cutom data, and also add alt attribute if the image does not load -->
            <div class="grid-item"><img src="images/videnskab.png" data-image="videnskab.png" alt="videnskab.png"> </div>
            <div class="grid-item"><img src="images/toystory.png" data-image="toystory.png" alt="toystory.png"> </div>
            <div class="grid-item"><img src="images/fist.png" data-image="fist.png" alt="fist.png"> </div>
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