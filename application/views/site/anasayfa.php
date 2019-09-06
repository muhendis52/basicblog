<?php $this->load->view('site/include/header'); ?>
<div class="container">
  <?php echo $this->session->flashdata('bilgi'); ?>
</div>
 <div class="container">
 	<div class="row  d-flex flex-row-reverse">
 		<div class="col-md-9 ">
 			  <!--Slider Kısmı-->
 			 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				  <ol class="carousel-indicators">
				    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				  </ol>
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				      <img class="d-block w-100" src="<?php echo base_url('assets/site/');?>img/a.jpg" alt="First slide">
				    </div>
				    <div class="carousel-item">
				      <img class="d-block w-100" src="<?php echo base_url('assets/site/');?>img/b.jpg" alt="Second slide">
				    </div>
				    <div class="carousel-item">
				      <img class="d-block w-100" src="<?php echo base_url('assets/site/');?>img/c.jpg" alt="Third slide">
				    </div>
				  </div>
				  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
			</div>
			<!--Slider Bitiş-->
			<!-- Site hakkında ufak şeyler -->
			<div class="row mt-2">
				<div class="col-md-3">
					<div class="card"  >
					  <div class="card-body">
					    <img src="<?php echo base_url('assets/site/');?>img/icerik/organik.jpeg" class="img-fluid" alt="" width="100%" height="auto">
					    <h6 class="card-subtitle mb-2 text-muted">HALDENANLAYAN GARANTİSİ İLE</h6>
					    <p class="card-text">%100 Organik ve yerli Ürünler</p>
					  </div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card"  >
					  <div class="card-body">
					    <img src="<?php echo base_url('assets/site/');?>img/icerik/karadeniz.jpg" class="img-fluid" alt="">
					    <h6 class="card-subtitle mb-2 text-muted">KARADENİZ BÖLGESİNDE</h6>
					    <p class="card-text"> Özenle seçilen ve özel üretilen yöresel tatlar</p>
					  </div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card"  >
					  <div class="card-body">
					    <img src="<?php echo base_url('assets/site/');?>img/icerik/kamyon.jpg" class="img-fluid" alt="">
					    <h6 class="card-subtitle mb-2 text-muted ">AYNI GÜN İÇİNDE KARGO</h6>
					    <p class="card-text">Siparişinizi verin ve aynı gün içerisinde kargolayalım ! Üstelik 100 TL ve üzeri alışverişinizde KARGO BEDAVA !!  </p>
					  </div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card"  >
					  <div class="card-body">
					   <img src="<?php echo base_url('assets/site/');?>img/icerik/ssl.png" class="img-fluid" alt="">
					    <h6 class="card-subtitle mb-2 text-muted">SSL GÜVENCESİ İLE </h6>
					    <p class="card-text">Bilgilerinizi 3. kişilere karşı korumak adına SSL güvenlik sertifikası vasıtasıyla size güvence sağlıyoruz</p>
					  </div>
					</div>
				</div>
			</div>
			<!-- Site Bilgiler Bitiş -->
 		 <!-- Popüler Ürünler Kategorisi -->
			<h2>----------------- SON EKLENEN ÜRÜNLER----------------------------</h2>
      <div class="row">
     <?php $this->load->model('mymodel');
     $sorgu =$this->mymodel->soneklenenler();
      foreach ($sorgu as $key) { ?>
      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="<?php echo base_url('assets/site/img/urunler/').$key->id?>.jpg" alt="Ürün resmi" width="200" height="200">
          <div class="card-body">
            <h5 class="card-title text-center"><?php echo $key->baslik ?></h5>
            <p class="text-center"> <?php echo $key->yeni_fiyat ?>₺</p>
            <a href="<?php echo base_url('anasayfa/kurunincele/').$key->id ?>" class="btn btn-primary">İncele</a>
            <a href="<?php echo base_url('anasayfa/sepet/').$key->id; ?>" class="btn btn-warning">Sepete Ekle</a>
          </div>
        </div>
      </div>
      <?php } ?>
      </div>

			 <!-- Çok Satanlar bitiş -->

 		</div>

 		<div class="col-md-3">
 		<?php $this->load->view('site/include/sidebar'); ?>
    <?php $this->load->view('site/include/sitebilgi');?>
 		</div>
 	</div>
 </div>
<?php $this->load->view('site/include/footer');?>
