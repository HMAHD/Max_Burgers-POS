<?php
class tbl_product extends DB{
	public function GetProduct($type){
		if($type == '0'){
			$qr = "SELECT * FROM tbl_product ORDER BY id DESC";
		}else if($type == '1'){
			$qr = "SELECT * FROM tbl_product WHERE tbl_product.type=1 ORDER BY id DESC";
		}else if($type == '2'){
			$qr = "SELECT * FROM tbl_product WHERE tbl_product.type=2 ORDER BY id DESC";
		}else{
			$qr = "SELECT * FROM tbl_product WHERE tbl_product.name LIKE '%$type%'";
		}
		
		$result = mysqli_query($this->con, $qr);
		$ProductArr = array();
		while ( $row = mysqli_fetch_assoc($result) ) {
			$ProductArr[] = $row;
		}
		echo json_encode($ProductArr);
	}


	public function ProductsDashboard(){
		$qr = "SELECT * FROM tbl_product" ;
		return mysqli_query($this->con, $qr);
	}

	public function AddProduct($name,$price,$type,$image){
		$qr = "INSERT INTO tbl_product (name,price,type,image)
		VALUES ('$name','$price','$type','$image')";
		return mysqli_query($this->con, $qr);
	}

	public function DeleteProduct($id){
		$qr ="DELETE FROM tbl_product WHERE id=$id";
		$qr1 ="DELETE FROM tbl_order WHERE idproduct=$id";
		mysqli_query($this->con, $qr1);
		return mysqli_query($this->con, $qr);
	}
	public function GetEditProduct($id){
		$qr ="SELECT* FROM tbl_product WHERE id=$id";
		return mysqli_query($this->con, $qr);
	}
	public function SetEditProduct($id,$name,$price,$type,$image){
		if($image==1){
			$qr ="UPDATE tbl_product SET tbl_product.name='$name',tbl_product.price='$price',tbl_product.type='$type' WHERE tbl_product.id='$id'";
		}else{
			$qr ="UPDATE tbl_product SET tbl_product.name='$name',tbl_product.price='$price',tbl_product.type='$type',tbl_product.image='$image' WHERE tbl_product.id='$id'";
		}
		
		return mysqli_query($this->con, $qr);
	}
}
?>