<?php
session_start();
$nisn = $_GET['nisn'];
require 'control.php';
$conn=$connection->getConnection();
$result=$control->cek_kode($conn, $nisn);
if ($result[0]['kode']==0) {
    $pesan = '<div class="alert alert-danger">
			  <strong>ERROR FORBIDDEN</strong>
			  </div>'.$result['kode'];
	$_SESSION["pesan"] = $pesan;
	header("Location: cek-kelulusan");
}
$customFileName = 'SKL '.$nisn.'.pdf';  // Set your desired custom file name

$file = 'pdf/' . $nisn . '.pdf';  // Set the path to the file you want to allow for download

// Check if the file exists
if (file_exists($file)) {
    $result=$control->ket($conn, $nisn);
    $connection->closeConnection();
    // Set appropriate headers with the custom file name
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . $customFileName);
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));

    // Read the file and output it to the browser
    readfile($file);
    exit;
} else {
    // Handle file not found error
    echo 'File not found.';
    exit;
}
?>
