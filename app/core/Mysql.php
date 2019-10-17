<?php /**/
namespace core;
//require_once 'helper/Mysql_Helper.php';

class Mysql{
 //use Mysql_Helper;
public $link;

  public function __construct($connect=true) {

    $this->connect($connect);

    }
    public function connect($connect){
try {
       if($connect):
          if(isset($_SESSION['user'])):
       
       $this->link=mysqli_connect(DEFAULT_DB['HOST'],DEFAULT_DB['USER'],DEFAULT_DB['PASSWORD'],$_SESSION['user']['db']['name']);
      
    else:
      $this->link=mysqli_connect(DEFAULT_DB['HOST'],DEFAULT_DB['USER'],DEFAULT_DB['PASSWORD'],DEFAULT_DB['NAME']);
     
    endif;
       endif;


     //print_r($this->link);
    } catch (\Exception $e) {

        echo 'Error BD: ' . $e->getMessage();

      }
    }
   public function getLink(){
     return $this->link;
   }
   public function setDatabase($db){
    return  mysqli_select_db($this->link,$db);
   }
function builtArgs($sql,$args){
    $values=explode(",","'".join(array_values($args),"','")."'");

    $query=str_replace(array_keys($args),$values,$sql);
     return $query;
  }
    function execute($query, $params=NULL){
     $sql=empty($params)?$query:$this->builtArgs($query,$params);
     //echo htmlentities($sql);
     return mysqli_query($this->link,$sql);

   }
    public function toArray($request,$helper=null){
      
     $result=array();
     while($row=mysqli_fetch_object($request)):
      if(!is_null($helper)):
          $helper($row);
        endif;
       array_push($result,$row);

     endwhile;
     return $result;
   }
    public function toObject($request,$callback=null){
     if($row=mysqli_fetch_object($request)){
      if(!is_null($callback)):
        $callback($row);
      endif;
       return $row;
     }
     return null;
   }

}
