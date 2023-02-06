<?php
get_header();
?>

<main class="music">

	<section id="archive-music">
		<div class="title">
			<div class="wrap">
				<h2>MUSIC</h2>
				<small>ミュージック</small>
			</div>
		</div>
		<div class="body single">
			<div class="post-title">
				<div class="row">
					<figure><img
							src="<?php the_field('mainimage'); ?>"
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
							<?php if(get_field('youtube_channel')) : ?>
							<dl>
								<dt>YouTube</dt>
								<dd>
									<a href="<?php the_field('youtube_url'); ?>"
										target="_blank"
										class="youtube"><span><?php the_field('youtube_channel'); ?></span></a>
								</dd>
							</dl>
							<?php endif; ?>
							<dl>
								<dt>SNS</dt>
								<dd>
									<?php if(get_field('twitter_ac')) : ?>
									<a href="https://twitter.com/<?php the_field('twitter_ac'); ?>"
										target="_blank"
										class="twitter"><span>@<?php the_field('twitter_ac'); ?></span></a>
									<?php endif; ?>
									<?php if(get_field('instagram_ac')) : ?>
									<a href="https://www.instagram.com/<?php the_field('instagram_ac'); ?>"
										target="_blank"
										class="instagram"><span>@<?php the_field('instagram_ac'); ?></span></a>
									<?php endif; ?>
									<?php if(get_field('tiktok_ac')) : ?>
									<a href="https://www.tiktok.com/<?php the_field('tiktok_ac'); ?>"
										target="_blank"
										class="tiktok"><span>@<?php the_field('tiktok_ac'); ?></span></a>
									<?php endif; ?>
									<?php if(get_field('facebook_ac')) : ?>
									<a href="https://www.facebook.com/<?php the_field('facebook_ac'); ?>"
										target="_blank"
										class="facebook"><span>@<?php the_field('facebook_ac'); ?></span></a>
									<?php endif; ?>
								</dd>
							</dl>
							<?php if(get_field('homepage_url')) : ?>
							<dl>
								<dt>Link</dt>
								<dd>
									<a href="<?php the_field('homepage_url'); ?>"
										target="_blank"
										class="homepage"><span><?php the_field('homepage_title'); ?></span></a>
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
			<div class="btn-more btn-more-b-blue btn-back"><a
					href="<?php echo esc_url(home_url('/music/')); ?>"><span>BACK</span></a>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
?>