<?php

if (isset($name)) {

    $stmt = $conn->prepare("SELECT * FROM products WHERE name=:name");

    $stmt->execute(['name' => $name]);

    $row = $stmt->fetchAll();
}
    

?>