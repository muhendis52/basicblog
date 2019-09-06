<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anasayfa extends CI_Controller
{
 public function index()
 {

   $this->load->model('mymodel');
   $data['sorgu']=$this->mymodel->ayarcek(1);
   $data['kategoriler']=$this->mymodel->kategoricek();
   $this->load->view('site/anasayfa',$data);

 }
 public function kategori($kategori)
 {
   $this->load->model('mymodel');
   $data['sorgu']=$this->mymodel->ayarcek(1);
   $this->load->view('site/kategori/kategori',$data);
 }
 public function kurungoruntule($id)
 {
 $id = $this->uri->segment(3);
 $this->load->model('mymodel');
 $data['sorgu']=$this->mymodel->ayarcek(1);
 $data['kategoriler']=$this->mymodel->kategoricek();
 $data['head']="Ürünleri";
 $data['sorgu2'] = $this->mymodel->kurunlistele($id);
 $this->load->view('site/kategori/kurunlistele',$data);
 }
 public function kurunincele($id)
 {

   $id = $this->uri->segment(3);
   $this->load->model('mymodel');
   $data['sorgu']=$this->mymodel->ayarcek(1);
   $data['kategoriler']=$this->mymodel->kategoricek();
   $data['uruncek']=$this->mymodel->uruncek($id);
   $data['options']=$this->mymodel->secenekcek();
   $data['yorumlar'] = $this->mymodel->yorumcek($id);
   $this->load->view('site/kategori/kurunincele',$data);
 }

public function kayitol()
{

  $this->load->model('mymodel');
  $data['sorgu']=$this->mymodel->ayarcek(1);
  $data['kategoriler']=$this->mymodel->kategoricek();
  $this->load->view('site/kayitol',$data);
}

public function kayitoll()
{
  $this->load->model('mymodel');
  $data['sorgu']=$this->mymodel->ayarcek(1);
  $data['kategoriler']=$this->mymodel->kategoricek();

  if ($this->input->server('REQUEST_METHOD') == 'POST')
  {
    $this->load->library("form_validation"); //Codeigniter bünyesinde bulunan form_validation kütüphanesi yüklendi ...
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
    $this->form_validation->set_rules("adsoyad", "Kullanıcı adı", "trim|required|is_unique[uyeler.uye_adsoyad]|max_length[50]|min_length[5]");
    $this->form_validation->set_rules("kadi", "Kullanıcı adı", "trim|required|is_unique[uyeler.uye_kadi]");
    $this->form_validation->set_rules("email", "Email adresi", "trim|required|is_unique[uyeler.uye_email]|valid_email");
    $this->form_validation->set_rules("sifre", "Şifre", "trim|required|max_length[30]|min_length[5]");


    $this->form_validation->set_message(
        array(
            "required"      => "{field} boş bırakılmamalıdır.",
            "valid_email"   => "{field} formatı hatalı",
            "matches"       => "{field} & {param} uyuşmuyor",
            "is_unique"     => "{field} başka bir kullanıcı tarafından kullanılıyor.",
            "max_length"    => "{field} en fazla {param} karakter olmalıdır.",
            "min_length"    => "{field} en az {param} karakter olmalıdır."
        )
    );


    if ($this->form_validation->run()){
       $this->load->model('mymodel');
       $data = [
       'uye_adsoyad'=>postvalue('adsoyad'),
       'uye_kadi'=>postvalue('kadi'),
       'uye_email'=>postvalue('email'),
       'uye_sifre'=>postvalue('sifre')
       ];
       $sonuc=$this->mymodel->uyekayit($data);

       if($sonuc)
       {
        $sonuc = $this->session->set_flashdata('bilgi','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Kayıt Başarılı</h4>
                Başarıyla kayıt oldunuz. Lütfen giriş yapınız
              </div>');
              redirect('anasayfa',$data);
       }
    }else{
        //Veriler doğrulama işleminden geçemedi. Aynı sayfada hatalar görüntülenecek ...
        $data['form_erros']=validation_errors(); //Validation işleminde valid olmayan alanlara ait hata mesajları validation_errors metodu ile alınır ve View' e gönderilecek verilere ait olan viewData nesnesinin form_erros özelliğine atanır...
        $this->load->view("site/kayitol",$data); //View' e gönderilecek veri parametre olarak geçildi
    }
  }
}
public function girisyap()
{
  $this->load->model('mymodel');
  $data['sorgu'] = $this->mymodel->ayarcek(1);
  $data['kategoriler']=$this->mymodel->kategoricek();
  $this->load->view('site/girisyap',$data);

}
public function girispost()
{
  if ($this->input->server('REQUEST_METHOD') == 'POST')
  {

   $this->load->model('mymodel');
   $data['sorgu'] = $this->mymodel->ayarcek(1);
   $data['kategoriler']=$this->mymodel->kategoricek();
   $kadi = postvalue('kadi');
   $sifre =postvalue('sifre');



         $this->load->library("form_validation"); //Codeigniter bünyesinde bulunan form_validation kütüphanesi yüklendi ...
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
         $this->form_validation->set_rules("kadi", "Kullanıcı Adı", "trim|max_length[50]|min_length[5]|required");
         $this->form_validation->set_rules("sifre", "Şifre", "trim|min_length[5]|required");


         $this->form_validation->set_message(
             array(
                 "required"      => "{field} boş bırakılmamalıdır.",
                 "valid_email"   => "{field} formatı hatalı",
                 "matches"       => "{field} & {param} uyuşmuyor",
                 "is_unique"     => "{field} başka bir kullanıcı tarafından kullanılıyor.",
                 "max_length"    => "{field} en fazla {param} karakter olmalıdır.",
                 "min_length"    => "{field} en az {param} karakter olmalıdır."
             )
         );


         if ($this->form_validation->run()){
          $uye=$this->mymodel->uyecek($kadi,$sifre);
          if($uye)
          {
             $this->session->set_userdata('kullaniciadi', $kadi);
             redirect('anasayfa');
          }
          else
          {
         $this->session->set_flashdata('bilgi','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4 class="text-center"><i class="icon fa fa-ban"></i>Hata</h4>
               Kullanıcı adı veya şifre hatalı ! Lütfen doğru bilgilerle tekrar deneyiniz...
              </div>');
              redirect('anasayfa/girisyap');
          }

         }else{
             $data['form_errors']=validation_errors();
             $this->load->view("site/girisyap",$data);
         }

  }
}
public function uyecikis()
{
  $this->session->unset_userdata('kullaniciadi');
  redirect('anasayfa');
}

 public function sepetim()
 {
   $this->load->model('mymodel');
   $data['sorgu'] = $this->mymodel->ayarcek(1);
   $data['kategoriler']=$this->mymodel->kategoricek();
   $this->load->view('site/sepet',$data );
 }
 public function iletisim()
 {
   $this->load->model('mymodel');
   $data['sorgu']= $this->mymodel->ayarcek(1);
   $data['kategoriler']= $this->mymodel->kategoricek();
   $this->load->view('site/iletisim',$data);
 }
 public function mesajekle()
 {
   $this->load->model('mymodel');
   $data = [
     'g_adsoyad'=>postvalue('adsoyad'),
     'g_email'=>postvalue('email'),
     'g_mesaj'=>postvalue('mesaj')
   ];
   $sonuc = $this->mymodel->mesajekle($data);
   if($sonuc)
   {
     $this->session->set_flashdata('bilgi','<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
             <h4><i class="icon fa fa-check"></i> Kayıt Başarılı</h4>
              Mesajınız başarıyla iletildi
           </div>');
           redirect('anasayfa');
   }
 }

 public function hakkimizda()
 {

  $this->load->model('mymodel');
  $data['sorgu']=$this->mymodel->ayarcek(1);
  $data['kategoriler']=$this->mymodel->kategoricek();
    $this->load->view('site/hakkimizda',$data);
 }
public function arama()
{
  $baslik = postvalue('ara');
  $this->load->model('mymodel');
  $data['sorgu']=$this->mymodel->ayarcek(1);
  $data['kategoriler']=$this->mymodel->kategoricek();
  $data['arama']= $this->mymodel->aramauruncek($baslik);
 $this->load->view('site/arama',$data);
}
public function sepet()
{
  if($this->uri->segment(3)==0)
  {
    $this->load->model('mymodel');
    $data['sorgu']=$this->mymodel->ayarcek(1);
    $data['kategoriler']=$this->mymodel->kategoricek();
    $this->load->view('site/bossepet',$data);
  }
  else
  {
    $id = $this->uri->segment(3);
    $this->load->model('mymodel');
    $data['sorgu']=$this->mymodel->ayarcek(1);
    $data['kategoriler']=$this->mymodel->kategoricek();
    $sonuc=$this->mymodel->uruncek($id);
    foreach ($sonuc as $key ) {
      $urunid    = $key['id'];
      $urunad    = $key['baslik'];
      $urunfiyat = $key['yeni_fiyat'];
      }

    $data2 = array(
         'id'  => $urunid,
         'baslik'=>$urunad,
         'yeni_fiyat'=> $urunfiyat
       );

  $data['urunbilgi']=$this->session->set_userdata($data2);
  $this->load->view('site/sepet',$data);
  }


}
public function sepetbosalt()
{
  $this->session->sess_destroy();
  redirect('anasayfa');
}
public function siparis($id)
{
  $id = $this->uri->segment(3);
  $this->load->model('mymodel');
  $data['sorgu']=$this->mymodel->ayarcek(1);
  $data['kategoriler']=$this->mymodel->kategoricek();
  $this->load->view('site/siparis',$data);
}
public function siparistamamla()
{
  $id = $this->uri->segment(3);
  $this->load->model('mymodel');
  $sonuc= $this->mymodel->uruncek($id);
  $adsoyad=postvalue('adsoyad');
  $email=postvalue('email');
  $adres=postvalue('adres');
  foreach ($sonuc as $key)
  {
  $urunid=$key['id'];
  $urunad=$key['baslik'];
  $urunfiyat=$key['yeni_fiyat'];
  }

  $data=
  [
    'urunid'=>$urunid,
    'urunad'=>$urunad,
    'urunfiyat'=>$urunfiyat,
    'alici_adsoyad'=>$adsoyad,
    'alici_email'=>$email,
    'alici_adres'=>$adres
  ];
  $sonuc = $this->mymodel->siparis($data);

  if($sonuc)
  {
    $this->session->set_flashdata('bilgi','<div class="alert alert-success alert-dismissible">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
           <h4 class="text-center"><i class="icon fa fa-success"></i>Başarılı</h4>
          <p class="text-center">Siparişiniz başarıyla alınmıştır. Bizi tercih ettiğiniz için teşekkür ederiz</p>
         </div>');
         redirect('anasayfa');
  }

}

public function yorumekle()
{
   $urunid = $this->uri->segment(3);
   $this->load->model('mymodel');
   $data=[
     'urunid'=>$urunid,
     'g_adsoyad'=>postvalue('adsoyad'),
     'g_email'=>postvalue('email'),
     'yorum'=>postvalue('yorum'),
   ];
   $this->mymodel->yorumekle($data);
   if($data)
   {
     $this->session->set_flashdata('bilgi','<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4 class="text-center"><i class="icon fa fa-success"></i>Başarılı</h4>
           <p class="text-center">Yorumunuz başarıyla eklenmiştir</p>
          </div>');
          redirect('anasayfa/kurunincele/'.$urunid);
   }
}

}





 ?>
