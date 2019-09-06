<?php $this->load->view('site/include/header');?>
<div class="container">
  <div class="row d-flex flex-row-reverse">
    <div class="col-md-9 mb-5">
     <form  action="<?php echo base_url('anasayfa/siparistamamla/').$this->uri->segment(3);?>" method="post">
       <div class="form-group">
         <label for="">Adınız ve Soyadınız</label>
         <input type="text" name="adsoyad" value="" class="form-control" required>
       </div>
       <div class="form-group">
         <label for="">E-mail adresiniz</label>
         <input type="email" name="email" value="" class="form-control" required>
       </div>
       <div class="form-group">
         <label for="">Siparişin Gönderileceği adres</label>
         <textarea class="form-control" name="adres" rows="8" cols="80" required></textarea>
       </div>
      <button type="submit" name="button" class="btn btn-success">Siparişi Tamamla</button>
      <a href="<?php echo base_url('anasayfa')?>" class="btn btn-danger">İptal Et</a>
     </form>
    </div>
    <div class="col-md-3">
      <?php $this->load->view('site/include/sidebar');?>
    </div>
  </div>
</div>
<?php $this->load->view('site/include/footer');?>
