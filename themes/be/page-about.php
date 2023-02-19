<?php
get_header();
?>

<main class="about">

	<section id="page-about">
		<div class="title">
			<div class="wrap">
				<h2>ABOUT</h2>
				<small>"Be"とは</small>
			</div>
		</div>
		<div class="body">
			<div class="content">
				<div class="text">
					<?php the_field('about_message2'); ?>
				</div>
			</div>
			<div class="bg">
				<img
					src="<?php the_field('about_message_bg'); ?>">
			</div>
		</div>
	</section>

	<section id="about-mission" class="about-content">
		<div class="wrap">
			<div class="text">
				<div class="title">
					<h2>MISSION</h2>
					<small>ミッション</small>
				</div>
				<p>クリエイターの情熱をカタチにし、<br>
					人々の新しい居場所を創る</p>
			</div>
			<figure><img
					src="<?php the_field('about_mission'); ?>">
			</figure>
		</div>
	</section>

	<section id="about-vision" class="about-content">
		<div class="wrap">
			<div class="text">
				<div class="title">
					<h2>VISION</h2>
					<small>ビジョン</small>
				</div>
				<p>無数の才能と社会を巧みにマッチングし、<br>
					多様な場を作り出す</p>
			</div>
			<figure><img
					src="<?php the_field('about_vision'); ?>">
			</figure>
		</div>
	</section>

	<section id="about-value" class="about-content">
		<div class="wrap">
			<div class="title">
				<h2>VALUE</h2>
				<small>バリュー</small>
			</div>
			<div class="body">
				<ul>
					<li>
						<h3><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/about-copy02.svg"
								alt="Be Open" /></h3>
						<p>他者や経験に対してオープンであること。<br>
							多様性を認めること。</p>
					</li>
					<li>
						<h3><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/about-copy03.svg"
								alt="Be Creative" /></h3>
						<p>役に立つこと。期待を超えること。<br>
							創造的であること。</p>
					</li>
					<li>
						<h3><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/about-copy01.svg"
								alt="Be You" /></h3>
						<p>自分自身に妥協せず、<br>
							最大限の可能性に尽くすこと。</p>
					</li>
				</ul>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
?>