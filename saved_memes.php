<?php
include 'db_connection.php';
$conn = OpenCon();
if (!$conn) {
    die("Connection to database failed" . mysqli_connect_error());
}
?>
<?php
/* 
    rows are ordered by their timestamp in a descending order. note that createdAt stores the date and timestamp of when the image was created.
    LIMIT 1, picks the latest row and returns it, meaning the lates data that was sent to the database.
    if the database has at least one row, then we fetch the first row of the table and assign variables to the different columns
*/
$sql = "SELECT * FROM memes ORDER BY createdAt DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $memePath = $row['memePath'];
    $topText = $row['topText'];
    $bottomText = $row['bottomText'];
} else {
    echo "No memes found.";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Same css style is used for the showcase of stored meme as the front page -->
    <title>Saved meme</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class="logo-container">
        <img src="images/LogoDark.png">
    </div>

    <h2>Latest Meme Generated:</h2>
    <!--Displays the saved meme image-->
    <img id="memeImage" src="images/<?php echo $memePath; ?>" alt="Meme">

    <!-- The data that was retrieved from the database gets assingned to variables and we use them to 
    make a canvas from the image place the text upon the canvas. This almost the same function used in Event.handler.js script. We also
    make sure to wait before running the function because we want to make sure the image has loaded first-->
    <script>
        var memeImage = document.getElementById("memeImage");
        var topTextInput = "<?php echo $topText; ?>";
        var bottomTextInput = "<?php echo $bottomText; ?>";

        memeImage.onload = function () {
            var topText = topTextInput;
            var bottomText = bottomTextInput;
            var memeImage = document.getElementById("memeImage");
            var canvas = document.createElement("canvas");
            var ctx = canvas.getContext("2d");
            canvas.width = memeImage.width;
            canvas.height = memeImage.height;
            ctx.drawImage(memeImage, 0, 0);
            ctx.font = "40px Impact";
            ctx.fillStyle = "white";
            ctx.strokeStyle = "black";
            ctx.lineWidth = 2;
            ctx.textAlign = "center";
            ctx.textBaseline = "top";
            ctx.fillText(topTextInput, canvas.width / 2, 10);
            ctx.strokeText(topTextInput, canvas.width / 2, 10);
            ctx.textBaseline = "bottom";
            ctx.fillText(bottomTextInput, canvas.width / 2, canvas.height - 10);
            ctx.strokeText(bottomTextInput, canvas.width / 2, canvas.height - 10);
            console.log(canvas.width, canvas.height);
            memeImage.src = canvas.toDataURL();
        }
    </script>
</body>

</html>