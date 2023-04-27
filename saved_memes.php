<?php
include 'db_connection.php';
$conn = OpenCon();
if (!$conn) {
    die("Connection to database failed" .mysqli_connect_error());
}
?>
<?php
    $sql = "SELECT * FROM memes ORDER BY createdAt DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $memePath = $row['memePath'];
        $topText = $row['topText'];
        $bottomText = $row['bottomText'];
        //echo '<img src="images/' . $row['memePath'] . '" alt="Meme">';
        


    } else {
        echo "No memes found.";
    }
    
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Saved meme</title>
    <link rel="stylesheet" href="Test1.css">
</head>
<body>
    <div class="logo-container">
        <img src="images/LogoDark.png">
    </div>

    <h2>Latest Meme</h2>
    <img id="memeImage" src="images/<?php echo $memePath; ?>" alt="Meme">


    
    <script>
        var memeImage = document.getElementById("memeImage");
        var topTextInput = "<?php echo $topText; ?>";
        var bottomTextInput = "<?php echo $bottomText; ?>";
        

        memeImage.onload = function() {
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
            ctx.fillText(topTextInput, canvas.width/2, 10);
            ctx.strokeText(topTextInput, canvas.width/2, 10);
            ctx.textBaseline = "bottom";
            ctx.fillText(bottomTextInput, canvas.width/2, canvas.height - 10);
            ctx.strokeText(bottomTextInput, canvas.width/2, canvas.height - 10);
            console.log(canvas.width, canvas.height);
            memeImage.src = canvas.toDataURL();
        }

        // applyTextToStoredMeme();

        
    </script>
</body>
</html>



