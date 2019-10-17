<?php
namespace core;

class Module extends App{
	private $template;
	private $root;
	private $extension;
public $mysql;
  public $action;
	public function __construct(){
		parent::__construct($_REQUEST);

	}

	public function run($action=null){
		if(is_null($action)):
       call_user_func(array($this,$this->action));
		 else:
			 	$this->action=$action;
			 call_user_func(array($this,$action));
		endif;

	}
	public  function  render($args=array(),$retrurn_string=false){
		$dbt=debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS,2);
    $caller = isset($dbt[1]['function']) ? $dbt[1]['function'] : null;
	   $this->root="app/view/";
		\Rain\Tpl::configure('tpl_dir',$this->root);
		$this->template=new \Rain\Tpl;
	 $this->template->assign($args);
	 if($retrurn_string):
   return $this->template->draw($caller,$retrurn_string);
else:
   $this->template->draw($caller);
endif;
	}
	
    public function setMysql($mysql){
      $this->mysql=$mysql;

    }

public function _404(){
	echo  file_get_contents("app/view/templates/_404.html");
}
}
 ?>
