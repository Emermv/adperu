<?php
namespace service;
use \core;
class Home extends core\Service{

  function __construct($a=null,$c=true,$l=null){
    parent::__construct($a,$c,$l);

  }

  public function getModules(){
    
		return $this->execute("select * from ".APP['DB']['NAME'].".modules where state=1 order by position asc");
  }
  
     public function accounts_receivable($day){
  	$sql="select ifnull(sum(total),0) as total from comprobante_venta where date_format(fecha_emision,'%Y-%m-%d')=:day and state=0";
  	return $this->toObject($this->execute($sql,array(':day'=>$day)));
  }

   public function day_entry_sale($day){
  	$sql="select ifnull(sum(total),0) as total from comprobante_venta where date_format(fecha_emision,'%Y-%m-%d')=:day and state=1";
  	return $this->toObject($this->execute($sql,array(':day'=>$day)));
  }
  public function day_sale($day){
  	$sql="select ifnull(sum(total),0) as day_sale from comprobante_venta where date_format(fecha_emision,'%Y-%m-%d')=:day";
  	return $this->toObject($this->execute($sql,array(':day'=>$day)));
  }
}


 ?>

