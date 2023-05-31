jQuery(document).ready(function($){
	
	function shuffle(array) { //Shuffle an array in place
		var m = array.length, t, i;
		
		// While there remain elements to shuffle…
		while (m) {
		
		  // Pick a remaining element…
		  i = Math.floor(Math.random() * m--);
		
		  // And swap it with the current element.
		  t = array[m];
		  array[m] = array[i];
		  array[i] = t;
		}
		
		return array;
	}
	// IS USER TABBING 
	function handleFirstTab(e) {
	    if (e.keyCode === 9) { // the "I am a keyboard user" key
	        document.body.classList.add('user-is-tabbing');
	        window.removeEventListener('keydown', handleFirstTab);
	    }
	}
	window.addEventListener('keydown', handleFirstTab);
	
	$('table').each(function(){
		l = $(this).find('.header_row th').length;
		if (l == 2){
			$(this).find('td').css('width', '50%');
		}
	});
		
	acmainw = $('#aircraft-intro .col-md-6:first-child').width();
	$('#aircraft-intro .col-md-6:first-child').height(acmainw);

	if($('.cta-copy-block').length > 0){
		$('.cta-copy-block a').hover(
		function(){
			$(this).parent().parent().find('.cta-image-container').width('100%').addClass('no-overlay');
			$(this).prev().prev().css('color','#fff');
			$(this).prev().css('color','#fff');
		}, function() {
			$(this).parent().parent().find('.cta-image-container').width('50%').removeClass('no-overlay'); 
			$(this).prev().prev().css('color','#15173f');
			$(this).prev().css('color','#15173f');
		});
	}
	
	$('input[type=radio]').on('change', function(){
		$(this).parent().parent().toggleClass('switched');
	});
	
	function asa_slider_placement(){
		$('.asa_aircraft[asa-tab-index="2"]').attr('asa-placement', 'center');
		$('.asa_aircraft[asa-tab-index="3"]').attr('asa-placement', 'firstright');
		$('.asa_aircraft[asa-tab-index="4"]').attr('asa-placement', 'secondright');
		$('.asa_aircraft[asa-tab-index="1"]').attr('asa-placement', 'firstleft');
		$('.asa_aircraft[asa-tab-index="5"]').attr('asa-placement', 'secondleft');
	}
	asa_slider_placement();	
	
	$('.next_ac_btn').on('click', function(){
		count = $('.featured-aircrafts .asa_aircraft').length;
		$('.featured-aircrafts .asa_aircraft').each(function(){
			oldindex = $(this).attr('asa-tab-index');
			if (oldindex < count){
				newindex = parseInt(oldindex) + 1;
			} else {
				newindex = 1;
			}
			$(this).attr('asa-tab-index', newindex);
			asa_slider_placement();
		});
	});	
	$('.prev_ac_btn').on('click', function(){
		count = $('.featured-aircrafts .asa_aircraft').length;
		$('.featured-aircrafts .asa_aircraft').each(function(){
			oldindex = $(this).attr('asa-tab-index');
			if (oldindex > 1){
				newindex = parseInt(oldindex) - 1;
			} else {
				newindex = count;
			}
			$(this).attr('asa-tab-index', newindex);
			asa_slider_placement();
		});
	});
	
	//MOVE UP THE HOMEPAGE SLIDER
	/*dif = $('.home .asa_aircraft[asa-placement="center"]').height();
	moveup = parseInt(-dif * .125);
	$('.home .aircraft--slider').css('margin-top',moveup);
	$('.home .featured-aircrafts').height(dif);*/
	
	var position = $(window).scrollTop(); 
	
    $(window).on('scroll', function () {
	    var scroll = $(window).scrollTop();
		var limit = $(window).height() * .50;
        if($(window).scrollTop() > limit) { 
	        if(scroll < position){
		        $("header").removeClass('scrolled');
	        } else {
		        $("header").addClass('scrolled'); 
	        }
	        position = scroll;			   
        } else {                  
			$("header").removeClass('scrolled');               
        }
              
    });
    
    	if($('.tst-slider-section').length > 0) {
		active = $('.tst-carousel-item.active');
		prev = $('.tst-carousel-item.active').prev();
		next = $('.tst-carousel-item.active').next();
		
		active.attr('tst-placement', 'center');
		prev.attr('tst-placement', 'left');
		next.attr('tst-placement', 'right');		
		
		function tst_slider_placement(){
			$('.tst-carousel-item').attr('tst-placement', 'none');
			$('.tst-carousel-item[tst-index="2"]').attr('tst-placement', 'center').addClass('active');
			$('.tst-carousel-item[tst-index="1"]').attr('tst-placement', 'left');
			$('.tst-carousel-item[tst-index="3"]').attr('tst-placement', 'right');
		}
		tst_slider_placement();			
		
		setInterval(function(){
			
			count = $('.tst-carousel-item').length;		
			oldindex = active.attr('tst-placement');
			
			$('.tst-carousel-item').each(function(){
				oldindex = $(this).attr('tst-index');
				if (oldindex > 1){
					newindex = parseInt(oldindex) - 1;
				} else {
					newindex = count;
				}
				$(this).attr('tst-index', newindex).removeClass('active');
				tst_slider_placement();
			});
			
		}, 5000);
	}
	
    $(window).load(function() {
  	    	
    	if($('#tab-gallery').length > 0){
			var speed = 0;
			var scroll = 0;
			var container = $('#tab-gallery');
			var container_w = $(window).width();
			var max_scroll = container[0].scrollWidth - container_w;
			
			container.on('mousemove', function(e) {
			    var mouse_x = e.pageX - container.parent().offset().left;

			    var mouseperc = 100 * mouse_x / container_w;

			    speed = mouseperc - 50;

			}).on ( 'mouseleave', function() {
				$("#aircraft-specs .row").removeClass('paused');
			    if(speed == 0){
				    speed = 0;
			    }else if (scroll < max_scroll) {
					speed = 0;
				} else {
					speed = 0;
				}
			});
			
			function updatescroll() {
				if (speed !== 0) {
					if(speed > 30){$('#aircraft-specs .container-fluid .row').addClass('goingright').removeClass('goingleft goingleftdouble goingrightdouble paused'); scroll += speed / 5;}
					if(speed < -30){$('#aircraft-specs .container-fluid .row').addClass('goingleft').removeClass('goingright goingleftdouble goingrightdouble paused'); scroll += speed / 5;}
					if(speed > 40){$('#aircraft-specs .container-fluid .row').addClass('goingrightdouble').removeClass('goingleftdouble goingright goingleft paused'); scroll += speed / 5;}
					if(speed < -40){$('#aircraft-specs .container-fluid .row').addClass('goingleftdouble').removeClass('goingrightdouble goingright goingleft paused'); scroll += speed / 5;}
					if(speed >= -30 && speed <= 30){$('#aircraft-specs .container-fluid .row').addClass('paused').removeClass('goingright goingleft goingleftdouble goingrightdouble'); scroll += 0;}
			    	
			        if (scroll < 0) scroll = 0;
			        if (scroll > max_scroll){
				       $('.gallery_block').clone().appendTo( "#tab-gallery" );
				       animatehomegalleryimages();
				       max_scroll = container[0].scrollWidth - container_w;				       
			        } //scroll = max_scroll;
			        
				        $('#tab-gallery').parent().scrollLeft(scroll);   		
			    }
			    window.requestAnimationFrame(updatescroll);
			}
			window.requestAnimationFrame(updatescroll);
		}   
    		
    });

	$(window).load(function() {
		if($('.gallery-inner').length > 0){
			var speed = 0;
			var scroll = 0;
			var container = $('#tab-gallery');
			var container_w = $(window).width();
			var max_scroll = container[0].scrollWidth - container_w;
			
			container.on('mousemove', function(e) {	
			    var mouse_x = e.pageX - container.parent().offset().left;
			    var mouseperc = 100 * mouse_x / container_w;
			    speed = mouseperc - 50;
			}).on ( 'mouseleave', function() {
				$(".gallery-section .row").removeClass('paused');
				if (scroll < max_scroll) {
					speed = 5;
				} else {
					speed = -5;
				}
			});
			
			function updatescroll() {
					if (speed !== 0) {
						if(speed > 30){$('.gallery-section .row').addClass('goingright').removeClass('goingleft goingleftdouble goingrightdouble paused');scroll += speed / 5;}
						if(speed < -30){$('.gallery-section .row').addClass('goingleft').removeClass('goingright goingleftdouble goingrightdouble paused');scroll += speed / 5;}
						if(speed > 40){$('.gallery-section .row').addClass('goingrightdouble').removeClass('goingleftdouble goingright goingleft paused');scroll += speed / 5;}
						if(speed < -40){$('.gallery-section .row').addClass('goingleftdouble').removeClass('goingrightdouble goingright goingleft paused');scroll += speed / 5;}
			    		if(speed >= -30 && speed <= 30){$('.gallery-section .row').addClass('paused').removeClass('goingright goingleft goingleftdouble goingrightdouble'); scroll += 0;}
			    		//scroll += speed / 5;
			    	if (scroll < 0) scroll = 0;
			        if (scroll > max_scroll) {
				       //scroll = max_scroll;
				       $('.gallery-inner').clone().appendTo( "#tab-gallery" );
				       animategalleryimages();
				       max_scroll = container[0].scrollWidth - container_w;	
			        }
			        
			    	$('.gallery-inner').parent().parent().scrollLeft(scroll);
			    }
			    window.requestAnimationFrame(updatescroll);
			}
			window.requestAnimationFrame(updatescroll);
		}	
	});
	
	var formPictureIndex = 0;
	var rss = ['https://omniaircraftsales.com/wp-content/uploads/2018/12/A017_C036_0919GN.0002751.jpg','https://omniaircraftsales.com/wp-content/uploads/2018/12/A011_C043_09042B.0000860.jpg','https://omniaircraftsales.com/wp-content/uploads/2018/12/A013_C020_09045J.0001687-RT.jpg','https://omniaircraftsales.com/wp-content/uploads/2018/12/A011_C005_0904UC.0000596-2.jpg','https://omniaircraftsales.com/wp-content/uploads/2018/12/Exterior-24AX.jpg','https://omniaircraftsales.com/wp-content/uploads/2018/12/A014_C002_0912QC.0000221.jpg','https://omniaircraftsales.com/wp-content/uploads/2018/12/A017_C016_0919ZC.0000853.jpg','https://omniaircraftsales.com/wp-content/uploads/2018/12/A014_C009_0912R40000095-RT.jpg'];
	var rand = shuffle(rss);
	function updatecontactformphoto(){
		
		src = 'url(' + rand[formPictureIndex] + ')';
		$('.bg-image').css('background-image', src);
		
		formPictureIndex = formPictureIndex + 1 < rand.length - 1 ? formPictureIndex + 1 : 0;
	}
	
	$('#input_3_18 input').on('change', function(){
		updatecontactformphoto();	
	});
	
	$('.trigger-contact_form').on('click', function(){		
		updatecontactformphoto();		
		if($('body').hasClass('locked')){
			$('body').removeClass('locked');
		} else {
			$('body').addClass('locked');
		}
	});	
	
	function animatehomegalleryimages(){
		$('.gallery-inner img').on('inview', function(ev, isInView) { //Add class to sections that are in view
		  if (isInView) {
		    $(this).addClass('in-view');
		  } else {
			$(this).removeClass('in-view');
		  }
		});
	}
	animatehomegalleryimages();
	function animategalleryimages(){
		$('#tab-gallery .ac_gallery_image').on('inview', function(ev, isInView) { //Add class to sections that are in view
		  if (isInView) {
		    $(this).addClass('in-view');
		  } else {
			$(this).removeClass('in-view');
		  }
		});
	}
	animategalleryimages();	
	
	if(performance.navigation.type == 2){
		document.body.scrollTop = 0;
	}
	
	if( $(window).width() >= 769 ){

	}
	if( $(window).width() < 769 ){
			
	}
	
	$('#scrolldown').on('click', function(){
		$('html, body').animate({ scrollTop: $($(this).parent().next()).offset().top}, 500, 'linear');
	});
	
});