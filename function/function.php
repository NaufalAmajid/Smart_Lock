<?php
date_default_timezone_set('Asia/Jakarta');

class GlobalFunction
{
    function Connections()
    {
        $connect = mysqli_connect('localhost', 'root', '', 'smartlock');
        return $connect;
    }

    function GlobalSelect($connect, $tabel, $category)
    {
        $sql = "select * from $tabel where ";
        foreach ($category as $field => $value) {
            $sql .= "" . $field . "='" . mysqli_real_escape_string($connect, $value) . "' and ";
        }
        $sql = rtrim($sql, ' and ');
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($result);
        return $row;
    }

    function GlobalSave($connect, $tabel, array $data)
    {
        $sql = "insert into " . $tabel . " set ";
        foreach ($data as $field => $value) {
            $sql .= "" . $field . "='" . mysqli_real_escape_string($connect, $value) . "',";
        }
        $sql = rtrim($sql, ',');
        $result = mysqli_query($connect, $sql);
        return $result;
    }

    function GlobalUpdate($connect, $tabel, $data, $category)
    {
        $sql = "update $tabel set ";
        foreach ($data as $field => $value) {
            $sql .= "" . $field . "='" . mysqli_real_escape_string($connect, $value) . "', ";
        }
        $sql = rtrim($sql, ', ');
        $sql .= " where ";
        foreach ($category as $field => $value) {
            $sql .= "" . $field . "='" . mysqli_real_escape_string($connect, $value) . "' and ";
        }
        $sql = rtrim($sql, ' and ');
        $result = mysqli_query($connect, $sql);
        return $result;
    }

    function GlobalDelete($connect, $tabel, $category)
    {
        $sql = "delete from $tabel where ";
        foreach ($category as $field => $value) {
            $sql .= "" . $field . "='" . mysqli_real_escape_string($connect, $value) . "' and ";
        }
        $sql = rtrim($sql, ' and ');
        $result = mysqli_query($connect, $sql);
        return $result;
    }

    function DeleteRFID($connect)
    {
        $sql = "DELETE FROM rfid_point";
        $result = mysqli_query($connect, $sql);
        return $result;
    }

    function DateDesc($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }

    function CheckReq($data)
    {
        $result = [];
        foreach ($data as $key => $value) {
            if ($value == '') {
                $result[] = $key;
            }
        }
        return $result;
    }

    function CompressData($data)
    {
        $send = [];
        foreach ($data as $key => $val) {
            $send[$val['name']] = $val['value'];
        }
        return $send;
    }

    function SendTelegramMessage($msg, $telegramId)
    {
        $telegramBotId = 'bot6041275936:AAG6Yf_y1NFs8YqN-tMrChGOCXPo5pwhv5c';
        $url = 'https://api.telegram.org/' . $telegramBotId . '/sendMessage?chat_id=' . $telegramId . '
                &text=' . $msg . '&parse_mode=html';
        $result = file_get_contents($url, true);
        return $result;
    }
}
