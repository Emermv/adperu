<?php
namespace core;

class Provider{
  public $args;
  public $link;
	public function __construct($link,$args=array()){
    $this->args=$args;
    $this->link=$link;
	}
	function builtArgs($sql,$args){
    $values=explode(",","'".join(array_values($args),"','")."'");

    $query=str_replace(array_keys($args),$values,$sql);
     return $query;
  }
    function execute($query, $params=NULL){
     $sql=empty($params)?$query:$this->builtArgs($query,$params);
     //echo $sql;
     return mysqli_query($this->link,$sql);

   }
    function toArray($request,$decode=NULL){
     $result=array();
     while($row=mysqli_fetch_object($request)):
         if(!is_null($decode)):
             $decode($row);
         endif;
       array_push($result,$row);
     endwhile;
     return $result;
   }
    function toObject($request,$transform=NULL){
     if($row=mysqli_fetch_object($request)):
       if(!is_null($transform)):
         foreach ($transform as $key => $value) {
           $row->{$value}=urldecode( $row->{$value});
        }
       endif;
       return $row;
     endif;
     return (object) array();
   }

}
 ?>
