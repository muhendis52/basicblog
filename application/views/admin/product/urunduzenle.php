<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>

  <div class="col-md-6">


     <form class="" action="<?php echo base_url('admin/urunduzenle/').$this->uri->segment(3);?>" method="post">
       <?php foreach ($sorgu  as $key) {?>
       <div class="form-group">
         <label for="">Ürün Adı :</label>
         <input type="text" name="baslik" value="<?php echo $key['baslik']; ?>" class="form-control">
       </div>


       <div class="form-group">
         <div class="row">
           <div class="col-xs-6">
            <div class="form-group">
              <label for="">Eski Fiyat</label>
              <input type="text" name="eski" value="<?php echo $key['eski_fiyat']; ?>" class="form-control">
            </div>
           </div>
           <div class="col-xs-6">
             <div class="form-group">
               <label for="">İndirimli Fiyat</label>
               <input type="text" name="yeni" value="<?php echo $key['yeni_fiyat']; ?>" class="form-control">
             </div>
           </div>
         </div>
       </div>
       <div class="form-group">
         <label for="">Ürün Etiketleri</label>
         <input type="text" name="etiket" value="<?php echo $key['etiket']; ?>" class="form-control">
       </div>
       <div class="form-group">
         <label for="">Ürün Açıklaması</label>
         <textarea name="aciklama" rows="8" cols="80" class="form-control"><?php echo $key['aciklama']; ?></textarea>
       </div>

   <?php } ?>

   <div class="form-group">
    <label for="exampleFormControlSelect1">Ürün kategorisi</label>
    <select class="form-control" id="exampleFormControlSelect1" name="kategori">
      <?php
      $this->load->model('mymodel');
      $sorgu=$this->mymodel->kategoricek();
      foreach ($sorgu as $key) {?>
      <option value="<?php echo $key['id'] ?>"><?php echo $key['kategori_ad'];?></option>
      <?php } ?>

    </select>
  </div>

    <div class="form-group">
      <label for="exampleFormControlSelect2">Ürün seçenekleri</label>
      <select  class="form-control" id="exampleFormControlSelect2" name="secenekler">

        <?php
        $this->load->model('mymodel');
        $sorgu=$this->mymodel->secenekcek();
        foreach ($sorgu as $key) {?>
        <option value="<?php $key->id?>"><?php echo $key->name; ?></option>
        <?php } ?>

      </select>
    </div>
       <button type="submit" value="1" name="product" class="btn btn-success">Güncelle</button>
     </form>
   </div>


   <div class="col-md-6" style="margin-top:2%;margin-bottom:2%">
    <div class="box box-primary">
      <h3 class="text-center text-danger">Stok Güncelle</h3> <hr>
      <p class="text-center text-primary">Stok Bilgileri</p> <hr>
    </div>
  </div>

  <div class="col-md-6">
    <table class="table">
     <thead class="" style="background-color:black;color:white;">
       <tr>
         <th scope="col">İd</th>
         <th scope="col">Seçenek Adı</th>
         <th scope="col">Stok Sayısı</th>
         <th scope="col">Altseçenek Adları</th>

       </tr>
     </thead>
     <tbody>

         <?php foreach ($options as $key){ ?>
           <tr>
             <td><?php echo $key->product ?></td>
             <td><?php
             if($key->miktar==1)
             {
               echo "Ürün Miktarı";
             }
             else {
               echo "Ürün Adedi";
             }
             ?></td>
             <td><?php echo $key->stok ?></td>
             <td><?php
             $this->load->model('mymodel');
             $zafer = $this->mymodel->altsecenekcek($key->miktar);
             foreach($zafer as $key){
               echo $key['name']."|";
             } ?></td>
          </tr>
         <?php } ?>


     </tbody>
   </table>
  </div>

</div>

</div>

<?php $this->load->view('admin/include/footer'); ?>
