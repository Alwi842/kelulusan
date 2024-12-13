<?php 
class Connection {
   private $conn;
    private $stmt;
    
    public function __construct(){
		$servername = "localhost";
		$database = "ppdb";
		$username = "admin";
		$password = "";
        
        // Create connection
        $this->conn = mysqli_connect($servername, $username, $password, $database);
        
        // Check connection
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
	
    public function getConnection() {
        return $this->conn;
    }
    
    public function closeConnection() {
        if ($this->stmt) {
            $this->stmt->close();
        }
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
$connection=new Connection();

class control{
	public function cek_kelulusan($conn, $nisn) {
		$sql = "SELECT * FROM siswa WHERE nisn = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $nisn);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = $result->fetch_all(MYSQLI_ASSOC);
		$stmt->close();

		if (!$data) {
			$pesan = '<div class="alert alert-danger">
					  <strong>NISN tidak dapat ditemukan!</strong>
					  </div>';
			$_SESSION["pesan"] = $pesan;
			header("Location: cek-kelulusan");
		}
		
		return $data;
	}
	public function cek_kode($conn, $nisn) {
		$sql = "SELECT kode FROM siswa WHERE nisn = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $nisn);
		$stmt->execute();
		$result = $stmt->get_result();
		$data = $result->fetch_all(MYSQLI_ASSOC);
		$stmt->close();

		if (!$data) {
			$pesan = '<div class="alert alert-danger">
					  <strong>NISN tidak dapat ditemukan!</strong>
					  </div>';
			$_SESSION["pesan"] = $pesan;
			header("Location: cek-kelulusan");
		}
		
		return $data;
	}
	public function ket($conn, $nisn){
	    $sql = "UPDATE siswa SET ket = 1 WHERE nisn = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nisn);
        $stmt->execute();
        $stmt->close();
	}
	public function pesan(){
		if(!empty($_SESSION["pesan"]))
			echo $_SESSION["pesan"];
		unset($_SESSION["pesan"]);	
	}
}
$control= new control();

?>