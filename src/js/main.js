$(document).ready(function() {

	$("#header").load("header.html");
	
	$("#footer").load("footer.html");

	var owl_carousel_main = $('.owl-carousel-home').owlCarousel({
		items: 1,
		loop: true,
		margin: 15,
		nav: false,
		dots: true,
		autoplay: true
	});

	$(".btn-owl-carousel-home-left").on('click', function (event) {
		event.preventDefault();

		owl_carousel_main.trigger('prev.owl.carousel');
	});

	$(".btn-owl-carousel-home-right").on('click', function (event) {
		event.preventDefault();

		owl_carousel_main.trigger('next.owl.carousel');
	});

	var owl_carousel = $('.owl-carousel').owlCarousel({
		loop: true,
		margin: 30,
		nav: false,
		dots: false,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 2
			},
			1000: {
				items: 3
			}
		}
	});

	$('.btn-owl-carousel.bth-owl-carousel-left').on('click', function (event) {
		event.preventDefault();

		owl_carousel.trigger('prev.owl.carousel');
	});

	$('.btn-owl-carousel.bth-owl-carousel-right').on('click', function (event) {
		event.preventDefault();

		owl_carousel.trigger('next.owl.carousel');
	});

	$("[data-dinaanim]").each(function () {

		var $this = $(this);

		$this.addClass("dinaAnim-invisible");

		if ($(window).width() > 767) {

			$this.appear(function () {

				var delay = ($this.data("dinadelay") ? $this.data("dinadelay") : 1);

				if (delay > 1) $this.css("animation-delay", delay + "ms");

				$this.addClass("dinaAnim-animated");
				$this.addClass('dinaAnim-' + $this.data("dinaanim"));

				setTimeout(function () {

					$this.addClass("dinaAnim-visible");

				}, delay);

			}, { accX: 0, accY: -150 });

		} else {

			$this.animate({ opacity: 1 }, 300, 'easeInOutQuad', function () { });
		}
	});

});