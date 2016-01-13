<?php
	$title = "Address Book";
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php print $title . " - " . $subTitle; ?></title>
	<link href="css/style.css" rel="stylesheet" />
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>

	<div class="col-xs-12">
        <a name="top"></a>
		<?php print '<h2 id="page_title">' . $title . ' - ' . $subTitle . '</h2>'; ?>
	</div>

     <div class="col-xs-12" id="menu">
        <ul>
        	<li>|</li>
            <li><a href = "index.php">Home / List Contacts</a></li>
            <li>|</li>
            <li><a href = "addContact.php?action=''">Add a Contact</a></li>
            <li>|</li>
        </ul>

     </div>

     <div class="col-xs-12" id="div_body">