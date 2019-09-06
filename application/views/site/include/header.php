<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title><?php foreach ($sorgu as $key) {echo $key->site_adi;}?> | Yöresel Ürünlerimiz</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/site/');?>css/bootstrap.css">
		<link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
     <link rel="stylesheet" href="<?php echo base_url('assets/site/');?>css/mycss.css">
     <link rel="stylesheet" href="fontawesome/css/all.css">
		 <style media="screen">
		 	 *{
				 font-family: 'Ubuntu', sans-serif;
			 }
		 </style>
</head>
<body style="background-color: #F6F6F6">
 <div class="container">
 	<div class="row">
 		<div class="col-md-12">
 			<!-- Menü Başlangıç-->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="<?php echo base_url(); ?>"><?php foreach ($sorgu as $key) {echo $key->site_adi;}?></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="<?php echo base_url(); ?>"> <i class="fas fa-home"></i>   Anasayfa <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="<?php echo base_url('anasayfa/hakkimizda');?>"> <i class="fa fa-building"></i> Hakkımızda</a>
	      </li>

	      <li class="nav-item">
	        <a class="nav-link" href="<?php echo base_url('anasayfa/iletisim');?>"  aria-disabled="true"><i class="fas fa-mail-bulk"></i>  İletişim</a>
	      </li>
	    </ul>
	  </div>
	</nav>
	  </div>
	</div>
	<!-- Menü Bitiş -->
 </div> <br>
 <div class="container">

 </div>
<!-- Sepetim ve üyelik kısmı-->
 <div class="container">
 	<div class="row d-flex align-items-center">
 			<div class="col-md-3 ">
 		   			<img src="<?php echo base_url('assets/site/');?>img/yore.jpg" class="img-fluid" alt="" width="300" height="180">
			 </div>
 		<div class="col-md-9 ">
 		  	<div class="row">
 		  		<div class="col-md-5">
 		  			<form action="<?php echo base_url('anasayfa/arama');?>" method="post">
						<div class="input-group mb-3">
						  <input type="text" name="ara"; class="form-control" placeholder="Ne aramıştınız ? Örn: Turşu" aria-label="Recipient's username" aria-describedby="button-addon2">
						  <div class="input-group-append">
						    <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fas fa-search"></i> | Ara</button>
						  </div>
						</div>
			        </form>
 		  		</div>
 		  		<div class="col-md-4">
						<?php
							if($this->session->userdata('kullaniciadi'))
							{

								echo "<p class='alert alert-success'>  Hoşgeldin : ".$this->session->userdata('kullaniciadi').'</p>';
								echo "<a href='".base_url('anasayfa/uyecikis')."' class='btn btn-danger'>Çıkış Yap</a>";
							}
              else if($this->uri->segment(2)=='kayitol')
							{
								echo '<a  href="'.base_url('anasayfa/girisyap').'" class="btn btn-danger"><i class="fas fa-user-clock"></i> | Giriş Yap</a> <br>';
							}
							else if($this->uri->segment(2)=='girisyap')
							{
								echo '<a  href="'.base_url('anasayfa/kayitol').'" class="btn btn-primary"><i class="fas fa-user-plus"></i> | Üye ol</a> <br>';
							}
							else
							{
								echo '<a href="'.base_url("anasayfa/kayitol").'" class="btn btn-primary"> <i class="fas fa-user-plus"></i> | Üye ol</a>
			 		  			<a  href="'.base_url('anasayfa/girisyap').'" class="btn btn-danger"><i class="fas fa-user-clock"></i> | Giriş Yap</a> <br>';
							}


						 ?>


 		  		</div>
 		  		<div class="col-md-3">
 		  			 <?php if($this->uri->segment(2)!='sepet' && $this->uri->segment(2)!='siparis'){
							 echo '<a href="'.base_url('anasayfa/sepet').'" class="btn btn-warning"><i class="fa fa-shopping-cart"></i> |  Sepete Git</a>
	 		  		</div>';
						 } ?>
 		  	</div>

 		</div>

 		</div>
 	</div>
<hr>
 <!-- Sepetim ve üyelik kısmı bitiş -->

 <!-- İçerik kısmı -->
