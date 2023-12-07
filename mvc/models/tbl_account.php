  
<?php
class tbl_account extends DB
{
	public function CheckPass($id, $passwordOld, $passwordRe, $passwordNew)
	{
		$passwordOldHash = md5($passwordOld);
		$qr = "SELECT * FROM tbl_account WHERE tbl_account.id='$id' AND tbl_account.password='$passwordOldHash'";
		$rows = mysqli_query($this->con, $qr);
		$kq = 1;
		if (mysqli_num_rows($rows) > 0) {
			if ($passwordRe == $passwordNew) {
				$kq = 1;
				$passwordNewHash = md5($passwordNew);
				$qr2 = "UPDATE tbl_account SET tbl_account.password='$passwordNewHash' WHERE tbl_account.id='$id'";
				mysqli_query($this->con, $qr2);
			} else {
				$kq = 2;
			}
		} else {
			$kq = 3;
		}
		return $kq;
	}

	public function CheckLogin($username, $passwordHash)
	{
		$qr = "SELECT * FROM tbl_account WHERE tbl_account.username='$username' AND tbl_account.password='$passwordHash'";
		$rows = mysqli_query($this->con, $qr);
		$kq = 1;
		if (mysqli_num_rows($rows) > 0) {
			$kq = 2;
		}
		return $kq;
	}
}
?>