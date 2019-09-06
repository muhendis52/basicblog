<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>

   <div class="col-md-5">


     <form class="" action="<?php echo base_url('admin/altsecenekekle/'); echo $this->uri->segment(3);?>" method="post">
       <div class="form-group">
         <label for="">Altseçenek Adı :</label>
         <input type="text" name="sadi" value="" class="form-control">
       </div>

       <button type="submit" name="button" class="btn btn-success">Ekle</button>
     </form>
   </div>





<?php $this->load->view('admin/include/footer'); ?>
