<?php $this->load->view('admin/include/header');
 $this->load->view('admin/include/sidebar'); ?>
<?php echo $this->session->flashdata('bilgi'); ?>
 <div class="col-md-5">
<?php foreach($sorgu as $key){ ?>
   <form class="" action="<?php echo base_url('admin/katduzenle');?>" method="post">
     <div class="form-group">
       <label for="">Kategori Adı :</label>
       <input type="text" name="katadi" value="<?php  echo $key['kategori_ad']; ?>" class="form-control">
       <input type="hidden" name="id" value="<?php  echo $key['id']; ?>" class="form-control">
     </div>
     <div class="form-group">
       <label for="">Kategori İcon :</label>
       <input type="text" name="icon" value="<?php  echo $key['kategori_icon']; ?>" class="form-control">
     </div>
     <button type="submit" name="button" class="btn btn-success">Düzenle</button>
   </form>
 </div>
<?php } ?>

<?php $this->load->view('admin/include/footer'); ?>
