var upload = document.getElementById('upload');
var image = document.getElementById('image');

function uploadImage(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            image.setAttribute('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
};

$("#upload").change(function(){
    uploadImage(this);
});

function applyMyNostalgiaFilter() 
{   
    var filter = 'saturate(40%) grayscale(100%) contrast(45%) sepia(100%)';
    image.style.filter = filter;
    image.style.webkitFilter = filter;
};

function applyGrayscaleFilter() 
{   
    var filter = 'grayscale(100%)';
    image.style.filter = filter;
    image.style.webkitFilter = filter;
};

function revertToOriginal() 
{   
    var filter = '';
    image.style.filter = filter;
    image.style.webkitFilter = filter;
};

function submit()
{
     // Read values from form
    var title = document.getElementById("title").value;
    var text = document.getElementById("text").value;

    // Save filtered image in a variable
    var filteredImage = image;

    // Manipulate DOM:
    // 1. Clean up (remove) old stuff
    var parent = form.parentElement;
    while (form.firstChild) {
        form.removeChild(form.firstChild);
    }
        
    // 2. Make room for new stuff: formatted title & text + filtered image
    parent.innerHTML = '<h2>' + title + '</h2><p>' + text + '</p>';
    parent.appendChild(filteredImage);   
}

function checkForNumbers(str)
{
    var len = str.length();
    var areNumbers = true;
    for(int i = 0; i < len; i++)
    {
        if(!(str.charAt(i) == "1" || str.charAt(i) == "2" || str.charAt(i) == "3" ||
           str.charAt(i) == "4" || str.charAt(i) == "5" || str.charAt(i) == "6" || 
           str.charAt(i) == "7" || str.charAt(i) == "8" || str.charAt(i) == "9" || 
           str.charAt(i) == "0"))
        {
            areNumbers = false;
            break;
        }
    }
    return areNumbers;
}

function logIn()
{
    var password = document.getElementById("password").value;
    if(password.startsWith("Z") && checkForNumbers(password.substr(1)))         //does not check for username yet, or check on database
    {
                                                    //Load new webpage
    }
    else
    {
        window.alert("Wrong Username/Password");    //This is a temporary alert, 
                                                    //should be replaced with a text 
                                                    //field below the username and password text boxes
                                                    //or log in button
    }
}
