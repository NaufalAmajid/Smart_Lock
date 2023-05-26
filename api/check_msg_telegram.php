<?php
include '../function/function.php';

$url = "https://api.telegram.org/bot5988439447:AAGOI3NNTwwiLd0vK8o5shmYl3KF50beflE/getUpdates?offset=-1";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);
$output = json_decode($output, true);
$encode = json_encode($output);

echo $encode;