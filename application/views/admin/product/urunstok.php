<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>

   <div class="col-md-8">

<?php echo $this->session->flashdata('bilgi');?>
     <form class="" action="<?php echo base_url('admin/urunstoktipiekle/');echo $this->uri->segment(3);?>" method="post">

       <button type="submit" value="1" name="stepone" class="btn btn-success btn-block">Ekle</button>
     </form>
   </div>

   <div class="col-md-4" style="margin-top:25px;">
    <div class="box box-primary">
      <h3 class="text-center text-danger">Son Aşama</h3> <hr>
      <p class="text-center text-primary">Ürün Seçenekleri ve Stok Bilgileri</p> <hr>
    </div>
   </div>

     </div>
   </div>





<?php $this->load->view('admin/include/footer'); ?>
