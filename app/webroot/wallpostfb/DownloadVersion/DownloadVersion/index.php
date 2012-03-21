<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wall Script : Facebook & Google+ Clone Script</title>

<meta name="Description" content="facebook wall script">
<meta name="Keywords" content="facebook clone,jquery wall script,wall script,facebook news feed,google plus wall,facebook comments,facebook postings,facebook wall,facebook script,">

<!--[if lt IE 7.]>

<script defer type="text/javascript" src="pngfix.js"></script>

<![endif]-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>  
<script src="fb/jquery.elastic.js" type="text/javascript" charset="utf-8"></script>
<script src="fb/jquery.watermarkinput.js" type="text/javascript"></script>
<script src="fb/jquery.livequery.js" type="text/javascript"></script>
<script src="jquery.form.js" type="text/javascript"></script>
<script src="ie-fixs.js" type="text/javascript"></script>
<script src="core.js" type="text/javascript"></script>
<script src="wallscript.js" type="text/javascript"></script>
<script src="javascript.js" type="text/javascript"></script>

<script>
function toggle(div_id) {
var el = document.getElementById(div_id);
if ( el.style.display == 'none' ) {	el.style.display = 'block';}
else {el.style.display = 'none';}
}
function blanket_size(popUpDivVar) {
if (typeof window.innerWidth != 'undefined') {
viewportheight = window.innerHeight;
} else {
viewportheight = document.documentElement.clientHeight;
}
if ((viewportheight > document.body.parentNode.scrollHeight) && (viewportheight > document.body.parentNode.clientHeight)) {
blanket_height = viewportheight;
} else {
if (document.body.parentNode.clientHeight > document.body.parentNode.scrollHeight) {
blanket_height = document.body.parentNode.clientHeight;
} else {
blanket_height = document.body.parentNode.scrollHeight;
}
}
var blanket = document.getElementById('blanket');
blanket.style.height = blanket_height + 'px';
var popUpDiv = document.getElementById(popUpDivVar);
popUpDiv_height=blanket_height/2-150; 
//// 150 is half popups height 
popUpDiv.style.top = getPageScroll2()[1] + (getPageHeight2() / 10);
}
function window_pos(popUpDivVar) {

if (typeof window.innerWidth != 'undefined') {
viewportwidth = window.innerHeight;
} else {
viewportwidth = document.documentElement.clientHeight;
}
if ((viewportwidth > document.body.parentNode.scrollWidth) && (viewportwidth > document.body.parentNode.clientWidth)) {
window_width = viewportwidth;
} else {
if (document.body.parentNode.clientWidth > document.body.parentNode.scrollWidth) {
window_width = document.body.parentNode.clientWidth;
} else {
window_width = document.body.parentNode.scrollWidth;
}
}
var popUpDiv = document.getElementById(popUpDivVar);
window_width=window_width/2-350;
//150 is half popup's width
popUpDiv.style.top = getPageScroll2()[1] + (getPageHeight2() / 10)+'px';
popUpDiv.style.left = window_width + 'px';

}
function popup(windowname) {
//(windowname);
window_pos(windowname);
//toggle('blanket');
toggle(windowname);		
}

// getPageScroll() 
function getPageScroll2() {
var xScroll, yScroll;
if (self.pageYOffset) {
yScroll = self.pageYOffset;
xScroll = self.pageXOffset;
} else if (document.documentElement && document.documentElement.scrollTop) {	 // Explorer 6 Strict
yScroll = document.documentElement.scrollTop;
xScroll = document.documentElement.scrollLeft;
} else if (document.body) {// all other Explorers
yScroll = document.body.scrollTop;
xScroll = document.body.scrollLeft;
}
return new Array(xScroll,yScroll)
}

// Adapted from getPageSize() by quirksmode.com
function getPageHeight2() {
var windowHeight
if (self.innerHeight) {	// all except Explorer
windowHeight = self.innerHeight;
} else if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
windowHeight = document.documentElement.clientHeight;
} else if (document.body) { // other Explorers
windowHeight = document.body.clientHeight;
}
return windowHeight
}

function EnableButton()
{
$('.gbutton').css('opacity', '1');	
}

</script>
<link href="wall.css" type="text/css" rel="stylesheet" />
<link type="text/css" href="fb/stylesheet.css" rel="stylesheet">

</head>
<body>
<div align="center">
<div style="width:485px; margin-top:10px; padding:5px;">
<br clear="all">

<div class="UIComposer_Box">
<textarea id="watermark" class="input"  placeholder="What's on your mind?" cols="60" style="min-height: 58px; color:#777;background-color:#fff; border-width: 0;
font-size: 13px; height: 16px; margin: 0; border: 0;outline: 0; width:460px; overflow: hidden;" wrap="hard" name="watermark"></textarea>

<input type="hidden" name="keepID" id="keepID" value="1" />
<input type="hidden" name="posted_on" id="posted_on" value="1" />
<div align="right"><img src="media.ico" width="20" alt="" id="uploadMedia" style="cursor:pointer" />  
<img src="link.png" width="20" alt="" onclick="alert('URL extracting module is not available in this demo version.')" style="cursor:pointer" />&nbsp;&nbsp;
</div>
</div>
<div class="wrap" align="center" id="show_img_upload_div" style="padding-top:10px; display:none">
<div align="left" >

<form action="ajax_image_uploading.php" id="ajaxuploadfrm" method="post" enctype="multipart/form-data" >
<b>Select an image (Maximum 1mb). Video uploading is now allowed in this version.</b>
<br /><input type="file" name="current_image" id="current_image" />
</form>
<br />
<div id="showthumb">
</div>

<div id="shareImageDiv" align="left" style="display:none">
<br clear="all" />
<div style=" margin-bottom:10px ; margin-right:0px;" class="gbuttonnew ">
<div role="button" class="gbutton" aria-disabled="true" style="-webkit-user-select: none; opacity:1 " id="shareImageButton">Share</div>
</div>
</div>
</div>

</div>

<div align="left" style="height:30px; margin-top:4px;" class="main_bar">
<div style=" margin-bottom:10px ; margin-right:0px;" class="m-o-q-ba-r ">
<div role="button" class="gbutton" aria-disabled="true" style="-webkit-user-select: none; " id="shareButtons">Share</div>
</div>    
</div>

<br clear="all"><br clear="all">

<div id="loadpage" style="display:none;"></div>

</div>

</div>

<div id="popUpDiv" style="display:none;"> 
<a href="javascript:;" onclick="popup('popUpDiv')"><img border="0" src="hide.png" alt="Close" title="Close" /></a> 
<div>
<span></span>
<div id="comment_part"></div>
</div>

</div>
<script>
//showCommentBox
$('a.showCommentBox').livequery("click", function(e){

var getpID =  $(this).attr('id').replace('post_id','');	
//$('.commentBox').hide();

$("#commentBox-"+getpID).css('display','');
$("#commentMark-"+getpID).focus();
$("#commentBox-"+getpID).children("img.CommentImg").show();			
//$("#commentBox-"+getpID).children("a#SubmitComment").show();		
});	

</script>

</body>
</html>