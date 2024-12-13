<?php
session_start();
require 'control.php';
$conn=$connection->getConnection();
$result=$control->cek_kelulusan($conn, $_POST['NISN']);
$connection->closeConnection();
require("header.php");
?>
<header class="bg-green">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-xl-2 d-none d-xl-block">
			  <img class="img-fluid rounded-3 my-5" src="img/logo-iscen.png" alt="..." href="cek-kelulusan"/>
			</div>
			<div class="col">
				<div class="text-center text-white text-xl-start">
					<span class="fw-bolder">YAYASAN ISLAMIC CENTRE KOTA TANGERANG</span>
					<h3 class="fw-bolder">SMP ISLAMIC CENTRE</h3>
					<span class="small">Jl. Ciujung Raya No. 4 RT 009 RW 002 Karawaci Baru Perumnas I</span>
				</div>
			</div>
		</div>
	</div>
</header>

<section class="mb-5">
	<div class="container">
		<h3 class="h1-responsive font-weight-bold text-center my-4">SURAT KETERANGAN LULUS</h3>
		<p class="w-responsive mx-auto text-justify">Kepala SMP Islamic Centre, berdasarkan Pendoman Pembelajaran dan Asesmen Penilaian Kurikulum 2013 dan Rapat Dewan Guru tentang Kelulusan Peserta didik Kelas IX Tahun Ajaran 2022/2023, bahwa :</p>
		<div class="container my-4">
			<ul class="list-unstyled">
			 <li>
				<span class="label">Nama</span>: <?php echo $result[0]['nama']; ?>
			</li>
			<li>
				<span class="label">TTL</span>: <?php echo $result[0]['ttl']; ?>
			</li>
			<li>
				<span class="label">NISN</span>: <?php echo $result[0]['nisn']; ?>
			</li>
			<li>
				<span class="label">No Peserta US</span>: <?php echo $result[0]['noujian']; ?>
			</li>
			</ul>
		</div>
		<p class="w-responsive mx-auto text-justify">Dinyatakan :</p>
		<div class="d-flex justify-content-center mt-5 mb-3">
			<span class='alert alert-success '>
				<strong><h1>LULUS</h1></strong>
			</span>
		</div>
	</div>
	<div class="text-center">
		<button class="btn  text-white <?php if ($result[0]['kode'] == 1) {
			echo "btn-success\" onclick=\"window.open('download-file?nisn=" . $_POST['NISN'] . "', '_blank')\" ";
		} else {
			echo "btn-danger\" disabled";
		} ?>>Surat Keterangan Lulus</button>
		<p>Silakan download full SKL-nya disini</p>
	</div>
</section>
<?php require("footer.php"); ?>