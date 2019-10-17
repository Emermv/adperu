<?php
namespace core\helper;
class Response{
  public $response;
	public function __construct(){

    $this->response=array(
      'state'=>false,
      'message'=>'Ocurrió un error inesperado!'
    );

	}

public function add($key,$value){
  if(isset($this->response[$key])):
  array_push($this->response[$key],$value);
else:
  $this->response[$key]=array();
  array_push($this->response[$key],$value);
endif;
}
public function set($key,$val){
  $this->response[$key]=$val;
}
public function toJSON(){
echo json_encode($this->response);
}
public function getResponse($key){
return $this->response[$key];
}
}
 ?>
