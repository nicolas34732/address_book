<?php

class Contacts extends Utils {

    private $id;
    private $name;
    private $company;
    private $address;
    private $phone;
    private $email;
    private $notes;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->numero = $name;
    }

    public function getCompany() {
        return $this->company;
    }

    public function setCompany($company) {
        $this->company = $company;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getNotes() {
        return $this->notes;
    }

    public function setNotes($notes) {
        $this->notes = $notes;
    }

    
    public function listsContacts() {
        $this->openConnection();

        $query = "SELECT * 
                  FROM address_book_table 
                  ORDER BY name";

        $rs = $this->connection->Execute($query);

        $list = array();

        if ($rs && $rs->recordCount() > 0) {
            while ($row = $rs->fetchRow()) {
                array_push($list, $row);
            }
        }
        return $list;
    }


    public function addContact($name,$company,$address,$phone,$email,$notes) {

        $this->openConnection();

        $query = "SELECT * FROM address_book_table WHERE phone = '$phone'";

        $rs = $this->connection->Execute($query);

        if ($rs && $rs->recordCount() <= 0) {

            $query = "INSERT INTO address_book_table (name,company,address,phone,email,notes)
                      VALUES ('$name','$company','$address','$phone','$email','$notes')";

            $this->connection->Execute($query);

            $query = "SELECT last_insert_id() 
                      AS id 
                      FROM address_book_table";

            $rs = $this->connection->Execute($query);
            $row = $rs->fetchRow();
            $this->id = $row['id'];


        } else {

            $row = $rs->fetchRow();
            $this->id = $row['id'];
            return false;

        }
        return true; 

    }


    public function excludeContactById($id) {

        $this->openConnection();

        $query = "SELECT *
                  FROM address_book_table 
                  WHERE id = '$id'";

        $rs = $this->connection->Execute($query);

        if ($rs && $rs->recordCount() >= 0) {

            $query = "DELETE 
                      FROM address_book_table 
                      WHERE id = $id";

            $this->connection->Execute($query);

        } else {
            $row = $rs->fetchRow();
            $this->id = $row['id'];
            return false;
        }
        return true;
    }


    public function listsContactById($id) {
        $this->openConnection();

        $query = "SELECT * 
                  FROM address_book_table 
                  WHERE id = $id";

        $rs = $this->connection->Execute($query);

        $list = array();

        if ($rs && $rs->recordCount() > 0) {
            while ($row = $rs->fetchRow()) {
                array_push($list, $row);
            }
        }
        return $list;
    }

    public function updateContactData($id,$name,$company,$address,$phone,$email,$notes) {

        $debug = 1;

        $this->openConnection();

        $query = "SELECT * 
                  FROM address_book_table 
                  WHERE id = '$id'";

        $rs = $this->connection->Execute($query);

        if ($rs && $rs->recordCount() >= 0) {

            $query = "UPDATE address_book_table
                      SET name='".$name."', 
                          company='".$company."', 
                          address='".$address."',
                          phone='".$phone."', 
                          email='".$email."', 
                          notes='".$notes."'
                       WHERE id = '" . $id . "';";

            $this->connection->Execute($query);
            return true;
        } else {
            $row = $rs->fetchRow();
            $this->id = $row[ 'id'];
        }
    }

}

?>