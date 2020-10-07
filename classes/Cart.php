<?php
$filePath = realpath(dirname(__FILE__));
include_once ($filePath."/../lib/Database.php");
include_once ($filePath."/../helpers/Formate.php");;
class Cart{
	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Formate();
	}
	public function AddCart($quantity,$id){
		$quantity = $this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link,$quantity);
		$id       = mysqli_real_escape_string($this->db->link,$id);
		$sId      = session_id();
		
		$query  = "select * from tbl_product where productId ='$id'";
		$result = $this->db->select($query)->fetch_assoc();
		$productName = $result['productName'];
		$price       = $result['price'];
		$image       = $result['image'];
		
		$check     = "select * from tbl_cart where productId ='$id' and sId = '$sId'";
		$chkResult = $this->db->select($check);
		if($chkResult){
			$msg = "<span style = color:red; font-size:18px;>Product Already Added!</span>";
			return $msg;
		}else{
		$query  = "insert into tbl_cart(sId,productId,productName,price,quantity,image)
			values('$sId', '$id', '$productName','$price', '$quantity','$image')";
		$addCart = $this->db->insert($query);
			if($addCart){
				echo "<script>window.location = 'cart.php'</script>";
			}else{
				echo "<script>window.location = '404.php'</script>";
			}
		}
	}
	public function GetComprod($id){
		$query  = "select * from tbl_compare where cmrId = '$id'";
		$result = $this->db->select($query);
		if($result){
			return $result;
		}else{
			return false;
		}
	}
	public function GetWishList($id){
		$query  = "select * from tbl_wish where cmrId = '$id'";
		$result = $this->db->select($query);
		if($result){
			return $result;
		}else{
			return false;
		}
	}	
	public function GetCprod(){
		$sId = session_id();
		$query  = "select * from tbl_cart where sId = '$sId'";
		$result = $this->db->select($query);
		if($result){
			return $result;
		}else{
			return false;
		}
	}
	public function UpQuantity($quantity,$cartId){
		$quantity = $this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link,$quantity);
		$cartId   = mysqli_real_escape_string($this->db->link,$cartId);
		$query  = "update tbl_cart
			set 
			quantity = '$quantity'
			where cartId = '$cartId'";
			$upCart = $this->db->update($query);
			if($upCart){
				echo "<script>window.location='cart.php';</script>";			
			}else{
				$Msg = "<span class='error'>Quantity not Update</span>";
				return $Msg;
			}
	}
	public function DelProductByCart($cartId){
		$query = "delete from tbl_cart where cartId = '$cartId'";
		$del   = $this->db->delete($query);
		if($del){
			echo "<script>window.location='cart.php';</script>";
			
		}
		else{
			$delMsg = "<span class='error'>Product not deleted</span>";
			return $delMsg;
		}	
    }
	public function GetOrderprod($id){
		$query  = "select * from tbl_order where cmrId = '$id' order by date desc";
		$result = $this->db->select($query);
		if($result){
			return $result;
		}else{
			return false;
		}
		
	}
	public function CheckCart(){
		$sId    = session_id(); 
		$query  = "select * from tbl_cart where sId = '$sId'";
		$result = $this->db->select($query);
		if($result){
			return $result;
		}
	}
	public function CheckOrder($id){
		$sId    = session_id(); 
		$query  = "select * from tbl_order where cmrId = '$id'";
		$result = $this->db->select($query);
		if($result){
			return $result;
		}
	}
	public function DelCartData(){
		$sId     = session_id(); 
		$query   = "delete from tbl_cart where sId = '$sId'";
		$delCart = $this->db->delete($query);
	}
	public function GetOrder(){
		$query  = "select * from tbl_order order by date desc";
		$result = $this->db->select($query);
		if($result){
			return $result;
		}
		else{
			return false;
		}
	}
	public function getResult($cmrId,$price,$date){
		$cmrId = mysqli_real_escape_string($this->db->link,$cmrId);
		$price = mysqli_real_escape_string($this->db->link,$price);
		$date  = mysqli_real_escape_string($this->db->link,$date);
		$query  = "update tbl_order
			set 
			status = '1'
			where cmrId = '$cmrId' and price = '$price' and date = '$date'";
			$upStatus = $this->db->update($query);
			if($upStatus){
				$Msg = "<span class='success'>Status  Updated</span>";
				return $Msg;
			}else{
				$Msg = "<span class='error'>Quantity not Update</span>";
				return $Msg;
			}
	}
	public function delProductShifted($cmrId,$price,$date){
		$cmrId = mysqli_real_escape_string($this->db->link,$cmrId);
		$price = mysqli_real_escape_string($this->db->link,$price);
		$date  = mysqli_real_escape_string($this->db->link,$date);
		$query = "delete from tbl_order where cmrId = '$cmrId' and price = '$price' and date = '$date'";
		$del   = $this->db->delete($query);
		if($del){
			echo "<script>window.location='inbox.php';</script>";
			
		}
		else{
			$delMsg = "<span class='error'>Product not deleted</span>";
			return $delMsg;
		}
	}
	public function ConfirmOrder($cmrId,$price,$date){
		$cmrId = mysqli_real_escape_string($this->db->link,$cmrId);
		$price = mysqli_real_escape_string($this->db->link,$price);
		$date  = mysqli_real_escape_string($this->db->link,$date);
		$query  = "update tbl_order
			set 
			status = '2'
			where cmrId = '$cmrId' and price = '$price' and date = '$date'";
			$upStatus = $this->db->update($query);
			if($upStatus){
				$Msg = "<span class='success'>Status  Updated</span>";
				return $Msg;
			}else{
				$Msg = "<span class='error'>Quantity not Update</span>";
				return $Msg;
			}
	}
}
?>
