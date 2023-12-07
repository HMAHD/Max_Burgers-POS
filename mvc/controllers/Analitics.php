<?php

// http://localhost/live/Home/Show/1/2

class Analitics extends Controller
{
	function Index($type)
	{


		if (isset($_SESSION["username"])) {
			$GetModel = $this->model("tbl_theme");
			$GetTheme = $GetModel->GetTheme();
			$GetAnaliticsModel = $this->model("tbl_payment");
			$GetAnalitics = $GetAnaliticsModel->GetAnalitics($type);
			$this->view("master", ["Page" => "analitics", "GetAnalitics" => $GetAnalitics, "GetTheme" => $GetTheme]);
		} else {
			header("Location: ../Account/Login");
		}
	}
}
