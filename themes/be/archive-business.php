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
    <div class="body">
      <?php
        $args = array(
          'orderby'       => 'menu_order', 
          'order'         => 'ASC',
          'hide_empty'    => false,
      ); 

      $terms = get_terms( 'category_business', $args );
      ?>
      <?php  if ( ! empty( $terms ) && !is_wp_error( $terms ) ){
      foreach ( $terms as $term ) { ?>
      <div class="business-category">
        <figure><img src="<?php echo get_field('business_cat_image', 'term_' . $term->term_id); ?>"></figure>
        <div class="text">
          <h3><?php echo $term->name; ?></h3>
          <p><?php echo $term->description; ?></p>
          <div class="btn">
            <?php if($term->term_id == 11) { ?>
            <div class="btn-more btn-more-yellow"><a href="<?php echo esc_url( home_url( '/creator/' ) ); ?>"><span>CREATOR</span></a></div>
            <?php } else { ?>
            <div class="btn-more btn-more-yellow"><a href="<?php echo get_term_link( $term ); ?>"><span>MORE</span></a></div>
            <?php } ?>
          </div>
        </div>
      </div>
      <?php }
      }?>
    </div>
  </section>
  
</main>

<?php
get_footer();
