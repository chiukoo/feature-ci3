$('.slider-list').bxSlider({
	mode: 'fade',
	adaptiveHeight: true,
	auto: true
});
$('.home-pro-list').bxSlider({
    minSlides: 1,
    maxSlides: 2,
});
// menu for mob
var drop = $("#btn-nav");
var nav = $("#nav");
drop.on('click', function (event) {
    nav.toggleClass('is-active');
});