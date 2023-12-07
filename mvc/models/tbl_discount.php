<?php
class tbl_discount extends DB{
	public function GetDiscount(){
		$qr = "SELECT * FROM tbl_discount";
		return mysqli_query($this->con, $qr);
	}

	public function EditDiscount($id,$price){
		$qr ="UPDATE tbl_discount SET tbl_discount.number='$price' WHERE tbl_discount.id='$id'";
		mysqli_query($this->con, $qr);
	}
}
?>