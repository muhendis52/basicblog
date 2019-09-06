<?php $this->load->view('site/include/header');?>
<div class="container">
  <div class="row d-flex flex-row-reverse">
    <div class="col-md-9">
      <h3 class="text-center">İletisim Sayfası</h3>
       <form class="" action="<?php echo base_url('anasayfa/mesajekle');?>" method="post">
         <div class="form-group">
           <label for="">Adınız Ve Soyadınız</label>
           <input type="text" name="adsoyad" value="" class="form-control" required>
         </div>
         <div class="form-group">
           <label for="">E-Mail Adresiniz</label>
           <input type="email" name="email" value="" class="form-control"  required>
         </div>
         <div class="form-group">
           <label for="">Mesajınız :</label>
            <textarea name="mesaj" rows="8" cols="80" class="form-control" required></textarea>
         </div>
         <button type="submit" name="button" class="btn btn-primary">Gönder</button>
       </form>
    </div>
    <div class="col-md-3">
      <?php $this->load->view('site/include/sidebar');?>
    </div>
  </div>
</div>
<?php $this->load->view('site/include/footer');?>
