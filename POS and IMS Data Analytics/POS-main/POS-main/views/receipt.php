<?php
include("../Model/saleController.php");
$sale_data = getSale($_GET['sale_id']);
$customer_data = $sale_data['customer'];
$items = $sale_data['items'];
$sale = $sale_data['sales'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="../global.css?v=<?= time()?>" type="text/css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="receiptContainer">
        <div>
            <h1 style="font-size: 16px; color:#828282; text-align:right; border-bottom:1px solid #cccccc; padding-bottom:10px;">
                ORIGINAL RECEIPT
            </h1>
            <div>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <h3 style="font-size: 16px;">CUSTOMER DETAILS: </h3>
                            </td>
                        </tr>
                       
                        <tr>
                            <td>
                                <span style="font-weight: bold;margin-left:9px;font-size:13px">Name:</span> 
                                <span><?=$customer_data['firstname']?> <?=$customer_data['lastname']?></span> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="font-weight: bold;margin-left:9px;font-size:13px">Address:</span> 
                                <span><?=$customer_data['address']?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="font-weight: bold;margin-left:9px;font-size:13px">Contact:</span> 
                                <span><?=$customer_data['contact']?></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 20px;">

                            </td>
                        </tr>
                        <tr>
                          <td width = "50%">
                            <table>
                                <tbody>
                                    <tr>
                                    <td><h3 style="font-size: 23px; color:#ff5c85">IMS NI GABE</h3></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-weight: bold;margin-left:9px;font-size:13px">Address: </span> <span>Philippines</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-weight: bold;margin-left:9px;font-size:13px">City: </span> <span>Manila</span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-weight: bold;margin-left:9px;font-size:13px">Postal: </span> <span>1126</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tbody>
                                    <tr>
                                        <td><h3 style="font-size: 15px";>ORDER DETAILS: </h3></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-weight: bold;margin-left:9px;font-size:13px">Receipt #:</span> 
                                        <span><?=$sale['id']?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-weight: bold;margin-left:9px;font-size:13px">Receipt date: <span><?php echo date('M d, Y h:i:s A',strtotime($sale['date_Created'])); ?></span></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        </tr>
                        <tr>
                            <td height = "25px"></td>
                        </tr>
                        
                    </tbody>
                </table>
                <div>
                <h3 style="font-size:15px;">ITEMS:</h3>

                </div>
                <table>
                    <tbody>
                       
                            <table style = "width:100%">
                                <tbody>
                                    <tr>
                                        <td style = "border: 1px solid #cccccc; padding: 10px; margin-top: 10px; width: 10%; font-weight:bold; text-align:center;">#</td>
                                        <td style = "border: 1px solid #cccccc; padding: 10px; margin-top: 10px; width: 10%; font-weight:bold; text-align:center;">Product name</td>
                                        <td style = "border: 1px solid #cccccc; padding: 10px; margin-top: 10px; width: 30%; font-weight:bold; text-align:center;">Ordered Quantity</td>
                                        <td style = "border: 1px solid #cccccc; padding: 10px; margin-top: 10px; width: 30%; font-weight:bold; text-align:center;">Price</td>
                                        <td style = "border: 1px solid #cccccc; padding: 10px; margin-top: 10px; width: 30%; font-weight:bold; text-align:center;">Amount</td>

                                    </tr>
                                    <?php
                                   $counter = 1;
                                   foreach($items as $item){
                                   ?>
                                <tr>
                                <td style = "border: 1px solid #cccccc; padding: 10px; margin-top: 10px; width: 15%; text-align:center; font-size:15px"><?=$counter?></td>
                                 <td style = "border: 1px solid #cccccc; padding: 10px; margin-top: 10px; width: 15%; text-align:center; font-size:15px"><?=$item['product']?></td>
                                 <td style = "border: 1px solid #cccccc; padding: 10px; margin-top: 10px; width: 15%; text-align:center; font-size:15px"><?=$item['quantity']?></td>
                                 <td style = "border: 1px solid #cccccc; padding: 10px; margin-top: 10px; width: 15%; text-align:center; font-size:15px">$<?=number_format($item['unit_price'],2,".",".")?></td>
                                 <td style = "border: 1px solid #cccccc; padding: 10px; margin-top: 10px; width: 15%; text-align:center; font-size:15px">$<?=number_format($item['sub_total'],2,".",".")?></td>
                                </tr>
                                <?php 
                                $counter++; 
                                } ?>
                                   
                
                                    <tr>
                                        <td height ="25px"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style = "border: 1px solid #cccccc;  width: 10%; font-weight:bold; text-align:center">TOTAL: </td>
                                        <td style = "border: 1px solid #cccccc;  width: 10%; font-weight:bold; text-align:center">$<?=number_format($sale['total_amount'],2,".",".")?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style = "border: 1px solid #cccccc;  width: 10%; font-weight:bold; text-align:center">TENDERED: </td>
                                        <td style = "border: 1px solid #cccccc;  width: 10%; font-weight:bold; text-align:center">$<?=number_format($sale['amount_tendered'],2,".",".")?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style = "border: 1px solid #cccccc;  width: 10%; font-weight:bold; text-align:center">CHANGE: </td>
                                        <td style = "border: 1px solid #cccccc;  width: 10%; font-weight:bold; text-align:center">$<?=number_format($sale['change_amt'],2,".",".")?></td>
                                    </tr>

                                </tbody>
                            </table> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script>
    window.print();
    window.onafterprint = function(){
        window.close();
    }
</script>
</html>