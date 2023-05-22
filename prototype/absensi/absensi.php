<?php 
error_reporting(0);
include 'koneksi.php';
mysqli_query($konek, "delete from tmprfid");
?>
<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Rekapitulasi Absensi</title>
</head>
<body>

	<?php include "menu.php"; ?>

	<div id="cekkartu"></div>

	<?php include "footer.php"; ?>

	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function(){
				$("#cekkartu").load('test_absensi.php')
			}, 1000);
		});	
	</script>
</body>
</html>