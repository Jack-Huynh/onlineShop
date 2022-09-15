
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
	
	function createUserModel($customerID, $customerName, $contactName, $address, $addresses, $city, $postCode, $country, $phone, $userName, $password) {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$query='INSERT INTO customers(CustomerID, CustomerName, ContactName, Address, Addresses ,City, Postalcode, Country, Phone, Username, Password) VALUES("'.$customerID.'","'.$customerName.'","'.$contactName.'", "'.$address.'", "'.$addresses.'", "'.$city.'", "'.$postCode.'", "'.$country.'", "'.$country.'", "'.$userName.'", "'.$password.'")';

		$result = mysqli_query($conn, $query);
		disconnectToDB($conn);
		return $result;
	}

	function getUserInfoModel($customerID){
		$hostname='localhost';
		$username='root';
		$password='';
		$dbname='myonlineshop';
		$conn=mysqli_connect($hostname, $username, $password, $dbname);
		if(!$conn) {
			die('Cannot connect'.mysql_error($conn));
			exit();
		}
		$sql='SELECT * FROM customers WHERE CustomerID = '.$customerID.'';
		$result = mysqli_query($conn, $sql);
		$userArray = array();
		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
				array_push($userArray, $row);
			}
		}
		mysqli_close($conn);
		return $userArray;
		
	}

	function updateUserModel($customerID, $customerName, $address, $contactName, $city, $postCode, $country, $phone, $userName, $password) {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$query = 'UPDATE customers SET CustomerName = "'.$customerName.'", ContactName = "'.$contactName.'", Address = "'.$address.'", City = "'.$city.'", PostalCode = "'.$postCode.'", Country = "'.$country.'", Phone = "'.$phone.'", Username = "'.$userName.'", Password = "'.$password.'" WHERE customers.CustomerID = '.$customerID;

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
	function checkAccountModel($userName, $password) {
		$query = 'SELECT * FROM customers WHERE customers.Username = "'.$userName.'" AND customers.Password = "'.$password.'"';
		$hostname='localhost';
		$username='root';
		$password='';
		$dbname='myonlineshop';
		$conn=mysqli_connect($hostname, $username, $password, $dbname);
		if(!$conn) {
			die('Cannot connect'.mysql_error($conn));
			exit();
		}

		$result = mysqli_query($conn, $query);
		$userArray=array();
		mysqli_close($conn);
		if(mysqli_num_rows($result)>0){
			while ($row=mysqli_fetch_assoc($result)) {
				array_push($userArray, $row);
			}
			return $userArray;
		}
		else {
			return false;
		}
	}
	function createCustomerModel($customerID, $customerName, $contactName, $address,$addresses, $city, $postCode, $country, $phone, $userName, $password) {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		/*
		if(!checkExistPasswordModel($password)) {
			return 3;
		}
		*/
		$query='INSERT INTO customers(CustomerID, CustomerName, ContactName, Address ,Addresses, City, Postalcode, Country, Phone, Username, Password) VALUES("'.$customerID.'","'.$customerName.'","'.$contactName.'", "'.$address.'", '."'".$addresses."'".',"'.$city.'", "'.$postCode.'", "'.$country.'", "'.$phone.'", "'.$userName.'", "'.$password.'")';
		//return $query;
		
		$result = mysqli_query($conn, $query);
		disconnectToDB($conn);
		if ($result) {
			return 2;
		} else {
			return 0;
		}
		
	}
	function checkExistPasswordModel($password) {
		include '../Helper/databaseHelper.php';
		$conn = connectToDB();
		$query = 'SELECT * FROM customers WHERE customers.Password = "'.$password.'"';
		$result = mysqli_query($conn, $query);
		disconnectToDB($conn);
		if(mysqli_num_rows($result)>0){
			return false;
		} else {
			return true;
		}
	}

	function addAddressesModel($addressJson, $customerID){
		$addressJson_=json_encode($addressJson);
		include '../Helper/databaseHelper.php';
		$query = 'UPDATE customers SET Addresses ='.$addressJson_.'WHERE customers.CustomerID ='.$customerID;
		$conn = connectToDB();
		$result = mysqli_query($conn, $query);
		disconnectToDB($conn);
	}

	function updateAddressDefaultModel($customerID, $addresses, $phone) {
		$hostname='localhost';
		$username='root';
		$password='';
		$dbname='myonlineshop';
		$conn=mysqli_connect($hostname, $username, $password, $dbname);
		if(!$conn) {
			die('Cannot connect'.mysql_error($conn));
			exit();
		}
		$query = 'UPDATE customers SET Address = "'.$addresses.'", Phone = "'.$phone.'" WHERE customers.CustomerID = '.$customerID;

		$result = mysqli_query($conn, $query);
		mysqli_close($conn);
		return $query;
	}
?>

