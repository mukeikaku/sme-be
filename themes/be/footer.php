<footer>

	<div class="footer-top">
		<div class="wrap">
			<div class="meta">
				<div class="meta-block">
					<div class="logo">
						<a
							href="<?php echo esc_url(home_url('/')); ?>"><img
								src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo_w.svg"
								alt="Be - The Social Creators Labels" /></a>
					</div>
					<div class="sns">
						<ul>
							<li><a href="https://www.youtube.com/channel/UCh8OgGE6hGVDvBNXYqVwymQ" target="_blank"><img
										src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/youtube_w.svg"
										alt="YouTube" /></a></li>
							<li><a href="https://twitter.com/Be_twt_official" target="_blank"><img
										src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/twitter_w.svg"
										alt="Twitter" /></a></li>
							<li><a href="https://www.instagram.com/be_insta_official/" target="_blank"><img
										src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/instagram_w.svg"
										alt="Instagram" /></a></li>
						</ul>
					</div>
				</div>
				<div class="menu">
					<ul class="fm">
						<li><a
								href="<?php echo esc_url(home_url('/news/')); ?>">NEWS</a>
						</li>
						<li><a
								href="<?php echo esc_url(home_url('/creator/')); ?>">CREATOR</a>
						</li>
						<!--li><a href="<?php echo esc_url(home_url('/music/')); ?>">MUSIC</a></li-->
						<li><a
								href="<?php echo esc_url(home_url('/about/')); ?>">ABOUT</a>
						</li>
						<li><a
								href="<?php echo esc_url(home_url('/business/')); ?>">BUSINESS</a>
						</li>
						<li><a
								href="<?php echo esc_url(home_url('/contact/')); ?>">CONTACT</a>
						</li>
					</ul>
					<ul>
						<li><a href="https://www.sme.co.jp/privacy/" target="_blank">プライバシーポリシー</a></li>
						<li>
							<!-- OneTrust Cookies Settings Link start -->
							<a class="ot-sdk-show-settings" href="#ot-sdk-btn">クッキーの設定</a>
							<!-- OneTrust Cookies Settings Link end -->
						</li>
						<li><a
								href="<?php echo esc_url(home_url('/terms/')); ?>">利用規約</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="sony"><a href="https://www.sonymusic.co.jp/" target="_blank"><img
						src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/footer_sonylogo.svg"
						alt="Sony Music" /></a></div>
		</div>
	</div>

	<div class="copyright">
		<small>©️ Sony Music Entertainment Inc, All rights reserved.</small>
	</div>

</footer>

<!-- SP MENU -->
<div id="sp-menu">
	<a class="menu-trigger">
		<span></span>
		<span></span>
		<span></span>
	</a>
</div>

<div id="sp-nav-menu">
	<div class="wrap">
		<div class="content">
			<ul>
				<li><a href="<?php echo esc_url(home_url('/news/')); ?>"
						<?php if (is_page('news') || is_category() || is_singular('post')) : ?>
						class="current"
						<?php endif; ?>>NEWS<small>ニュース</small></a>
				</li>
				<li><a href="<?php echo esc_url(home_url('/creator/')); ?>"
						<?php if (is_post_type_archive('creator') || is_tax('category_creator') || is_singular('creator')) : ?>
						class="current"
						<?php endif; ?>>CREATOR<small>クリエイター</small></a>
				</li>
				<!-- <li><a href="<?php echo esc_url(home_url('/music/')); ?>"<?php if (is_post_type_archive('music') || is_tax('category_music') || is_singular('music')) : ?>
				class="current"<?php endif; ?>>MUSIC<small>ミュージック</small></a>
				</li> -->
				<li><a href="<?php echo esc_url(home_url('/about/')); ?>"
						<?php if (is_page('about')) : ?>
						class="current"
						<?php endif; ?>>ABOUT<small>アバウト</small></a>
				</li>
				<li><a href="<?php echo esc_url(home_url('/business/')); ?>"
						<?php if (is_page('business') || is_tax('category_business') || is_singular('business')) : ?>
						class="current"
						<?php endif; ?>>BUSINESS<small>ビジネス</small></a>
				</li>
				<li><a href="<?php echo esc_url(home_url('/contact/')); ?>"
						<?php if (is_page(array('contact', 'confirm', 'complete'))) : ?>
						class="current"
						<?php endif; ?>>CONTACT<small>コンタクト</small></a>
				</li>
			</ul>
		</div>
	</div>
</div>

</div><!-- #wrapper -->

<?php wp_footer(); ?>
<?php

							if (is_page('contact') || is_page('confirm')) : ?>
<script
	src="https://www.google.com/recaptcha/api.js?render=<?= RECAPTCHA_KEY ?>">
</script>
<?php endif ?>

<script>
	/*AOS.init({
      offset: 100,
      duration: 1500,
      once: true
    });*/
	<?php
							    if (is_page('contact') || is_page('confirm')) {
							        $key = RECAPTCHA_KEY;
							        echo <<<EOD
		const form = document.querySelector('form');
			window.addEventListener('load', onSubmit);
			function onSubmit(e) {
				e.preventDefault();
					grecaptcha.execute('${key}', {action: 'submit'}).then(function(token) {
						var recaptchaToken = document.querySelector('input[name="recaptchaToken"]');
						recaptchaToken.value = token;
					});
			}
EOD;
							    }

							?>
</script>
</body>

</html>