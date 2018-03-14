<?php

// add span tags for error messages and set empty valye
$firstname_error = $lastname_error = $postalcode_error = $phonenumber_error = $email_error = $product_error= "";

//add values
$firstname = $lastname = $postalcode = $phonenumber = $email = "";

//false flag
$flag = false;

//Patterns
$phonePattern = "/[0-9]{10,14}/";
$namePattern = "/^[a-zA-Z ]*$/";

//Form Validation
if(isset($_POST['submit'])){

    if(!$flag){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $postalcode = $_POST['postalcode'];
        $phonenumber = $_POST['phonenumber'];
        $email = $_POST['email'];
        $insurance = $_POST['product'];


        if(empty($firstname)){
            $firstname_error = "First Name is required";
        }else if(!preg_match($namePattern, $firstname)){
            $firstname_error = "Only letters and white spaces are allowed";
        }

        if(empty($lastname)){
            $lastname_error = "First Name is required";
        }else if(!preg_match($namePattern, $lastname)){
            $lastname_error = "Only letters and white spaces are allowed";
        }

        if(empty($postalcode)){
            $postalcode_error = "Postal code is required";
        }

        if(empty($phonenumber)){
            $phonenumber_error = "Phone number required";
        }else if(!preg_match($phonePattern, $phonenumber)){
            $phonenumber_error = "Please enter a valid phone number";
        }

        if(empty($email)){
            $email_error = "Email required";
        }

        if(empty($insurance)){
            $product_error = "Please pick a product";
        }

    }

    $db = Database::getDb();
    $r = new Request();
    $count = $r->addRequest($db, $firstname, $lastname, $postalcode, $phonenumber, $email, $insurance);
    echo "Thank you " .$firstname ." " .$lastname .", for requesting information on our ".$insurance ."

We will send an email to " .$email ." with detail product information.";

}

