<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>

   <div class="col-md-5">


     <form class="" action="<?php echo base_url('admin/kategoriekle');?>" method="post">
       <div class="form-group">
         <label for="">Kategori Adı :</label>
         <input type="text" name="katadi" value="" class="form-control">
       </div>
       <div class="form-group">
         <label for="">Kategori ikonu :</label>
         <input type="text" name="icon" value="" class="form-control">
       </div>
       <button type="submit" name="button" class="btn btn-success">Ekle</button>
     </form>
   </div>





<?php $this->load->view('admin/include/footer'); ?>
