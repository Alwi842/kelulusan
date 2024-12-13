<?php 
    session_start();
	require 'control.php';
	require 'header.php';
?>
<head>
<title>Cek Kelulusan SMP Islamic Centre Tangerang</title>
</head>
<body>
<header class="bg-green">
    <div class="container my-3">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8 text-lg-left">
                <h1 class="fw-bolder text-white">Cek Kelulusan cukup dari Rumah</h1>
            </div>
            <div class="col-xl-2 d-none d-xl-block">
			  <img class="img-fluid rounded-3" src="img/logo-iscen.png" alt="..." href="cek-kelulusan"/>
			</div>
			</div>
        </div>
    </div>
</header>
<div id="alert" onclick="alert_close()">
	<?php echo $control->pesan();?>
</div>
<section class="mt-5 mb-5">
  <div class="container">
    <div class="row justify-content-center ">
      <div class="col-lg-6 text-lg-left">
            <h3 class="cta-title">Cek Pengumuman</h3>
            <ul class="cta-text">
              <li>Masukkan NISN</li>
              <li>Klik Cek Kelulusan</li>
            </ul>
          </div>
      <div class="col-lg-4 col-md-6 col-sm-8">
        <form action="hasil-kelulusan" method="post">
          <div class="mb-3">
            <input id="NISN" type="text" class="form-control" name="NISN" placeholder="NISN" required>
          </div>
          <div class="text-center">
            <button name="login"type="submit" class="btn btn-block" style="background-color: #33cc33; color:white;">Cek Kelulusan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
 </section>
<?php require("footer.php"); ?>
</body>
</html>