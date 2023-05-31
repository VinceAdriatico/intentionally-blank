function teamController(){
	const sliderCont  = $('.team-slider-cont'), 
		  slider 	  = $('.team-slider'),
		  teamMem	  = $('.team-member'),
		  prev 	      = $('.prev-team'),
		  next 	      = $('.next-team'),
		  prevActive  = $('.prev-active-team'),
		  nextActive  = $('.next-active-team'),
		  bar 		  = $('#team-bar'),
		  indicator   = $('#team-indicator'),
		  count 	  = teamMem.length;
		  
	let	activeIndex = 0,
		index 	    = 0,
		teamAjaxRunning = false,
		sliderPos,
		slideRightMargin;

	
	console.log(count);
	function moveTeamForward(){
		if( !teamAjaxRunning ){
			prev.addClass('visible');
			
			if( index < count ){
				getTeam(slider.children().eq(index + 1).attr('id'));
				tmw = slider.children().eq(index).outerWidth() + slideRightMargin;
				
				sliderPos -= tmw;
				
				moveSliderTo(sliderPos);				
				changeIndicatorWidth( slider.children().eq(index + 1).outerWidth() );
				
				
				index++;
				
				if( index === count - 1 ){
					next.removeClass('visible');
				}
			}
		}
	}
	
	function moveTeamBack(){
		if( !teamAjaxRunning ){
			next.addClass('visible');
			if( index > 0 ){
				getTeam(slider.children().eq(index - 1).attr('id'));
				tmw = slider.children().eq(index - 1).outerWidth() + slideRightMargin;
				
				sliderPos += tmw;
				
				
				moveSliderTo(sliderPos);
				changeIndicatorWidth( slider.children().eq(index - 1).outerWidth() );
				
				
				index--;
				
				if( index == 0 ){
					prev.removeClass('visible');
				}
			}
		}	
	}
	
	function moveSliderTo(pos){
		slider.css('transform', 'translate3d(' + pos + 'px, 0, 0)');
	}
	function changeIndicatorWidth(width){
		indicator.css('width', width + 'px');
	}
	function getSliderPos(curIndex, finalIndex){
		
		
		let curItemLeft = slider.children().eq(curIndex).position().left;
		let newItem = slider.children().eq(finalIndex);
		let indicatorWidth = newItem.outerWidth();
		let newItemLeft = newItem.position().left;
		
		let pos =  newItemLeft - curItemLeft;
		changeIndicatorWidth(indicatorWidth);
		
		sliderPos = sliderPos - pos;
		pos = sliderPos;
		return sliderPos;
	}
	
	function getTeam(id){
		let teamCopyData;
			teamAjaxRunning = true;
			$('.team-member').removeClass('active');
			$('#' + id).addClass('active');
			
			$.post(ajax_object.ajaxurl, {
				action: 'getteam',
				teamID: id
			}, function(data){
				teamCopyData = data;
				$.post(ajax_object.ajaxurl, {
					action: 'getteamvideo',
					teamID: id,
					is_mobile: isMobile
				}, function(data){
					console.log(isMobile);
					$('.active-team--copy-cont').html(teamCopyData);
					$('.active-team--visual').html(data);
					
					if( isMobile === false ){
						setTimeout(animateTeam, 100);
						
					} else if( isMobile === true ){
						teamOpened = true;
						console.log('this is firing');
						$('header').addClass('scrolled');
						$('.active-team--row').scrollTop(0).addClass('open');
						$('html, body').addClass('lock');
					}
					
					teamAjaxRunning = false;
				});
			});
	}
	function clickTeamMember(){
		const id = $(this).attr('id');
		if( !teamAjaxRunning && !$(this).hasClass('active') ){
			
			
			const updatedIndex = slider.children().index($(this));
			
			
			const specificSliderPos = getSliderPos(index, updatedIndex);
			
			
			moveSliderTo(specificSliderPos);
			
			getTeam(id);
		
			index = updatedIndex;
			console.log(index);
			
			if( index === 0){
				prev.removeClass('visible');
			}else if( index > 0 && index < count - 1){
				prev.addClass('visible');
				next.addClass('visible');
			}else if( index === count - 1 ){
				next.removeClass('visible');
			}
		}
	}
	
	function setIndicator(){
		const height = bar.outerHeight();
		const width = $('.team-member.active').outerWidth();
 		const leftSliderPadding = parseInt($('.team-slider-cont').css('padding-left'));
 		const barHeight = bar.outerHeight();
		const topPos = bar.position().top;
		const leftPos = ($(window).outerWidth() / 2) - ( width / 2);
		const slidePosition = leftPos - leftSliderPadding;
		
		slideRightMargin = parseFloat(teamMem.css('margin-right'));
		sliderPos = slidePosition;
		prev.css({
			'top' : topPos + barHeight
		});
		next.css({
			'top' : topPos + barHeight
		});
		indicator.css({
			'left' : leftPos + 'px',
			'top' : topPos + "px",
			'width' : width + 'px',
		});
		slider.css({
			'transform' : 'translate3d(' + slidePosition + 'px, 0, 0)'
		});
	}
	
	setIndicator();
	next.on('click', moveTeamForward);
	prev.on('click', moveTeamBack);
	teamMem.on('click', clickTeamMember);
}
	