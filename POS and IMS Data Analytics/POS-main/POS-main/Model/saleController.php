<?php
include ('connection.php');
function getSalesCustomer($customer_id){
    $conn = $GLOBALS['pos_conn'];
    $stmt = $conn->prepare("SELECT * FROM customer where id = $customer_id");
$stmt->execute();
$customer = $stmt->fetch(PDO::FETCH_ASSOC);
return $customer;
}
function getOrderItems($order_id){
    $conn = $GLOBALS["pos_conn"];
    $stmt = $conn->prepare("SELECT * from salesitems where sales_id = $order_id");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
function getSale($sales_id){
    $conn = $GLOBALS['pos_conn'];
    $inv_conn = $GLOBALS['conn'];
    $stmt = $conn->prepare("SELECT * from sales where id = $sales_id");
    $stmt->execute();
    $sale = $stmt->fetch(PDO::FETCH_ASSOC);
    // get customer data
    $customer_data = getSalesCustomer($sale['customer_id']);
   $items = getOrderItems($sale['id']);
   $items_data = [];
   foreach($items as $item){
    $pid = $item['product_id'];
    $stmt = $inv_conn->prepare("SELECT product_name from products where id = $pid");
    $stmt->execute();
    $product= $stmt->fetch(PDO::FETCH_ASSOC);
    $items_data[$item['id']] = $item;
    $items_data[$item['id']]['product'] = $product['product_name'];
  
   }
  return [
    'sales'=> $sale,
    'items'=>$items_data,
    'customer'=>$customer_data
  ];
}

?>