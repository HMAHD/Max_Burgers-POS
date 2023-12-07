<?php
class tbl_payment extends DB
{
	public function AddPayment($content)
	{
		$qr3 = "INSERT INTO tbl_payment (content,idadmin)
		VALUES ('$content','1')";
		mysqli_query($this->con, $qr3);
	}

	public function GetAnalitics($type = 'all')
	{
		$qr = "";

		if ($type == 'day') {
			$qr = "SELECT * FROM tbl_payment WHERE created_at BETWEEN DATE_SUB(NOW(), INTERVAL 1 DAY) AND NOW() ORDER BY tbl_payment.id DESC";
		} else if ($type == 'month') {
			$qr = "SELECT * FROM tbl_payment WHERE created_at BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW() ORDER BY tbl_payment.id DESC";
		} else if ($type == 'all') {
			$qr = "SELECT * FROM tbl_payment ORDER BY tbl_payment.id DESC";
		}

		if (!empty($qr)) {
			return mysqli_query($this->con, $qr);
		} else {
			// Handle the case when $type is not recognized
			echo "Invalid type provided for GetAnalitics function.";
			return false;
		}
	}
}
