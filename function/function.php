<?php
date_default_timezone_set('Asia/Jakarta');

class GlobalFunction
{
    function Connections()
    {
        $koneksi = mysqli_connect('localhost', 'root', '', 'smartlock');
        return $koneksi;
    }

    function GlobalSave($koneksi, $tabel, array $data)
    {
        $sql = "insert into " . $tabel . " set ";
        foreach ($data as $field => $value) {
            $sql .= "" . $field . "='" . mysqli_real_escape_string($koneksi, $value) . "',";
        }
        $sql = rtrim($sql, ',');
        $result = mysqli_query($koneksi, $sql);
        if ($result) {
            return "S";
        } else {
            echo "\n\n ERROR FOTO INI DAN COPY TEXT ERROR LALU KIRIM KE EDP : \n==========================\n\n" . $sql . "\n\n==========================\n" . mysqli_error($koneksi);
            // return $sql;
            die();
        }
    }

    function GlobalUpdate($koneksi, $tabel, $data, $kategori)
    {
        $sql = "update $tabel set ";
        foreach ($data as $field => $value) {
            $sql .= "" . $field . "='" . mysqli_real_escape_string($koneksi, $value) . "', ";
        }
        $sql = rtrim($sql, ', ');
        $sql .= " where ";
        foreach ($kategori as $field => $value) {
            $sql .= "" . $field . "='" . mysqli_real_escape_string($koneksi, $value) . "' and ";
        }
        $sql = rtrim($sql, ' and ');
        $hasil = mysqli_query($koneksi, $sql);
        if ($hasil) {
            echo "US";
        } else {
            echo "UG";
        }
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
