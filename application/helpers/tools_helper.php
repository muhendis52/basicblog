<?php
     function active($menu)
    {
       $ci = get_instance();
       if($ci->uri->segment(2)==$menu)
       {
         return  'active';
       }
    }
     function postvalue($name)
    {
       $ci = get_instance();
       return $ci->input->post($name,true);
    }
    function imageupload()
    {
      $ci = get_instance($name,$path);


      $config['upload_path'] = 'assets/upload/'.$path;
      $ci->upload->initialize($config);

      if($ci->get->do_upload($name))
      {
          $image = $ci->upload->data();
          return $config['upload_path'].$image['file_name'];
      }
    }

      function sef($text)
        {
          $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
          $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
          $text = strtolower(str_replace($find, $replace, $text));
          $text = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $text);
          $text = trim(preg_replace('/\s+/', ' ', $text));
          $text = str_replace(' ', '-', $text);
          return $text;
        }

         function deletebutton($table,$id)
        {
          $ci =get_instance();
          if($ci->session->userdata('silmefonk'))
          {
              echo '<a href="'.base_url('admin/sil/'.$table.'/'.$id).'" class="btn btn-danger btn-sm">Sil <i class="fa fa-remove"></i> </a>';
          }

        }

 ?>
