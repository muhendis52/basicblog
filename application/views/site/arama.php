 <?php $this->load->view('site/include/header');?>
 <div class="container">
   <div class="row d-flex flex-row-reverse">
     <div class="col-md-9">
        <div class="row">
          <?php foreach ($arama as $key) { ?>
          <div class="col-md-4">

               <div class="card">
               <img class="card-img-top" src="<?php echo base_url('assets/site/img/urunler/').$key->id?>.jpg" alt="Ürün resmi" width="150" height="150">
               <div class="card-body">
                 <h5 class="card-title"><?php echo $key->baslik ?></h5>
                 <p class="card-text"><?php echo $key->yeni_fiyat ?> </p>
                 <a href="#" class="btn btn-primary">İncele</a>
                 <a href="#" class="btn btn-warning">Sepete Ekle</a>
               </div>
             </div>

          </div>
                 <?php } ?>
        </div>
     </div>
     <div class="col-md-3">
   <?php $this->load->view('site/include/sidebar');?>
     </div>
   </div>
 </div>
 <?php $this->load->view('site/include/footer');?>
