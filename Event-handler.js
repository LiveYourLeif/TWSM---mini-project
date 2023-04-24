function loadImage() {
let thumbnails = document.querySelectorAll('.grid-item img');   //select all the images
console.log(thumbnails);
let placeholder = document.getElementById('placeholder');
    //we add an event listener to each of the thumbnail images. when the user presses on one 
    //of the images it extracts the filename from the 'data-image' attribute which we will use
    //to construct an ajax request to the script called 'load-image.php which loads the image
    //and returns the image.
let thumbnailArr = Array.from(thumbnails)
thumbnailArr.forEach(function(thumbnail) {
    thumbnail.addEventListener('click', function(){
        let filename = this.getAttribute('data-image');
        let xhr = new XMLHttpRequest();
        xhr.open('GET', 'load_image.php?filename=' + filename);
        xhr.onload = function() {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                let imgSrc = "data:" + response.mime_type + ";base64," + response.base64_image;
                placeholder.setAttribute('src', imgSrc);
                console.log("this is image src:" + imgSrc)
                //placeholder.setAttribute('src', "images/" + filename)
                console.log("Image Replaced with "+filename);
            }
            else {
                console.log('Error loading the image');
            }
        };
        xhr.send();
    });
});
}