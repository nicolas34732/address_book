<?php

	require("inc/config.php");
	require(DIR_FS_LIB . "adodb5/adodb.inc.php");
	require(DIR_FS_CLASSES . "Utils.class.php");
	require(DIR_FS_CLASSES . "Contacts.class.php");

	
	if ($_GET['id'] != '') {
		$id = $_GET['id'];
	}


	$contacts = new Contacts();

	if ($contacts->excludeContactById($id)){
		header('Location: index.php?action=excludeContactByIdOK'); 
	} else {
		header('Location: index.php?action=excludeContactByIdFail'); 
	}

?>