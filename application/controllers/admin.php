<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		//Burayı araştır iyi anlamadım
		parent::__construct();
 		if(!$this->session->userdata('adminlogin'))
		{
		 if($this->uri->segment(2))
		 {
		 	if($this->uri->segment(2)!='adminlogin')
			{
				redirect('admin');
			}
		 }
		}
		else
		{
			if(!$this->uri->segment(2))
			{
				redirect('admin/panel');
			}
		}
	}

	public function index()
	{
		$this->load->view('admin/login');
	}

	public function urunler()
	{
		$this->load->model('mymodel');
		$data['product']= $this->mymodel->urunlistele();
		$data['head']='Ürünler';
 	 $this->load->view('admin/product/product',$data);
	}
	public function urunekle()
	{
		$data['head']="Ürün Ekle";
		$this->load->model('mymodel');
		$data['sorgu']=$this->mymodel->altsecenekler();
		$this->load->view('admin/product/urunekle',$data);
	}
	public function urunresimekle($id)
	{
		$id =$this->uri->segment(3);
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$config['upload_path']="assets/upload/products/";
			$config['allowed_types']="jpg|gif|png";
			$this->upload->initialize($config);

			if($this->upload->do_upload('file'))
			{
				$image = $this->upload->data();
			 	$path = $config['upload_path'].$image['file_name'];
				$data = ['product'=>$id,'path'=>$path];
				$this->load->model('mymodel');
				$this->mymodel->urunresimekle($data);
			}
			else
			{
				redirect('admin');
			}

		}
		$data['head']="Ürün Resim Ekleme";
		$this->load->view('admin/product/urunresimekle',$data);
	}

	public function urunstokekle($id)
	{
		$id =$this->uri->segment(3);
	 if ($this->input->server('REQUEST_METHOD') == 'POST')
	 {
		 $config['upload_path']="assets/upload/products/";
		 $config['allowed_types']="jpg|gif|png";
		 $this->upload->initialize($config);

		 if($this->upload->do_upload('file'))
		 {
			 $image = $this->upload->data();
			 $path = $config['upload_path'].$image['file_name'];
			 $data = ['product'=>$id,'path'=>$path];
			 $this->load->model('mymodel');
			 $this->mymodel->urunresimekle($data);
		 }
		 else
		 {
			 redirect('admin');
		 }
	 }
	 $data['head']="Ürün Stok Ekle";
	 $this->load->model('mymodel');
	 $id=$this->uri->segment(3);
	 $data['options']= $this->mymodel->secenekcek();
	 $data['sorgu'] = $this->mymodel->altsecenekcekkk($id);
	 $this->load->view('admin/product/urunstoktipiekle',$data);
	}

	public function urunstoktipiekle($id)
	{
		$id = $this->uri->segment(3);
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
		 $this->load->model('mymodel');
		 $secenek= postvalue('secenek');
		 $miktar= postvalue('miktar');
	   $data = [
			'product'=>$id,
			'options'=>$secenek,
			'options2'=>$miktar
		 ];
		  $sonuc=$this->mymodel->stokekle($data);
			if($sonuc)
			{
				$this->session->set_flashdata('bilgi','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Başarılı</h4>
                Tüm kayıtlar başarıyla eklendi
              </div>');
							redirect('admin/urunstokeklee/'.$id);
			}
		}
	}
	public function urunstoktipieklee($id)
	{
		$id = $this->uri->segment(3);

		$this->load->model('mymodel');


		$secenek = postvalue('secenek');
		$miktar = postvalue('miktar');
		$stok =postvalue('stok');

		$sorgu3 = $this->mymodel->stoklarcek($secenek);
		if($sorgu3)
		{
		$this->session->set_flashdata('bilgi',"<p class='alert alert-danger text-center' style='padding:1.5rem;'>Bu bilgiler için zaten stok bilgisi girildi</p>");
		redirect('http://localhost:8080/bitirme/admin/urunstokekle/'.$id);
		}
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$secenek = postvalue('secenek');
			$miktar = postvalue('miktar');
			$stok =postvalue('stok');
			 $data=[
				 'product'=>$id,
				 'secenek'=>$secenek,
				 'miktar'=>$miktar,
				 'stok' =>$stok
			 ];

			$sonuc=$this->mymodel->urunstokekle($data);
			if($sonuc)
			{
				$this->session->set_flashdata('bilgi',"<p class='alert alert-success text-center' style='padding:1.5rem;'>Ekleme İşlemi Başarılı</p>");
				redirect('http://localhost:8080/bitirme/admin/urunstokekle/'.$id);
			}
		}
	}
	public function urunstokeklee($id)
	{
		$id = $this->uri->segment(3);

		$data['head']="Stok Bilgileri";
		$this->load->view('admin/product/urunstok',$data);
	}


	public function uruncontroller()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			echo postvalue('secenek');
			 if(postvalue('stepone'))
			 {
       $seo = sef(postvalue('baslik'));

				 $data= array(
					 'kategori'=>postvalue('kategori'),
					 'urunsecenekleri'=>postvalue('secenekler'),
					 'baslik' =>postvalue('baslik'),
					 'seo' =>$seo,
					 'aciklama'=>postvalue('aciklama'),
					 'eski_fiyat'=>postvalue('eski'),
					 'yeni_fiyat'=>postvalue('yeni'),
					 'etiket'=>postvalue('etiket')
				 );
				 $this->load->model('mymodel');
				 $sonuc = $this->mymodel->urunekle($data);
				 if($sonuc)
				 {
					$this->session->set_flashdata('bilgi',"<p class='alert alert-success text-center' style='padding:1.5rem;'>Ekleme İşlemi Başarılı</p>");
				 redirect('admin/urunresimekle/'.$this->db->insert_id());
					}
			 }
		}
		$id=$this->uri->segment(3);
		$this->load->model('mymodel');
		$sor = $this->mymodel->urunler($id);
		if($sor)
   {
		  $id=$this->uri->segment(3);
		  $data=array('complete'=>1);
			$this->load->model('mymodel');
			$sorgu = $this->mymodel->urunguncelle($id,$data);
			if($sorgu)
			{
				$this->session->set_flashdata('bilgi','<p class="alert alert-success">Ürün Başarıyla eklendi</p>');
				redirect('admin/urunler');
			}
			}

	}

	public function adminlogin()
	{
	  $this->load->library('form_validation');
	  $this->load->model('mymodel');

	  $email = $this->input->post('email');
	  $sifre = $this->input->post('sifre');


	  $giris = $this->mymodel->adminlogin($email,$sifre);

	  $this->form_validation->set_rules("email","e-mail","trim|required"); // trim ve boşluk kontrolü yap
 		$this->form_validation->set_rules("sifre","Şifre","trim|required|min_length[4]");  // En az 6 karakter olabilir, trim ve boşluk kontrolü yap
		$this->form_validation->set_message('required', '%s alanı boş bırakılamaz!!!');
		$this->form_validation->set_message('min_length', '%s en az 4 karakter olmak zorundadır');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="padding:10px; margin:5px">', '</div>');

		if($this->form_validation->run() == false)
		{
			$this->load->view('admin/login');
		}else{
			 if($giris)
			 {
				 $this->session->set_userdata('adminlogin',true);
				 $this->session->set_userdata('admininfo',$giris);
				 redirect('admin/panel');
			 }
			 else
			 {
				 $hata = "<p class='alert alert-danger text-center' style='padding:1.5rem;'>E-mail adresiniz veya şifreniz hatalı !!!</p>";
			 	 $this->session->set_flashdata('error',$hata);
				 redirect('admin');
			 }
		}
	}
	public function panel()
	{
	 $data['head']='Yönetim Paneli';
	 $this->load->view('admin/panel',$data);
	}
	public function cikis()
	{
		$this->session->sess_destroy();
		redirect('admin');
   }

	 //SİTE AYARLARI
	public function ayarlar()
	{
		$this->load->model('mymodel');
		$sorgu=$this->mymodel->ayarcek(1);
		$data['head']='Ayarlar';
		$data['config']=$sorgu;
		$this->load->view('admin/config.php',$data);
	}
	public function ayarlarpost()
	{
		   $ad = postvalue('siteadi');
		   $logo = postvalue('sitelogo');
		   $bilgi = postvalue('sitebilgi');

			 $data = array(
				 'id'=>1,
				'site_adi' =>$ad,
				'site_logo'=>$logo,
				'site_bilgi'=>$bilgi
			);

	$this->load->model('mymodel');
	$a=$this->mymodel->ayarduzenle($data);
	 if($a)
	 {
		 	$this->session->set_flashdata('bilgi','<p class="alert alert-success text-center mt-2">Kayıtlar başarıyla güncellendi</p>');
			redirect('admin/ayarlar');
	 }
	}
	//SİTE AYARLARI


		//ÜRÜN KATEGORİLERİ
	public function kategoriler()
	{

		$this->load->model('mymodel');
		$sorgu = $this->mymodel->kategoricek();
		$data['sorgu'] =$sorgu;

		$data['head']='Kategoriler';
	 $this->load->view('admin/kategoriler/categories',$data);
	}

	public function kategoriekle()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
		  $katadi = postvalue('katadi');
			$sef=sef(postvalue('katadi'));
			$icon=postvalue('icon');

			$data = array(
				'kategori_ad'=>$katadi,
				'kategori_sef'=>$sef,
				'kategori_icon'=>$icon
			);
			$this->load->model('mymodel');
			$sonuc=$this->mymodel->kategorieklee($data);
			if($sonuc)
			{
			  $this->session->set_flashdata('bilgi',"<p class='alert alert-success'>Ekleme Başarılı</p>");
				redirect('admin/kategoriekle');
			}
		}

	 $data['head'] ="Kategori Ekle";
	 $this->load->view('admin/kategoriler/kategoriekle',$data);
	}
	public function kategoriduzenle($id)
	{
		$id = $this->uri->segment(3);
  	$this->load->model('mymodel');
 		$data['sorgu']=	$this->mymodel->kategoricekk($id);
	  $data['head'] ="Kategori Düzenle";
	  $this->load->view('admin/kategoriler/kategoriduzenle',$data);
  }


