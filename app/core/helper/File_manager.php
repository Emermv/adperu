<?php 
namespace core\helper;
class File_manager{
	public static function upload($files,$default_root=null) {
    if(is_null($default_root)):
      $default_root='app/assets/preferences/'.$_SESSION['user']['company']['code'];
    endif;

    foreach ($files as $key => $value) {
       $tmp_name = $_FILES[$value->name]["tmp_name"];
    $name = basename($_FILES[$value->name]["name"]);
    $extension=pathinfo($_FILES[$value->name]['name'], PATHINFO_EXTENSION);
    $key=(is_null($value->key))?'':$value->key;
    $path=$default_root.'/'.$key.'-'.$name;
    if(move_uploaded_file($tmp_name, $path)):
          chmod($path,0777);
          $value->uploaded=true;
          $value->absolute_name=$path;
          $value->extension=$extension;
          $value->file_name=$name;
        else:
           $value->uploaded=false;
     endif;
    }
   return $files;

   }
}

 ?>