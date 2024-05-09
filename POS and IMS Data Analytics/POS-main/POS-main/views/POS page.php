<?php
include ('../Model/productController.php');
$products = getProducts();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device"  al-scale=1.0">
    <title>POS</title>
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="../global.css?=time()?>" type="text/css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container-fluid">
        <!---- Products column-row ---->
        <div class="row">
            <div class="col-8" >
                <div class="searchInputContainer">
                    <input type="text" class="searchInput" id ="searchInput" placeholder="Search Product" >
                </div>
                <div class="searchResultContainerMain">
                   
                </div>
                <div class="searchResultContainer">
                    <div class="row">
                        <!---- Product Result Container ---->
                        <?php 
           foreach($products as $product){ ?>
                   <div class="col-4 productColContainer" data-pid="<?= $product['id']?>" >
                    <div class="productResultContainer">
                        <img src="<?= $product['img']?>" width="100%"  class = "productImage" alt="">
                        <div class="productInfoContainer">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="productName">
                                        <?= $product['product_name']?>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="productPrice">
                                        $<?= $product['price']?>
                                       <span>Stock:<?=$product['stock']?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> 
                    
                </div>
                <?php } ?>
            </div>
        </div>
        
        <!----Add to cart Container ---->
    </div>
    <div class="col-4 posOrderContainer" >
        <div class="pos_header" >
            <div class="setting alignRight" style="text-align: right !important;">
                <a href="javascript:void(0);"><i class="fa fa-gear"></i></a>
            </div>
            <p class="logo">IMS</p>
            <p class="timeAndDate"></p>
        </div>
        <div class="pos_items_container">
            <div class="pos_items">
                <p class="noData">NO ITEMS</p>
            </div>
            <div class="item_total_container">
                <p class="item_total">
                    <span class="item_total--label">TOTAL</span>
                    <span class="item_total--value">$0.00</span>
                </p>
            </div>
            <div class = "checkoutBtnContainer">
                <a href="javascript:void(0)" class="checkoutBtn">CHECKOUT</a>
            </div>
        </div>
    </div>
    
</div>
</body>
<script>
    let productsJson = <?= json_encode($products)?>;
    let products = {};
    productsJson.forEach(product => {
        products[product.id] = {
            id: product.id,
            product_name: product.product_name,
            price: product.price,
            img: product.img,
            stock:product.stock
        };
    });
    let typingTimer;
    let doneTypingInterval = 500
    document.addEventListener("keyup", (e)=>{
        let el = e.target;
        if(el.id === 'searchInput'){
            let searchValue = el.value;
            clearTimeout(typingTimer);
            

            typingTimer = setTimeout(()=>{
                searchDbTerm(searchValue)
            }, doneTypingInterval)
        }
    })

    const searchDbTerm = (searchTerm) =>{
        let searchResult = document.querySelector('.searchResultContainerMain');
        if(searchTerm.length){
            searchResult.style.display = 'block';
            $.ajax({
              type: "GET",
              data:{search_term:searchTerm},
              url:"../Model/searchController.php",
              success: function(response){
                 if(response.length === 0 ){
                    searchResult.innerHTML = '<p class ="nodata">No data found</p>';
                 }
                 else{
                    let data = response.data;
                    let html = '';
                    data.forEach(product => {
                        html += `<div class="row searchResultEntry" data-pid=${product['id']}>
                        <div class="col-3">
                            <img src="${product.img}" width="60%" alt="">
                        </div>
                        <div class="col-6">
                            <p class="searchResultProductName">
                                ${product.product_name} 
                            </p>
                            <p class="searchResultProductPrice">
                                $${product.price}
                            </p>
                        </div>                     
                       </div>`
                    });
                    searchResult.innerHTML = html;
                }
                },
                dataType: 'json'
            }
            
        )
        }else{
            searchResult.style.display = 'none';
        }
    }
    document.addEventListener("click", (e)=>{
        //onclick function for the searchResultEntry
        let targetEl = e.target;
    let productID = targetEl.closest('.searchResultEntry');
    if (productID) {
        let pid = productID.dataset.pid;
        console.log(pid);
        const productInfo = products[pid];
    const curStock = productInfo["stock"];
    // if currrent stock is 0 throw an error
    if (curStock === 0) {
      dialogError("This product is out of stock");
      return;
    }

    const dialogForm = `<h6 class = "dialogProductName"> ${productInfo["product_name"]}<span class = "dialogProductPrice">$${productInfo["price"]}</span></h6>
    <input type="number" id="quantity" class ="form-control" placeholder="Enter Quantity" required min="1"/>
    `;
    BootstrapDialog.confirm({
      title: "add to Cart",
      backdrop: "static",
      message: dialogForm,
      callback: (addOrder) => {
        if (addOrder) {
          //check if quantity is not NULL
          const quantity = parseInt(document.getElementById("quantity").value);
          if (isNaN(quantity)) {
            dialogError("Please enter a valid number");
            return a;
          }
          //check if quantity is more than current stock
          const curStock = productInfo["stock"];
          if (quantity > curStock) {
            dialogError(
              `The quantity was more than the current stock of <strong style = "color:red;font-size:20px;">(${curStock})</strong>`
            );
            return a;
          }
          //ALL are CHECKED
          addToOrder(productInfo,pid , quantity);
          console.log(orders);
        }
      },
    });
    }
    })
    
    </script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.5/css/bootstrap-dialog.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="../script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.5/js/bootstrap-dialog.min.js"></script>

</html>