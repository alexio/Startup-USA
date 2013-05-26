<?php
	/*
	 * @authur: Hua Yang
	 *
	 * php cURL call to Crunchbase API,
	 *  accepts POST request with the variable "name",
	 *  which represents the company's name.
	 * 
	 * Attempts to pull the company's data from Crunchbase API,
	 *  and returns the data to the caller. 
	 */
	$company = $_REQUEST["name"];
	$company = str_replace(" ", "+", $company);
	$url = "http://ec2-107-21-104-179.compute-1.amazonaws.com/v/1/company/".$company.".js";
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
	$file_contents = curl_exec($ch);
	curl_close($ch);
	echo $file_contents;
?>
