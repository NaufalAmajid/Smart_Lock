<?php
include '../function/function.php';
session_start();

$action  = $_POST['action'];
$func    = new GlobalFunction();
$connect = $func->Connections();

if ($action == 'login') {

    $data = $func->CompressData($_POST['data']);
    $err  = $func->CheckReq($data);

    if (count($err) > 0) {
        echo json_encode(['status' => 'error', 'message' => 'please fill all field']);
        die();
    }

    $sql = "SELECT * FROM admins WHERE username = '$data[username]' AND password = '$data[password]'";
    $res = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($res);

    if ($row) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['name'] = $row['nama'];
        echo json_encode(['status' => 'success', 'message' => 'success login']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'username or password wrong']);
    }
}
