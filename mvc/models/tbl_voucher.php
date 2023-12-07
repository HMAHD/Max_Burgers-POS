<?php
class tbl_voucher extends DB{
	public function GetVoucher($code){
		$qr = "SELECT * FROM tbl_voucher WHERE tbl_voucher.code = '$code'";
		$result = mysqli_query($this->con, $qr);
		$Voucher = array();
		while ( $row = mysqli_fetch_assoc($result) ) {
			$Voucher[] = $row;
		}
		echo json_encode($Voucher);
	}

	public function Voucher(){
		$qr = "SELECT * FROM tbl_voucher";
		return mysqli_query($this->con, $qr);
	}

	public function DeleteVoucher($id){
		$qr ="DELETE FROM tbl_voucher WHERE id=$id";
		mysqli_query($this->con, $qr);
	}

	public function AddVoucher($code,$price){
		$qr = "INSERT INTO tbl_voucher (code,number)
		VALUES ('$code','$price')";
		mysqli_query($this->con, $qr);
		echo "ok";
	}
}
?>