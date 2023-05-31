let teamOpened = false;
jQuery(document).ready(function($){
	const $body = $('body');
	
	const isMobile = $(window).width() <= 768;
		
	//Team Ajax Calls 	
	
	let teamAjaxRunning = false;
	let teamScrollPos;
	function getTeam(){
		let teamCopyData;
		if( !teamAjaxRunning && !$(this).hasClass('active') ){
			console.log('team ran');
			teamAjaxRunning = true;
			$('.team-member').removeClass('active');
			$(this).addClass('active');
			const id = $(this).attr('id');
			
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
						teamScrollPos = $(document).scrollTop();
						$('header').addClass('scrolled');
						$('.active-team--row').scrollTop(0).addClass('open');
						$('html, body').addClass('lock');
					}
					
					teamAjaxRunning = false;
				});
			});
		}
	}

	function animateTeam(){
		$('.video-contain, .active-team--info, .active-team--copy, .active-team--visual img').addClass('animated');
	}

	function closeTeamMobile(){
		teamOpened = false;
		$('.active-team--row').removeClass('open');
		$('html, body').removeClass('lock');
		$(document).scrollTop(teamScrollPos );
	}
	
	let teamController = function(){
		let slider = $('.team-sliding-cont'),
			members = $('.team-member'),
			activeMember = $('.team-member.active'),
			count = members.length,
			pageH,
			sliderPos = 0,
			curPage = 1,
			teamSectionPos,
			teamAjaxRunning = false;
			
		const limiter = 5,
			  pages = Math.ceil(count / limiter),
			  $nextPage = $('#nextTeamPage'),
			  $prevPage = $('#prevTeamPage');
			
		const init = function(){
			const itemH = activeMember.outerHeight()/* ,
				  itemMargin = parseFloat(window.getComputedStyle(members[0]).marginBottom) */;
				  // Commented out b/c was throwing an error in console
			members.outerHeight(itemH);
			pageH = (itemH /* + itemMargin */) * limiter;
			
			slider.css({
				height: pageH + 'px',
			});
		}
		
		const getTeamMember = function(id){
			if( !teamAjaxRunning ){
				members.removeClass('active');
				$('#'+id).addClass('active');
				
				teamAjaxRunning = true;
				
				$.post(ajax_object.ajaxurl, {
					action: 'getteam',
					teamID: id,
				}, function(data){
					$('.active-team--container').html(data).addClass('active');
					teamAjaxRunning = false;
				});
			}
		}
		const mobileTeam = function(){
			teamSectionPos = $('.active-team--col').offset().top;
			if( !this.classList.contains('active') ){
				id = this.getAttribute('id');
				getTeamMember(id);
			}
			$(window).scrollTop(0);
			$('.active-team--col').addClass('mobile-seen');
			$('body').addClass('locked');
			$('.team-section').addClass('mobile-open');
			$('section:not(.team-section), footer').css({display: 'none',});
		}
		
		const closeTeamMobile = function(){
			$('.active-team--col').removeClass('mobile-seen');
			$('body').removeClass('locked');
			$('.team-section').removeClass('mobile-open');
			$(window).scrollTop(teamSectionPos);
			$('section:not(.team-section), footer').css({display: 'block',});
		}
		
		const clickTeamMember = function(){
			if( !this.classList.contains('active') ){
				id = this.getAttribute('id');
				getTeamMember(id);
			}
		}
		
		const moveSliderTo = function(pos){
			slider.css({
				transform: 'translateY(' + pos + 'px)'
			});
		}
		
		const pageUp = function(){
			sliderPos += pageH;
			if( curPage === 1 ){
				$prevPage.addClass('hidden');
			}else{
				let curPos = slider.css('transform');
				console.log(curPos);
				if( $nextPage.hasClass('hidden') ){
					$nextPage.removeClass('hidden');
				}
			}
			moveSliderTo(sliderPos);
		}
		const pageDown = function(){
			sliderPos -= pageH;
			if( curPage === pages){
				$nextPage.addClass('hidden');
			} else{
				if( $prevPage.hasClass('hidden') ){
					$prevPage.removeClass('hidden');
				}
			}
			moveSliderTo(sliderPos);
			
		}
		
		const handlePageChange = function(dir){
			if( dir === 'down' ){
				if( curPage < pages ){
					curPage++;
					pageDown();
				}
			} else{
				if( curPage > 1 ){
					curPage--;
					pageUp();
				}
			}
		}
		
		if( $(window).outerWidth() > 768 ){
			init();
			$('.team-control').on('click', function(){
				const dir = this.dataset.dir;
				handlePageChange(dir);
				
			});
			members.on('click', clickTeamMember);	
		} else{
			members.on('click', mobileTeam);
			$('div.team-closer').on('click', closeTeamMobile);
		}
	}
	
	if( $('section.team-section').length !== 0 ){
		$(window).on('load', teamController);
	}
	
	//Career Ajax Calls
	let careerCatFilterRunning = false;
	function getCareersByCat(){
		if( !careerCatFilterRunning && !$(this).hasClass('active') ){
			careerCatFilterRunning = true;
			$('.career--list').removeClass('animated');
			
			const slugData = $(this).attr('data-slug');
			$('.career--cat').removeClass('active');
			$(this).addClass('active');
			
			$.post(ajax_object.ajaxurl, {
				action: 'getcareercat',
				slug: slugData
			}, function(data){
				$('.career--list').html(data);
				careerCatFilterRunning = false;
				setTimeout(function(){
					$('.career--list').addClass('animated');
				}, 200);
			});
		}
	}
	if( $body.hasClass('post-type-archive-careers') ){
		$('.career--cat').on('click', getCareersByCat);
	}
	
	let careerPostRunning = false;
	function getCareerPost(){
		const catEl = document.querySelector('.career--cat_cont');
		const place = catEl.offsetTop - catEl.offsetHeight;
		if( !careerPostRunning ){
			careerPostRunning = true;
						
			const cid = $(this).attr('data-career-id'),
				  isCap = $(this).attr('data-is-captain');
				  
			setTimeout(function(){
				window.scroll({top: place, behavior: 'smooth'});
				$('.career--list').addClass('closed');
				$.post(ajax_object.ajaxurl, {
					action: 'getcareerpost',
					id: cid,
					isCaptain: isCap,
				}, function(data){
					$('.career--response').html(data);
					$('.career--response').addClass('open');
					catEl.classList.add('open');
					$('#careerBackBtn').addClass('visible');
					careerPostRunning = false;
					var title = 'position';
	                document.title = title;
	                history.pushState(null, title, '/careers/position');
	                $(window).on('popstate', backToCareers);
				});
			}, 500);
		}
	}
	$body.on('click', '.open-career', getCareerPost);
	
	function backToCareers(){
		const catEl = document.querySelector('.career--cat_cont');
		$('.career--response').addClass('transition').one('transitionend', function(){
			$(this).removeClass('open');
			$('#careerBackBtn').removeClass('visible');
			catEl.classList.remove('open');
			$('.career--list').removeClass('closed').one('transitionend webkittransitionend', function(){
			 	$('.career--response').removeClass('transition');
			}); 
		});

	}
	$('#careerBackBtn').on('click', backToCareers);
	
	//FAQ Ajax Calls
	let faqAjaxRunning = false;
	function getFAQs(){
		if( !faqAjaxRunning ){
			faqAjaxRunning = true;
			
			const slug = $(this).attr('data-slug');
			$('.career--cat').removeClass('active');
			$(this).addClass('active');
			
			$.post(ajax_object.ajaxurl, {
				action: 'getfaqs',
				slug: slug
			}, function(data){
				$('.faq-list').html(data);
				faqAjaxRunning = false;
				
			});
		}
	}
	if( $body.hasClass('page-id-43') ){
		$('.career--cat').on('click', getFAQs);
	}
	
	let postCatAJAXRunning = false;
	function getPostsByCat(){
		if( !postCatAJAXRunning && !$(this).hasClass('active') ){
			postCatAJAXRunning = true;
			$('.career--list').removeClass('animated');
			
			const slugData = $(this).attr('data-slug');
			$('.career--cat').removeClass('active');
			$(this).addClass('active');
			
			$.post(ajax_object.ajaxurl, {
				action: 'getblogcat',
				slug: slugData
			}, function(data){
				$('.career--list').html(data);
				postCatAJAXRunning = false;
				setTimeout(function(){
					$('.career--list').addClass('animated');
					
				}, 200);
			});
		}
	}
	if( $body.hasClass('blog') ){
		$('.career--cat').on('click', getPostsByCat);
	}
	let postGetAJAXRunning = false;
	function getSinglePost(){
		const catEl = document.querySelector('.career--cat_cont');
		const place = catEl.offsetTop - catEl.offsetHeight;
		if( !postGetAJAXRunning ){
			postGetAJAXRunning = true;
			
			const cid = $(this).attr('data-post-id');
				  
			setTimeout(function(){
				window.scroll({top: place, behavior: 'smooth'});
				$('.career--list').addClass('closed');
				$.post(ajax_object.ajaxurl, {
					action: 'getblogpost',
					id: cid,
				}, function(data){
					$('.career--response').html(data);
					$('.career--response').addClass('open');
					catEl.classList.add('open');
					$('#careerBackBtn').addClass('visible');
					postGetAJAXRunning = false;
				});
			}, 500);
		}
	}
	$body.on('click', '.open-post', getSinglePost);
});