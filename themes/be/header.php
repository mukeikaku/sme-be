<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta
		charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0">
	<link rel="shortcut icon"
		href="<?php echo esc_url(get_template_directory_uri()); ?>/favicon.ico">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
	<link rel="stylesheet" type="text/css"
		href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<link rel="apple-touch-icon" sizes="180x180"
		href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/apple-icon-180x180.png">
	<?php wp_head(); ?>
	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-K6L38G6');
	</script>
	<!-- End Google Tag Manager -->
	<script>
		$(function() {

			var $spMenu = $("#sp-menu");
			var $spNav = $("#sp-nav-menu");
			var $spTrigger = $("#sp-menu .menu-trigger");

			$spTrigger.on('click', function() {
				$(this).toggleClass('active');
				$spNav.fadeToggle(200);
				return false;
			});

			$('body').addClass('open');

		});
	</script>
	<?php if (is_home() || is_front_page()) : ?>
	<script>
		$(function() {

			var $mvSlide = $("#mainvisual .wrap ul");
			var $pickupSlide = $("#index-pickup .body .wrap ul");

			/*$mvSlide.on('init', function(event, slick){
			  $('#mainvisual .menu ul li').removeClass('done');
			  $('#mainvisual .menu ul li:first-child').addClass('active');
			});
			$mvSlide.on('reInit', function(event, slick){
			  $('#mainvisual .menu ul li:first-child').addClass('active');
			});*/

			$mvSlide.slick({
				infinite: true,
				arrows: false,
				dots: true,
				autoplay: true,
				centerMode: true,
				centerPadding: '120px',
				draggable: false,
				pauseOnFocus: false,
				pauseOnHover: false,
				autoplaySpeed: 6000,
				speed: 1000,
				slidesToShow: 3,
				slidesToScroll: 1,
				responsive: [{
						breakpoint: 1201,
						settings: {
							centerPadding: '60px',
						},
					},
					{
						breakpoint: 769,
						settings: {
							slidesToShow: 1,
							centerPadding: '120px',
						},
					},
					{
						breakpoint: 481,
						settings: {
							slidesToShow: 1,
							centerPadding: '60px',
						},
					},
				],
			});

			$pickupSlide.slick({
				infinite: true,
				arrows: true,
				dots: true,
				autoplay: false,
				draggable: false,
				pauseOnFocus: false,
				pauseOnHover: false,
				autoplaySpeed: 6000,
				speed: 1000,
				slidesToShow: 3,
				slidesToScroll: 1,
				responsive: [{
						breakpoint: 769,
						settings: {
							slidesToShow: 1,
							centerMode: true,
							centerPadding: '60px',
							arrows: false
						},
					},
					{
						breakpoint: 481,
						settings: {
							slidesToShow: 1,
							centerMode: true,
							centerPadding: '40px',
							arrows: false
						},
					},
				],
			});

		});
	</script>
	<?php endif; ?>
	<!-- OptanonConsentNoticeStart -->
	<script type="text/javascript"
		src="https://cdn-apac.onetrust.com/consent/e0ef3b34-38e3-44c3-ad07-fb6ff7eca398-test/OtAutoBlock.js"></script>
	<script src="https://cdn-apac.onetrust.com/scripttemplates/otSDKStub.js" type="text/javascript" charset="UTF-8"
		data-domain-script="e0ef3b34-38e3-44c3-ad07-fb6ff7eca398-test"></script>
	<script type="text/javascript">
		function OptanonWrapper() {}
	</script>
	<!-- OptanonConsentNoticeEnd -->
</head>


<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K6L38G6" height="0" width="0"
			style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<div id="wrapper">

		<header>
			<div class="row">
				<h1><a
						href="<?php echo esc_url(home_url('/')); ?>"><img
							src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo.svg"
							alt="Be - The Social Creators Labels" /></a></h1>
				<ul>
					<li><a href="<?php echo esc_url(home_url('/news/')); ?>"
							<?php if (is_page('news') || is_category() || is_singular('post')) : ?>
							class="current" <?php endif; ?>>NEWS</a>
					</li>
					<li><a href="<?php echo esc_url(home_url('/creator/')); ?>"
							<?php if (is_post_type_archive('creator') || is_tax('category_creator') || is_singular('creator')) : ?>
							class="current"
							<?php endif; ?>>CREATOR</a>
					</li>
					<!--li><a href="<?php echo esc_url(home_url('/music/')); ?>"<?php if (is_post_type_archive('music') || is_tax('category_music') || is_singular('music')) : ?>
					class="current"<?php endif; ?>>MUSIC</a></li-->
					<li><a href="<?php echo esc_url(home_url('/about/')); ?>"
							<?php if (is_page('about')) : ?>
							class="current" <?php endif; ?>>ABOUT</a>
					</li>
					<li><a href="<?php echo esc_url(home_url('/business/')); ?>"
							<?php if (is_post_type_archive('business') || is_tax('category_business') || is_singular('business')) : ?>
							class="current"
							<?php endif; ?>>BUSINESS</a>
					</li>
					<li><a href="<?php echo esc_url(home_url('/contact/')); ?>"
							<?php if (is_page(array('contact', 'confirm', 'complete'))) : ?>
							class="current"
							<?php endif; ?>>CONTACT</a>
					</li>
				</ul>
			</div>
		</header>