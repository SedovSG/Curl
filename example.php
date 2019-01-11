<?php

require_once __DIR__ . '/Curl.php';

try
{
  $url = 'https://api.yandex.ru';
 
  $curl = new Curl();
  
  $data = [
    'id' => 3
  ];
  
  $str = $curl->get($url);
  $str = $curl->post($url, $data);
  $str = $curl->put($url, $data);
  $str = $curl->delete($url, $data);

  echo($str);
  var_dump(json_decode($str, true));
}
catch(\Exception $exp)
{
	echo $exp->getMessage();
}