public function katduzenle()
{
	//Düzenleme işlemi için post
 $id=$this->input->post('id');
 $katadi = $this->input->post('katadi');
 $sef=sef($katadi);
 $icon=postvalue('icon');


 $veriler=array(
	 'kategori_ad'=>$katadi,
	 'kategori_sef'=>$sef,
	 'kategori_icon'=>$icon
 );
 $this->load->model('mymodel');
 $sonuc = $this->mymodel->kategoriduzenle($id,$veriler);
 echo $sonuc;
 if($sonuc)
 {
	 $this->session->set_flashdata('bilgi',"<p class=' text-center alert alert-success'><i class='icon fa fa-check'></i> Kayıt Başarıyla Güncellendi</p>");
 	redirect('admin/kategoriler');
 }
 else {

	 echo "Ekleme Başarısız";
 }
}

public function kategorisil($id)
{
	$id = $this->uri->segment(3);
	$this->load->model('mymodel');
	$sonuc = $this->mymodel->kategorisil($id);
	if($sonuc)
	{
		$this->session->set_flashdata('bilgi','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <p class="text-center"><i class="icon fa fa-ban"></i>Silme İşlemi Başarıyla gerçekleşti!</p>
              </div>');
							redirect('admin/kategoriler');
	}
}
//Kategori işlemleri bitiş


//Ürün seçenekleri Başlangıç

public function urunsecenekleri()
{
	$data['head']="Ürün Seçenekleri";
	$this->load->model('mymodel');
	$options = $this->mymodel->secenekcek();
	$data['options']=$options;
		$this->load->view('admin/options/options',$data);
}

 public function secenekekle()
 {
	 $data['head']="Seçenek Ekle";
 	$this->load->view('admin/options/secenekekle',$data);

	 if($this->input->server('REQUEST_METHOD') == 'POST')
	 {
		 $sadi= $this->input->post('sadi');
		 $sef =sef ($sadi);

		 $data = array(
			 'name'=>$sadi,
			 'sef' =>$sef
		 );
		 	$this->load->model('mymodel');
			$sonuc= $this->mymodel->secenekekle($data);
			if($sonuc)
			{
				$this->session->set_flashdata('bilgi','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Başarılı !</h4>
                Seçenek başarıyla eklendi.
              </div>');
			}
	 }
 }
 public function secenekduzenle()
 {
	 $data['head']="Seçenek Düzenle";
	 $this->load->model('mymodel');
	 $id=$this->uri->segment(3);
	 $data['sorgu']=$this->mymodel->secenekcekk($id);
	 $this->load->view('admin/options/secenekduzenle',$data);

 }
 public function secenekduzenlee()
 {
	 if($this->input->server('REQUEST_METHOD') == 'POST')
	 {
				$id=$this->input->post('id');
				$sadi = $this->input->post('name');
				$sef=sef($sadi);


				$veriler=array(
				 'name'=>$sadi,
				 'sef'=>$sef
				);
				$this->load->model('mymodel');
				$sonuc = $this->mymodel->secenekduzenle($id,$veriler);
				echo $sonuc;
				if($sonuc)
				{
				 $this->session->set_flashdata('bilgi',"<p class=' text-center alert alert-success'><i class='icon fa fa-check'></i> Kayıt Başarıyla Güncellendi</p>");
					redirect('admin/urunsecenekleri');
				}
				else {

				 echo "Ekleme Başarısız";
				}
	 }
 }
 public function altsecenekler()
 {
	 $id= $this->uri->segment(3);
	 $data['head'] = "Alt seçenekler";
	 $this->load->model('mymodel');
	 $zafer =$this->mymodel->altsecenekcek($id);
	 $sorgu2= $this->mymodel->secenekcekk($id);
	 $data['sorgu2']=$sorgu2;
    $data['zafer']=$zafer;
	 $this->load->view('admin/options/suboptions',$data);

 }

public function altsecenekekle()
{

	if ($this->input->server('REQUEST_METHOD') == 'POST')
	{
		$id = $this->uri->segment(3);
		$suboptions = postvalue('sadi');
		$ara = "-";
		if(strpos($suboptions,$ara))
		{
				$multiple= explode('-',$suboptions);
				foreach ($multiple as $key) {
					$id = $this->uri->segment(3);
					$data = array(
						'optionid'=>$id,
						'name'=>$key
					);
					$this->load->model('mymodel');
				 $sonuc  =	$this->mymodel->altsecenekekle($id,$data);

				}
				if($sonuc)
				{
					$this->session->set_flashdata('bilgi','<p class="alert alert-success"><i class="icon fa fa-check"></i>Kayıtlar Başarıyla Eklendi</p>');
					redirect('admin/altsecenekler/'.$id);
				}
		}
		else
		{
			$id = $this->uri->segment(3);
			$data = array(
				'optionid'=>$id,
				'name'=>$suboptions
			);
		  $this->load->model('mymodel');
		 $sonuc  =	$this->mymodel->altsecenekekle($id,$data);
			if($sonuc)
			{
			$this->session->set_flashdata('bilgi','<p class="alert alert-success"><i class="icon fa fa-check"></i>Kayıt Başarıyla Eklendi</p>');
			redirect('admin/altsecenekler/'.$id);
			}
				}
	}
	else
	{
		$id = $this->uri->segment(3);
		$this->load->model('mymodel');
		$option = $this->mymodel->secenekcekk($id);
		$data['head']="Alt Seçenek Ekle";
		$data['option']=$option;
		$this->load->view('admin/options/altsecenekekle',$data);
	}

}

public function altsecenekduzenle()
{
	$data['head']="Alt seçenek Düzenle";
	$this->load->model('mymodel');
	$id = $this->uri->segment(3);
	$data['sorgu'] = $this->mymodel->altsecenekcekk($id);
	$this->load->view('admin/options/suboptionsduzenle',$data);
}
public function altsecenekduzenlee($id)
{
	$id = $this->uri->segment(3);
	echo $id;
	if ($this->input->server('REQUEST_METHOD') == 'POST')
	{

		 $name = postvalue('name');
		 $data= array(
			 'name' =>$name
		 );

		 $this->load->model('mymodel');
		 $sonuc = $this->mymodel->altsecenekduzenle($id,$data);
		 if($sonuc)
		 {
			 $this->session->set_flashdata('bilgi','<p class="alert alert-success"><i class="icon fa fa-check"></i>Kayıt Başarıyla Güncellendi</p>');
 			redirect('admin/altsecenekler/'.$id);
		 }
	}
}
public function urunduzenle($id)
{
	if ($this->input->server('REQUEST_METHOD') == 'POST')
	{
	 if(postvalue('product'))
	 {
		 $id=$this->uri->segment(3);
		 $ad = postvalue('baslik');
		 $kategori = postvalue('kategori');
		 $eski=postvalue('eski');
		 $yeni = postvalue('yeni');
		 $etiket = postvalue('etiket');
		 $aciklama = postvalue('aciklama');
		 $data =[
			 "baslik"=>$ad,
			 "kategori"=>$kategori,
			 "eski_fiyat"=>$eski,
			 "yeni_fiyat"=>$yeni,
			 "etiket"=>$etiket,
			 "aciklama"=>$aciklama
		 ];

	 $this->load->model('mymodel');
	 $sonuc = $this->mymodel->urunguncelle($id,$data);
	 if($sonuc)
	 {
		 $this->session->set_flashdata('bilgi','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i>Başarılı</h4>
                Güncelleme İşlemi başarı ile gerçekleşti !
              </div>');
	 }
	 }
	}


	$id = $this->uri->segment(3);
	$this->load->model('mymodel');


	$data['suboptions']= $this->mymodel->altsecenekler();
	$data['options'] = $this->mymodel->stoklarcekkk();
	$data['sorgu'] = $this->mymodel->uruncek($id);

	$data['head'] = "Ürün Güncelle";
	$this->load->view('admin/product/urunduzenle',$data);


}
 //ÜRÜN SEÇENEKLERİ SON

public function silmefonk()
{
	if($this->session->userdata('silmefonk'))
	{
		$this->session->unset_userdata('silmefonk');
	}
	else {
		$this->session->set_userdata('silmefonk',true);
	}
	 return redirect('admin');
}
public function sil($table,$id)
{
	if(!$this->session->userdata('silmefonk'))
 {
	  echo "Burada işin yok !!!";
 }

  switch ($table) {
  	case 'urunler':
  		 $this->load->model('mymodel');
			 $this->mymodel->delete('urunler',$id);
			 $this->session->set_flashdata('bilgi','<div class="alert alert-success alert-dismissible">
							 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							 <h4><i class="icon fa fa-check"></i> Başarılı</h4>
							Silme işlemi başarıyla gerçekleşti
						 </div>');
			 redirect('urunler');
  		break;
  	case 'options':
		$this->load->model('mymodel');
		$this->mymodel->delete('options',$id);
		$this->session->set_flashdata('bilgi','<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-check"></i> Başarılı</h4>
					 Silme işlemi başarıyla gerçekleşti
					</div>');
		redirect('admin/urunsecenekleri');
		break;
		case 'suboptions':
		$this->load->model('mymodel');
		$this->mymodel->delete('suboptions',$id);
		$this->session->set_flashdata('bilgi','<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-check"></i> Başarılı</h4>
					 Silme işlemi başarıyla gerçekleşti
					</div>');
		redirect('admin/altsecenekler');
		break;
  	default:
  		// code...
  		break;
  }

}
public function mesajlar()
{
	$this->load->model('mymodel');
 	$data['sorgu']=$this->mymodel->ayarcek(1);
	$data['mesaj']=$this->mymodel->mesajcek();
	$data['head']="Mesajlar";
	$this->load->view('admin/mesajlar',$data);
}
public function mesajsil($id)
{
	$this->load->model('mymodel');
	$sonuc = $this->mymodel->mesajsil($id);
	if($sonuc)
	{
		$this->session->set_flashdata('bilgi','<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-check"></i> Başarılı</h4>
					 Silme işlemi başarıyla gerçekleşti
					</div>');
					redirect('admin/mesajlar');
	}
}
public function siparis()
{
	$this->load->model('mymodel');
	$data['head']= "Siparişler";
	$data['sorgu']=$this->mymodel->ayarcek(1);
	$data['mesaj']=$this->mymodel->mesajcek();
	$data['sonuc'] = $this->mymodel->siparisgoruntule();
	$this->load->view('admin/siparis',$data);
}














}
