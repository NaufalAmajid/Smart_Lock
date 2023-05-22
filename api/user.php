<?php
include '../function/function.php';

$action = $_POST['action'];
$func   = new GlobalFunction();
// $connection = Connections();

if ($action == 'create') {
    $data = [];

    foreach ($_POST['data'] as $key => $val) {
        $data[$val['name']] = $val['value'];
    }

    $err = $func->CheckReq($data);

    if (count($err) > 0) {
        echo json_encode(['status' => 'error', 'message' => 'please fill all field']);
        die();
    }

    echo json_encode(['status' => 'success', 'message' => 'success create user']);
}
