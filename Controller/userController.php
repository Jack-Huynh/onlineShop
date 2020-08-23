<?php
	include '../../Model/userModel.php';
	
	function loadUsersData() {
		$userArray = array();
		$userArray = getUsers();
		return $userArray;
	}
?>
