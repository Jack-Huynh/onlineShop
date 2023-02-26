<?php
	if(isset($_GET['id'])){
		$id=$_GET['id'];
	}
	if(isset($_GET['action'])){
		$action=$_GET['action'];
	}
	if(isset($_POST['id'])){
		$id=$_POST['id'];
	}
	if(isset($_POST['quantity'])){
		$quantity=$_POST['quantity'];
	}
	function addToCart($id, $flagConn, $flagDisconn){
		include '../Model/productsModel.php';
		$productsArray = array();
		$productsArray = getproductsInfoModel2($id, $flagConn, $flagDisconn);
		session_start();
		
		if(!isset($_SESSION["cart"]) || count($_SESSION["cart"]) == 0){
			$_SESSION["cart"][0] = array(
				'ProductID' => $productsArray[0]['ProductID'],
				'ProductName' => $productsArray[0]['ProductName'] ,
				'Price' => $productsArray[0]['Price'],
				'Image' => $productsArray[0]['Image'],
				'Quantity' =>1,
				'Sum' => (int)$productsArray[0]['Price']*1
			);
		}
		else{
			$n = count($_SESSION["cart"]);
			$flag=false;
			for ($i=0; $i <$n ; $i++) { 
				if($productsArray[0]['ProductID']==$_SESSION["cart"][$i]['ProductID']){
					$flag=true;
					$_SESSION["cart"][$i]['Quantity']++;
					$_SESSION["cart"][$i]['Sum']=$_SESSION["cart"][$i]['Quantity']*$_SESSION["cart"][$i]['Price'];
					break;
				}
			}
			if($flag==false){
				$_SESSION["cart"][$n] = array(
					'ProductID' => $productsArray[0]['ProductID'],
					'ProductName' => $productsArray[0]['ProductName'] ,
					'Price' => $productsArray[0]['Price'],
					'Image' => $productsArray[0]['Image'],
					'Quantity' =>1,
					'Sum' => (int)$productsArray[0]['Price']*1
				);
			}
			//$_SESSION["cart_"]=array_push($_SESSION["cart"]);
		}
		header("Location: http://localhost/onlineShop/onlineShop/View/PDP/Cart.php");
	}

	function deleteCart($id){
		session_start();
		$n = count($_SESSION["cart"]);
		$newArray=array();
		for ($i=0; $i <$n ; $i++) {
			if($_SESSION["cart"][$i]['ProductID']!=$id){
				$sessionArray = array(
					'ProductID' => $_SESSION["cart"][$i]['ProductID'],
					'ProductName' => $_SESSION["cart"][$i]['ProductName'] ,
					'Price' => $_SESSION["cart"][$i]['Price'],
					'Image' => $_SESSION["cart"][$i]['Image'],
					'Quantity' =>$_SESSION["cart"][$i]['Quantity'],
					'Sum' => $_SESSION["cart"][$i]['Sum']
				);
				array_push($newArray, $sessionArray);
			}
		}
		unset($_SESSION['cart']);
		$n = count($newArray);
		for ($i=0; $i <$n ; $i++) {
			$_SESSION["cart"][$i] = array(
				'ProductID' => $newArray[$i]['ProductID'],
				'ProductName' => $newArray[$i]['ProductName'] ,
				'Price' => $newArray[$i]['Price'],
				'Image' => $newArray[$i]['Image'],
				'Quantity' =>$newArray[$i]['Quantity'],
				'Sum' => $newArray[$i]['Sum']
			);
		}
		header("Location: http://localhost/onlineShop/onlineShop/View/PDP/Cart.php");
	}
	function quantityChange($id, $quantity){
		session_start();
		$n = count($_SESSION["cart"]);
		$total=0;
		$sum=0;
		for ($i=0; $i <$n ; $i++) {
			if($_SESSION["cart"][$i]['ProductID']==$id){
				$value = $quantity - $_SESSION["cart"][$i]['Quantity'];
				$_SESSION["cart"][$i]['Quantity']+=$value;
				$_SESSION["cart"][$i]['Sum']=$_SESSION["cart"][$i]['Quantity']*$_SESSION["cart"][$i]['Price'];
				$sum=$_SESSION["cart"][$i]['Sum'];
			}
			$total+=intVal($_SESSION["cart"][$i]['Sum']);
		}
		$json='{"sum" : '.$sum.',"total" :'.$total.' }';
		die($json);

	}
	if($action=='addToCart'){
		addToCart($id, true, true);
	} else if ($action=='delete') {
		deleteCart($id);
	} else if($action=='quantityChange'){
		quantityChange($id, $quantity);
	}
?>