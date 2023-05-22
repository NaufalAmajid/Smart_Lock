<?php
	error_reporting(0);
	include "koneksi.php";
	include 'telegram.php';
	date_default_timezone_set('Asia/Jakarta');

	//baca nomor kartu dari NodeMCU
	$nokartu = $_GET['nokartu'];
	//kosongkan tabel tmprfid
	mysqli_query($konek, "delete from tmprfid");

	//simpan nomor kartu yang baru ke tabel tmprfid
	$simpan = mysqli_query($konek, "insert into tmprfid(nokartu)values('$nokartu')");
	if($simpan)
		echo "Berhasil";
	else
		echo "Gagal";

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