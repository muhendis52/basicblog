<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>
 <?php foreach ($config as $key) {  ?>

 

<div class="container">

  <div class="row">
     <div class="col-md-8 ">

         <form class="" action="<?php echo base_url('admin/ayarlarpost') ?>" method="post">

           <div class="form-group">
             <label for="">Site Adı:</label>
             <input type="text" name="siteadi" value="<?php echo $key->site_adi; ?>" class="form-control"   required>
           </div>
           <div class="form-group">
             <label for="">Site logo:</label>
             <input type="text" name="sitelogo" value="<?php echo $key->site_logo; ?>" class="form-control" required>
           </div>
           <div class="form-group">
             <label for="">Site bilgi:</label>
             <textarea name="sitebilgi" rows="8" cols="80" class="form-control" required><?php echo $key->site_bilgi; ?></textarea>
           </div>
           <button type="submit" name="button" class="btn btn-success">Kaydet</button>

         </form>
       </div>
     </div>
  </div>
 <?php } ?>




<?php $this->load->view('admin/include/footer');?>
