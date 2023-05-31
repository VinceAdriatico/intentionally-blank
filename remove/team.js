//Slider
function BarSlider(){
	
	//Static
	this.container  	 = $('.team-slider-cont'); 
	this.slider 		 = $('.team-slider');
	this.items 			 = $('.team-member');
	this.previousControl = $('.prev-team');
	this.nextControl 	 = $('.next-team');
	this.activeItem 	 = $('.team-member.active');
	this.prevActive 	 = $('.prev-active-team');
	this.nextActive  	 = $('.next-active-team');
	this.bar		 	 = $('#team-bar');
	this.indicator 		 = $('#team-indicator');
	this.itemCount 	  	 = items.length;


	//Dynamic
	this.activeIndex 	 = 0;
	this.index 			 = 0;
	this.ajaxRunning 	 = false;
	
	this.slides = this.getSlides(items);
}

BarSlider.prototype.init = function(){
	
	
	
	this.items.on('click', this.moveSliderTo() );
}

BarSlider.prototype.changeIndicator = function( width ){
	this.indicator.css('width', width + 'px');
}
BarSlider.prototype.getSlides = function( slides ){
	
	let slidesArray = [];
	
	for( let i = 0; i < this.count; i++ ){
		
		let isActive = i === 0 ? true : false;
		
		let slide = new Slide( slides[0].attr('id'), i, isActive);
		
		slidesArray.push( slide );
	}
	
	return slidesArray;
}


//Slide
function Slide(id, index, active){
	this.id = id;
	this.index = index;
	this.isActive = active;
}



const barSlider = new BarSlider();




document.addEventListener( 'load', barSlider.init );