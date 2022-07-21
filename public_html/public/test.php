<?php


$user = 'CHI0208';
$xapikey = 'eeaf988dc5b4e6d3a92095ccd6b7e480';
$headers = array(
 "user: " . $user,
 "x-api-key: ".$xapikey,
 );
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"demo=1");//Opcional
curl_setopt($ch,
CURLOPT_URL,"https://www.contenidopromo.com/wsds/mx/catalogo/");
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result=curl_exec($ch);
curl_close($ch);
// Convertir en array
$result = json_decode($result, true);
echo count($result);
echo "<pre>".print_r($result,1)."</pre>";