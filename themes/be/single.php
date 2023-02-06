<?php
get_header();
?>

<main class="news">
  
  <section id="index-news">
    <div class="title">
      <div class="wrap">
        <h2>NEWS</h2>
        <small>ニュース</small>
      </div>
    </div>
    <div class="body single">
      <div class="wrap">
        <div class="post">
          <div class="cat">
            <span class="date"><?php the_time("Y.m.d"); ?></span>
            <?php $cat = get_the_terms($post->ID,"category"); 
            $cat = $cat[0];
            $catid = $cat->term_id;
            $catname = $cat->name ;?>
            <span class="cat-tag cat-tag-<?php echo $catid; ?>"><?php echo $catname; ?></span>
          </div>
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
      <div class="btn-more btn-more-yellow btn-back"><a href="<?php echo esc_url( home_url( '/news/' ) ); ?>"><span>BACK</span></a></div>
    </div>
    <div class="share">
      <p>SHARE</p>
      <ul>
        <li><a href="https://twitter.com/share?url=<?php echo get_the_permalink();?>&text=<?php echo get_the_title();?>" target="_blank" rel="nofollow noopener"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/share-twitter.svg" alt="Twitterでシェア"/></a></li>
        <li><a href="https://social-plugins.line.me/lineit/share?url=<?php echo get_the_permalink(); ?>" target="_blank" rel="nofollow noopener"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/share-line.svg" alt="LINEでシェア"/></a></li>
        <li><a href="http://www.facebook.com/share.php?u=<?php echo get_the_permalink(); ?>" target="_blank" rel="nofollow noopener"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/share-facebook.svg" alt="facebookでシェア"/></a></li>
      </ul>
    </div>
  </section>
  
</main>

<?php
get_footer();
