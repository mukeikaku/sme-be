<?php
get_header();
?>

<main class="notFound">

	<section>
		<div class="wrap notFound-content">
			<h1 class="notFound-title">404 not found</h1>
			<div class="notFound-btn">
				<div class="btn">
					<div class="btn-more btn-more-yellow"><a
							href="<?php echo esc_url(home_url()); ?>"><span>TOP</span></a>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
?>