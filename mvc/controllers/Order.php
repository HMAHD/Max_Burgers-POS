<?php

class Order extends Controller{

	function GetOrder($idtable){
		$GetModel= $this->model("tbl_order");
		$GetOrder = $GetModel ->GetOrder($idtable);
		echo $GetOrder;
	}
	function AddOrder(){
		$idproduct = $_POST["idproduct"];
		$idtable = $_POST["idtable"];

		$GetModel= $this->model("tbl_order");
		$CheckTableProduct = $GetModel->CheckTableProduct($idproduct,$idtable);

		if($CheckTableProduct==1){
			$UpQuanlity= $this->model("tbl_order");
			$UpQuanlity->UpQuanlity($idproduct,$idtable);
		}else{
			$AddOrder= $this->model("tbl_order");
			$AddOrder->AddOrder($idproduct,$idtable,1);
		}	
	}

	function DowQuanlity(){
		$idproduct = $_POST["idproduct"];
		$idtable = $_POST["idtable"];
		$DowQuanlity= $this->model("tbl_order");
		$DowQuanlity->DowQuanlity($idproduct,$idtable);	
	}

	function DeleteOrder(){
		$idproduct = $_POST["idproduct"];
		$idtable = $_POST["idtable"];
		$GetModel= $this->model("tbl_order");
		$DeleteOrder = $GetModel ->DeleteOrder($idproduct,$idtable);
	}

}
?>