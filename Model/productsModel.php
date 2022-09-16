<?php
	function getProducts() {
		include '../../Helper/databaseHelper.php';
		$conn = connectToDB();
		$sql='SELECT * FROM product, categories WHERE product.CategoryID = categories.CategoryID';
		$result = mysqli_query($conn, $sql);
		$productsArray = array();
		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
				array_push($productsArray, $row);
			}
		}
		disconnectToDB($conn);
		return $productsArray;
	}
	function createProductsModel($productName, $supplierID, $categoryID, $price, $image) {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$query='INSERT INTO product(ProductName, SupplierID, CategoryID, Price, Image) VALUES("'.$productName.'","'.$supplierID.'","'.$categoryID.'","'.$price.'","'.$image.'")';

		$result = mysqli_query($conn, $query);
		disconnectToDB($conn);
		return $result;
	}
	function getProductsInfoModel($productsID, $flagConn, $flagDisconn){
		include '../../Helper/databaseHelper.php';
		if($flagConn){
			$conn = connectToDB();
		}
		$sql='SELECT * FROM product WHERE ProductID = '.$productsID.'';
		$result = mysqli_query($conn, $sql);
		$Array = array();
		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
				array_push($Array, $row);
			}
		}
		if($flagDisconn){
			disconnectToDB($conn);
		}
		return $Array;	
	}
	function getProductsInfoModel2($productsID, $flagConn, $flagDisconn){
		include '../Helper/databaseHelper.php';
		if($flagConn){
			$conn = connectToDB();
		}
		$sql='SELECT * FROM product WHERE ProductID = '.$productsID.'';
		$result = mysqli_query($conn, $sql);
		$Array = array();
		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
				array_push($Array, $row);
			}
		}
		if($flagDisconn){
			disconnectToDB($conn);
		}
		return $Array;	
	}
	function updateProductsModel($productID, $productName,  $supplierID, $categoryID, $price, $image) {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$query = 'UPDATE product SET ProductName = "'.$productName.'", SupplierID = "'.$supplierID.'", CategoryID = "'.$categoryID.'", Price = "'.$price.'", Image = "'.$image.'"  WHERE ProductID = '.$productID.'';

		$result = mysqli_query($conn, $query);
		disconnectToDB($conn);
	}
	function deleteProductsModel($productID) {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$query='DELETE FROM product WHERE ProductID='.$productID.'';
		$result = mysqli_query($conn, $query);
		disconnectToDB($conn);
		return $result;
	}
	function searchProductsModel($productName, $categoryName, $fromPrice, $toPrice) {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();

		$sql='SELECT * FROM product, categories WHERE product.CategoryID = categories.CategoryID';
		if ($productName != '') {
			$sql.=' AND ProductName="'.$productName.'" ';
		}
		if ($categoryName != '') {
			$sql.=' AND CategoryName="'.$categoryName.'" ';
		}
		if ($fromPrice != '') {
			$sql.=' AND Price>="'.$fromPrice.'" ';
		}
		if ($toPrice != '') {
			$sql.=' AND Price<="'.$toPrice.'" ';
		}

		$result = mysqli_query($conn, $sql);
		$productsArray = array();
		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
				array_push($productsArray, $row);
			}
		}
		disconnectToDB($conn);
		return $productsArray;
	}
?>
