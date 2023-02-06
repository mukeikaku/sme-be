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
    <div class="body">
      <div class="wrap">
        <div class="category-list">
          <span class="cat-btn cat-btn-all current"><a href="<?php echo esc_url( home_url( '/news/' ) ); ?>">すべて</a></span>
          <?php $categories = get_terms( 'category', array(
            'orderby'    => 'id',
            'hide_empty' => 0
           ) ); ?>
          <?php foreach ( $categories as $term ) { ?>
          <?php $tid = $term->term_id; ?>
          <?php $tname = $term->name; ?>
          <span class="cat-btn cat-btn-<?php echo $tid; ?><?php if(is_category($tid)) : ?> current<?php endif; ?>"><a href="<?php echo get_term_link( $term ); ?>"><?php echo $tname; ?></a></span>  
          <?php } ?>
        </div>
        <ul>
        <?php 
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $args = array(
          'post_type' => array('post'),
          'posts_per_page' => 12,
          'paged' => $paged
          );
        $query = new WP_Query( $args );
        ?>
        <?php if ( $query -> have_posts() ) : ?>
          <?php while ( $query -> have_posts() ) : $query -> the_post(); ?>
          <li>
            <a href="<?php the_permalink(); ?>">
              <?php if(has_post_thumbnail()) : ?>
              <figure><?php the_post_thumbnail("full"); ?></figure>
              <?php else : ?>
              <figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/noimage.png" alt="イメージ"/></figure>
              <?php endif; ?>
              <div class="sp-text">
                <div class="cat">
                  <span class="date"><?php the_time("Y.m.d"); ?></span>
                  <?php $cat = get_the_terms($post->ID,"category"); 
                  $cat = $cat[0];
                  $catid = $cat->term_id;
                  $catname = $cat->name ;?>
                  <span class="cat-tag cat-tag-<?php echo $catid; ?>"><?php echo $catname; ?></span>
                </div>
                <div class="text">
                  <h3><?php the_title(); ?></h3>
                </div>
              </div>
            </a>
          </li>
        <?php endwhile; ?>
        </ul>
        <div class="pagenavi">
          <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(array('query'=>$query)); } ?>
        </div>
        <?php endif; wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
  
</main>

<?php
get_footer();
