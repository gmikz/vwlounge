<?php

$action = $_POST['action'];
$email = $_POST['email'];
$password = $_POST['password'];

if(!$action || !$email || !$password)
    die();

$data = array(
    'action' => $action,
    'username' => $email,
    'password' => $password
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://fljch6vyne.execute-api.eu-central-1.amazonaws.com/default/vwapi?" . http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if($response === false)
{
    http_response_code(500);
    die('Connection error to lambda');
}
http_response_code($http_code);
die($response)
?>