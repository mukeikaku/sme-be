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
        <h3>入力確認</h3>
        <div class="contact-form">
          <?php echo do_shortcode('[mwform_formkey key="160"]'); ?>
        </div>
      </div>
    </div>
  </section>
  
</main>

<?php
get_footer();
