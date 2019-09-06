

<?php $this->load->view('site/include/header'); ?>



<div class="container">
  <div class="row d-flex flex-row-reverse">
    <div class="col-md-9">
      <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Ürün İd</th>
      <th scope="col">Ürün Adı</th>
      <th scope="col">Ürün Fiyatı</th>
      <th scope="col">İşlemler</th>
    </tr>
  </thead>
  <tbody>
  <tr>

      <td><?php echo $this->session->userdata('id');?></td>
      <td><?php echo $this->session->userdata('baslik');?></td>
      <td><?php echo $this->session->userdata('yeni_fiyat');?></td>
      <td>
        <a href="<?php echo base_url('anasayfa/siparis/').$this->uri->segment(3);?>" class="btn btn-sm btn-warning">Devam et</a>
        <a href="<?php echo base_url('anasayfa/sepetbosalt') ?>" class="btn btn-sm btn-danger">Kaldır</a>
      </td>
  </tr>


  </tbody>
</table>

<hr>
 <div class="alert alert-success">
   Toplam Tutar : <?php echo $this->session->userdata('yeni_fiyat');?> ₺
 </div>
    </div>
    <div class="col-md-3">
      <?php $this->load->view('site/include/sidebar'); ?>
    </div>
  </div>
</div>

<?php $this->load->view('site/include/footer'); ?>
