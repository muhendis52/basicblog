<?php $this->load->view('admin/include/header');
 $this->load->view('admin/include/sidebar'); ?>
<?php echo $this->session->flashdata('bilgi'); ?>
 <div class="col-md-5">
<?php foreach($sorgu as $key){ ?>
   <form class="" action="<?php echo base_url('admin/secenekduzenlee');?>" method="post">
     <div class="form-group">
       <label for="">Secenek Adı :</label>
       <input type="text" name="name" value="<?php  echo $key['name']; ?>" class="form-control">
       <input type="hidden" name="id" value="<?php  echo $key['id']; ?>" class="form-control">
     </div>
     <button type="submit" name="button" class="btn btn-success">Düzenle</button>
   </form>
 </div>
<?php } ?>

<?php $this->load->view('admin/include/footer'); ?>
