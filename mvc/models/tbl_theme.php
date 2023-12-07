<?php
class tbl_theme extends DB{
	public function GetTheme(){
		$qr = "SELECT * FROM tbl_theme";
		return mysqli_query($this->con, $qr);
	}

	public function ChangeColor($color1,$color2,$color3,$color4){
		$qr ="UPDATE tbl_theme SET tbl_theme.color1='$color1',tbl_theme.color2='$color2',tbl_theme.color3='$color3',tbl_theme.color4='$color4' WHERE tbl_theme.id='1'";
		mysqli_query($this->con, $qr);
	}
	
}
?>