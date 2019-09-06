<?php $this->load->view('admin/include/header.php') ?>
<?php $this->load->view('admin/include/sidebar.php') ?>

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
             <h3 class="text-center">Kategori İşlemleri</h3>
             <h4 class="text-center"><a href="<?php echo base_url('admin/kategoriekle')?>" class="btn btn-success">Kategori ekle</a></h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Kategori Adı</th>
                  <th>Katefori Seflink</th>
                  <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($sorgu as $key){ ?>
                  <tr>
                    <td><?php echo $key['kategori_ad']; ?></td>
                    <td><?php echo $key['kategori_sef']; ?></td>
                    <td>
                      <a href="<?php echo base_url('admin/kategoriduzenle/');echo $key['id'];?>" class="btn btn-primary btn-sm">Düzenle</a>
                      <a href="<?php echo base_url('admin/kategorisil/'); echo $key['id'];?>" class="btn btn-danger btn-sm">sil</a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

<?php $this->load->view('admin/include/footer.php') ?>
