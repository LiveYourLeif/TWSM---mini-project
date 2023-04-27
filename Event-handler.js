let topTextInput = document.getElementById("topText");
let bottomTextInput = document.getElementById("bottomText");
let filename;

/* The function applyTextToImage() draws a canvas ontop of the image the user has chosen
the function takes the user input chosen image and draws that onto the canvas. "topText" and "bottomText" are user inputs aswell
and it draws that text ontop of the image.
*/
function applyTextToImage() {
  let topText = document.getElementById("topText").value;
  let bottomText = document.getElementById("bottomText").value;
  let memeImage = document.getElementById("placeholder");
  let canvas = document.createElement("canvas");
  let ctx = canvas.getContext("2d");
  canvas.width = memeImage.width;
  canvas.height = memeImage.height;
  ctx.drawImage(memeImage, 0, 0);
  ctx.font = "40px Impact";
  ctx.fillStyle = "white";
  ctx.strokeStyle = "black";
  ctx.lineWidth = 2;
  ctx.textAlign = "center";
  ctx.textBaseline = "top";
  ctx.fillText(topText, canvas.width/2, 10);
  ctx.strokeText(topText, canvas.width/2, 10);
  ctx.textBaseline = "bottom";
  ctx.fillText(bottomText, canvas.width/2, canvas.height - 10);
  ctx.strokeText(bottomText, canvas.width/2, canvas.height - 10);

  memeImage.src = canvas.toDataURL();
}

  

function loadImage() {
let thumbnails = document.querySelectorAll('.grid-item img');   //select all the images in the grid
let placeholder = document.getElementById('placeholder');
    //we add an event listener to each of the thumbnail images. when the user presses on one 
    //of the images it extracts the filename from the 'data-image' attribute which we will use
    //to construct an ajax request to the script called 'load-image.php which loads the image
    //and returns the image.
let thumbnailArr = Array.from(thumbnails)
thumbnailArr.forEach(function(thumbnail) {
    thumbnail.addEventListener('click', function(){
        topTextInput.removeAttribute("readonly");
        bottomTextInput.removeAttribute("readonly");
        topTextInput.value = "";                //restore the user input when the user presses a new image
        bottomTextInput.value = "";             ////restore the user input when the user presses a new image
        filename = this.getAttribute('data-image');
        
        let xhr = new XMLHttpRequest();
        xhr.open('GET', 'load_image.php?filename=' + filename);     
        xhr.onload = function() {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);    // we convert JSON string response to a javascript object, and from there we can get the file type and the base64 string of the image
                let imgSrc = "data:" + response.mimeType + ";base64," + response.base64Image;
                placeholder.setAttribute('src', imgSrc);    //from the string we have created, we set the src of placeholder(where the images are shown) to the new string, which is a reference to the image the user has chosen
            }
            else {
                console.log('Error loading the image');
            }
        };
        xhr.send();
    });
});
}

/*
    The function storeMeme(), takes the user input topText, bottomText and the path to the chosen image and sends it to
    insert_data_to_table.php where the data can be stored in the database. 
*/
function storeMeme() {
    newMemePath = filename;     //filename is just the name of the image file the user has chosen
    let topText = document.getElementById("topText").value;
    let bottomText = document.getElementById("bottomText").value;
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'insert_data_to_table.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); //sets the value of a HTTP request header.
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log("data has been saved");
        }
        else{
            console.log("data was not saved unfortunately");
        }

    };
        //we send the data in a string to the server. The script insert_data_to_table.php can then retrieve the data for further use
    const data = `memePath=${newMemePath}&topText=${topText}&bottomText=${bottomText}`;
    xhr.send(data);
} 

/* 
    The function generateMeme simply runs the applyTextToImage function, which generates a canvas of the chosen image.
    the button called Generate has an onClick event, if that fires, then generateMeme functions runs.
    Lastly topTextInput and bottomTextInput are set to readonly, so that the user cannot change their input after
    the text has been generated and applied to the image (canvas).
*/ 
function generateMeme() {
    applyTextToImage();
    topTextInput.setAttribute("readonly", true);
    bottomTextInput.setAttribute("readonly", true);

  }