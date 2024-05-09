<?php 
include("connection.php");
include("saleController.php");
date_default_timezone_set('Asia/Manila');
if(isset($_GET['action'])){
    if($_GET['action'] == 'getGraphData'){
        echo getChartData($_GET['start'], $_GET['end']);
    }
}
function getChartData($start, $end){
    $date_amt = [];
while($start < $end) {
    $start = date('Y-m-d', strtotime($start . ' +1 day'));
 $sales = getSales($start, $start);
 $date_amt[$start] = array_sum(array_column($sales, 'total_amount'));

}
 return json_encode([
    'categories' => array_keys($date_amt),
    'series' => array_values($date_amt)
 ]);

}

function getRecentOrder($limit = 5){
    $conn = $GLOBALS['pos_conn'];
    $inv_conn = $GLOBALS['conn'];
    $stmt = $conn->prepare("SELECT * from sales where date_Created ORDER BY date_Created DESC LIMIT $limit");
    $stmt->execute();
    $sales = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $sales;
}

function getWidgetData(){
    $date = date('Y-m-d');  
    $sales = getSales($date, $date);
    $qty = 0;
    $orders = count($sales);
    //for the sale Amount
    $sales_amt = 0.00;
    foreach($sales as $sale){
        $orderItems = getOrderItems($sale['id']);
        $sales_amt += $sale['total_amount'];
        $qty += array_sum(array_column($orderItems, 'quantity'));
    } 
    $data = [
        'sales_amt' => $sales_amt,
        'qty' => $qty,
        'orders' => $orders
    ];
    return $data;

}
getWidgetData();
function getSales($start, $end){
        $conn = $GLOBALS['pos_conn'];
    $inv_conn = $GLOBALS['conn'];
    $stmt = $conn->prepare("SELECT * from sales where date_Created >=  '$start 00:00:00' AND date_Created <= '$end 23:59:59' ");
    $stmt->execute();
    $sales = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // get customer data
     return $sales;
   
}
?>