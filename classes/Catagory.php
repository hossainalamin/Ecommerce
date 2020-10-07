<?php
$filePath = realpath(dirname(__FILE__));
include_once ($filePath."/../lib/Database.php");
include_once ($filePath."/../helpers/Formate.php");
class Catagory{
	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Formate();
	}
	public function AddCat($catName)
	{
		$catName = $this->fm->validation($catName);
		$catName = mysqli_real_escape_string($this->db->link,$catName);
		if(empty($catName)){
			$catMsg = "<span class='error'>Catagory Should not be empty</span>";
			return $catMsg;
		}
		else{
			$query  = "insert into tbl_catagory(catName) values('$catName')";
			$catAdd = $this->db->insert($query);
			if($catAdd){
				$catMsg = "<span class='success'>Catagory Added Successfully</span>";
				return $catMsg;
			}else{
				$catMsg = "<span class='error'>Catagory not Added</span>";
				return $catMsg;
			}
		}
	}
	public function catagoryList(){
		$query    = "select * from tbl_catagory order by catId desc";
		$catList  = $this->db->select($query);
		return $catList; 
	}
	public function getCatById($catId){
		$query    = "select * from tbl_catagory where catId = '$catId'";
		$getCat   = $this->db->select($query);
		return $getCat; 
	}
	public function UpCat($catName,$catId)
	{
		$catName = $this->fm->validation($catName,$catId);
		$catName = mysqli_real_escape_string($this->db->link,$catName);
		$catId = mysqli_real_escape_string($this->db->link,$catId);
		if(empty($catName)){
			$catMsg = "<span class='error'>Catagory Should not be empty</span>";
			return $catMsg;
		}
		else{
			$query  = "update tbl_catagory
			set 
			catName = '$catName'
			where catId = '$catId'";
			$UpCat = $this->db->update($query);
			if($UpCat){
				$catMsg = "<span class='success'>Catagory Updated Successfully</span>";
				return $catMsg;
			}else{
				$catMsg = "<span class='error'>Catagory not Update</span>";
				return $catMsg;
			}
		}
	}
	public function delCatById($catId){
		$query = "delete from tbl_catagory where catId = '$catId'";
		$del   = $this->db->delete($query);
		if($del){
			$catMsg = "<span class='success'>Catagory Deleted Successfully</span>";
			return $catMsg;
		}
		else{
			$catMsg = "<span class='error'>Catagory not Deleted</span>";
				return $catMsg;
		}
    }
	}
?>