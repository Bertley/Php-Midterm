<?php
class Request
{
    public function addRequest($db, $firstname, $lastname, $postalcode, $phone, $email, $insurance){
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO insrequests(fname, lname, postalCode, phone, email, insurance) 
                VALUES ('$firstname','$lastname','$postalcode','$phone','$email','$insurance')";
        $pdostm = $db->prepare($sql);
        $count = $pdostm->execute();
        return $count;
    }
}