<?php 
include ("connection.php");
$conn = $GLOBALS['conn'];
header('Content-Type: application/json');
$searchTerm = isset($_GET['search_term']) ? $_GET['search_term'] : '';
$searchTerm = trim(strtolower($searchTerm));

$stmt = $conn->prepare("SELECT *
                        FROM products  
                        WHERE LOWER(product_name) 
                        LIKE :searchTerm 
                        ORDER BY created_At DESC");
$stmt->bindValue(':searchTerm', '%'.$searchTerm.'%', PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode([
    'length' => count($rows),
    'data' => $rows
], JSON_PRETTY_PRINT);
?>