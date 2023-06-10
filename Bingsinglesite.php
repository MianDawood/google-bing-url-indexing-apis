<?php
if($_POST['send'] && $_POST['send'] == 'url'){
  
	$input = $_POST['urls'];
	$array = explode(",", $input);
	$values = array_values($array);
	
	$apikey = "821f0dfefbe841158b443a86b7d6f8d3";
	$siteUrl = "https://bitcoderlabs.com";

	//$siteUrl = "http://gtvcbpeshawar.edu.pk/";
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
   

}
?>



<!DOCTYPE html>
<html>
<head>
	<title>My Form</title>
	<style>
		form {
			margin: auto;
			width: 50%;
			padding: 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
			background-color: #f2f2f2;
		}

		label {
			display: block;
			font-weight: bold;
			margin-bottom: 10px;
		}

		input[type="text"], textarea {
			display: block;
			width: 100%;
			padding: 10px;
			margin-bottom: 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
			background-color: #fff;
			font-size: 16px;
			resize: vertical;
		}

		input[type="submit"] {
			display: block;
			background-color: #4CAF50;
			color: #fff;
			border: none;
			border-radius: 5px;
			padding: 10px 20px;
			font-size: 16px;
			cursor: pointer;
			margin-top: 10px;
		}

		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
<form action="" method="post">
		<!--<label for="name">Name:</label>-->
		<label for="message">Urs for Indexing:</label>
		<textarea id="message" name="urls" placeholder="Enter your Urls"></textarea>
<input type="hidden" name="send" value="url">
		<input type="submit" value="Submit">
	</form>
</body>
</html>


