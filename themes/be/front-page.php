<?php
get_header();
?>

<main class="top">
  <section id="mainvisual">
    <div class="wrap">
      <ul>
        <?php $items = 'mv_slide'; ?>
        <?php if(have_rows($items)): ?>
        <?php while(have_rows($items)): the_row(); ?>
          <li>
            <a href="<?php the_sub_field('mv_slide_url'); ?>">
              <figure><img src="<?php the_sub_field('mv_slide_image'); ?>" alt="<?php the_sub_field('mv_slide_artist'); ?>"/></figure>
              <div class="text">
                <div class="text-in">
                  <h3><span># <?php the_sub_field('mv_slide_artist'); ?></span></h3>
                  <p><?php the_sub_field('mv_slide_text'); ?></p>
                </div>
              </div>
            </a>
          </li>
        <?php endwhile; ?>
        <?php endif; ?>
      </ul>
    </div>
  </section>
  
  <section id="index-pickup">
    <div class="body">
      <div class="wrap">
        <ul>
          <?php $items = 'pickup'; ?>
          <?php if(have_rows($items)): ?>
          <?php while(have_rows($items)): the_row(); ?>
            <li>
              <a href="<?php the_sub_field('pickup_youtube'); ?>">
                <figure><img src="<?php the_sub_field('pickup_image'); ?>" alt="<?php the_sub_field('pickup_title'); ?>"/></figure>
                <div class="text">
                  <h3><span><?php the_sub_field('pickup_title'); ?></span></h3>
                </div>
              </a>
            </li>
          <?php endwhile; ?>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </section>
  
  <section id="index-news">
    <div class="title">
      <div class="wrap">
        <h2>NEWS</h2>
        <small>ニュース</small>
      </div>
    </div>
    <div class="body">
      <div class="wrap">
        <ul>
        <?php 
        $args = array(
          'post_type' => array('post'),
          'posts_per_page' => 3
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
        <?php endif; wp_reset_postdata(); ?>
        </ul>
      </div>
    </div>
    <div class="btn">
      <div class="btn-more btn-more-yellow"><a href="<?php echo esc_url( home_url( '/news/' ) ); ?>"><span>MORE</span></a></div>
    </div>
  </section>
  
  <section id="index-creator">
    <div class="title">
      <div class="wrap">
        <h2>CREATOR</h2>
        <small>クリエイター</small>
      </div>
    </div>
    <div class="body">
      <div class="wrap">
        <ul>
        <?php $items = 'top_creator'; ?>
        <?php if(have_rows($items)): ?>
        <?php while(have_rows($items)): the_row(); ?>
          <li>
            <a href="<?php the_sub_field('top_creator_url'); ?>">
              <figure><img src="<?php the_sub_field('top_creator_image'); ?>" alt="<?php the_sub_field('top_creator_name'); ?>"/></figure>
              <div class="text">
                <div class="text-in">
                  <h3><span><?php the_sub_field('top_creator_name'); ?></span></h3>
                  <p><?php the_sub_field('top_creator_copy'); ?></p>
                </div>
              </div>
            </a>
          </li>
        <?php endwhile; ?>
        <?php endif; ?>
        </ul>
      </div>
    </div>
    <div class="btn">
      <div class="btn-more btn-more-pink"><a href="<?php echo esc_url( home_url( '/creator/' ) ); ?>"><span>MORE</span></a></div>
    </div>
  </section>
  
  <?php /*
  $args = array(
    'post_type' => array('music'),
    'posts_per_page' => 4,
    
    );
  $query = new WP_Query( $args );
  ?>
  <?php if ( $query -> have_posts() ) : ?>
  <section id="index-music">
    <div class="title">
      <div class="wrap">
        <h2>MUSIC</h2>
        <small>ミュージック</small>
      </div>
    </div>
    <div class="body">
      <div class="wrap">
        <ul>
          <?php while ( $query -> have_posts() ) : $query -> the_post(); ?>
          <li>
            <a href="<?php the_permalink(); ?>">
              <?php if(has_post_thumbnail()) : ?>
              <figure><?php the_post_thumbnail("full"); ?></figure>
              <?php else : ?>
              <figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/noimage.png" alt="イメージ"/></figure>
              <?php endif; ?>
              <div class="cat">
                <?php $cat = get_the_terms($post->ID,"category_music"); 
                $cat = $cat[0];
                $catid = $cat->term_id;
                $catname = $cat->name ;?>
                <span class="cat-tag cat-tag-<?php echo $catid; ?>"><?php echo $catname; ?></span>
              </div>
              <div class="text">
                <h3><?php the_title(); ?></h3>
                <p><?php the_field('entry_copy'); ?></p>
              </div>
            </a>
          </li>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
    <div class="btn">
      <div class="btn-more btn-more-blue"><a href="<?php echo esc_url( home_url( '/music/' ) ); ?>"><span>MORE</span></a></div>
    </div>
  </section>
  <?php endif; */?>
  
  <section id="index-about">
    <div class="title">
      <div class="wrap">
        <h2>ABOUT</h2>
        <small>“Be”とは</small>
      </div>
    </div>
    <div class="body">
      <div class="content">
        <div class="text">
          <?php the_field('about_message',20); ?>
        </div>
        <div class="btn">
          <div class="btn-more btn-more-b-pink2"><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><span>MORE</span></a></div>
        </div>
      </div>
      <div class="bg">
        <img src="<?php the_field('about_message_bg',20); ?>">
        <!--video id="video" webkit-playsinline="" playsinline="" muted="" autoplay="" loop="" src="<?php the_field('about_message_movie',20); ?>"></video-->
      </div>
    </div>
  </section>
  
  <section id="index-business">
    <div class="title">
      <div class="wrap">
        <h2>BUSINESS</h2>
        <small>ビジネス</small>
      </div>
    </div>
    <div class="body">
      <div class="wrap">
        <figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/index-business-img.jpg" width="2117" height="1286" alt="BUSINESS"/></figure>
        <p>YouTuberやTikTokerを活用したインフルエンサー・マーケティングを中心とした広告代理店事業を展開しています。クライアント企業様のマーケティング・ソリューションをすることを第一に考え、タレントのみならず、他社所属YouTuberやTikTokerも取り扱っております。</p>
      </div>
    </div>
    <div class="btn">
      <div class="btn-more btn-more-yellow"><a href="<?php echo esc_url( home_url( '/business/' ) ); ?>"><span>MORE</span></a></div>
    </div>
  </section>
  
  <section id="index-contact">
    <div class="text">
      <p>CONTACT</p>
      <p>CONTACT</p>
      <p>CONTACT</p>
      <p>CONTACT</p>
      <p>CONTACT</p>
    </div>
    <h3>まずはお気軽にお問い合わせください</h3>
    <div class="btn-more btn-more-pink"><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><span>MORE</span></a></div>
  </section>
  
</main>

<?php
get_footer();
