$(document).ready(function(){
	$.fn.overButtons = function(thisItem){
		$(this).each(function(e){
			var item =$(this),
				srcItem,
				widthItem,
				heightItem,
				imgItem = item.find("img"),
				idPage,
				MSIE = ($.browser.msie) && ($.browser.version <= 8);
				
			if(thisItem.onLoadWebSite == false || thisItem.onLoadWebSite == undefined){
				verificationPageHandler();	
				$(window).bind("hashchange", verificationPageHandler);
			}else{
				init();
			}
			function verificationPageHandler(){
  				idPage = "#"+window.location.hash.substring(3, window.location.hash.length);
        		if(idPage != "#"){
					if(item.parents(idPage).length != 0){
						setTimeout(init,700)
					}
				}
			}			
		 	function init(){
				srcItem = imgItem.attr("src");
				widthItem = imgItem.width();
				heightItem = imgItem.height();
				imgItem.remove();
				item.css({width:(widthItem), height:(heightItem/2),"display": "block"});
				item.append("<div class='outIcon' style='position:absolute; display:block; width:"+widthItem+"px; height:"+(heightItem/2)+"px; background:transparent url("+srcItem+") no-repeat;'></div>");
				item.append("<div class='overIcon' style='position:absolute; display:block; width:"+widthItem+"px; height:"+(heightItem/2)+"px; background:transparent url("+srcItem+") 0 "+(-heightItem/2)+"px no-repeat;'></div>");
				item.hover(overHandler, outHandler);
				
				if(!MSIE){
					item.find(".overIcon").animate({scale:0}, 0)
				}else{
					item.find(".overIcon").css({"visibility":"hidden"})
				}
				
				function overHandler(){
					if(!MSIE){
						$(this).find(".overIcon").stop().animate({scale:1}, 500, "easeOutCubic")
						$(this).find(".outIcon").stop().animate({scale:0}, 500, "easeOutCubic")
					}else{
						item.find(".overIcon").css({"visibility":"visible"})
						item.find(".outIcon").css({"visibility":"hidden"})
					}
					
				}
				function outHandler(){
					if(!MSIE){
						$(this).find(".overIcon").stop().animate({scale:0}, 500, "easeOutCubic")
						$(this).find(".outIcon").stop().animate({scale:1}, 500, "easeOutCubic")
					}else{
						item.find(".overIcon").css({"visibility":"hidden"})
						item.find(".outIcon").css({"visibility":"visible"})
					}
				}
			}
		})
	
	}
})