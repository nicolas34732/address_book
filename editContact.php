<?php

    require("inc/config.php");
    require(DIR_FS_LIB . "adodb5/adodb.inc.php");
    require(DIR_FS_CLASSES . "Utils.class.php");
    require(DIR_FS_CLASSES . "Contacts.class.php");

    $subTitle = "Contact editing";

    $file = htmlspecialchars($_SERVER["PHP_SELF"]);
    $break = Explode('/', $file);
    $pfile = $break[count($break) - 1];    

    
    if ($_GET['id'] != '') {
        $id = $_GET['id'];
    }

    switch ($_GET['action']) {
        case 'bringContactData':
            $contact = new Contacts(); 
            $list = $contact->listsContactById($id);
                foreach ($list as $line) {
                    $name = $line['name'];
                    $company = $line['company'];
                    $address = $line['address'];
                    $phone = $line['phone'];
                    $email = $line['email'];
                    $notes = $line['notes'];                                                                                                    
            }
            $nameErr = $phoneErr = " ";    
            $emailErr = "";
            break;
        
        case 'updateContactData':

            $nameErr = $phoneErr = " ";    
            $emailErr = "";

            $name = ($_POST["name"]);
            $company = ($_POST["company"]);
            $address = ($_POST["address"]);   
            $phone = ($_POST["phone"]);
            $email = ($_POST["email"]);
            $notes = ($_POST["notes"]);

            if (empty($_POST["name"])) {
                $nameErr = "Name is required. ";
            } else {
                $name = ($_POST["name"]);
                $nameErr = "";
            }

            if (empty($_POST["phone"])) {
                $phoneErr = "Phone Number is required";
            } else {
                $phone = ($_POST["phone"]);
                $phoneErr = "";
            }

            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $nameErr = "Only letters and white space allowed. ";
            }

           if ((!preg_match("/^[0-9]+$/",$phone)) && (!empty($phone))) {
                $phoneErr = "Only numbers allowed. ";
            }

            if ((!filter_var($email, FILTER_VALIDATE_EMAIL)) && (!empty($email))) {
                $emailErr = "Invalid email format" ;
            }


            if ($nameErr . $emailErr . $phoneErr == '') {
                $contact = new Contacts();
                if ($contact->updateContactData($id,$name,$company,$address,$phone,$email,$notes)) {
                    header('Location: index.php#contactTop'.$id);     
                } else {
                    header('Location: index.php?action=addContactFail');   
                }
            }
                    break;
}

    require("header.php");

?>

<div class="clearfix visible-xs-block"></div>

<?php

    switch ($_GET['action']) {
        case 'addContactOK':
            echo '</p><span><font class="addContactOK">Contact added.</font></span></p>';
            break;
        case "addContactFail":
            echo '</p><span><font class="addContactFail">Contact not added.</font></span></p>';
            break;
    }

?>

<div class="col-xs-12" id="divFormWrapper">

	    <form name="form1" id="form1" method="POST" enctype="multipart/formdata" action="<?php print $pfile; ?>?action=updateContactData&id=<?php print $id; ?>">

			<div id="divFormLineLeft" class="col-xs-12 col-sm-6">
				  <p><label for="name">Name <font class="required">(required)</font></label><br>
				  <input name="name" id="name" value="<?php print $name; ?>" type="text" />
				  <span class="error"><?php echo $nameErr;?></span></p>
			</div>


			<div class="clearfix visible-xs-block"></div>


			<div id="divFormLineRight" class="col-xs-12 col-sm-6">
				  <p><label for="company">Company</label><br>
				  <input name="company" id="company" value="<?php print $company; ?>" type="text" /></p>			
			</div>

			<div class="clearfix visible-xs-block"></div>


			<div id="divFormLineLeft" class="col-xs-12">
				  <p><label for="address">Address</label><br>
				  <input name="address" id="address" value="<?php print $address; ?>" type="text" /></p>			
			</div>


			<div class="clearfix visible-xs-block"></div>


			<div id="divFormLineLeft" class="col-xs-12 col-sm-6">
				  <p><label for="phone">Phone Number (only numbers) <font class="required">(required)</font></label><br>
				  <input name="phone" id="phone" value="<?php print $phone; ?>" type="text" />
				  <span class="error"><?php echo $phoneErr;?></span></p>
			</div>


			<div class="clearfix visible-xs-block"></div>

			<div id="divFormLineLeft" class="col-xs-12 col-sm-6">
				  <p><label for="email">Email</label><br>
				  <input name="email" id="email" value="<?php print $email; ?>" type="text" />
				  <span class="error"><?php echo $emailErr;?></span></p></p>			
			</div>

			<div class="clearfix visible-xs-block"></div>


			<div id="divFormLineRight" class="col-xs-12">
				  <p><label for="notes">Notes</label><br>
				  <textarea name="notes" id="notes"><?php print $notes; ?></textarea></p>		
			</div>									


			<div class="clearfix visible-xs-block"></div>


			<div id="divFormLineRight" class="col-xs-6">
				  <p><input type="submit" name="submit" id="submit" value="Update"/></p>			
			</div>

			<div class="clearfix visible-xs-block"></div>

			<div id="divFormLineRight" class="col-xs-6"></div>

		</form>
</div>