<?php $this->load->view('admin/include/header.php') ?>
<?php $this->load->view('admin/include/sidebar.php') ?>

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
             <h3 class="text-center">Ürün Seçenekleri İşlemleri</h3>
             <h4 class="text-center"><a href="<?php echo base_url('admin/secenekekle');?>" class="btn btn-success">Ürün seçenekleri oluştur</a></h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Seçenek Adı</th>
                  <th>Seçenek Sayısı</th>
                  <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($options as $key){ ?>
                  <tr>
                    <td><?php echo $key->name; ?></td>
                    <td><?php echo $key->sef; ?></td>
                    <td>
                      <a href="<?php echo base_url('admin/altsecenekler/'); echo $key->id?>" class="btn btn-sm btn-success">Alt seçenekler</a>
                      <a href="<?php echo base_url('admin/secenekduzenle/'); echo $key->id ?>" class="btn btn-primary btn-sm">Düzenle</a>
                      <?php deletebutton('options',$key->id); ?>
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
