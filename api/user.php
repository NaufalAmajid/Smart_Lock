<?php
include '../function/function.php';
session_start();

$action = $_POST['action'];
$func   = new GlobalFunction();
$connection = $func->Connections();

if ($action == 'create') {
    $data = [];

    foreach ($_POST['data'] as $key => $val) {
        $data[$val['name']] = $val['value'];
    }

    $err = $func->CheckReq($data);

    // check if all field is filled
    if (count($err) > 0) {
        echo json_encode(['status' => 'error', 'message' => 'please fill all field']);
        die();
    }

    // check card id already exist
    $checkCardId = $func->GlobalSelect($connection, 'users', ['card_id' => $data['card_id']]);
    if ($checkCardId != 0) {
        echo json_encode(['status' => 'error', 'message' => 'card id already exist']);
        die();
    }

    // save data user
    $data['admin_id'] = $_SESSION['admin_id'];
    $save = $func->GlobalSave($connection, 'users', $data);
    if ($save) {
        echo json_encode(['status' => 'success', 'message' => 'success create user']);
        // $func->DeleteRFID($connection);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'failed create user']);
    }
}

if ($action == 'getById') {
    $id = $_POST['id'];
    $user = $func->GlobalSelect($connection, 'users', ['id' => $id]);
    echo json_encode($user);
}

if ($action == 'edit') {
    $category = ['id' => $_POST['id']];
    $data     = $func->CompressData($_POST['data']);
    $err      = $func->CheckReq($data);

    // check if some field is empty
    if (count($err) > 0) {
        echo json_encode(['status' => 'error', 'message' => 'please fill all field']);
        die();
    }

    // check card id already exist
    $checkCardId = "SELECT * FROM users WHERE card_id = '$data[card_id]' AND id != '$_POST[id]'";
    $checkCardId = mysqli_query($connection, $checkCardId);
    $checkCardId = mysqli_fetch_assoc($checkCardId);
    if ($checkCardId != 0) {
        echo json_encode(['status' => 'error', 'message' => 'card id already exist, use by ' . $checkCardId['name']]);
        die();
    }

    // update data user
    $update = $func->GlobalUpdate($connection, 'users', $data, $category);
    if ($update) {
        echo json_encode(['status' => 'success', 'message' => 'success update user']);
        // $func->DeleteRFID($connection);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'failed update user']);
    }
}

if ($action == 'delete') {
    $id = $_POST['id'];
    $category = ['id' => $id];
    $del = $func->GlobalDelete($connection, 'users', $category);
    if ($del) {
        echo json_encode([
            'status' => 'success',
            'message' => 'success delete users'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'failed delete users'
        ]);
    }
}
