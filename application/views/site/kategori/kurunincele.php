<?php $this->load->view('site/include/header');?>
<div class="container">
  <div class="row d-flex flex-row-reverse">
    <div class="col-md-9">

        <div class="row">
          <?php foreach ($uruncek as $key) { ?>
          <div class="col-md-8">
            <img src="<?php echo base_url('assets/site/img/urunler/').$key['id'];?>.jpg" alt="" class="img-fluid" width="450" height="450">
          </div>
          <div class="col-md-4">
            <h2 class="text-center">Ürün Bilgileri</h2> <hr>

            <h4 class="text-center">Ürün Adı :</h4> <hr>
            <h4 class="text-center lead"><?php echo $key['baslik'] ?></h4>
            <p class="text-center"><del style="font-size:25px" class="text-center"><?php echo $key['eski_fiyat'] ?> ₺</del></p>
             <p class="text-center" style="font-size:25px;"><?php echo $key['yeni_fiyat'] ?> ₺</p>
               <?php } ?>

             <div class="text-center mt-5">
               <div class="form-group">
                 <label for="exampleFormControlSelect1">Sipariş Türünü Seçiniz</label>
                 <select class="form-control" id="exampleFormControlSelect1">
                    <option value="">Ürün adedi</option>
                    <option value="">Ürün miktarı</option>
                 </select>
              </div>

               <div class="form-group">
                 <label for="exampleFormControlSelect1">Sipariş Miktarını Seçin</label>
                 <select class="form-control" id="exampleFormControlSelect1">
                   <option>1</option>
                   <option>2</option>
                   <option>3</option>
                   <option>4</option>

                 </select>
                </div>
                  <a href="<?php echo base_url('anasayfa/sepet/').$this->uri->segment(3);?>" name="button" class="btn btn-warning">Sepete Ekle</button>
                  <a href="<?php echo base_url(); ?>" class="btn btn-danger">Anasayfaya dön</a>
             </div>
          </div>
        </div>
   <hr>
   <div class="m-5">
     <ul class="nav nav-tabs" id="myTab" role="tablist">
   <li class="nav-item">
     <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Açıklama</a>
   </li>
   <li class="nav-item">
     <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Ürün Yorumları</a>
   </li>
   <li class="nav-item">
     <a class="nav-link" id="profile-tab" data-toggle="tab" href="#home2" role="tab" aria-controls="profile" aria-selected="false">Yorum ekle</a>
   </li>


 </ul>
   </div>

    <div class="tab-content m-5" id="myTabContent">
      <?php foreach ($uruncek as $key) { ?>
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="container">
          <div class="card m-2 p-5">
            <?php echo $key['aciklama'];?>
          </div>
        </div>
      </div>
    <?php } ?>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
           <div class="container">
             <div class="card p-2 m-2">

               <?php foreach ($yorumlar as $key) { ?>
                  <?php
                  if($key->id>0)
                  {
                    echo "<p class='text-center'>".$key->g_adsoyad."</p><hr>
                          <p class='text-center'>".$key->yorum."</p>";
                  }
                  ?>

               <?php } ?>

             </div>
           </div>
      </div>

      <div class="tab-pane fade show" id="home2" role="tabpanel" aria-labelledby="home-tab">
        <div class="container">
         <form   action="<?php echo base_url('anasayfa/yorumekle/').$this->uri->segment(3);?>" method="post">
           <div class="form-group">
             <label for="">Adınız ve Soyadınız</label>
             <input type="adsoyad" name="adsoyad" value="" class="form-control">
           </div>
           <div class="form-group">
             <label for="">E-mail Adresiniz</label>
             <input type="email" name="email" value="" class="form-control">
           </div>
           <div class="form-group">
             <label for="">Yorumunuz</label>
             <textarea name="yorum" rows="8" cols="80" class="form-control" ></textarea>
           </div>
           <button type="submit" name="button" class="btn btn-success">Yorum yap</button>
         </form>
        </div>
      </div>

    </div>

    </div>
    <div class="col-md-3">
      <?php $this->load->view('site/include/sidebar');?>
    </div>
  </div>
</div>
<?php $this->load->view('site/include/footer');?>
