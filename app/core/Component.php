<?php 
namespace core;

class Component extends Service{
	
	function __construct($args=array()){
		# code...
		parent::__construct($args);
	}
	public function render($args=array(),$comp='fast_client/'){
			$dbt=debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS,2);
    $caller = isset($dbt[1]['function']) ? $dbt[1]['function'] : null;

	 //   $root="app/components/".strtolower(str_replace("components\\"., "", get_class($this)))."/";
    $root="app/components/".$comp;
		\Rain\Tpl::configure('tpl_dir',$root);
		$template=new \Rain\Tpl;
	 $template->assign($args);
	 if($retrurn_string):
   return $template->draw($caller,$retrurn_string);
else:
   $template->draw($caller);
endif;
	}
}

 ?>