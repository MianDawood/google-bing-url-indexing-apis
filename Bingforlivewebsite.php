<?php
//data comming from ajax post///
  $input = $_POST['urlValue'];
  $array = explode(",", $input);
  $values = array_values($array);
  $siteUrl = $_POST['siteUrl'];
  $apikey = "821f0dfefbe841158b443a86b7d6f8d3";
   $urlList = $values;
  $data = array(
	  "siteUrl" => $siteUrl,
	  "urlList" => $urlList
  );
  $data_string = json_encode($data);
  $ch = curl_init('https://ssl.bing.com/webmaster/api.svc/json/SubmitUrlbatch?apikey='.$apikey);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	  'Content-Type: application/json',
	  'Content-Length: ' . strlen($data_string))
  );
  $result = curl_exec($ch);
  curl_close($ch);
  echo $result;

?>


