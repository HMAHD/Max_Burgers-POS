<?php

// http://localhost/live/Home/Show/1/2

class Voucher extends Controller{
	function GetVoucher($code){
		$GetModel= $this->model("tbl_voucher");
		$GetVoucher = $GetModel ->GetVoucher($code);
		echo $GetVoucher;
	}

	function DeleteVoucher($id){
		$GetModel= $this->model("tbl_voucher");
		$DeleteVoucher = $GetModel ->DeleteVoucher($id);
		header( "Location: ../../System/Index" );
	}

	function AddVoucher(){
		$code = $_POST["code"];
		$price = $_POST["price"];
		$GetModel= $this->model("tbl_voucher");
		$AddVoucher = $GetModel ->AddVoucher($code,$price);
		header( "Location: ../System/Index" );
	}

}
?>