<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>

     <div class="col-md-8">
        <form class="dropzone" action="<?php echo base_url('admin/urunresimekle/'); echo $this->uri->segment(3);?>" method="post" enctype="multipart/form-data">


        </form>

      <a href="<?php echo base_url('admin/urunstokekle/');echo $this->uri->segment(3);?>" class="btn btn-success " style="margin-top:5%">Ürün seçenekleri ve Stok bilgilerini ekle</a>

     </div>
     <div class="col-md-4">
      <div class="box box-primary">
        <h3 class="text-center text-danger">İkinci Aşama</h3> <hr>
        <p class="text-center text-primary">Ürün Resimleri</p> <hr>
      </div>
     </div>

       </div>
     </div>





<?php $this->load->view('admin/include/footer'); ?>
