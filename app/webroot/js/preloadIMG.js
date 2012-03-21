var preloadIMG = function(imageArray){
    
    var htmlString="", htmlObject = document.createElement("div"), htmlBody = document.getElementsByTagName("body")[0];
    for(var i = 0; i<imageArray.length; i++)
    {
        htmlString = htmlString+"<img src='images/"+imageArray[i]+"'>";
    }
    ;
    htmlObject.innerHTML  = htmlString;
    htmlBody.appendChild(htmlObject);
    htmlBody.removeChild(htmlObject);
}