<?php
	function getCategories($flagConn, $flagDisconn) {
		if($flagConn) {
			include '../../Helper/databaseHelper.php';
			$conn = connectToDB();
		} else {
			$hostname='localhost';
			$username='root';
			$password='';
			$dbname='myonlineshop';
			$conn=mysqli_connect($hostname, $username, $password, $dbname);
		}
		$sql='SELECT * FROM categories';
		$result = mysqli_query($conn, $sql);
		$categoriesArray = array();
		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
				array_push($categoriesArray, $row);
			}
		}
		if($flagDisconn){
			disconnectToDB($conn);
		}
		return $categoriesArray;
	}
	function createCategoriesModel($categoriesName, $description, $parentID) {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$query='INSERT INTO categories(CategoryName, Description, ParentID) VALUES("'.$categoriesName.'","'.$description.'","'.$parentID.'")';

		$result = mysqli_query($conn, $query);
		disconnectToDB($conn);
		return $result;
	}
	function getCategoriesInfoModel($categoriesID, $flagConn, $flagDisconn){
		include '../../Helper/databaseHelper.php';
		if ($flagConn) {
			$conn = connectToDB();
		}
		$sql='SELECT * FROM categories WHERE CategoryID = '.$categoriesID.'';
		$result = mysqli_query($conn, $sql);
		$Array = array();
		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
				array_push($Array, $row);
			}
		}
		if ($flagDisconn) {
			disconnectToDB($conn);
		}
		
		return $Array;	
	}
	function updateCategoriesModel($categoriesID, $categoriesName, $description, $parentID) {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$query = 'UPDATE categories SET CategoryName = "'.$categoriesName.'", Description = "'.$description.'", ParentID = "'.$parentID.'"  WHERE CategoryID = '.$categoriesID.'';

		$result = mysqli_query($conn, $query);
		disconnectToDB($conn);
		return $result;
	}
	function deleteCategoriesModel($categoriesID) {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$query='DELETE FROM categories WHERE CategoryID='.$categoriesID.'';
		$result = mysqli_query($conn, $query);
		disconnectToDB($conn);
		return $result;
	}
?>