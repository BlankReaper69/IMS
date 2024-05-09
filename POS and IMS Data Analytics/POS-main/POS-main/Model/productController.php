<?php 
date_default_timezone_set('Asia/Manila');
include ('connection.php'); 
$action = isset($_GET['action']) ? $_GET['action'] :'';
if ($action === 'checkout') {
    saveProducts();
}
function getProducts(){
    $conn = $GLOBALS['conn'];
try{
    $stmt = $conn->prepare("SELECT * FROM products");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 return $rows;
}catch(PDOException $e){
    echo "Couldn't fetch the data: " . $e->getMessage();
}
}
getProducts();




function saveProducts(){
   try{
      $conn = $GLOBALS['conn'];
    $pos_conn = $GLOBALS['pos_conn'];
    $data = $_POST['data'];
    $customer = $_POST['customer'];
    $query = "INSERT INTO `customer`( `firstname`, `lastname`, `address`, `contact`, `date_created`,`updated_At`)
     VALUES (:firstname,:lastname,:address,:contact,:date_created, :updated_At)";
    $stmt = $pos_conn->prepare($query);
    $db_arr = [
       'firstname'=> $customer['firstname'],
       'lastname'=>$customer['lastname'],
       'address'=>$customer['address'],
       'contact'=>$customer['phone'],
       'date_created' => date('Y-m-d H:i:s'),
       'updated_At'=>date('Y-m-d H:i:s')
    ];
    $stmt->execute($db_arr);
    $customer_id = $pos_conn->lastInsertId();

      
    $total_amount = $_POST['total_Amount'];
    $amount_tendered = $_POST['tendered_Amount'];
    $change_amount = $_POST['change_amount'];
    //insert into sales
    $query = "INSERT INTO `sales`(customer_id, `total_amount`, `amount_tendered`, `change_amt`, `date_Created`, `date_Updated`)
    VALUES (:customer_id,:total_amount,:amount_tendered,:change_amt,:date_Created,:date_Updated)";
    $db_arr = [
           'customer_id'=>$customer_id,
           'total_amount'=>$total_amount,
           'amount_tendered'=>$amount_tendered,
           'change_amt'=>$change_amount,
           'date_Created'=>date('Y-m-d H:i:s'),
           'date_Updated'=>date('Y-m-d H:i:s'),
        ];
     $stmt = $pos_conn->prepare($query);
     $stmt->execute($db_arr);
     $sales_id = $pos_conn->lastInsertId();
    

    //insert the sold item
      foreach($data as $product_id => $orderItems){
        $query = "INSERT INTO `salesitems`( `product_id`,sales_id, `quantity`, `unit_price`, `sub_total`, `date_Created`, `updated_At`)
         VALUES (:product_id,:sales_id,:quantity,:unit_price,:sub_total,:date_Created,:updated_At)";
        $db_arr = [
           'product_id' => $product_id,
            'sales_id'=>$sales_id,
            'quantity' => $orderItems['quantity'],
            'unit_price'=>$orderItems['price'],
            'sub_total'=>$orderItems['amount'],
            'date_Created'=>date('Y-m-d H:i:s'),
            'updated_At' =>date('Y-m-d H:i:s')
        ];
        $stmt = $pos_conn->prepare($query);
        $stmt->execute($db_arr);


         
     $inv_conn =  $GLOBALS['conn'];
     $query = "SELECT stock FROM `products` WHERE id = $product_id";
     $stmt = $inv_conn->prepare($query);
     $stmt->execute();
     $product =$stmt->fetch(PDO::FETCH_ASSOC);
     $cur_stock = (int)$product["stock"];

     var_dump( $product);
     $new_stock = $cur_stock - (int)$orderItems['quantity'];
     $query = "UPDATE `products` SET `stock`=?,`updated_At`=? WHERE id = ? ";
     $stmt = $inv_conn->prepare($query);
     $stmt->execute([$new_stock, date("Y-m-d H:i:s"),$product_id]);
      }
     
     echo json_encode([
   'id' => $sales_id,
    'success' => true,
    'message' => "Checkout successful",
    ]);
   }catch(PDOException $e){
    echo json_encode([
        header('Content-Type: application/json'),
        'success'=> false,
        'message'=> $e->getMessage()

    ]);

   }
   

      //update the quantity of products in the inventory

}
?>