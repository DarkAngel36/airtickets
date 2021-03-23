$('.datepicker').datepicker({
	format : 'MM dd'
});
$('.nav-open').click(function () {
	$('.header__nav').addClass('header__nav_open');
	$('.nav__social').css({ 'display' : 'flex' });
});
$('.nav__close').click(function () {
	$('.header__nav').removeClass('header__nav_open');
	$('.nav__social').css({ 'display' : '' });
});

$('.form-counter__btn').click(function (e) {
	e.preventDefault();
	let self   = $(this);
	let parent = self.parent();
	let form   = $('.form-counter__field', parent);
	if (self.hasClass('form-counter__btn_minus')) {
		if (form.attr('value') > 0) {
			form.attr('value', function (i, val) {
				return --val;
			});
		}
	}
	else if (self.hasClass('form-counter__btn_plus')) {
		form.attr('value', function (i, val) {
			return ++val;
		});
	}
});
$('.form-passenger').click(function () {
	$(this).addClass('form-passenger_open');
	$('.overlay').show();
});
$('.overlay').click(function () {
	$('.form-passenger').removeClass('form-passenger_open');
	$(this).hide();
	let counter = 0;
	let fields  = $('.form-counter__field');
	for (let i = 0; i < fields.length; i++) {
		counter += Number(fields[i].value);
	}
	$('.form-passenger__value').html(`${counter} passenger`);
});