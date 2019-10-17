<?php 
namespace core\helper;

class JSON{
	private $path;
	function __construct()
	{
		$this->path=APP['ASSETS-PATH']."/".$_SESSION['user']['company']['code']."/";
	}
	public function read($name='db.json'){
        $file=$this->path.$name;
       $json=file_get_contents($file);
       return json_decode($json);
	}
	public function write($obj=array(),$name='db.json'){
		$json=json_encode($obj);
		$file=$this->path.$name;
	   return file_put_contents($file, $json);
	}
}
?>