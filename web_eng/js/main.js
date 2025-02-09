$(function(){

	// [S] Visual Banner
		var mainBannerSlick = $('.mainBannerCont');

		// �ъ깮/�뺤� �ъ슜��
		//$('.slick-controls').append('<button class=\"slide-pause textHidden\" title=\"�щ씪�대뱶 �뺤�\"><img src=\"/img/main/visual_banner_pause.png\" alt=\"�щ씪�대뱶 �뺤�\" /></button><button class=\"slide-play textHidden\" title=\"�щ씪�대뱶 �ъ깮\" style=\'display:none\'><img src=\"/img/main/visual_banner_play.png\" alt=\"�щ씪�대뱶 �ъ깮\" /></button>');

		// �ъ깮/�뺤� + 1/3 �섏씠吏� �ъ슜��
		/*$('.slick-controls').append('<button class=\"slide-pause textHidden\" title=\"�щ씪�대뱶 �뺤�\">�щ씪�대뱶 �뺤�</button><button class=\"slide-play textHidden\" title=\"�щ씪�대뱶 �ъ깮\" style=\'display:none\'>�щ씪�대뱶 �ъ깮</button><div class=\"pagingInfo\"></div>');
		var pagingInfo = $('.pagingInfo');
		mainBannerSlick.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
			var i = (currentSlide ? currentSlide : 0) + 1;
			pagingInfo.text(i + '/' + slick.slideCount);
		});*/

		// - �뺤� : �щ씪�대뱶 �뺤� 踰꾪듉 �대┃ �� �대깽��
		/*$('.mainBanner .slide-pause').on('click',function(){
			$(this).hide();
			$('.mainBanner .mainBannerCont').slick('slickPause');
			$('.mainBanner .slide-play').show();
		});

		// - �ъ깮 : �щ씪�대뱶 �ъ깮 踰꾪듉 �대┃ �� �대깽��
		$('.mainBanner .slide-play').on('click',function(){
			$(this).hide();
			$('.mainBanner .mainBannerCont').slick('slickPlay');
			$('.mainBanner .slide-pause').show();
		});*/

		mainBannerSlick.slick({
			arrows: true,
			dots: true,
			fade: true,
			speed: 1500,
			autoplay: true,
			autoplaySpeed: 5000,
			pauseOnHover: false,
			pauseOnFocus: false,
			prevArrow: '.mainBanner .slick-prev',
			nextArrow: '.mainBanner .slick-next',
		});

		//var slickDots = $('.mainBannerCont .slick-dots');
		//$('.mainBanner .slick-controls').prepend(slickDots);
	// [E] Visual Banner


	// [S] news
		var newsBn = $('.newsBannerList').slick({
			slidesToShow: 4,
			slidesToScroll: 4,
			variableWidth: true,
			arrows: true,
			dots: true,
			//fade: true,
			speed: 300,
			autoplay: false,
			autoplaySpeed: 3000,
			pauseOnHover: false,
			pauseOnFocus: false,
			prevArrow: '.newsList .slick-prev',
			nextArrow: '.newsList .slick-next',
			/*responsive: [
				{
					breakpoint: 768,
					settings: {
						arrows: false,
					}
				},
				{
					breakpoint: 480,
					settings: {
						arrows: false,
					}
				}
			]*/
		});
	// [E] news

	// [S] support
		var newsBn = $('.supportList').slick({
			slidesToShow: 4,
			variableWidth: true,
			arrows: true,
			dots: false,
			//fade: true,
			speed: 300,
			autoplay: false,
			autoplaySpeed: 3000,
			pauseOnHover: false,
			pauseOnFocus: false,
			prevArrow: '.supportList .slick-prev',
			nextArrow: '.supportList .slick-next',
			responsive: [
				{
					breakpoint: 1279,
					settings: {
						pauseOnHover: false,
						pauseOnFocus: false,
						dots: true,
						slidesToShow: 2,
					}
				},
				/*{
					breakpoint: 480,
					settings: {
						slidesToShow: 1
					}
				}*/
			]
		});
	// [E] support

});