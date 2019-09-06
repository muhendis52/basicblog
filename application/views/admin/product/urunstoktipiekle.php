<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>

   <div class="col-md-8">


     <form class="" action="<?php echo base_url('admin/urunstoktipieklee/').$this->uri->segment(3);?>" method="post">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="exampleFormControlSelect1">Ürün seçeneklerini Belirleyiniz</label>
            <select class="form-control" id="exampleFormControlSelect1" name="secenek">
              <?php foreach ($sorgu as $key) {  ?>
                <option value="<?php echo $key['id'] ?>"><?php echo $key['name']; ?></option>
              <?php } ?>
            </select>
           </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="exampleFormControlSelect1">Seçenek Miktarını Belirtin</label>
            <select class="form-control" id="exampleFormControlSelect1" name="miktar">
              <?php foreach ($options as $key) {  ?>
                <option value="<?php echo $key->id?>"><?php echo $key->name ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="">Stok Sayısı</label>
            <input type="number" name="stok" value="" min="1" class="form-control">
          </div>
        </div>
      </div>
       <button type="submit" value="1" name="stepone" class="btn btn-success">Ekle</button>
     </form>
   </div>

   <div class="col-md-4" style="margin-top:25px;">
    <div class="box box-primary">
      <h3 class="text-center text-danger">Son Aşama</h3> <hr>
      <p class="text-center text-primary">Ürün Seçenekleri ve Stok Bilgileri</p> <hr>
    </div>
    <a href="<?php echo base_url('admin/uruncontroller/');echo $this->uri->segment(3);?>" name="button" class="btn btn-block btn-flat btn-success"><i class="fa fa-check"></i> Ürünü Kaydet</a>
   </div>

     </div>
   </div>





<?php $this->load->view('admin/include/footer'); ?>
