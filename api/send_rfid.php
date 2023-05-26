<?php
include '../function/function.php';
session_start();
$func    = new GlobalFunction();

// connection to database
$connect = $func->Connections();

// get rfid from NodeMCU
$rfid = isset($_GET['rfid']) ?: '';
$saveRFID = $func->GlobalSave($connect, 'rfid_point', ['card_id' => $rfid]); // save rfid to database

if ($saveRFID) {
    echo "Successfully, RFID Card has been saved";
} else {
    echo "Failed, RFID Card has not been saved";
}

// check user access
$userAccess = $func->GlobalSelect($connect, 'users', ['card_id' => $rfid]);

// get all admin telegram id
$queryAdmin = "SELECT telegram_id FROM admins";
$resultAdmin = mysqli_query($connect, $queryAdmin);

if ($userAccess == 0) {
    if (!isset($_SESSION['new_rfid'])) {
        while ($rowAdmin = mysqli_fetch_array($resultAdmin)) {
            $func->SendTelegramMessage("Someone is trying to access with RFID Card: " . $rfid . " at " . date('Y-m-d H:i:s') . " but not registered in database", $rowAdmin['telegram_id']);
        }
        exit();
    }
} else {
    $data = [
        'card_id' => $rfid,
        'enter' => date('Y-m-d H:i:s')
    ];
    $saveAccessLog = $func->GlobalSave($connect, 'access_log', $data); // save access_log to database
    if ($saveAccessLog) {
        while ($rowAdmin = mysqli_fetch_array($resultAdmin)) {
            $func->SendTelegramMessage($userAccess['name'] . " successfully access at " . date('Y-m-d H:i:s'), $rowAdmin['telegram_id']);
        }

        // condition if not isset session new_rfid
        if (!isset($_SESSION['new_rfid'])) {
            // delete all data in rfid_point table
            $func->DeleteRFID($connect);
        }
    }
}

// close connection
mysqli_close($connect);
