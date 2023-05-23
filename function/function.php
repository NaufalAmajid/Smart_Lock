<?php
date_default_timezone_set('Asia/Jakarta');

class GlobalFunction
{
    function Connections()
    {
        $connect = mysqli_connect('localhost', 'root', '', 'smartlock');
        return $connect;
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
}
