
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/admin/');?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Zafer Yıldız</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header text-center">MENULER</li>
        <li class="<?php echo active('panel'); ?>">
          <a href="<?php echo base_url('admin/panel');?>">
            <i class="fa fa-home"></i> <span>Anasayfa</span>
          </a>
        </li>
        <li class="<?php echo  active('ayarlar'); ?>">
          <a href="<?php echo base_url('admin/ayarlar') ?>">
            <i class="fa fa-cog"></i> <span>Ayarlar</span>
          </a>
        </li>
        <li class="<?php echo  active('kategoriler'); ?>">
          <a href="<?php echo base_url('admin/kategoriler') ?>">
            <i class="fa fa-list-alt"></i> <span>Ürün Kategorileri</span>
          </a>
        </li>
        <li class="<?php echo  active('urunsecenekleri'); ?>">
          <a href="<?php echo base_url('admin/urunsecenekleri') ?>">
            <i class="fa fa-align-justify"></i> <span>Ürün Seçenekleri</span>
          </a>
        </li>
        <li class="<?php echo  active('urunler'); ?>">
          <a href="<?php echo base_url('admin/urunler') ?>">
            <i class="fa fa-shopping-bag"></i> <span>Ürünler</span>
          </a>
        </li>
        <li class="<?php echo  active('mesajlar'); ?>">
          <a href="<?php echo base_url('admin/mesajlar') ?>">
            <i class="fa fa-envelope"></i> <span>Mesajlar</span>
          </a>
        </li>
        <li class="<?php echo  active('siparis'); ?>">
          <a href="<?php echo base_url('admin/siparis') ?>">
            <i class="fa fa-align-justify"></i> <span>Siparişler</span>
          </a>
        </li>
        <li class="header text-center">FONKSİYONLAR</li>
        <li class="">
          <?php if($this->session->userdata('silmefonk')){ ?>
          <a href="<?php echo base_url('admin/silmefonk') ?>">Silme Fonksiyonunu aç </a>
        <?php }else{ ?>
          <a href="<?php echo base_url('admin/silmefonk') ?>">Silme Fonksiyonunu kapat </a>

        <?php } ?>
        </li>

       </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
