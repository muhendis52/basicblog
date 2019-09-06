<?php $this->load->view('site/include/header');?>
<div class="container">
  <div class="row d-flew flex-row-reverse">
    <div class="col-md-9">

        <h3 class="text-center">Üye Kayıt Sayfası</h3> <hr>
        <?php echo validation_errors(); ?>
        <form class="" action="<?php echo base_url('anasayfa/kayitoll');?>" method="post">
          <div class="form-group">
            <label for="">Adınız ve Soyadınız</label>
            <input type="text" name="adsoyad" value="" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Kullanıcı adınız</label>
            <input type="text" name="kadi" value="" class="form-control">
          </div>
          <div class="form-group">
            <label for="">E-mail adresiniz</label>
            <input type="email" name="email" value="" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Şifreniz</label>
            <input type="password" name="sifre" value="" class="form-control">
          </div>
          <button type="submit" name="button" class="btn btn-primary">Kayıt ol</button>
        </form>


    </div>
    <div class="col-md-3">
      <?php $this->load->view('site/include/sidebar');?>
    </div>
  </div>
</div>

<?php $this->load->view('site/include/footer');?>
