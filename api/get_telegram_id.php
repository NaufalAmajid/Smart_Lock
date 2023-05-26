<?php
include '../function/function.php';

$func = new GlobalFunction();
$connect = $func->Connections();

$checkTelegramId = $func->GlobalSelect($connect, 'admins', ['telegram_id' => $_POST['teleId']]);
if ($checkTelegramId == 0) {
    $checkAdminId = $func->GlobalSelect($connect, 'admins', ['admin_id' => $_POST['adminId']]);
    if ($checkAdminId == 0) {
        echo json_encode(['status' => 'registered', 'message' => 'admin id not registered']);
    } else {
        $func->GlobalUpdate($connect, 'admins', ['telegram_id' => $_POST['teleId']], ['admin_id' => $_POST['adminId']]);
        echo json_encode(['status' => 'success', 'message' => 'Successfully, Telegram ID has been saved']);
    }
} else {
    echo json_encode(['status' => 'registered', 'message' => 'Telegram ID has been registered']);
}
