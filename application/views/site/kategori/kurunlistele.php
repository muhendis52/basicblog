<?php $this->load->view('site/include/header'); ?>

<div class="container">
  <div class="row  d-flex flex-row-reverse">
    <div class="col-md-9">
      <div class="row">
        <?php if($sorgu2)
        {
         ?>
         <?php foreach($sorgu2 as $key){?>
         <div class="col-md-4">
           <div class="card">
            <img class="card-img-top" src="<?php echo base_url('assets/site/img/urunler/').$key->id?>.jpg" alt="Card image cap" width="150" height="150"> <hr>
            <div class="card-body">
              <h5 class="card-title text-center"><?php echo $key->baslik ?></h5> <hr>
              <h5 class="card-title text-center"><?php echo $key->yeni_fiyat ?>₺</h5> <hr>
              <p class="card-text"> </p>
              <div class="text-center">
                <a href="<?php echo base_url('anasayfa/kurunincele/').$key->id;?>" class="btn btn-success">İncele</a>
                <a href="#" class="btn btn-warning">Sepete Ekle</a>
              </div>
            </div>
          </div>
         </div>
       <?php } ?>
         <?php
       }else {
         echo "<p class='alert alert-danger'>Bu kategoriye ait ürün bulunmamaktadır...</p>";
       }
        ?>



      </div>
    </div>
    <div class="col-md-3">
   <?php $this->load->view('site/include/sidebar');?>
    </div>
  </div>
</div>

<?php $this->load->view('site/include/footer'); ?>
