jQuery(document).ready(function($){
    
      $('a[href*="#"]')
	  // Remove links that don't actually link to anything
	  .not('[href="#"]')
	  .not('[href="#0"]')
	  .click(function(event) {
	    // On-page links
	    if (
	      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
	      && 
	      location.hostname == this.hostname
	    ) {
	      // Figure out element to scroll to
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	      // Does a scroll target exist?
	      if (target.length) {
	        // Only prevent default if animation is actually gonna happen
	        event.preventDefault();
	        $('html, body').animate({
	          scrollTop: target.offset().top + (-100)
	        }, 300, function() {
	          // Callback after animation
	          // Must change focus!
	          var $target = $(target);
	          $target.focus();
	          if ($target.is(":focus")) { // Checking if the target was focused
	            return false;
	          } else {
	            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
	            $target.focus(); // Set focus again
	          };
	        });
	      }
	    }
	  });
    
    //Toggle on Click     
    $('body').on('click', '*[class^="trigger-"]', function(){// WHEN YOU CLICK ON AN ELEMENT that HAS A CLASSNAME STARTING WITH "TRIGGER-"
	    // CHECK OUT ALL THE CLASSES OF THAT ELEMENT AND FIND THE ONES START WITH TRIGGER- 
	    var classes = $.grep(this.className.split(" "), function(v, i){
	       return v.indexOf('trigger-') === 0;
	    });
	    	        
	    classes.forEach(function(item) {
		    // REMOVE THE "TRIGGER-" FROM THE STRINGS IN THE ARRAY AND STORE IT IN ITEMID
		    itemID = item.substring(8);
		    // FIND THE ITEM WITH THE ID AND ACTIVATE IT
		    if($('#'+itemID).hasClass('active')){
			    $('#'+itemID).removeClass('active');
		    } else {
			    $('#'+itemID).addClass('active');
		    }
		    
		});	    
    });
    
	/*     Helper Functions    */
	function getRandomElementInArray(arr){
		let shuffled = shuffle(arr);
		return shuffled[0];
	}
	
    function oneTimeEvent(element, eventType, callback){
	    element.addEventListener(eventType, function(e){
		    e.target.removeEventListener(e.type, arguments.callee);
		    return callback(e);
	    });
    };
    
    function rmClass(el, classToRm){
	   Element.prototype.isNodeList = function() {return false;}
	   NodeList.prototype.isNodeList = HTMLCollection.prototype.isNodeList = function(){return true;}

	   if(typeof el == null){
			console.error("Null element provided to function rmClass");
		}else if(typeof el == Array || el.isNodeList() ){
			for(let i = 0; i < el.length; i++){
				el[i].classList.remove(classToRm);
			}
		}else{
			el.classList.remove(classToRm);
		}
    } //Remove class from element(s)
    
    function aClass(el, classToAdd){ //Add class to element(s)
	   Element.prototype.isNodeList = function() {return false;}
	   NodeList.prototype.isNodeList = HTMLCollection.prototype.isNodeList = function(){return true;}
	   

	   if(typeof el == null){
			console.error("Null element provided to function aClass");
		}else if(typeof el == Array || el.isNodeList() ){
			for(let i = 0; i < el.length; i++){
				el[i].classList.add(classToAdd);
			}
		}else{
			el.classList.add(classToAdd);
		}
    }
    
    //Animate in sequence
	function getItemToggleClass( arr, i, cssClass ){ //Array, Int, String
		let item = arr[i];
		
		return function(){
			item.classList.toggle(cssClass);
		}
	}
	
	function animateItemsSequence(items, className, dMultiplier){ // String selecting the items container or an Array of items, Integer
		let children = typeof items === String ? document.querySelector(items).children : items;

		dMultiplier = !dMultiplier ? 200 : dMultiplier; //Set multiplier default if none is set
		for( let i = 0; i < children.length; i++ ){
			
			let animateItem = getItemToggleClass( children, i, className);
			
			let delay = i;
			delay *= dMultiplier;
			
			setTimeout(animateItem, delay);
		}
		
	}
    
	function openContact(){
		$('.contact-info').addClass('opened');
		$('.contact-form-cont').addClass('opened');
		$('#contact-striped-bar').addClass('opened');
	}
    
	if( $('body').hasClass('page-id-1506') ){
		$('.contact-form-opener').on('click', openContact);
	}
	
	
	if( $('#post-container.faqs').length > 0 ){
		let faqs = document.getElementById('post-container').children;
		console.log(faqs);
		animateItemsSequence(faqs, 'fadedIn', 65);
	}
	
	//Inview Handlers
	$('section').on('inview', function(ev, isInView) { //Add class to sections that are in view
	  if (isInView) {
	    $(this).addClass('in-view');
	  } else {
		$(this).removeClass('in-view');
	  }
	});
	
	$('.will_animate').on('inview', function(ev, isInView) {
	  if (isInView) {
	    $(this).addClass('animated');
	  }
	});
	
	if( $('body').hasClass('post-type-archive-faqs') ){
		$('#faqs').addClass('active');
	} else if( $('body').hasClass('category-white-papers') ){
		$('#white-papers').addClass('active');
	} else if( $('body').hasClass('category-news') ){
		$('#news').addClass('active');
	} else if( $('body').hasClass('blog') ){
		$('#market-reports').addClass('active');
	}
	

		
	if( $(window).width() >= 769 ){
		
		let teamFired = false;
		$('.active-team--row').on('inview', function(ev, isInView){
			if( !teamFired ){
				$('.video-contain, .active-team--info, .active-team--copy, .active-team--visual img').addClass('animated');
				teamFired = true;
			}
		});
		

	} else{

		// <769 Function Calls
	}


// <769 Function Calls

	(function ($) {
            $.fn.countup = function (params) {
                // make sure dependency is present
                if (typeof CountUp !== 'function') {
                    console.error('countUp.js is a required dependency of countUp-jquery.js.');
                    return;
                }

                var defaults = {
                    startVal: 0,
                    decimalPlaces: 0,
                    duration: 2,
                };

                if (typeof params === 'number') {
                    defaults.endVal = params;
                }
                else if (typeof params === 'object') {
                    $.extend(defaults, params);
                }
                else {
                    console.error('countUp-jquery requires its argument to be either an object or number');
                    return;
                }

                this.each(function (i, elem) {
                    var countUp = new CountUp(elem, defaults.endVal, defaults);
                    countUp.start();
                });

                return this;
            };

        }(jQuery));



        const options = {
            separator: '',
        };
        // let demo = new CountUp('a1', 100, options);
        // if (!demo.error) {
        //     demo.start();
        // } else {
        //     console.error(demo.error);
        // }

        $('#a1').countup(0,100,options)

        window.onload = function () {
            lax.init()

            // Add a driver that we use to control our animations
            lax.addDriver('scrollY', function () {
                return window.scrollY
            })

            // Add animation bindings to elements
            lax.addElements('.cloud', {
                scrollY: {
                    translateY: [
                        ["elInY", "elCenterY", "elOutY"],
                        ['screenHeight/4', 'screenHeight/10', 0,],
                        // {easing:'ease'}
                    ],
                }

            })
        }	

});
// JavaScript Document