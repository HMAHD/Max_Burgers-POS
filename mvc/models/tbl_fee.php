<?php
class tbl_fee extends DB{
	public function GetFee(){
		$qr = "SELECT * FROM tbl_fee";
		return mysqli_query($this->con, $qr);
	}


	public function EditFee($id,$name,$price){
		$qr ="UPDATE tbl_fee SET tbl_fee.number='$price' WHERE tbl_fee.id='$id'";
		mysqli_query($this->con, $qr);
	}
}
?>