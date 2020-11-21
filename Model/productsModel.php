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
	function createProductsModel($productsName, $description) {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$query='INSERT INTO product(ProductName, Description) VALUES("'.$productsName.'","'.$description.'")';

		$result = mysqli_query($conn, $query);
		disconnectToDB($conn);
		return $result;
	}
	function getProductsInfoModel($productsID){
		include '../../Helper/databaseHelper.php';
		$conn = connectToDB();
		$sql='SELECT * FROM product WHERE ProductID = '.$productsID.'';
		$result = mysqli_query($conn, $sql);
		$Array = array();
		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
				array_push($Array, $row);
			}
		}
		disconnectToDB($conn);
		return $Array;	
	}
	function updateProductsModel($productsID, $productsName, $description) {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$query = 'UPDATE product SET ProductName = "'.$productsName.'", Description = "'.$description.'"  WHERE ProductID = '.$productsID.'';

		$result = mysqli_query($conn, $query);
		disconnectToDB($conn);
		return $result;
	}
	function deleteProductsModel($productsID) {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$query='DELETE FROM product WHERE ProductID='.$productsID.'';
		$result = mysqli_query($conn, $query);
		disconnectToDB($conn);
		return $result;
	}
?>