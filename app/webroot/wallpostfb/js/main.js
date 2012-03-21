$(document).ready(function(){
	preloadIMG(["webSiteLoaderEnd.gif", "relover.gif"])
	$(window).load(function(){
		var MSIE = ($.browser.msie) && ($.browser.version <= 8);
		
    	$("#contact-us>.box_2>ul>li>a").overButtons({onLoadWebSite: true});
    	
		$(".fancyBoxOver").each(function(e){
			$(this).prepend("<div class='zoomOverImg'></div>");
			$(this).find(".zoomOverImg").fadeTo(0, 0);
		}).hover(overImgHandle, outImgHandler).fancybox({'speedIn'  : 300, 'speedOut'  : 300});
				
		function overImgHandle(){
			$(this).find(".zoomOverImg").stop().fadeTo(500, 0.5);
		}
		function outImgHandler(){
			$(this).find(".zoomOverImg").stop().fadeTo(500, 0);
		}
    	
    	
    	
		//menu
	 	var content=$("section"),
	  		nav=$("#splashMenu"),
	  		navPage=$("#pageMenu"),
	  		animationState = true,
	  		timerId;
 			
	   	$('#splashMenu>ul').superfish({
	   		hoverClass: "sfHover",
	     	delay:       100,
	      	speed:       400,
	       	autoArrows:  false,
	        dropShadows: true,
			onInit: function(){
				$("#splashMenu>ul>li>a").each(function(index){
					if(index%2==0){
						$(this).prepend("<div class='menuPart1'></div>")
					}else{
						$(this).prepend("<div class='menuPart2'></div>")
					}
				})
				navPage.stop(true).css({top:"250px", opacity:0}, 0)
	 		}
	   });
           $('#topsplashMenu>ul').superfish({
	   		hoverClass: "sfHover",
	     	delay:       100,
	      	speed:       400,
	       	autoArrows:  false,
	        dropShadows: true,
			onInit: function(){
				$("#splashMenu>ul>li>a").each(function(index){
					if(index%2==0){
						$(this).prepend("<div class='menuPart1'></div>")
					}else{
						$(this).prepend("<div class='menuPart2'></div>")
					}
				})
				navPage.stop(true).css({top:"250px", opacity:0}, 0)
	 		}
	   });
	  	nav.navs({
	  		useHash:true,
	  		hoverIn:function(li){
	  			if(animationState==false){
 					 li.find(">a").prepend("<img class='overImage' src='images/relover.gif'>");
                                         li.find(">a").css({color:"#000", opacity:1}, 0);

		 			if(!MSIE){	 				
						li.find("a").stop(true).animate({scale:0.8, rotate:Math.round(Math.random()*30-15)}, 200, "easeInOutCubic").animate({scale:1, rotate:0, "left":0}, 800, "easeOutElastic")
		 			}
				 	li.find("div").stop(true).fadeTo(400, 0);	
			 	}
	 		},
	  		hoverOut:function (li){
	  			if(animationState==false){
 			 		if (!li.hasClass('with_ul') || !li.hasClass('sfHover')) {
		 			 	li.find(".overImage").remove();
	 					if(!MSIE){
							li.find("a").stop(true).animate({scale:0.8, rotate:Math.round(Math.random()*30-15)}, 200, "easeInOutCubic").animate({scale:1, rotate:0, "left":0}, 800, "easeOutElastic")
 						}
	 					li.find("div").stop(true).fadeTo(600, 1);	
	 				}
		 		}
	 		},
	  		hover:true
	  	}) 	
	  	
		$('#pageMenu>ul').superfish({
	   		hoverClass: "sfHover",
	     	delay:       100,
	      	speed:       400,
	       	autoArrows:  false,
	        dropShadows: false,
	        onInit: function(){
       			$('#pageMenu>ul>li>a').each(function(index){
	        		var textClone = $(this).find(">div").clone();
	        		$(this).find(">div").addClass("overText");
					$(this).prepend(textClone);
					textClone.addClass("outText");
				})
				Cufon.replace("#pageMenu a>div", {fontFamily: "Sharp Distress"});        	
	        }
	   });
	   navPage.navs({
	  		useHash:true,
	  		hoverIn:function(li){
			 	li.find(">a").prepend("<img class='overImage' src='images/relover.gif'>");
	 			if(!MSIE){	
	 				li.find(".overText").fadeTo(300,0);
					li.find(">a").stop(true).animate({scale:0.8, rotate:Math.round(Math.random()*30-15)}, 200, "easeInOutCubic").animate({scale:1, rotate:0}, 800, "easeOutElastic");
	 			}else{
					li.find(".overText").css({"visibility":"hidden"});
				}
	 		},
	  		hoverOut:function (li){
		 		if (!li.hasClass('with_ul') || !li.hasClass('sfHover')) {
	 			 	li.find(".overImage").remove();
 					if(!MSIE){
 						li.find(".overText").fadeTo(300,1);
						li.find(">a").stop(true).animate({scale:0.8, rotate:Math.round(Math.random()*30-15)}, 200, "easeInOutCubic").animate({scale:1, rotate:0}, 800, "easeOutElastic");
 					}else{
 						li.find(".overText").css({"visibility":"visible"});
 					}	
 				}
	 		},
	  		hover:true
	  	})
	  	
	  	
	  	
	  	
	   	$(window).bind("hashchange", changeSiteHash);
	  	function changeSiteHash(){
	  		animationState = true;
	  		if(window.location.hash != "" && window.location.hash != "#"){
	  			if(window.location.hash =="#!/splash") {
					$("#splashMenu>ul>li").each(function(index){
						navPage.stop(true).animate({top:"250px", opacity:0}, 600, "easeInBack");
						if(index%2==0){
							$(this).find("a").css({visibility:"visible", "left":-$(window).width()}).stop().delay(300+index*50).animate({"left":0}, 800, "easeOutBack");
							
						}else{
							$(this).find("a").css({visibility:"visible", "left":$(window).width()}).stop().delay(300+index*50).animate({"left":0}, 800, "easeOutBack");
						}
					})
                                        $("#topsplashMenu>ul>li").each(function(index){
						navPage.stop(true).animate({top:"250px", opacity:0}, 600, "easeInBack");
						if(index%2==0){
							$(this).find("a").css({visibility:"visible", "left":-$(window).width()}).stop().delay(300+index*50).animate({"left":0}, 800, "easeOutBack");

						}else{
							$(this).find("a").css({visibility:"visible", "left":$(window).width()}).stop().delay(300+index*50).animate({"left":0}, 800, "easeOutBack");
						}
					})
					setTimeout(function(){
						animationState = false;
						console.log("ads")
					}, 1000)
	  			}else{
					$("#splashMenu>ul>li").each(function(index){
                                                $(this).find("div").stop().delay(index*50).animate({"left":-$(window).width()}, 500, "easeInCubic", function(){$(this).css({visibility:"hidden"})});

						if(index%2==0){
							$(this).find("a").stop().delay(index*50).animate({"left":-$(window).width()}, 500, "easeInCubic", function(){$(this).css({visibility:"hidden"})});
						}else{
							$(this).find("a").stop().delay(index*50).animate({"left":$(window).width()}, 500, "easeInCubic", function(){$(this).css({visibility:"hidden"})});
						}
						navPage.stop(true).delay(600).animate({top:"-63px", opacity:1}, 600, "easeOutBack");
					})
                                        
	  			}
	  		}
	 	}
	  	nav.navs(function(n, _){
	   			content.cont_sw(n);
	  	});
	  	//content switch
	  	content.cont_sw({
	  		showFu:function(){
	  			nav.find(">ul>li>a").stop(true);
	  			nav.find(">ul>li>a").animate({scale:1, rotate:0},0);
	  			setTimeout(function(){navPage.find(">ul>li>a").stop(true, true).animate({scale:1, rotate:0}, 0, "easeOutCubic");}, 10)
	  			
	  			var _=this;	
	  			$.when(_.li).then(function(){	
	  				_.next.css({display:'block', left:-2000}).stop().animate({left:"0px"}, 600, 'easeOutCubic', function(){animationState = false;});	
	  			});
	  		},
	  		hideFu:function(){
				var _=this;
				_.li.stop().animate({left:2000},600, 'easeInCubic', function(){
					_.li.not(_.next).css({display:'none'} ); 	
				})
	  		},
	  		preFu:function(){
	  			var _=this;
	  			_.li.css({position:'absolute', display:'none'});
	  		}
	  	});
	  	nav.navs(0); 	
    	
	 	setTimeout(hideSpinner, 500)
	 		function hideSpinner (){
	 			$("#spinner").css({"background": "#c35757 url('images/webSiteLoaderEnd.gif') center no-repeat"}).delay(800).fadeOut(800);
 		}	
   	});
})