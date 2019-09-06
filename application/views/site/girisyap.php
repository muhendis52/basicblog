<?php $this->load->view('site/include/header');?>
<div class="container">
  <div class="row d-flex flex-row-reverse">
    <div class="col-md-9">


        <form class="" action="<?php echo base_url('anasayfa/girispost');?>" method="post">
            <?php echo validation_errors();?>
            <?php echo $this->session->flashdata('bilgi'); ?>
          <div class="form-group">
            <label for="">Kullanıcı Adınız</label>
            <input type="text" name="kadi" value="" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Şifreniz</label>
            <input type="password" name="sifre" value="" class="form-control">
          </div>
          <button type="submit" name="button" class="btn btn-primary">Giriş Yap</button>
          <a href="#" class="btn btn-danger">Şifremi unuttum</a>
        </form>
    </div>
    <div class="col-md-3">
      <?php $this->load->view('site/include/sidebar');?>
    </div>
  </div>
</div>
<?php $this->load->view('site/include/footer');?>
