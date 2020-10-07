<?php
include "../lib/Session.php";
include "../lib/Database.php";
include "../helpers/Formate.php";
Session::checkLogin();
class AdminLogin{
	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Formate();
	}
	
	public function adminLogin($adminUser,$adminPass){
		$adminUser = $this->fm->validation($adminUser);
		$adminPass = $this->fm->validation($adminPass);
		$adminUser = mysqli_real_escape_string($this->db->link,$adminUser);
		$adminPass = mysqli_real_escape_string($this->db->link,$adminPass);
		if(empty($adminUser) || empty($adminPass))
		{
			$error = "Any of the field should not be empty";
			return $error;
		}
		else
		{
			$query = "Select * from tbl_admin where adminUser='$adminUser' and adminPass = '$adminPass'";
			$result = $this->db->select($query);
			if($result !=false){
				$value = $result->fetch_assoc();
				Session::set('adminlogin',true);
				Session::set('adminid',$value['adminId']);
				Session::set('adminuser',$value['adminUser']);
				Session::set('adminname',$value['adminName']);
				echo "<script>window.location = 'dashboard.php'</script>";
			}else{
				$error = "Admin not found";
				return $error;
			}
			
		}
	}
	
}
?>
