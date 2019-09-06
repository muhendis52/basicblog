<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>
<table class="table">
 <thead class="thead-dark" style="background-color:black;color:white">
   <tr>
     <th scope="col">İd</th>
     <th scope="col">Ürün İd</th>
     <th scope="col">Ürün Ad</th>
     <th scope="col">Ürün Fiyat</th>
     <th scope="col">Alıcı Ad ve soyad</th>
     <th scope="col">Alıcı E-mail</th>
     <th scope="col">Alıcı Adres</th>
   </tr>
 </thead>
 <tbody>
     <?php foreach ($sonuc as $key) { ?>
   <tr>

      <td><?php echo $key->id ?></td>
      <td><?php echo $key->urunid ?></td>
      <td><?php echo $key->urunad ?></td>
      <td><?php echo $key->urunfiyat ?></td>
      <td><?php echo $key->alici_adsoyad ?></td>
      <td><?php echo $key->alici_email ?></td>
      <td><?php echo $key->alici_adres ?></td>
    </tr>
    <?php } ?>
 </tbody>
</table>
<?php $this->load->view('admin/include/footer'); ?>
