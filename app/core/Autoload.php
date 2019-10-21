<?php

spl_autoload_register(function ($class){
  $className = str_replace(['/',"\\"], DIRECTORY_SEPARATOR, $class);
//echo $className."<br />";
if(file_exists(__DIR__."/../".$className.'.php')):
//echo "<br> namespaced ".__DIR__."/../".$className;
require_once __DIR__."/../".$className.'.php';

elseif (strpos($class,'Rain\\Tpl') !== false):

    // transform the namespace in path
    $path = str_replace("\\", DIRECTORY_SEPARATOR, $class );

    // filepath
    $abs_path = dirname(__DIR__) . "/core/libs/" . $path . ".php";

    if (!file_exists($abs_path)) {
        echo "<br>";
        echo $path;
        echo "<br>";
        echo $abs_path;
        echo "<br><br>";
    }

    // require the file
    require_once $abs_path;
elseif(strpos($class,'PHPMailer') !== false or strpos($class,'SMTP') !== false):
  
    $filename = dirname(__DIR__)."/core/libs/PHPMailer/class.".strtolower($class).'.php';
    require $filename;
else:
  echo "<br> not found ".$class;
endif;

});



 ?>
