<?php
include 'koneksi.php';
include 'telegram.php';
date_default_timezone_set('Asia/Jakarta') ;
//baca tabel tmprfid
$baca_kartu = mysqli_query($konek, "select * from tmprfid");
$nokartu = "";
//tanggal dan jam hari ini
$tanggal = date('Y-m-d');
$jam     = date('H:i:s');
if (mysqli_num_rows($baca_kartu) > 0) {
    $data_kartu = mysqli_fetch_array($baca_kartu);
    $nokartu    = $data_kartu['nokartu'];
    
    $dataKaryawan = mysqli_query($konek, "SELECT * FROM karyawan WHERE nokartu = $nokartu");
    $exKaryawan = mysqli_fetch_array($dataKaryawan);
    $namaKaryawan = $exKaryawan['nama'];
    $idTeleKaryawan = $exKaryawan['alamat'];

    if($namaKaryawan == ''){
        kirim('Ada kartu yang mencoba akses masuk ',$telegrambot,$user);
    }else{
        kirim('Halo, Selamat Datang '.$namaKaryawan,$telegrambot,$user);
        mysqli_query($konek, "insert into absensi(nokartu, tanggal, jam_masuk)values('$nokartu', '$tanggal', '$jam')");
    }
}


mysqli_query($konek, "delete from tmprfid");
?>
<!-- isi -->
<div class="container-fluid">
    <h3>Rekap Absensi</h3>
    <table class="table table-bordered">
        <thead>
            <tr style="background-color: grey; color:white">
                <th style="width: 10px; text-align: center">No.</th>
                <th style="text-align: center">Nama</th>
                <th style="text-align: center">Tanggal</th>
                <th style="text-align: center">Jam Masuk</th>
                <th style="text-align: center">Jam Istirahat</th>
                <th style="text-align: center">Jam Kembali</th>
                <th style="text-align: center">Jam Pulang</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //baca tabel absensi dan relasikan dengan tabel karyawan berdasarkan nomor kartu RFID untuk tanggal hari ini

            //baca tanggal saat ini
            $tanggal = date('Y-m-d');

            //filter absensi berdasarkan tanggal saat ini
            $sql = mysqli_query($konek, "select b.nama, a.tanggal, a.jam_masuk, a.jam_istirahat, a.jam_kembali, a.jam_pulang from absensi a, karyawan b where a.nokartu=b.nokartu and a.tanggal='$tanggal'");

            $no = 0;
            while ($data = mysqli_fetch_array($sql)) {
                $no++;
            ?>
                <tr>
                    <td> <?php echo $no; ?> </td>
                    <td> <?php echo $data['nama']; ?> </td>
                    <td> <?php echo $data['tanggal']; ?> </td>
                    <td> <?php echo $data['jam_masuk']; ?> </td>
                    <td> <?php echo $data['jam_istirahat']; ?> </td>
                    <td> <?php echo $data['jam_kembali']; ?> </td>
                    <td> <?php echo $data['jam_pulang']; ?> </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>