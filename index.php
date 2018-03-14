<?php
require_once 'database.php';
require_once 'product.php';
require_once 'request.php';
include 'processform.php';

    $p = new Product();
    $result = $p->getAllProduct(Database::getDb());

?>
<html>
<form action="index.php" method="post">
    <h1>Request for Information Form</h1>
    <h2>To receive information on our products and services by email, please
        complete the form below</h2>

    First Name <input type="text" name="firstname" value="<?=$firstname?>"/><br/>
    <span style="color: red"><?= $firstname_error ?></span><br/>

    Last Name <input type="text" name="lastname" value="<?=$lastname?>"/><br/>
    <span style="color: red"><?= $lastname_error ?></span><br/>


    Postal Code <input type="text" name="postalcode" value="<?=$postalcode?>"/><br/>
    <span style="color: red"><?= $postalcode_error ?></span><br/>


    Phone Number <input type="text" name="phonenumber" value="<?=$phonenumber?>"/><br/>
    <span style="color: red"><?= $phonenumber_error ?></span><br/>


    Email <input type="text" name="email" value="<?=$email?>"/><br/>
    <span style="color: red"><?= $email_error ?></span><br/>

    Please send me
    information on the
    following product <?php
    foreach ($result as $product){
        echo '<input type="radio" name="product" value="'.$product->product . '"/>'. $product->product . '<br/>';
    }
    ?><br>
    <span style="color: red"><?= $product_error ?></span><br/>

    <button name="submit" type="submit">Submit</button>
</form>
</html>

