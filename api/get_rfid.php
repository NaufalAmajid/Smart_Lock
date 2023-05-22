<?php
include '../function/function.php';

$rand = rand(100000, 999999);
$send = [];
if($rand % 2 == 0){
    $send = ['rfid' => $rand, 'status' => 'success'];
}else{
    $send = ['rfid' => '', 'status' => 'error'];
}

echo json_encode($send);
