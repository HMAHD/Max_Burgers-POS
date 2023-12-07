<?php

// http://localhost/live/Home/Show/1/2

class Table extends Controller{
	function GetTable(){
		$GetModel= $this->model("tbl_table");
		$GetTable = $GetModel ->GetTable();
		echo $GetTable;
	}

	function CheckTable($idtable){
		$GetModel= $this->model("tbl_table");
		$CheckTable = $GetModel ->CheckTable($idtable);
		echo $CheckTable;
	}

	function ResetTable($idtable){
		$GetModel= $this->model("tbl_table");
		$CheckTable = $GetModel ->ResetTable($idtable);
		echo "ok";
	}

	function EditTable(){
		$id = $_POST["idTable"];
		$number = $_POST["numberTable"];
		$type = $_POST["typeTable"];
		$GetModel= $this->model("tbl_table");
		$EditTable = $GetModel ->EditTable($id,$number,$type);
		header( "Location: ../System/Index" );
	}

	function DeleteTable($id){
		$GetModel= $this->model("tbl_table");
		$DeleteTable = $GetModel ->DeleteTable($id);
		header( "Location: ../../System/Index" );
	}

	function AddTable(){
		$number = $_POST["numberTable"];
		$type = $_POST["typeTable"];
		$GetModel= $this->model("tbl_table");
		$AddTable = $GetModel ->AddTable($number,$type);
		header( "Location: ../System/Index" );
	}

}
?>