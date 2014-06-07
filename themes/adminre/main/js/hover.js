$(function(){
	$('.arrow_blue').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 1200, 'easeInOutElastic');
	});
	var speed = 300;
	$('.pack').hover(function(){
		$(this).add($(this).children()).add($(this).find('.pack-i-line, .pack-i-line span')).stop(true, true);
		if ($(this).find('.mbl-pack-mask').is(':visible'))
		{
			return;
		}
		$(this).find('.pack-h').animate({
			'height': '55px',
			'line-height': '55px',
			'color': '#ffffff'
		}, speed);
		$(this).find('.pack-info').animate({
			'padding-bottom': '30px'
		}, speed);
		$(this).find('.pack-price').animate({
			'color': '#ffffff',
			'background-color': '#37353a',
			'border-top': '1px #37353a solid',
			'border-bottom': '1px #37353a solid'
		}, speed);
		$(this).find('.pack-i-line, .pack-i-line span').animate({
			'color': 'white'
		}, speed);
		$(this).find('.pack-order').animate({
			'background-color': '#37353a'
		}, speed);

		$(this).addClass('selected', speed);

	}, function(){
		$(this).add($(this).children()).add($(this).find('.pack-i-line, .pack-i-line span')).stop(true, true);
		if ($(this).find('.mbl-pack-mask').is(':visible'))
		{
			return;
		}

		$(this).find('.pack-h').animate({
			'height': '45px',
			'line-height': '45px',
			'color': '#5f5f5f'
		}, speed);
		$(this).find('.pack-info').animate({
			'padding-bottom': '20px'
		}, speed);
		$(this).find('.pack-price').animate({
			'color': '#e74c3c',
			'background-color': '#ffffff',
			'border-top': '1px #dfdfdf solid',
			'border-bottom': '1px #dfdfdf solid'
		}, speed);
		$(this).find('.pack-i-line').animate({
			'color': '#95a0ab'
		}, speed);
		$(this).find('.pack-i-line span').animate({
			'color': '##223326'
		}, speed);
		$(this).find('.pack-order').animate({
			'background-color': '#e74c3c'
		}, speed);

		$(this).stop(true, true).removeClass('selected', speed);
	});
});
