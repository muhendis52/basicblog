<?php $this->load->view('admin/include/header.php') ?>
<?php $this->load->view('admin/include/sidebar.php') ?>

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
             <h3 class="text-center"><?php foreach ($sorgu2 as $key) {
              echo $key['name'];
             } ?> AltSeçenekleri İşlemleri</h3>
             <h4 class="text-center"><a href="<?php echo base_url('admin/altsecenekekle/'); echo $this->uri->segment(3) ?>" class="btn btn-success">Altseçenek oluştur</a></h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Altseçenek İd</th>
                  <th>Altseçenek Adı</th>
                  <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($zafer as $key) { ?>
                <tr>

                  <td><?php echo $key['id']; ?></td>
                  <td><?php echo $key['name']; ?></td>
                  <td>
                    <a href="<?php echo base_url('admin/altsecenekduzenle/');echo $key['id']?>" class="btn btn-sm btn-primary">Düzenle</a>
                     <?php deletebutton('suboptions',$key['id']) ?>
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
 ?>
