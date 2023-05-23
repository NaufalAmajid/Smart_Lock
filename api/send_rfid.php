<?php
include '../function/function.php';
$func    = new GlobalFunction();

// connection to database
$connect = $func->Connections();

// delete all data in rfid_point table
$func->DeleteRFID($connect);

// get rfid from NodeMCU
$rfid = $_GET['rfid'];
$saveRFID = $func->GlobalSave($connect, 'rfid_point', ['card_id' => $rfid]); // save rfid to database

if ($saveRFID) {
    echo "Successfully, RFID Card has been saved";
} else {
    echo "Failed, RFID Card has not been saved";
}
