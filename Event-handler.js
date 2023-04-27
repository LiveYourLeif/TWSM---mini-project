let topTextInput = document.getElementById("topText");
let bottomTextInput = document.getElementById("bottomText");
let filename;


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
let thumbnails = document.querySelectorAll('.grid-item img');   //select all the images
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
        topTextInput.value = "";
        bottomTextInput.value = "";
        filename = this.getAttribute('data-image');
        console.log(filename);
        let xhr = new XMLHttpRequest();
        xhr.open('GET', 'load_image.php?filename=' + filename);
        xhr.onload = function() {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                let imgSrc = "data:" + response.mimeType + ";base64," + response.base64Image;
                placeholder.setAttribute('src', imgSrc);
            }
            else {
                console.log('Error loading the image');
            }
        };
        xhr.send();
    });
});
}

function storeMeme() {
    newMemePath = filename;
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
    const data = `memePath=${newMemePath}&topText=${topText}&bottomText=${bottomText}`;
    xhr.send(data);
} 
/* function memePath () {
const memeImage = document.getElementById("placeholder");
  const imagePath = memeImage.getAttribute("data-image");
  return imagePath;
} */


function generateMeme() {
    applyTextToImage();
    topTextInput.setAttribute("readonly", true);
    bottomTextInput.setAttribute("readonly", true);
    
  }

function showSavedImage() {
    applyTextToImage();
}

