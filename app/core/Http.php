<?php 
namespace core;
class Http{

    public  function post($url,$data=array()){
            $r = curl_init();

            curl_setopt($r, CURLOPT_URL, $url);

           curl_setopt($r, CURLOPT_RETURNTRANSFER, 1);
            //curl_setopt($r, CURLOPT_CONNECTTIMEOUT, 500);
     
                curl_setopt($r, CURLOPT_POST, 1);
                curl_setopt($r, CURLOPT_POSTFIELDS, $data);
           
            $response = curl_exec($r);
            curl_close($r);

           return $response;
        }
     public  function get($url){
            $r = curl_init();
            curl_setopt($r, CURLOPT_URL, $url);
           curl_setopt($r, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($r);
            curl_close($r);
             return $response;
        }
        public  function put($url,$data=array()){
            $r = curl_init();

            curl_setopt($r, CURLOPT_URL, $url);

           curl_setopt($r, CURLOPT_RETURNTRANSFER, 1);
            //curl_setopt($r, CURLOPT_CONNECTTIMEOUT, 500);
     
                curl_setopt($r, CURLOPT_POST, 1);
                curl_setopt($r, CURLOPT_POSTFIELDS, $data);
           
            $response = curl_exec($r);
            curl_close($r);
           return $response;
        }
        public function request($data=array(),$header=array()){
          $curl = curl_init();
  
curl_setopt_array($curl, array(
  CURLOPT_PORT => isset($data['port'])?$data['port']:"3000",
  CURLOPT_URL => $data['url'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => isset($data['method'])?$data['method']:"POST",
  CURLOPT_POSTFIELDS => $data['data'],
  CURLOPT_HTTPHEADER => array_merge(array(
    "Accept: */*",
    "Accept-Encoding: gzip, deflate",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "Content-Type: application/json",
  ),$header),
));

$response = array('state'=>false,'data'=>curl_exec($curl));
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  $response['message']="cURL Error #:" . $err;
} else {
  $response['state']=true;
}
  return $response;
        }

/*
http://demo.rmfact.info/services/exchange_rate/2019-07-24
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://consulta.pe/api/sunat/query/dni",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\r\n  \"dni\": \"72359106\"\r\n}",
  CURLOPT_HTTPHEADER => array(
  */
    //"Accept: */*",
/*
    "Authorization: Bearer KfGXANZnuOCtdB0gb5MkrZqRajmplkNjelCD19JT",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "Content-Type: application/json",
    "Host: consulta.pe",
    "Postman-Token: 14efaa32-65b2-4b13-9fb5-753003cf259d,8b23ce80-61f6-48d1-92dc-2969b9a3f0c6",
    "User-Agent: PostmanRuntime/7.15.0",
    "accept-encoding: gzip, deflate",
    "cache-control: no-cache",
    "content-length: 25",
    "cookie: XSRF-TOKEN=eyJpdiI6IjFpRFFuSVFNNHo1UDBkSXdZcDJUb1E9PSIsInZhbHVlIjoiR2pKRlA0TjRFRHN0MThDcjF0UkpLTzIzOVhjcVZmYzM0c3FcL24xWVJoOUlBRWZjWWhoSGdpMVVwTWRnR2xscXl4MllpY1JRcGhCMFk2Rjk1MW9SVmR3PT0iLCJtYWMiOiJmMzE5ODJmNGJjZGEwNjk3ZDA0NjE3N2FkMjA4N2VlMTE0NTEwNzY3YTgxYjZkYmYxN2ZkZmM5ODRjYWU4NDdmIn0%3D; tecactus_session=eyJpdiI6IjhTdFZJNXYxakpiWWhKUWRUQlFHSWc9PSIsInZhbHVlIjoiTkFMeVV2d08zZHVDUWJualplNjhVSEJzVWprcTJwbnZ0Uk1iSU9SV3B4WEY1WWdibnRlc2VlbUlTM1I0QjBEeUpjN3JzS0xZNE1PUzlhTjViR1Qybnc9PSIsIm1hYyI6IjBlZmI2YzkwYzI4MDg1Y2ViOGYxZjk5MDVkMjU4OTRiODM3OWE0OWUyYWFiMmFlYmMzMmYxMzIwYjVhNTE0MmYifQ%3D%3D"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}*/
     
}


 ?>