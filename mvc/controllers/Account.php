<?php

// http://localhost/live/Home/Show/1/2

class Account extends Controller{
	function Index(){
		$GetModel= $this->model("tbl_theme");
		$GetTheme = $GetModel ->GetTheme();
		if(isset($_SESSION["username"])){
			$this->view("master",["Page"=>"account","GetTheme"=>$GetTheme]);
		}else{
			header("Location: ../Account/Login");
		}
		
	}

	function Login(){
		$GetModel= $this->model("tbl_theme");
		$GetTheme = $GetModel ->GetTheme();
		if(isset($_SESSION["username"])){
			header("Location: ../Home");
		}else{
			$this->view("master",["Page"=>"login","GetTheme"=>$GetTheme]);
		}
		
	}

	function ChangePass(){
		$passwordOld = $_POST["passwordOld"];
		$passwordNew = $_POST["passwordNew"];
		$passwordRe = $_POST["passwordRe"];
		$GetModel= $this->model("tbl_account");
		$id=1;
		$CheckPass = $GetModel ->CheckPass($id,$passwordOld,$passwordRe,$passwordNew);	
		echo $CheckPass;
	}

	function CheckLogin(){
		$username = $_POST["username"];
		$password = $_POST["password"];
		$passwordHash = md5($password);
		$GetModel= $this->model("tbl_account");
		$CheckLogin = $GetModel ->CheckLogin($username,$passwordHash);
		if($CheckLogin == 2){
			$_SESSION["username"]=$username;
			echo 1;
		}else{
			echo 2;
		}	
	}
	function Logout(){
		if(isset($_SESSION["username"])){
			unset ($_SESSION["username"]);
			header("Location: ../Account/Login");
		}
	}
}
?>