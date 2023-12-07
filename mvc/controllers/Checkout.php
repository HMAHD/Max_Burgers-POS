<?php

class Checkout extends Controller{
	function Index($idtable){
		if(isset($_SESSION["username"])){
			$GetModel= $this->model("tbl_theme");
			$GetTheme = $GetModel ->GetTheme();
			$GetOrderCheckoutModel= $this->model("tbl_order");
			$GetOrderCheckout = $GetOrderCheckoutModel ->GetOrderCheckout($idtable);

			$GetFee= $this->model("tbl_fee");
			$GetFee = $GetFee ->GetFee();
			$GetDiscount= $this->model("tbl_discount");
			$GetDiscount = $GetDiscount ->GetDiscount();
			$this->view("master",["Page"=>"checkout","fee"=>$GetFee,"discount"=>$GetDiscount,"GetOrderCheckout"=>$GetOrderCheckout,"GetTheme"=>$GetTheme]);
		}else{
			header("Location: ../Account/Login");
		}

		
		
	}

	function AddCheckout(){
		$content = $_POST["content"];
		$GetModel= $this->model("tbl_payment");
		$AddPayment = $GetModel->AddPayment($content);	

	}
}
?>