<?php
class tbl_table extends DB{
	public function Table(){
		$qr = "SELECT * FROM tbl_table";
		return mysqli_query($this->con, $qr);
	}

	public function GetTable(){
		$qr = "SELECT * FROM tbl_table";
		$result = mysqli_query($this->con, $qr);
		$TableArr = array();
		while ( $row = mysqli_fetch_assoc($result) ) {
			$TableArr[] = $row;
		}
		echo json_encode($TableArr);
	}

	public function CheckTable($idtable){
		$qr = "SELECT * FROM tbl_order WHERE tbl_order.idtable = '$idtable'";
		$rows = mysqli_query($this->con, $qr);
		$count=0;
		if(mysqli_num_rows($rows)>0){
			$count=1;
			$qr1 = "UPDATE tbl_table SET tbl_table.status=3 WHERE tbl_table.id='$idtable'";
			mysqli_query($this->con, $qr1);
		}else if(mysqli_num_rows($rows)==0){
			$qr2 = "UPDATE tbl_table SET tbl_table.status=1 WHERE tbl_table.id='$idtable'";
			mysqli_query($this->con, $qr2);
			$count=2;
		}
		return $count;
	}


	public function ResetTable($idtable){

		$qr = "UPDATE tbl_table SET tbl_table.status=1 WHERE tbl_table.id='$idtable'";
		mysqli_query($this->con, $qr);

		$qr1 = "DELETE FROM tbl_order WHERE tbl_order.idtable=$idtable";
		mysqli_query($this->con, $qr1);
	}


	public function EditTable($id,$number,$type){
		$qr ="UPDATE tbl_table SET tbl_table.number='$number',tbl_table.type='$type' WHERE tbl_table.id='$id'";
		mysqli_query($this->con, $qr);
	}
	public function DeleteTable($id){
		$qr ="DELETE FROM tbl_table WHERE id=$id";
		mysqli_query($this->con, $qr);
		$qr1 ="DELETE FROM tbl_order WHERE idtable=$id";
		mysqli_query($this->con, $qr1);
	}

	public function AddTable($number,$type){
		$qr = "INSERT INTO tbl_table (number,type,customer,status)
		VALUES ('$number','$type','4','1')";
		mysqli_query($this->con, $qr);
	}
	
}
?>