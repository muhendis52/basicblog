<?php $this->load->view('admin/include/header');?>
<?php $this->load->view('admin/include/sidebar');?>
<div class="container">
  <table class="table">
  <thead class="thead-dark" style="background-color:black;color:white">
    <tr>
      <th scope="col">İd</th>
      <th scope="col">Ad ve Soyad</th>
      <th scope="col">Mail </th>
      <th scope="col">Mesaj</th>
      <th scope="col">İşlemler</th>
    </tr>
  </thead>
  <tbody>
   <?php foreach($mesaj as $key) {  ?>
     <tr>
       <td><?php echo $key->id ?></td>
       <td><?php echo $key->g_adsoyad ?></td>
       <td><?php echo $key->g_email ?></td>
       <td><?php echo $key->g_mesaj ?></td>
       <td>
         <a href="#" class="btn btn-primary">Oku</a>
         <a href="<?php echo base_url('admin/mesajsil/').$key->id;?>" class="btn btn-danger">Sil</a>
       </td>
     </tr>
   <?php } ?>
  </tbody>
</table>
</div>
<?php $this->load->view('admin/include/footer');?>
