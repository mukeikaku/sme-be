<?php
get_header();
?>

<main class="business">
  
  <section id="archive-business">
    <div class="title">
      <div class="wrap">
        <h2>BUSINESS</h2>
        <small>ビジネス</small>
      </div>
    </div>
    <div class="body single">
      <div class="wrap">
        <div class="post">
          <div class="tit">
            <h2><?php the_title(); ?></h2>
          </div>
          <?php if(has_post_thumbnail()) : ?>
          <div class="thumbnail">
            <figure><?php the_post_thumbnail("full"); ?></figure>
          </div>
          <?php endif; ?>
          <div class="content">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="btn">
      <div class="btn-more btn-more-yellow btn-back"><a href="<?php echo esc_url( home_url( '/business/' ) ); ?>"><span>BACK</span></a></div>
    </div>
  </section>
  
</main>

<?php
get_footer();
