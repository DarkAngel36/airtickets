;(function($){

	"use strict";

	var Core = {

		DOMReady: function(){

			var self = this;
			
			self.backToTopBtn({
			    transitionIn: 'bounceInRight',
			    transitionOut: 'bounceOutRight'
			});

		},

		windowLoad: function(){

			var self = this;

			self.menu();

			// self.footerHeight.init();
			
		},

		/**
		**	Back to top
		**/

		backToTopBtn: function(config){

			config = $.extend({
				offset: 350,
				transitionIn: 'bounceInRight',
				transitionOut: 'bounceOutRight'
			}, config);

			var btn = $('<button></button>', {
				class: 'back_to_top animated hide',
				html: '<i class="fa fa-angle-up"></i>'
			}).appendTo($('body')),

			$wd = $(window),
			$html = $('html'),
			$body = $('body');

			$wd.on('scroll.back_to_top', function(){

				if($wd.scrollTop() > config.offset){

					btn.removeClass('hide '+config.transitionOut).addClass(config.transitionIn);

				}
				else{

					btn.removeClass(config.transitionIn).addClass(config.transitionOut);

				}

			});

			btn.on('click', function(){

				$html.add($body).animate({

					scrollTop: 0

				});

			});

	   	},

	   	menu: function(){

	   		$('.menu_btn').on('click', function(){

	   			if($('.menu_btn').hasClass('active')){
	   				$('.menu_btn').removeClass('active');
	   				$('#nav').removeClass('active');
	   			}
	   			else{
	   				$('.menu_btn').addClass('active');
	   				$('#nav').addClass('active');	
	   			}

	   		});

	   		$('.close_menu').on('click', function(){

   				$('.menu_btn').removeClass('active');
   				$('#nav').removeClass('active');

	   		});

	   		$(document).on('click', function(e){

	   			if(!$(e.target).closest('#nav, .menu_btn').length){

	   				$('.menu_btn').removeClass('active');
	   				$('#nav').removeClass('active');

	   			}

	   		});

	   	}

	}


	$(document).ready(function(){

		Core.DOMReady();

	});

	$(window).load(function(){

		Core.windowLoad();

	});

})(jQuery);