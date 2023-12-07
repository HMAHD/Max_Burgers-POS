<?php

// http://localhost/live/Home/Show/1/2

class Product extends Controller{
	function GetProduct($type){
		$GetModel= $this->model("tbl_product");
		$GetProduct = $GetModel ->GetProduct($type);
		echo $GetProduct;
	}

	function ProductsDashboard(){
		if(isset($_SESSION["username"])){
			$GetModel= $this->model("tbl_theme");
			$GetTheme = $GetModel ->GetTheme();
			$GetModel= $this->model("tbl_product");
			$ProductsDashboard = $GetModel ->ProductsDashboard();
			$this->view("master",["Page"=>"products","ProductsDashboard"=>$ProductsDashboard,"GetTheme"=>$GetTheme]);
		}else{
			header("Location: ../Account/Login");
		}

		
	}

	// function EditProduct(){
	// 	$this->view("master",["Page"=>"edit-product"]);
	// }

	function GetAddProduct(){
		if(isset($_SESSION["username"])){
			$GetModel= $this->model("tbl_theme");
			$GetTheme = $GetModel ->GetTheme();
			$this->view("master",["Page"=>"add-product","GetTheme"=>$GetTheme]);
		}else{
			header("Location: ../Account/Login");
		}
		
	}

	function SetAddProduct(){

		$name = $_POST["name"];
		$price = $_POST["price"];
		$type = $_POST["type"];
		$image='';
		$tmpFilePath = $_FILES['upload']['tmp_name'];

		if($name== null){
			$this->view("master",["Page"=>"add-product","status"=>"Please enter your full information"]);
		}else if($price== null){
			$this->view("master",["Page"=>"add-product","status"=>"Please enter your full information"]);
		}else if($tmpFilePath == null){
			$this->view("master",["Page"=>"add-product","status"=>"Please enter your full information"]);
		}else{
			$image .=date("h").date("i").date("sa").$_FILES['upload']['name'];
			if ($tmpFilePath != ""){
				$newFilePath = "./public/images/product/" .date("h").date("i").date("sa").$_FILES['upload']['name'];
				if(move_uploaded_file($tmpFilePath, $newFilePath)) {
				}
			}

			$GetModel= $this->model("tbl_product");
			$AddProduct = $GetModel->AddProduct($name,$price,$type,$image);	
			header( "Location: ../Product/ProductsDashboard" );
		}

	}


	function DeleteProduct($id){
		$GetModel= $this->model("tbl_product");
		$DeleteProduct = $GetModel ->DeleteProduct($id);
		header( "Location: ../../Product/ProductsDashboard" );
	}
	
	function GetEditProduct($id){
		if(isset($_SESSION["username"])){
			$GetModel= $this->model("tbl_theme");
			$GetTheme = $GetModel ->GetTheme();
			$GetModel= $this->model("tbl_product");
			$EditProduct = $GetModel ->GetEditProduct($id);
			$this->view("master",["Page"=>"edit-product","product"=>$EditProduct,"GetTheme"=>$GetTheme]);
		}else{
			header("Location: ../Account/Login");
		}
		
	}

	function SetEditProduct(){
		$id = $_POST["idproduct"];
		$name = $_POST["name"];
		$price = $_POST["price"];
		$type = $_POST["type"];
		$image='';
		$tmpFilePath = $_FILES['upload']['tmp_name'];
		if($name== null){
			header( "Location: ../Product/GetEditProduct/1" );
		}else if($price== null){
			header( "Location: ../Product/GetEditProduct/1" );
		}else if($tmpFilePath==null){
			$image=1;
			$GetModel= $this->model("tbl_product");
			$EditProduct = $GetModel->SetEditProduct($id,$name,$price,$type,$image);	
			header( "Location: ../Product/ProductsDashboard" );
		}else{
			$image .=date("h").date("i").date("sa").$_FILES['upload']['name'];
			if ($tmpFilePath != ""){
				$newFilePath = "./public/images/product/" .date("h").date("i").date("sa").$_FILES['upload']['name'];
				if(move_uploaded_file($tmpFilePath, $newFilePath)) {
				}
			}
			$GetModel= $this->model("tbl_product");
			$EditProduct = $GetModel->SetEditProduct($id,$name,$price,$type,$image);	
			header( "Location: ../Product/ProductsDashboard" );
		}
	}

}


?>