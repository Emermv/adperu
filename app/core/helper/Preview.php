<?php 
namespace core\helper;

class Preview{
	
	function __construct()
	{
		# code...
	}
	public function read(){
        $file=APP['PREVIEW'];
       $json=file_get_contents($file);
       return json_decode($json);
	}
	public function write($obj=array()){
		$json=json_encode($obj);
		$file=APP['PREVIEW'];
		return file_put_contents($file, $json);

	}
}
?>