jQuery(document).ready(function($){"use strict";var window_width,window_height,scroll_top;var adminbar=$('#wpadminbar');var adminbar_height=0;var header=$('#cshero-header');var header_top=0;var scroll_status='';

$(window).on('load',function(){scroll_top=$(window).scrollTop();window_width=$(window).width();window_height=$(window).height();adminbar_height=adminbar.length>0?adminbar.outerHeight(true):49;header_top=adminbar_height;if(CMSOptions.menu_sticky=='1'){cms_stiky_menu(scroll_top);}cms_mobile_menu();if(CMSOptions.back_to_top=='1'){$('body').append('<div id="back_to_top" class="back_to_top"><span class="go_up"><i style="" class="fa fa-arrow-up"></i></span></div><!-- #back-to-top -->');cms_back_to_top();}cms_page_loading();

$('.cause-process').each(function() {
	$(this).waypoint(
		function() {
			$(this).circliful();
		}, {
			offset : '95%',
			triggerOnce : true
	});	
});
cms_cause_popup();

cms_auto_video_width();});
window.onbeforeunload=function(){cms_page_loading(1);}
window.onload=function(){setTimeout(function(){wp_pray_event();},1000);}

/**
 * Ajax Quick view product
 *
 */
function cms_cause_popup(){
	$('a.cause-popup').each(function(){
		$(this).click(function(){
			$('.cause-donate-popup').show();
			$('.cause-donate-popup-inner').show();
		var $cause_id = $(this).data('cause-id');
			$.post(ajaxurl, {
	            'action' : 'pray_donate_popup',
	            'cause_id' : $cause_id,
	        }, function(response) {
	        	$('.site_donate_form').remove();
	        	$('body').append(response);
	        	$('#site_donate_form'+$cause_id).modal('show');

	        	$('.cause-donate-popup-inner').hide();
	        	$('.cause-donate-popup').hide();
	        })
		})
	})
}

$(window).on('resize',function(event,ui){window_width=$(event.target).width();window_height=$(window).height();scroll_top=$(window).scrollTop();if(CMSOptions.menu_sticky=='1'){cms_stiky_menu(scroll_top);}cms_mobile_menu();cms_auto_video_width();});var lastScrollTop=0;$(window).on('scroll',function(){scroll_top=$(window).scrollTop();if(scroll_top<lastScrollTop){scroll_status='up';}else{scroll_status='down';}lastScrollTop=scroll_top;if(CMSOptions.menu_sticky=='1'){cms_stiky_menu();}if(CMSOptions.menu_sticky=='0'){cms_stiky_menu_fixed_page();}cms_back_to_top();});function cms_stiky_menu(){if(header_top<scroll_top){switch(true){case(window_width>992):header.addClass('header-fixed');$('body').addClass('fixed-margin-top');break;case((window_width<=992&&window_width>=768)&&(CMSOptions.menu_sticky_tablets=='1')):header.addClass('header-fixed');$('body').addClass('fixed-margin-top');break;case((window_width<=768)&&(CMSOptions.menu_sticky_mobile=='1')):header.addClass('header-fixed');$('body').addClass('fixed-margin-top');break;}}else{header.removeClass('header-fixed');$('body').removeClass('fixed-margin-top');}}function cms_stiky_menu_fixed_page(){if(header_top<scroll_top){header.addClass('header-fixed-page-trans');}else{header.removeClass('header-fixed-page-trans');}}$('#cshero-menu-mobile').on('click',function(){var navigation=$(this).parent().find('#cshero-header-navigation');if(!navigation.hasClass('collapse')){navigation.addClass('collapse');}else{navigation.removeClass('collapse');}});$('#dropdown-search').on('click',function(){var navigation=$(this).parent().find('.search-input');if(!navigation.hasClass('search-show')){navigation.addClass('search-show');}else{navigation.removeClass('search-show');}});function cms_mobile_menu(){var menu=$('#cshero-header-navigation');switch(true){case(window_width<=992&&window_width>=768):menu.removeClass('phones-nav').addClass('tablets-nav');cms_mobile_menu_group(menu);break;case(window_width<=768):menu.removeClass('tablets-nav').addClass('phones-nav');break;default:menu.removeClass('mobile-nav tablets-nav');menu.find('li').removeClass('mobile-group');break;}}function cms_mobile_menu_group(nav){nav.each(function(){$(this).find('li').each(function(){if($(this).find('ul:first').length>0){$(this).addClass('mobile-group');}});});}function cms_auto_video_width(){$('.entry-video iframe').each(function(){var v_width=$(this).width();v_width=v_width/(16/9);$(this).attr('height',v_width+35);})}var cms_parallax=$('.cms_parallax');if(cms_parallax.length>0&&CMSOptions.paralax=='1'){cms_parallax.each(function(){"use strict";var speed=$(this).attr('data-speed');speed=(speed!=undefined&&speed!='')?speed:0.1;$(this).parallax("50%",speed);});}function cms_page_loading($load){switch($load){case 1:$('#cms-loadding').css('display','block')
break;default:$('#cms-loadding').css('display','none')
break;}}$('body').on('click','#back_to_top',function(){$("html, body").animate({scrollTop:0},1500);});$('input.minus').click(function(){$(this).parent().find('.qty.input-text').get(0).stepDown();});$('input.plus').click(function(){$(this).parent().find('.qty.input-text').get(0).stepUp();});function cms_back_to_top(){if(scroll_top<window_height){$('#back_to_top').addClass('off').removeClass('on');}else{$('#back_to_top').removeClass('off').addClass('on');}}$(document).ready(function(){$(".cms-carousel").each(function(){var $this=$(this),slide_id=$this.attr('id'),slider_settings=cmscarousel[slide_id];if($this.attr('data-slidersettings')){slider_settings=jQuery.parseJSON($this.attr('data-slidersettings'));}else{slider_settings.rewind=true;slider_settings.margin=parseInt(slider_settings.margin);slider_settings.loop=(slider_settings.loop==="true");slider_settings.mouseDrag=(slider_settings.mouseDrag==="true");slider_settings.nav=(slider_settings.nav==="true");slider_settings.dots=(slider_settings.dots==="true");slider_settings.autoplay=(slider_settings.autoplay==="true");slider_settings.autoplayTimeout=parseInt(slider_settings.autoplayTimeout);slider_settings.autoplayHoverPause=(slider_settings.autoplayHoverPause==="true");slider_settings.smartSpeed=parseInt(slider_settings.smartSpeed);if($('.cms-dot-container'+slide_id).length){slider_settings.dotsContainer='.cms-dot-container'+slide_id;slider_settings.dotsEach=true;}}$this.owlCarousel(slider_settings);$this.parent().find('.owl-next-fake').on('click',function(e){$this.trigger('next.owl.carousel');});$this.parent().find('.owl-prev-fake').on('click',function(e){$this.trigger('prev.owl.carousel');});});});var _e_countdown=[];function wp_pray_event(){"use strict";$('.pray_event').each(function(){var event_date=$(this).find('.entry-event-date');var data_count=event_date.data('count');var server_offset=event_date.data('timezone');var offset=(new Date()).getTimezoneOffset();offset=(-offset/60)-server_offset;if(data_count!=undefined){var data_label=event_date.attr('data-label');if(data_label!=undefined&&data_label!=''){data_label=data_label.split(',')}else{data_label=['DAYS','HOURS','MINUTES','SECONDS'];}data_count=data_count.split(',')
var austDay=new Date(data_count[0],parseInt(data_count[1])-1,data_count[2],parseInt(data_count[3])+offset,data_count[4],data_count[5]);_e_countdown.push(event_date.countdown({until:austDay,layout:'<ul class="list-unstyled"><li class="cms-count-day"><div  class="cms-count">{dn}</div><span>'+data_label[0]+'</span></li><li class="cms-count-hours"><div class="cms-count">{hn}</div><span>'+data_label[1]+'</span></li><li class="cms-count-minutes"><div class="cms-count">{mn}</div><span>'+data_label[2]+'</span></li><li class="cms-count-second"><div class="cms-count">{sn}</div><span>'+data_label[3]+'</span></li></ul>'}));}});}jQuery(document).ajaxComplete(function(event,xhr,settings){if(settings.url.indexOf('paged=')>-1||settings.url.indexOf('/page/')>-1){$('[data-equal]').each(function(){var $this=$(this),target=$this.data('equal');$this.imagesLoaded(function(){$this.find(target).equalHeights();})});}$.each(_e_countdown,function(__index,__e){__e.countdown('destroy');});wp_pray_event();jQuery(function(){jQuery('[data-toggle="popover"]').popover();jQuery('[data-rel="tooltip"]').tooltip();})})});