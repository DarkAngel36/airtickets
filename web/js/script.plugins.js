;(function($){

	"use strict";

	$(document).ready(function(){

		/* ------------------------------------------------
		FORMSTYLER START
		------------------------------------------------ */

		if ($('.search_tickets_select select').length){
			$('.search_tickets_select select').styler({
				selectVisibleOptions: 5,
				selectSearch: true,
				selectSearchLimit: 5
			});
		}


		/* ------------------------------------------------
				datepicker
		------------------------------------------------ */


		if($( "#dateInput" ).length){

			// $( "#dateInput" ).each(function(index, el){
				
			// });

			$( "#dateInput" ).datepicker({
				dateFormat: "MM d",
				onSelect: function(){
					$('.date_input_box1>span').html($('#dateInput').val());
				}
			});

			$( "#dateInput2" ).datepicker({
				dateFormat: "MM d",
				onSelect: function(){
					$('.date_input_box2>span').html($('#dateInput2').val());
				}
			});
		
		}

		/* ------------------------------------------------
				End of datepicker
		------------------------------------------------ */

	});

	$(window).load(function(){

		/* ------------------------------------------------
				Name pudin
		------------------------------------------------ */


		/* ------------------------------------------------
				Name pudin
		------------------------------------------------ */

	});

})(jQuery);