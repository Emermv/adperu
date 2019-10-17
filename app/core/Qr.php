<?php
namespace core;
require 'libs/phpqrcode/qrlib.php';
class Qr {
	
	function __construct(){
		
	}
	 public function run($value=''){
	 	
	   \QRcode::png('PHP QR Code :)');
	} 
}


 ?> 