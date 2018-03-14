<?php
class Product
{
    public function getAllProduct($db){
        $sql = "SELECT * FROM insproducts";
        $pdostm = $db->prepare($sql);

        $pdostm->setFetchMode(PDO::FETCH_OBJ);
        $pdostm->execute();
        return $pdostm->fetchAll();
    }
}