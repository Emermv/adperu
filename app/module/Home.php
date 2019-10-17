<?php
namespace module;

class Home extends \core\Module{

	public function __construct(){

		parent::__construct();

	}

	public function  app($view){
		$this->render(array(
       'view'=>$view,
      'title'=>APP['TITLE'],
      'RS'=>APP['RS']
    ));
	}

    public function not_found(){
    	$this->render(array(
         'title'=>APP['TITLE']
      ));
    }
    public  function index(){
     return  $this->render(array(
       'images'=>array(
      //  array('src'=>'app/assets/img/1.jpg'),
        array('src'=>'app/assets/img/desktop/2.jpg','small'=>'app/assets/img/small/1.png'),
        array('src'=>'app/assets/img/desktop/3.jpg','small'=>'app/assets/img/small/2.jpg'),
        array('src'=>'app/assets/img/desktop/4.jpg','small'=>'app/assets/img/small/3.jpg'),
        array('src'=>'app/assets/img/desktop/5.jpg','small'=>'app/assets/img/small/4.jpg'),
        array('src'=>'app/assets/img/desktop/6.jpg','small'=>'app/assets/img/small/5.jpg'),
        array('src'=>'app/assets/img/desktop/7.jpg','small'=>'app/assets/img/small/6.jpg'),
        array('src'=>'app/assets/img/desktop/8.jpg','small'=>'app/assets/img/small/7.jpg'),
        array('src'=>'app/assets/img/desktop/9.jpg','small'=>'app/assets/img/small/8.jpg'),
        array('src'=>'app/assets/img/desktop/10.jpg','small'=>'app/assets/img/small/9.jpg'),
       )

     ),true);
    }
    public function contact(){
      return  $this->render(array(),true);
    }
    public function about_us(){
      return  $this->render(array(),true);
    }
    public function service(){
      return  $this->render(array(),true);
    }
}



 ?>
