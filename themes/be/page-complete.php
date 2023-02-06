<?php
get_header();
?>

<main class="contact">
  
  <section id="page-contact">
    <div class="title">
      <div class="wrap">
        <h2>CONTACT</h2>
        <small>コンタクト</small>
      </div>
    </div>
    <div class="body">
      <div class="wrap">
        <h3>送信完了</h3>
        <div class="contact-complete">
          <h4>お問い合わせ頂き、ありがとうございました。</h4>
          <p>お問い合わせ内容を確認させて頂き、担当者より回答させて頂きます。<br>
内容よっては、お時間を頂戴する場合、また、お返事を差し上げられない場合がございます事ご了承ください。</p>
          <div class="btn">
            <div class="btn-more btn-more-pink btn-back"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span>TOPへ</span></a></div>
          </div>
          <?php echo do_shortcode('[mwform_formkey key="160"]'); ?>
        </div>
      </div>
    </div>
  </section>
  
</main>

<?php
get_footer();
