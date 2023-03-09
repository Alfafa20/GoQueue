<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoQueue</title>
    <link rel="icon" type="image/x-icon" href="Logo.jpg">
</head>

<?php

 //Data yang di input pada page sebelumnya
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_SESSION['loket'] = $_POST['loket'];
    $_SESSION['operator'] = $_POST['operator'];
    $_SESSION['kode'] = $_POST['kode'];
    $_SESSION['antrian'] = $_POST['antrian'];

}
?>

<body>



<?php
		$angka_awal = 1; // Angka awal yang ingin ditampilkan
		$batas_angka = $_SESSION['antrian']; // Batas angka untuk mengganti fungsi tombol
	?>





    <div class="info"> <!-- Bagian yang akan di tampilkan -->
       <h1 class="nama"><?php echo $_SESSION['loket']; ?></h1>
       <hr>
       <h1><?php echo $_SESSION['operator']; ?></h1>
       <br>
       <br>
      
       
       <h3>Nomor Antrian</h3>
       <h1><?php echo $_SESSION['kode']?> - <span id="angka"><?php echo $angka_awal; ?></span></h1>
	<div class="fungsi">
        <a id="tombol" onclick="tambahAngka()"><img class="gambar" src="kanan.png" alt="Selanjutnya">Selanjutnya</a>
        <a id="tombol" onclick="play()"><img class="gambar" src="audio.jpeg" alt="panggil">Panggil</a>
        <audio id="audio" src="Bel panggilan.mpeg"></audio>
</div>

          

	<script> //Bagian Fungsi
        function play() {
            document.getElementById("audio").play();
        }

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
        background: #284B34;

    }

    .info{
        background-color: #BED7C9;
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

    #tombol{
    display: flex;
    justify-content: space-around;
    align-items: center;
    background-color: #BED7C9;
    padding: 0%;
    flex-direction: column;
    height: 100px;
    }
    
    .gambar{
    border-radius: 100%;
    width: 50px;
    }

    .fungsi{
    display: flex;
    flex-direction: row-reverse;
    justify-content: space-around;
    margin-bottom: 25%;
    margin-top: auto;
    width: 500px;
    }
</style>

</html>