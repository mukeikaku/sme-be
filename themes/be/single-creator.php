<?php
get_header();
$img = get_field('mainimage');
$img = !empty($img) ? $img : NO_IMAGE;
?>

<main class="creator">

	<section id="archive-creator">
		<div class="title">
			<div class="wrap">
				<h2>CREATOR</h2>
				<small>クリエイター</small>
			</div>
		</div>
		<div class="body single">
			<div class="post-title">
				<div class="row">
					<figure><img src="<?= $img ?>"
							alt="<?php the_title(); ?>" /></figure>
					<div class="text">
						<div class="tit">
							<h2><?php the_title(); ?></h2>
						</div>
						<div class="copy">
							<p><?php the_field('entry_copy'); ?>
							</p>
						</div>
						<div class="sns">
							<?php
                $yt = get_field('youtube');
$tw = get_field('twitter');
$ig = get_field('instagram');
$tt = get_field('tiktok');
$fb = get_field('facebook');
$hp = get_field('homepage');
?>
							<?php if($yt) : ?>
							<dl>
								<dt>YouTube</dt>
								<dd>
									<?php foreach($yt as $item) : ?>
									<a href="<?php echo $item['youtube_url']; ?>"
										target="_blank"
										class="youtube"><span><?php echo $item['youtube_channel']; ?></span></a>
									<?php endforeach; ?>
								</dd>
							</dl>
							<?php endif; ?>
							<dl>
								<dt>SNS</dt>
								<dd>
									<?php if($tw) : ?>
									<?php foreach($tw as $item) : ?>
									<a href="<?php echo $item['twitter_url']; ?>"
										target="_blank"
										class="twitter"><span><?php echo $item['twitter_ac']; ?></span></a>
									<?php endforeach; ?>
									<?php endif; ?>
									<?php if($ig) : ?>
									<?php foreach($ig as $item) : ?>
									<a href="<?php echo $item['instagram_url']; ?>"
										target="_blank"
										class="instagram"><span><?php echo $item['instagram_ac']; ?></span></a>
									<?php endforeach; ?>
									<?php endif; ?>
									<?php if($tt) : ?>
									<?php foreach($tt as $item) : ?>
									<a href="<?php echo $item['tiktok_url']; ?>"
										target="_blank"
										class="tiktok"><span><?php echo $item['tiktok_ac']; ?></span></a>
									<?php endforeach; ?>
									<?php endif; ?>
									<?php if($fb) : ?>
									<?php foreach($fb as $item) : ?>
									<a href="<?php echo $item['facebook_url']; ?>"
										target="_blank"
										class="facebook"><span><?php echo $item['facebook_ac']; ?></span></a>
									<?php endforeach; ?>
									<?php endif; ?>
								</dd>
							</dl>
							<?php if($hp) : ?>
							<dl>
								<dt>Link</dt>
								<dd>
									<?php foreach($hp as $item) : ?>
									<a href="<?php echo $item['homepage_url']; ?>"
										target="_blank"
										class="homepage"><span><?php echo $item['homepage_title']; ?></span></a>
									<?php endforeach; ?>
								</dd>
							</dl>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="bg">
				<div class="wrap">
					<div class="post">
						<div class="content">
							<?php the_content(); ?>
						</div>
						<?php $items = 'movie_contents'; ?>
						<?php if(have_rows($items)): ?>
						<div class="movie">
							<h2>動画コンテンツ</h2>
							<ul>
								<?php while(have_rows($items)): the_row(); ?>
								<?php
                $img = get_sub_field('movie_contents_image');
								    $img = !empty($img) ? $img : NO_IMAGE;
								    ?>
								<li>
									<a
										href="<?php the_sub_field('movie_contents_url'); ?>">
										<figure><img
												src="<?= $img ?>"
												alt="<?php the_sub_field('movie_contents_title'); ?>" />
										</figure>
										<p><?php the_sub_field('movie_contents_title'); ?>
										</p>
									</a>
								</li>
								<?php endwhile; ?>
							</ul>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="btn">
			<div class="btn-more btn-more-pink btn-back"><a
					href="<?php echo esc_url(home_url('/creator/')); ?>"><span>BACK</span></a>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
?>