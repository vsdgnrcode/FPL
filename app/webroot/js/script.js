//----Preload Image----
include('js/preloadIMG.js');
//----jquery-plagins----
include('js/jquery-1.6.4.min.js');
include('js/jquery.twitter.js');
include('js/jquery.animate-colors-min.js');
include('js/jquery.easing.js');
include('js/jquery.transform-0.9.3.min.js');
include('js/jquery-ui-1.8.11.custom.min.js');
//----Menu+ContentSwitcher----
include('js/superfish.js');
include('js/content_switch.js');
//----contact form----
//include('js/forms.js');
//----google map----
//include('js/googleMap.js');
//----over button----
//include('js/over-buttons.js');
//----cufon----
//include('js/cufon-yui.js');
//include('js/Sharp_Distress_Black_400.js');
//include('js/cufon-replace.js');
//----fancybox----
include('js/jquery.fancybox-1.3.4.pack.js');
//----All-Scripts----
include('js/main.js');
//----Include-Function----
function include(url){ 
  document.write('<script src="'+ url + '" type="text/javascript" ></script>'); 
  return false ;
}