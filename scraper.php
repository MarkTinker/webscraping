<?php
	include "class.scrape.php";
	function __autoload($class_name) {
		require_once "class/class.".strtolower($class_name) . '.php';
	}
	header("Content-type: text/plain; charset=UTF-8");
	$hours=$_REQUEST["hours"];
	//$term='ESPRIT';
	
	$scraper=new scrape();
	$scraper->scraper($hours);
?>
