<?php $this->load->view('admin/include/header.php') ?>
<?php $this->load->view('admin/include/sidebar.php') ?>

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
             <h3 class="text-center">Ürünler</h3>
             <h4 class="text-center"><a href="<?php echo base_url('admin/urunekle');?>" class="btn btn-success">Ürün Ekle</a></h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Ürün Adı</th>
                  <th>Ürün Kategorisi</th>
                  <th>Ürün Seçenekleri</th>
                  <th>Ürün Fiyat</th>
                  <th>İşlemler</th>

                </tr>
                </thead>
                <tbody>
                  <?php foreach($product as $key){ ?>
                  <tr>
                    <td><?php echo $key['baslik'];?></td>

                    <td>
                    <?php
                     $sonuc=$key['kategori'];
                     $sorgu=$this->mymodel->kategoricekk($sonuc);
                     foreach ($sorgu as $sor) {
                       echo $sor['kategori_ad'];
                     }
                      ?>
                    </td>

                    <td>
                        <?php
                       //$this->load->model('mymodel');
                       $sonuc = $key['urunsecenekleri'];
                       $degiskenler=$this->mymodel->secenekcekk($sonuc);
                       foreach ($degiskenler as $degisken) {
                         echo $degisken['name']."<br>";
                       }

                         ?>


                    </td>
                    <td><?php echo $key['yeni_fiyat'];?> ₺</td>
                    <td>

                      <a href="<?php echo base_url('admin/urunduzenle/');echo $key['id']?>" class="btn btn-primary btn-sm">Düzenle</a>
                      <?php deletebutton('urunler',$key['id']); ?>
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
