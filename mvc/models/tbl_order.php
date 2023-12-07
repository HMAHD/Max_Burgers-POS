<?php
class tbl_order extends DB
{

	public function GetOrder($idtable)
	{
		$qr = "SELECT tbl_product.name,tbl_product.image,tbl_product.price,tbl_order.quanlity,tbl_order.idproduct FROM tbl_order,tbl_product,tbl_table WHERE tbl_order.idproduct = tbl_product.id AND tbl_order.idtable = tbl_table.id and tbl_order.idtable='$idtable' ORDER BY tbl_order.id ASC";
		$result = mysqli_query($this->con, $qr);
		$OrderArr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$OrderArr[] = $row;
		}
		echo json_encode($OrderArr);
	}
	public function AddOrder($product, $table, $quanlity)
	{
		$qr = "INSERT INTO tbl_order(idproduct,idtable,quanlity)
		VALUES ('$product', '$table', '$quanlity')";
		return mysqli_query($this->con, $qr);
	}

	public function CheckTableProduct($idproduct, $idtable)
	{
		$qr = "SELECT * FROM tbl_order WHERE tbl_order.idproduct = '$idproduct' AND tbl_order.idtable='$idtable'";
		$rows = mysqli_query($this->con, $qr);
		$count = 0;
		if (mysqli_num_rows($rows) > 0) {
			$count = 1;
		} else {
			$count = 2;
		}
		return $count;
	}

	// Get all data for export
	/*
	public function GetAnalitics($type = 'all')
	{
		$qr = "SELECT * FROM tbl_order ORDER BY created_at DESC";
		$result = mysqli_query($this->con, $qr);

		if (!$result) {
			echo "Error executing query: " . mysqli_error($this->con);
			return false;
		}

		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}

		return $rows;
	}

*/


	public function UpQuanlity($idproduct, $idtable)
	{
		$qr = "UPDATE tbl_order SET tbl_order.quanlity=tbl_order.quanlity+1 WHERE tbl_order.idproduct='$idproduct' AND tbl_order.idtable='$idtable'";
		return mysqli_query($this->con, $qr);
	}

	public function DowQuanlity($idproduct, $idtable)
	{
		$qr = "UPDATE tbl_order SET tbl_order.quanlity=tbl_order.quanlity-1 WHERE tbl_order.idproduct='$idproduct' AND tbl_order.idtable='$idtable'";
		return mysqli_query($this->con, $qr);
	}

	public function DeleteOrder($idproduct, $idtable)
	{
		$qr = "DELETE FROM tbl_order WHERE tbl_order.idtable='$idtable' AND tbl_order.idproduct='$idproduct'";
		return mysqli_query($this->con, $qr);
	}


	public function GetOrderCheckout($idtable)
	{
		$qr = "SELECT tbl_product.name,tbl_product.price,tbl_order.quanlity,tbl_order.idproduct FROM tbl_order,tbl_product,tbl_table WHERE tbl_order.idproduct = tbl_product.id AND tbl_order.idtable = tbl_table.id and tbl_order.idtable='$idtable' ORDER BY tbl_order.id ASC";
		return mysqli_query($this->con, $qr);
	}
}
