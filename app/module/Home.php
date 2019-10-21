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
        array('src'=>'app/assets/video/bond-adperu.mp4','is_video'=>true),
        array('src'=>'app/assets/video/julio-verne.mp4','is_video'=>true),
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

    public function send_mail($args,$link){
      $args['logo']=APP['ROOT'].'/app/assets/img/logo-primary.png';
      $args['favicon']=APP['ROOT']."/favicon.ico";

      $response=array(
        'state'=>false,
        'message'=>''
      );
      $mail = new \PHPMailer(true);
      $mail->charSet = "UTF-8";
      $mail->isSMTP();  
      $mail->Host = 'smtp.globat.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'web.adperu@adperu.com';                 // SMTP username
$mail->Password = 'ADperu2019';                           // SMTP password

$mail->Port = 587;                                    // TCP port to connect to
//$mail->SMTPSecure = 'tls';
        $mail->setFrom($args['email'],$args['name']." ".$args['last_name']);
        $mail->addAddress("contacto@adperu.com"); 
        $mail->addAddress("sistemas@adperu.com"); 
        $mail->isHTML(true); 
        $mail->Subject ="CONTACTO WEB ADPERU";
      
        $mail->Body =utf8_encode($this->render($args,true));
        $mail->AltBody = "This is the plain text version of the email content";
        if(!$mail->send()):
          $response['message']="Mailer Error: " . $mail->ErrorInfo;
       else:
      $response['message']="Tu mensaje se ha enviado correctamente!";
      $response['state']=true;
       endif;
     echo json_encode($response);
    }
}



 ?>
