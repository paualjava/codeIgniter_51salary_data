// JavaScript Document
$(function(){

		$('#slides,#slides2').slides({
			preload: true,
			preloadImage: 'img/loading.gif',
			play: 10000,
			pause: 2500,
			hoverPause: true,
			animationStart: function(){
				$('.caption').animate({
					bottom:-35
				},100);
			},
			
			
			animationComplete: function(current){
				$('.caption').animate({
					bottom:0
				},200);
			
			}
		});
		
		/*$("#myTab0").on("click", "li", function(){
			var i = $(this).index(), tag = $(this)[0];
			nTabs && nTabs(tag, i, function(tag){
				var slide = $(tag).find(".J-slides");
				if (slide.length == 0)return;
				if (typeof slide.data("loaded") == "undefined") {
					slide.slides({
						preload: true,
						preloadImage: 'img/loading.gif',
						play: 5000,
						pause: 2500,
						hoverPause: true,
						animationStart: function(){
							$('.caption').animate({
								bottom:-35
							},100);
						},
						
						animationComplete: function(current){
							$('.caption').animate({
								bottom:0
							},200);
							
						}
					});
					slide.data("loaded", 1);
				}
			})
		});
		$("#myTab0").find("li:first").click();*/
	});