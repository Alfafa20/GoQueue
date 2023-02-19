<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoQueue</title>
    <link rel="icon" type="image/x-icon" href="Logo.jpg">
</head>
<body>

<?php

session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_SESSION['loket'] = $_POST['loket'];
    $_SESSION['operator'] = $_POST['operator'];
    $_SESSION['kode'] = $_POST['kode'];
    $_SESSION['antrian'] = $_POST['antrian'];

}

$akhir = $_SESSION['antrian'];
$awal = 1;


?>

<?php
		$angka_awal = 1; // Angka awal yang ingin ditampilkan
		$batas_angka = $_SESSION['antrian']; // Batas angka untuk mengganti fungsi tombol
	?>





    <div class="info">
       <h1 class="nama"><?php echo $_SESSION['loket']; ?></h1>
       <hr>
       <h3><?php echo $_SESSION['operator']; ?></h3>
       <br>
       <br>
      
       
       <h3>Nomor Antrian</h3>
       <h1><?php echo $_SESSION['kode']?> - <span id="angka"><?php echo $angka_awal; ?></span></h1>
	<div class="selanjutnya"><a id="tombol" onclick="tambahAngka()"><img class="kanan" src="kanan.png" alt="Selanjutnya">Selanjutnya</a>
</div>
	<script>
		function tambahAngka() {
			var angka = document.getElementById("angka").innerHTML;
			var hasil = parseInt(angka) + 1;
			document.getElementById("angka").innerHTML = hasil;

			if(hasil >= <?php echo $batas_angka; ?>) {
				document.getElementById("tombol").setAttribute("onclick", "pindahHalaman()");
			}
		}

		function pindahHalaman() {
			window.location.href = "selesai.html";
		}
	</script>
       
    </div>
</body>

<style>
    body{
        margin: 0%;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }

    .info{
        background-color: pink;
        margin: 5px;
        display: flex;
        flex-direction: column;
        align-content: center;
        width: 500px;
        align-items: center;
        height: 100vh;

    }

    .nama{
        display: flex;
        align-content: flex-start;
    }

    hr{
        width: 170px;
    }


    a:hover{
        box-shadow: 4px;
    }

    #tombol{
    display: flex;
    justify-content: space-around;
    align-items: center;
    background-color: pink;
    padding: 0%;
    flex-direction: column;
    height: 100px;
    }
    
    .kanan{
    border-radius: 100%;
    width: 50px;
    }

    .selanjutnya{
    display: flex;
    flex-direction: column;
    justify-content: end;
    margin-bottom: 25%;
    margin-top: auto;
    justify-self: end;
    }
</style>

</html>