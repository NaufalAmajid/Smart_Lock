<?php
include '../function/function.php';
session_start();

$action  = $_POST['action'];
$func    = new GlobalFunction();
$connect = $func->Connections();

if ($action == 'create') {
    $data    = $func->CompressData($_POST['data']);
    $err     = $func->CheckReq($data);
    $adminId = 'ADM-' . strtoupper($data['username']) . '-' . rand(1000, 9999);
    if (count($err) > 0) {
        echo json_encode([
            'status' => 'error',
            'message' => 'please fill all field'
        ]);
        die();
    }
    $password = md5($data['password']);
    $data['password'] = $password;
    $data['admin_id'] = $adminId;

    $save = $func->GlobalSave($connect, 'admins', $data);
    if ($save) {
        echo json_encode([
            'status' => 'success',
            'message' => 'success create admin'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'failed create admin'
        ]);
    }
}

if ($action == 'getById') {
    $query = "SELECT * FROM admins WHERE id = '$_POST[id]'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
}

if ($action == 'update') {
    $category = ['id' => $_POST['id']];
    $data = $func->CompressData($_POST['data']);
    $err  = $func->CheckReq($data);
    if (in_array('username', $data) || in_array('name', $data)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'please fill all field'
        ]);
        die();
    }

    if ($data['password'] != '') {
        $password = md5($data['password']);
        $data['password'] = $password;
    } else {
        unset($data['password']);
    }

    $update = $func->GlobalUpdate($connect, 'admins', $data, $category);
    if ($update) {
        if($_SESSION['id'] == $_POST['id']) {
            $_SESSION['name'] = $data['name'];
            $_SESSION['username'] = $data['username'];
        }
        echo json_encode([
            'status' => 'success',
            'message' => 'success update admin'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'failed update admin'
        ]);
    }
}

if ($action == 'delete') {
    $id = $_POST['id'];
    $category = ['id' => $id];
    $del = $func->GlobalDelete($connect, 'admins', $category);
    if ($del) {
        echo json_encode([
            'status' => 'success',
            'message' => 'success delete admin'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'failed delete admin'
        ]);
    }
}
