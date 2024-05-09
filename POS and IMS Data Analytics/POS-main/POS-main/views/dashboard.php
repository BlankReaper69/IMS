<?php
include("../Model/dashboardController.php");
$widgetData = getWidgetData('2024-05-01', '2024-05-04');
$recentOrders = getRecentOrder();
// default dates
$end = date("Y-m-d");
$start = date("Y-m-d",strtotime($end . "-7 days"));
$graphData = getChartData($start, $end);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="../global.css ?=time()?>" type="text/css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row mainContainer">
            <div class="col-4">
                <div class="widgetContainer widgetSale">
                    <p class="widgetValue">$<?=$widgetData['sales_amt']?></p>
                    <p class="widgetHeader">SALE AMOUNT</p>
                </div>
            </div>
            <div class="col-4">
            <div class="widgetContainer widgetQuantity">
                    <p class="widgetValue"><?=$widgetData['qty']?></p>
                    <p class="widgetHeader">Quantity Ordered</p>
                </div>
            </div>
            <div class="col-4">
            <div class="widgetContainer widgetTotalOrder">
                    <p class="widgetValue"><?=$widgetData['orders']?></p>
                    <p class="widgetHeader">Total Orders</p>
                </div>
            </div>
        </div>
        <div class="row mainContainer">
            <div class="col-md-5 widgetSecond">
                <p class="header">LAST 5 ORDERS</p>
                <?php 
                 if (count($recentOrders)) { ?>
                 <table class="table">  
                   <thead>
                       <tr>
                        <th>Order #</th>
                        <th>Total Amount</th>
                        <th>Date</th>
                       </tr>
                   </thead>
                   <tbody>
                   </tbody>
                   <?php
                    foreach($recentOrders as $order) {
                        ?>
                        <tr>
                            <td ><?=$order['id']?></td>
                            <td ><?=number_format($order['total_amount'],2)?></td>
                            <td><?=date('F d/y h:i:s A', strtotime($order['date_Created']))?></td>
                        </tr>
                        <?php } } else { ?>
                            <p class="noData">No recent Orders</p>
                            <?php } ?>
                        </table>
                            
            </div>
            <div class="col-md-7 chartContainer">
              
                <p class="chartTitle">Daily sales</p>
                <div class="alignRight">
                    <button class="btn btn-sm btn-default" id="daterange">Pick Date Range</button>

                </div>
                <figure class="highcharts-figure">
                    <div id="container"></div>
                </figure>
            </div>
         
        </div>
    </div>
</body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/series-label.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
    const apiKey = "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";
    let chartData  = null
    let graphData = <?=$graphData?>;

    const visualize = (graphData) => {
    const charts = Highcharts.chart('container', {
        chart: {
            type: 'spline'
        },
        title: {
            text: 'SALES REPORT'
        },
        xAxis: {
            categories: graphData.categories,
            accessibility: {
                description: 'Date'
            }
        },
        yAxis: {
            title: {
                text: 'Sales (in USD)'
            },
            
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y:.1f} PHP</b>'
        },
        plotOptions: {
            spline: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: true
            }
        },
        series: [{
            name: 'Sales',
            data: graphData.series
        }]
    });
    chartData = charts.series[0].data.map((point, index) => {
            return {
                month: charts.xAxis[0].categories[index],
                value: point.y
            };
        });
};

const toDateRange = () => {
    $('#daterange').daterangepicker({
       maxDate: moment(),
    }, function(start, end, label) {
       let startF = start.format('YYYY-MM-DD');
       let endF = end.format('YYYY-MM-DD');
       $('#daterange').html(`${moment(start).format('LL')} to ${moment(end).format('LL')}`);
       $.get(`../Model/dashboardController.php?action=getGraphData&start=${startF}&end=${endF}`, function(data){
             visualize(data);
       }, 'json');
    });
}
// const chatbot = () => {
//     fetch("https://openrouter.ai/api/v1/chat/completions", {
//         method: "POST",
//         headers: {
//             "Authorization": `Bearer ${apiKey}`,
//             "Content-Type": "application/json"
//         },
//         body: JSON.stringify({
//             "model": "openchat/openchat-7b:free",
//             "messages": [
//                 {"role": "user", "content": ` ${JSON.stringify(chartData)} Based on the chart, which month had the highest number? `}
//             ],
//         })
//     })
//     .then(response => response.json())
//     .then(data => {console.log(data.choices[0].message.content)});
// };

visualize(graphData);
toDateRange();
</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.5/css/bootstrap-dialog.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.5/js/bootstrap-dialog.min.js"></script>

</html>