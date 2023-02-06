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
    <div class="body taxonomy">
      <div class="wrap">
        
        <div class="term-title">
          <div class="row">
            <?php $term_id = get_queried_object_id(); ?>
            <figure><img src="<?php echo get_field('business_cat_image', 'term_' . $term_id); ?>" alt="<?php echo  single_term_title(); ?>"/></figure>
            <div class="text">
              <h2><?php single_term_title(); ?></h2>
              <p><?php echo term_description(); ?></p>
            </div>
          </div>
        </div>
        
        <div class="business-list">
        <h3>事業実績</h3>
        <ul>
        <?php 
        global $wp_query;
        $args = array_merge( 
          $wp_query->query,
          array(
          //'post_type' => array('post'),
          'posts_per_page' => -1,
          //'paged' => $paged
          ));
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
              <div class="text">
                <p><?php the_title(); ?></p>
              </div>
            </a>
          </li>
        <?php endwhile; ?>
        </ul>
        </div>
        <!--div class="pagenavi">
          <?php //if(function_exists('wp_pagenavi')) { wp_pagenavi(array('query'=>$query)); } ?>
        </div-->
        <?php endif; wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
  
</main>

<?php
get_footer();
