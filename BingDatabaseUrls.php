<?php

$conn = mysqli_connect('localhost', 'root', 'mysql', 'indexing');

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

if($_POST['send'] && $_POST['send'] == 'url'){
  
	$input = $_POST['urls'];
    $siteUrl = $_POST['site'];
	$array = explode(",", $input);
	$values = array_values($array);
	
	$apikey = "821f0dfefbe841158b443a86b7d6f8d3";
	//$siteUrl = "https://bitcoderlabs.com";

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

        select {
  display: block;
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #fff;
  font-size: 16px;
  appearance: none; /* remove default appearance */
  -webkit-appearance: none; /* for Safari */
  background-image: url('down-arrow.svg'); /* add custom arrow icon */
  background-repeat: no-repeat;
  background-position: right center;
  background-size: 16px 16px;
  cursor: pointer;
}

select:hover,
select:focus {
  border-color: #4CAF50;
}

select option {
  background-color: #fff;
  color: #000;
}


<style>
		table {
			border-collapse: collapse;
			width: 100%;
			max-width: 500px;
			margin: 20px auto;
			box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
		}
		th, td {
			padding: 10px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #f2f2f2;
			color: #333;
		}
		.toggle {
			display: flex;
			align-items: center;
			justify-content: center;
			position: relative;
			width: 60px;
			height: 30px;
			border-radius: 15px;
			border: 2px solid #ccc;
			overflow: hidden;
			cursor: pointer;
		}
		.toggle:before {
			content: "";
			position: absolute;
			top: 2px;
			left: 2px;
			width: 26px;
			height: 26px;
			border-radius: 50%;
			background-color: #ccc;
			transition: all 0.3s;
		}
		.toggle.on:before {
			transform: translateX(30px);
			background-color: #66bb6a;
		}
		.toggle.off:before {
			transform: translateX(0px);
			background-color: #ef5350;
		}
		.toggle span {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			font-size: 14px;
			color: #ccc;
			display: flex;
			align-items: center;
			justify-content: center;
			z-index: 2;
			user-select: none;
		}
		.toggle.on span {
			color: #66bb6a;
		}
		.toggle.off span {
			color: #ef5350;
		}
	</style>

	</style>
</head>
<body>
	<form action="" method="post">
		<label for="site">Site:</label>
		<select id="site" name="site">
			<option value="https://businesscheckscheap.com/">businesscheckscheap</option>
			<option value="https://computerbusinesschecks.com/">computerbusinesschecks</option>
            <option value="https://www.businesscheckprinting.com/">businesscheckprinting</option>
            <option value="
https://www.businesschecksonline.com/">
www.businesschecksonline</option>
            <option value="https://www.businesschecksprinting.com/">businesschecksprinting</option>
            <option value="https://www.computercheckscheap.com/">computercheckscheap</option>
            <option value="https://www.micrcheckprinting.com/">micrcheckprinting</option>
            <option value="https://www.orderbusinesschecks.com/">orderbusinesschecks</option>
		</select>

		<label for="message">URLs for Indexing:</label>
		<textarea id="message" name="urls" placeholder="Enter your URLs"></textarea>

		<input type="hidden" name="send" value="url">
		<input type="submit" value="Submit">
	</form>

    <table>
		<thead>
			<tr>
				<th>Column 1</th>
				<th>Column 2</th>
				<th>Column 3</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Row 1, Column 1</td>
				<td>Row 1, Column 2</td>
				<td>
					<div class="toggle on">
						<span>ON</span>
					</div>
				</td>
			</tr>
			
		</tbody>
	</table>
</body
</html>


