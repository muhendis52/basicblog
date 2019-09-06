<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>

   <div class="col-md-8">


     <form class="" action="<?php echo base_url('admin/uruncontroller');?>" method="post">
       <div class="form-group">
         <label for="">Ürün Adı :</label>
         <input type="text" name="baslik" value="" class="form-control">
       </div>
       <div class="form-group">
        <label for="exampleFormControlSelect1">Ürün kategorisi</label>
        <select class="form-control" id="exampleFormControlSelect1" name="kategori">
          <?php
          $this->load->model('mymodel');
          $sorgu=$this->mymodel->kategoricek();
          foreach ($sorgu as $key) {?>
          <option value="<?php echo $key['id']?>"><?php echo $key['kategori_ad'];?></option>
          <?php } ?>

        </select>
      </div>
      <div class="form-group">

        <div class="form-group">
          <label for="exampleFormControlSelect2">Ürün seçenekleri</label>
          <select  class="form-control" id="exampleFormControlSelect2" name="secenekler">
             <?php
             $this->load->model('mymodel');
             $sorgu=$this->mymodel->secenekcek();
             foreach ($sorgu as $key) {?>
             <option value="<?php echo $key->id?>"><?php echo $key->name; ?></option>
             <?php } ?>
          </select>
        </div>
      </div>

       <div class="form-group">
         <div class="row">
           <div class="col-xs-6">
            <div class="form-group">
              <label for="">Eski Fiyat</label>
              <input type="text" name="eski" value="" class="form-control">
            </div>
           </div>
           <div class="col-xs-6">
             <div class="form-group">
               <label for="">İndirimli Fiyat</label>
               <input type="text" name="yeni" value="" class="form-control">
             </div>
           </div>
         </div>
       </div>
       <div class="form-group">
         <label for="">Ürün Etiketleri</label>
         <input type="text" name="etiket" value="" class="form-control">
       </div>
       <div class="form-group">
         <label for="">Ürün Açıklaması</label>
         <textarea name="aciklama" rows="8" cols="80" class="form-control"></textarea>
       </div>


       <button type="submit" value="1" name="stepone" class="btn btn-success">Ekle</button>
     </form>
   </div>

   <div class="col-md-4">
    <div class="box box-primary">
      <h3 class="text-center text-danger">Birinci Aşama</h3> <hr>
      <p class="text-center text-primary">Ürün Bilgileri</p> <hr>
    </div>
   </div>

     </div>
   </div>





<?php $this->load->view('admin/include/footer'); ?>
