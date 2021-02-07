
<?php 
	function getUsers () {
		include '../../Helper/databaseHelper.php';
		$conn = connectToDB();
		$sql='SELECT * FROM customers';
		$result = mysqli_query($conn, $sql);
		$userArray = array();
		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
				array_push($userArray, $row);
			}
		}
		disconnectToDB($conn);
		return $userArray;
	}
	
	function createUserModel($customerID, $customerName, $address, $contactName, $city, $postCode, $country, $userName, $password) {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$query='INSERT INTO customers(CustomerID, CustomerName, ContactName, Address ,City, Postalcode, Country, Username, Password) VALUES("'.$customerID.'","'.$customerName.'","'.$contactName.'", "'.$address.'", "'.$city.'", "'.$postCode.'", "'.$country.'", "'.$userName.'", "'.$password.'")';

		$result = mysqli_query($conn, $query);
		disconnectToDB($conn);
		return $result;
	}

	function getUserInfoModel($customerID){
		include '../../Helper/databaseHelper.php';
		$conn = connectToDB();
		$sql='SELECT * FROM customers WHERE CustomerID = '.$customerID.'';
		$result = mysqli_query($conn, $sql);
		$userArray = array();
		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
				array_push($userArray, $row);
			}
		}
		disconnectToDB($conn);
		return $userArray;
		
	}

	function updateUserModel($customerID, $customerName, $address, $contactName, $city, $postCode, $country, $userName, $password) {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$query = 'UPDATE customers SET CustomerName = "'.$customerName.'", ContactName = "'.$contactName.'", Address = "'.$address.'", City = "'.$city.'", PostalCode = "'.$postCode.'", Country = "'.$country.'", Username = "'.$userName.'", Password = "'.$password.'" WHERE customers.CustomerID = '.$customerID;

		$result = mysqli_query($conn, $query);
		disconnectToDB($conn);
		return $result;
	}

	function deleteUserModel($customerID) {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$query='DELETE FROM customers WHERE CustomerID='.$customerID.'';
		$result = mysqli_query($conn, $query);
		disconnectToDB($conn);
		return $result;
	}
?>
