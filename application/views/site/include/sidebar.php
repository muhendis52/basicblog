<!-- Sidebar Kısmı-->
<div class="d-flex flex-column ">
<div class="card ">
<div class="card-header text-center">
<h4>Kategoriler</h4>
</div>

 <?php foreach ($kategoriler as $key) {  ?>
   <ul class="list-group list-group-flush ">
   <li class="list-group-item bglightblue text-center"><a href="<?php echo base_url('anasayfa/kurungoruntule/').$key['id'];?>" class="text-white text-center">
     <i class="<?php echo $key['kategori_icon']?>"> </i> <?php echo $key['kategori_ad'] ?></a></li>
 </ul>
 <?php } ?>


</div>
</div>
<!-- Sidebar Bitiş-->
