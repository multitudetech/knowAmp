<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//call news
$ch = curl_init();
$request_url = "http://www.knowamp.com/fetchnews/ogvw0oi2cqjbwwqjr4db";
//$request_url = "http://localhost:8081/knowamp/fetchnews/ogvw0oi2cqjbwwqjr4db";
curl_setopt($ch, CURLOPT_URL, $request_url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 120);
curl_exec($ch);

//call sitemap
$ch = curl_init();
$request_url = "http://www.knowamp.com/sitemap";
//$request_url = "http://localhost:8081/knowamp/sitemap";
curl_setopt($ch, CURLOPT_URL, $request_url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 120);
curl_exec($ch);
?>