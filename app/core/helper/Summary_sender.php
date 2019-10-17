<?php 
namespace core\helper;
  class Summary_sender{

  	public function send($args,$link,$doc_type=3){

  	 $response=new \core\helper\Response;

     $uri=APP['GO-API']."/enviar_boletas/".$_SESSION['access_token'];
     $correlativo=new \provider\Correlativo($link);
        $last_obj=$correlativo->getLast('TICKET-SUMMARY');

		$last=(is_null($last_obj) || is_null($last_obj->correlativo))?1:$last_obj->correlativo;
    $data = array(
    'fecha_emision' => $args['fecha_emision'],
    'numero' => $last,
    'documentos' => [],
   'condition_code'=>isset($args['condition_code'])?$args['condition_code']:1
    );


    $documents=json_decode($args['documents']);
    $reference_docs=array();
    foreach($documents as $key=>$value):
        $reference_docs[$value->id]=$value->tipo_doc;
        array_push($data['documentos'],array(
            'serie' => $value->serie,
            'numero' => $value->correlativo,
            'tipodoc' => $value->tipo_doc,
            'cliente_numero' => $value->document_number,
            'cliente_tipodoc' => $value->doc_type,
            'total_igv' => $value->total_igv,
            'total_gravada' => $value->total_gravada,
            'total' => $value->total,
            'total_inafecta'=>$value->total_inafecta,
            'total_exonerada'=>$value->total_exonerada,
            'documento_relacionado'=>$value->documento_relacionado
              ));
    endforeach;

     $request=(new \core\Http)->post($uri,json_encode($data));
     $response->set("args",$data);
     $state=json_decode($request);

     $response->set("response",$state->data);

     if(!is_null($state) && isset($state->data)):
        $response->set("state",true);
         $response->set("message",$state->data->fault_descrip);
        $response->set("ticket",$state->data->sunat_ticket);


         if(!is_null($state->data->sunat_ticket)):
        $service=new \service\InvoiceSummary(null,false,$link);
       $service->create($doc_type,$args['summary_type'],$reference_docs,$state->data,$args['fecha_emision']);

        if($state->data->sunat_aceptado==0 or $state->data->sunat_aceptado==1
        	or $state->data->sunat_aceptado==2):
        	$correlativo->icrease($last_obj->id);
        endif;

        endif;

     endif;
    
     return $response;
  	}
  	  public function  get_ticket_state($args,$link){
		$response=new \core\helper\Response;
        $uri=APP['GO-API']."/consultar_ticket/".$_SESSION['access_token'];
        $request=(new \core\Http)->post($uri,json_encode(array(
       'ticket'=>$args['ticket']
      )));

         $state=json_decode($request);
         $response->set("api",$state);
        if(!is_null($state) && isset($state->data->sunat_aceptado)):

        	$response->set("message","");
            $response->set("ticket_state",array(
             'sunat_aceptado'=>$state->data->sunat_aceptado,
             'sunat_descripcion'=>$state->data->sunat_descripcion." ".$state->data->fault_descrip,
            ));
            $service=new \service\InvoiceSummary(null,false,$link);
            $data=array(
             ':description'=>urlencode($state->data->sunat_descripcion),
             ':sunat_aceptado'=>$state->data->sunat_aceptado,
             ':sunat_aceptado_on_send_or_down'=>$args['sunat_aceptado_on_send_or_down'],
             ':ticket'=>$args['ticket'],
             ':sunat_code_response'=>(is_null($state->data->sunat_code_response)?
                $state->data->sunat_codigo:$state->data->sunat_code_response)
            );
            if(isset($args['document_type']) && $args['document_type']==3):
            $response->set("state",$service->update($data));
        else:
             $response->set("state",$service->update_note($data));
         endif;
 
        endif;
          return $response;
	}
  }
 ?>