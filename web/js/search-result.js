$(document).ready(function () {
	$('.cost.main__cost .cost__item').on('click', function () {
		$('.cost.main__cost .cost__item.cost__item_active').removeClass('cost__item_active');
		$(this).addClass('cost__item_active');
	});
});