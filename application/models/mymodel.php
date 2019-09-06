<?php

 class Mymodel extends CI_Model
 {
   public function __construct()
   {
     parent::__construct();
     $this->load->database();
   }
   public function adminlogin($email,$sifre)
   {
      $sonuc = $this->db->get_where('yonetici',array('y_email'=>$email,'y_password'=>$sifre));
      return $sonuc->result();
   }
   public function ayarduzenle($data)
   {
    return $this->db->update('ayarlar',$data);
   }
   public function ayarcek($id)
   {
    $query = $this->db->get_where('ayarlar', array('id' => $id));
    return $query->result();
   }
   public function kategorieklee($data)
   {
     $insert = $this->db->insert('kategori',$data);
     return $insert;
   }
   public function kategoricek()
   {
     return $this->db->get('kategori')->result_array();
   }
   public function kategoricekk($id)
   {
     $query = $this->db->get_where('kategori', array('id' => $id));
     return $query->result_array();
   }
   public function kategoriduzenle($id,$data)
   {
     $this->db->where('id', $id);
     $update = $this->db->update('kategori', $data);
     return $update;
   }
   public function kategorisil($id)
   {
     $this->db->where('id', $id);
     return $this->db->delete('kategori');
   }
   public function secenekcek()
   {
     return $this->db->get('options')->result();
   }
   public function secenekcekk($id)
   {
     $query = $this->db->get_where('options', array('id' => $id));
     return $query->result_array();
   }

   public function secenekekle($data)
   {
    return $this->db->insert('options',$data);
   }
   public function secenekduzenle($id,$data)
   {
     $this->db->where('id', $id);
     return $this->db->update('options', $data);
   }

   public function altsecenekler()
   {
     return $this->db->get('suboptions')->result();
   }
   public function altsecenekcek($id)
   {
     $query = $this->db->get_where('suboptions', array('optionid' => $id));
     return $query->result_array();
   }
   public function altsecenekcekkk()
   {
     return $this->db->get('suboptions')->result_array();
   }

   public function altsecenekcekk($id)
   {
     $query = $this->db->get_where('suboptions', array('id' => $id));
     return $query->result_array();
   }
   public function altsecenekekle($data,$id)
   {
     return $this->db->insert('suboptions',$id,$data);
   }
   public function altsecenekduzenle($id,$data)
   {
     $this->db->where('id', $id);
     return $this->db->update('suboptions', $data);
   }

   public function urunekle($data)
   {
     return $this->db->insert('urunler',$data);
   }
   public function urunlistele()
   {
     return $this->db->get('urunler')->result_array();
   }
   public function urunresimekle($data)
   {
     return $this->db->insert('images',$data);
   }
   public function stokekle($data)
   {
     return $this->db->insert('stoktipi',$data);
   }
   public function urunstokekle($data)
   {
    return $this->db->insert('stoklar',$data);
   }
   public function stoklarcek($options)
   {
     $query = $this->db->get_where('stoklar',array('secenek'=>$options));
    return $query->num_rows();
   }
   public function stoklarcekkk()
   {
     return $this->db->get('stoklar')->result();
   }
   public function stoklarcekk($options)
   {
     $query = $this->db->get_where('stoklar',array('miktar'=>$options));
    return $query->result();
   }
   public function urunler($id)
   {
     return $this->db->get_where('urunler',array('id'=>$id))->result();
   }
   public function urunguncelle($id,$data)
   {
     $this->db->where('id', $id);
     return $this->db->update('urunler', $data);
   }
   public function uruncek($id)
   {
     return $this->db->get_where('urunler',array('id'=>$id))->result_array();
   }
   public function stokcek($id)
   {
    return $query = $this->db->get_where('stoklar', array('product' => $id))->result_array();
   }
   public function delete($table,$id)
   {
     $this->db->where('id', $id);
     return $this->db->delete($table);
   }
   public function mesajcek()
   {
     return $this->db->get('mesajlar')->result();
   }
   public function mesajekle($data)
   {
     return $this->db->insert('mesajlar',$data);
   }
   public function mesajsil($id)
   {
     return $this->db->delete('mesajlar', array('id' => $id));
   }
  // SİTE BİLGİLERİ ÇEKİYORUZ BUNDAN SONRA
  public function kurunlistele($id)
  {
    return $query = $this->db->get_where('urunler', array('kategori' => $id))->result();
  }
  public function uyekayit($data)
  {
    return $this->db->insert('uyeler', $data);
  }
  public function uyecek($kadi,$sifre)
  {
      $query = $this->db->get_where('uyeler', array('uye_kadi' =>$kadi,'uye_sifre'=>$sifre));
      return $query->result();
  }
  public function soneklenenler()
  {
     $query = $this->db->order_by('id', 'DESC')->limit(6)->get_where('urunler')->result();
     return $query;
  }
  public function yorumcek($id)
  {
    return $this->db->get_where('yorumlar',array('urunid'=>$id))->result();
  }

  public function aramauruncek($baslik)
  {
    $this->db->like('baslik', $baslik);
   return $this->db->get('urunler')->result();
  }
  public function siparis($data)
  {
   return $this->db->insert('siparisler',$data);
  }
  public function yorumekle($data)
  {
    return $this->db->insert('yorumlar',$data);
  }
  public function siparisgoruntule()
  {
    return $this->db->get('siparisler')->result();
  }

 }

 ?>
