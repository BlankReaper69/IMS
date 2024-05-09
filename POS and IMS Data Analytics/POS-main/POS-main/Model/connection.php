<?php
$servername = "localhost";
$username = "root";
$password = "";

try{
    $conn = new PDO("mysql:host=$servername;dbname=inventory", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
try{
    $pos_conn = new PDO("mysql:host=$servername;dbname=point_of_sale", $username, $password);
    $pos_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
$GLOBALS['pos_conn'] = $pos_conn;
$GLOBALS['conn'] = $conn;


?>