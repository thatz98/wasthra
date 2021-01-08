<?php

try{
    $search_db = new PDO("mysql:host=localhost;dbname=db_wasthra", "root", "");
    $search_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

try{
    if(isset($_POST["term"])){
        $sql = "SELECT * FROM product WHERE product_name LIKE :term";
        $stmt = $search_db->prepare($sql);
        $term = $_POST["term"] . '%';
        $stmt->bindParam(":term", $term);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $return_arr = $stmt->fetchAll();
        } else{
            echo "<p>No matches found</p>";
        }
    }  
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

echo json_encode($return_arr);

unset($stmt);

?>