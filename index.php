<?php

	require("inc/config.php");
	require(DIR_FS_LIB . "adodb5/adodb.inc.php");
	require(DIR_FS_CLASSES . "Utils.class.php");
	require(DIR_FS_CLASSES . "Contacts.class.php");

    $subTitle = "Contacts list";

    require("header.php");
?>

<div class="ĺistWrapper">

<?php


	switch ($_GET['action']) {
    case 'excludeContactByIdOK':
        echo '</p><span><font class="excludeContactByIdOK">Contact excluded.</font></span></p>';
        break;
    case "excludeContactByIdOK":
        echo '</p><span><font class="excludeContactByIdFail">Contact not excluded.</font></span></p>';
        break;
}	


    $contacts = new Contacts();
    $contactList = $contacts->listsContacts();

    foreach ($contactList as $contactLine) {

echo '<div class="contactLine">
	<a name="contactTop'.$contactLine['id'].'"></a>
	<div id="divListContatcLeft" class="col-xs-12 col-sm-6">
	<p><label for="name">Name</label><br>
		  <input name="name" id="name" value="'.$contactLine['name'].'" readonly/></p>
	</div>


	<div class="clearfix visible-xs-block"></div>


	<div id="divListContatcRight" class="col-xs-12 col-sm-6">
		  <p><label for="company">Company</label><br>
		  <input name="company" id="company" value="'.$contactLine['company'].'" readonly/></p>			
	</div>

	<div class="clearfix visible-xs-block"></div>


	<div id="divListContatcLeft" class="col-xs-12">
		  <p><label for="address">Address</label><br>
		  <input name="address" id="address" value="'.$contactLine['address'].'" readonly/></p>			
	</div>


	<div class="clearfix visible-xs-block"></div>


	<div id="divListContatcLeft" class="col-xs-12 col-sm-6">
		  <p><label for="phone">Phone Number</label><br>
		  <a href="tel:'.$contactLine['phone'].'">'.$contactLine['phone'].'</a></p>
	</div>


	<div class="clearfix visible-xs-block"></div>

	<div id="divListContatcRight" class="col-xs-12 col-sm-6">
		  <p><label for="email">Email</label><br>
		  <span class="spanEmail"><a href="mailto:'.$contactLine['email'].'?Subject=Hello" target="_top">'.$contactLine['email'].'</a></span></p>
	</div>


	<div class="clearfix visible-xs-block"></div>


	<div id="divListContatcRight" class="col-xs-12">
		  <p><label for="notes">Notes</label><br>
		  <textarea name="notes" id="notes">'.$contactLine['notes'].'</textarea></p>		
	</div>									


	<div class="clearfix visible-xs-block"></div>


	<div id="divListContatcLeft" class="col-xs-6">
		  <p><a href="editContact.php?action=bringContactData&id='.$contactLine['id'].'"><div class="editContactBtn">Edit Contact</div></a></p>			
	</div>

	<div class="clearfix visible-xs-block"></div>

	<div id="divListContatcRight" class="col-xs-6">
		   <p><a href="excludeContact.php?id='.$contactLine['id'].'"><div class="excludeContactBtn">Exclude Contact</div></a></p>	
	</div>


	<div id="divListContatcLeft" class="col-xs-12">
		  <p><a href="#top" class="top">Top of the page</a></p>			
	</div>

	</div>';

}

?>

</div>

<?php

    require("footer.php");

?>