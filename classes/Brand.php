<?php
$filePath = realpath(dirname(__FILE__));
include_once ($filePath."/../lib/Database.php");
include_once ($filePath."/../helpers/Formate.php");
class Brand 
{
	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Formate();
	}
	public function AddBrand($brandName){
		$brandName = $this->fm->validation($brandName);
		$brandName = mysqli_real_escape_string($this->db->link,$brandName);
		if(empty($brandName)){
			$brandMsg = "<span class='error'>Brand Should not be empty</span>";
			return $brandMsg;
		}
		else{
			$query  = "insert into tbl_brand(brandName) values('$brandName')";
			$brandAdd = $this->db->insert($query);
			if($brandAdd){
				$brandMsg = "<span class='success'>Brand Added Successfully</span>";
				return $brandMsg;
			}else{
				$brandMsg = "<span class='error'>Brand not Added</span>";
				return $brandMsg;
			}
		}
	}
	public function BrandList(){
		$query    = "select * from tbl_brand order by brandId desc";
		$brandList  = $this->db->select($query);
		return $brandList; 
	}
	public function GetBrandById($brandId){
		$query    = "select * from tbl_brand where brandId = '$brandId'";
		$getBrand   = $this->db->select($query);
		return $getBrand; 
	}
	public function UpBrand($brandName,$brandId)
	{
		$brandName = $this->fm->validation($brandName,$brandId);
		$brandName = mysqli_real_escape_string($this->db->link,$brandName);
		$brandId = mysqli_real_escape_string($this->db->link,$brandId);
		if(empty($brandName)){
			$brandMsg = "<span class='error'>Catagory Should not be empty</span>";
			return $brandMsg;
		}
		else{
			$query  = "update tbl_brand
			set 
			brandName = '$brandName'
			where brandId = '$brandId'";
			$Upbrand = $this->db->update($query);
			if($Upbrand){
				$brandMsg = "<span class='success'>Brand Updated Successfully</span>";
				return $brandMsg;
			}else{
				$brandMsg = "<span class='error'>Brand not Update</span>";
				return $brandMsg;
			}
		}
	}
	public function DelBrandById($brandId){
		$query = "delete from tbl_brand where brandId = '$brandId'";
		$del   = $this->db->delete($query);
		if($del){
			$delMsg = "<span class='success'>Brand deleted Successfully</span>";
			return $delMsg;
		}
		else{
			$delMsg = "<span class='error'>Brand not deleted</span>";
				return $delMsg;
	}
    }
}
?>