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
        <h3>お問い合わせ入力</h3>
        <p>所属クリエイター・またBeへのお問い合わせにつきましては、下記フォームにご記入いただき、「入力内容の確認」ボタンを押して内容をご確認のうえ、送信してください。内容に応じて、担当より回答させて頂きます。<br>
尚、お問い合わせの内容によっては、お時間を頂戴する場合、また、お返事を差し上げられない場合がございます事ご了承ください。</p>
        <div class="contact-form">
          <?php echo do_shortcode('[mwform_formkey key="160"]'); ?>
        </div>
      </div>
    </div>
  </section>
  
</main>

<?php
get_footer();
