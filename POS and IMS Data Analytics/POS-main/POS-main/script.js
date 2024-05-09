let textDate = document.querySelector(".timeAndDate");
textDate.innerHTML = "Loading...";
let orders = {};
let orderItemsOrderAmount = 0.0;
let totalAmount = 0.0;
let change = 0.0;
let tenderedAmount = 0.0;
const dialogError = (message) => {
  BootstrapDialog.alert({
    type: BootstrapDialog.TYPE_DANGER,
    title: "<strong>Error</strong>",
    message: message,
  });
};
//Updates the order table if exist just add the quantity and total
//if not exist add the product to the order list
const updateOrderTable = () => {
  totalAmount = 0.0;
  const ordersContainer = document.querySelector(".pos_items");
  let noDataText = "<p class = 'noData'>No items in cart</p>";
  if (Object.keys(orders)) {
    let table = ` <table class = "table" id="pos_items_tbl">
    <thead>
        <tr>
            <th>#</th>
            <th>PRODUCT</th>
            <th>PRICE</th>
            <th>QUANTITY</th>
            <th>TOTAL</th>
        </tr>
    </thead>
    <tbody >
        ___ROWS___
    </tbody>
  </table>`;
    //loop through the orders
    let rows = "";
    let rowNum = 1;
    for (const [pid, orderItem] of Object.entries(orders)) {
      orderItem["amount"] =
        parseFloat(orderItem["price"]) * orderItem["quantity"];
      rows += `<tr>
      <td>${rowNum}</td>
      <td>${orderItem["name"]}</td>
      <td>$${orderItem["price"]}</td>
      <td>${orderItem["quantity"]}
      <a href = "javascript:void(0)" class = "quantityUpdateBtn quantityBtn_minus" data-id = "${pid}">
      <i class = "fa fa-minus quantityUpdateBtn quantityBtn_minus" data-id = "${pid}"></i>
      </a>
      <a href = "javascript:void(0)" "class = "quantityUpdateBtn quantityBtn_plus" data-id = "${pid}">
      <i class = "fa fa-plus quantityUpdateBtn quantityBtn_plus" data-id = "${pid}"></i>
      </a>
      </td>
      <td>${parseFloat(orderItem["amount"]).toFixed(2)}</td>
      <div class = "btn-group">
      <td><button class = "btn btn-danger btn-sm" onclick = "deleteOrder(${pid})"><i class = "fa fa-trash"> </i></button></td>
      </div>
      </tr>`;
      rowNum += 1;
      noDataText = table.replace("___ROWS___", rows);
      totalAmount += parseFloat(orderItem["amount"]);
      console.log(totalAmount.toFixed(2) + "total");
    }
    document.querySelector(".item_total--value").innerHTML =
      totalAmount.toFixed(2);
  }
  //append to order list table
  ordersContainer.innerHTML = noDataText;

  //update total amount
};

document.addEventListener("click", (e) => {
  const targetEl = e.target;
  let pid = targetEl.dataset.id;
  let productInfo = orders[pid];
  let targetElClasslist = targetEl.classList;
  let TargetElId = targetEl.id;
  if (
    targetElClasslist.contains("productImage") ||
    targetElClasslist.contains("productName") ||
    targetElClasslist.contains("productPrice")
  ) {
    //gets the id of the product

    let productId = targetEl.closest("div.productColContainer");
    console.log(targetEl.closest("searchResultEntry"));
    let ContainerPID = productId.dataset.pid;
    console.log(ContainerPID);
    const productInfo = products[ContainerPID];
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
          addToOrder(productInfo, ContainerPID, quantity);
          console.log(orders);
        }
      },
    });
  }
  if (targetElClasslist.contains("quantityBtn_minus")) {
    //decrease quantity
    let orderQty = productInfo["quantity"];
    products[pid]["stock"] += 1;
    orders[pid]["quantity"] -= 1;
    orders[pid]["amount"] -= productInfo["price"];
    console.log(products[pid]["stock"]);
    //if the quantity is 0, we delete it from the order list
    updateOrderTable();
    if (
      orderQty === 0 ||
      orders[pid]["quantity"] === 0 ||
      orders[pid]["quantity"] < 0
    ) {
      delete orders[pid];
      updateOrderTable();
    }
  }

  if (targetElClasslist.contains("quantityBtn_plus")) {
    //increase quantity
    if (!products[pid]["stock"] <= 0) {
      products[pid]["stock"] -= 1;
      orders[pid]["quantity"] += 1;
      orders[pid]["amount"] += productInfo["price"];
      updateOrderTable();
    }
    //if the user tries to add more but, the stock is 0 it will throw this error
    if (products[pid]["stock"] <= 0) {
      dialogError("Product is out of stock");
      return;
    }
  }
  if (targetElClasslist.contains("checkoutBtn")) {
    if (Object.keys(orders).length) {
      let orderItemsHtml = "";
      let orderNum = 1;
      for (const [pid, orderItem] of Object.entries(orders)) {
        orderItemsHtml += `<div class = "row checkoutTblContentContainer">
          <div class = "col-md-2 checkoutTblContent">${orderNum}</div>
          <div class = "col-md-4 checkoutTblContent">${orderItem["name"]}</div>
          <div class = "col-md-3 checkoutTblContent">${orderItem["quantity"]}
          </div>
          <div class = "col-md-3 checkoutTblContent">$${orderItem[
            "amount"
          ].toFixed(2)}</div>
          </div>`;
        orderNum += 1;
        orderItemsOrderAmount += parseFloat(orderItem["amount"]);
      }
      let content = `<div class = "row">
        <div class = "col-md-7">
        <p class = "checkoutTblContentContainer--title">Items</p>
        <div class = "row">
        <div class = "col-md-2 checkoutTblHeader">#</div>
        <div class = "col-md-4 checkoutTblHeader">PRODUCT</div>
        <div class = "col-md-3 checkoutTblHeader">ORDERED</div>
        <div class = "col-md-3 checkoutTblHeader">AMOUNT</div>
        </div>
        ${orderItemsHtml}
        </div>
        <div class = "col-md-5">
          <div class = "checkoutTotalAmountContainer">
             <span class = "checkout_amt">${orderItemsOrderAmount}</span></br>
             <span class = "checkout_amt_title">TOTAL AMOUNT</span>
          </div>
          <hr/>
          <div class = "checkoutUserAmountContainer">
          <input type = "number" class = "form-control" id="userAmount" placeholder = "Customer money" min=1 required/>
          </div>
          <div class = "userChangeContainer">
           <span class = "userChange">Change: <span class = "userChangeAmount">$0.00</span></span>
          </div>
        
          <div class = "checkoutCustomerDetails">
          <p class = "checkoutCustomerTitle">Customer Details</p>
          <hr/>
          <div class = "form-group detailsContainer">
          <label for = "firstname">Firstname:</label>
          <input type = "text" class = "form-control" placeholder = "First Name" id = "firstname" required/>
          <label for = "lastName">Lastname:</label>
          <input type = "text" class = "form-control" placeholder = "Last Name" id ="lastname" required/>
          <label for = "phone">Phone:</label>
          <input type = "text" class = "form-control" placeholder = "Customer Phone" id ="phone" required/>
          <label for = "address">Address:</label>
          <input type = "text" class = "form-control" placeholder = "Customer Address" id ="address" required/>
          </div>
          </div>
        </div>
     </div>`;
      let dialog = BootstrapDialog.confirm({
        backdrop: "static",
        btnOKLabel: "Checkout",
        btnOKClass: "btn-primary",
        btnCancelLabel: "Cancel",
        title: "Checkout",
        message: content,
        type: BootstrapDialog.TYPE_PRIMARY,
        callback: function (checkout) {
          if (checkout) {
            //check if the user amount is less than the total amount
            let userAmt = parseFloat(
              document.getElementById("userAmount").value
            );
            if (userAmt < orderItemsOrderAmount) {
              dialogError(
                "<strong style = 'color:red'>Insufficient amount</strong>"
              );
              return a;
            } else {
              $.post(
                "../Model/productController.php?action=checkout", // URL
                {
                  data: orders,
                  customer: {
                    firstname: document.getElementById("firstname").value,
                    lastname: document.getElementById("lastname").value,
                    phone: document.getElementById("phone").value,
                    address: document.getElementById("address").value,
                  },
                  total_Amount: orderItemsOrderAmount,
                  change_amount: change,
                  tendered_Amount: userAmt,
                }
              ).done(
                function (response) {
                  let theresAResponse = response ? true : false;
                  let id = response;
                  let string = id.split(" ").join("");
                  let order_id = string.split(":")[1];
                  let order_id_string = order_id.split(",")[0];
                  let order_id_int = JSON.parse(order_id_string);
                  console.log(order_id_int);
                  BootstrapDialog.alert({
                    title: theresAResponse ? "Success" : "Error",
                    message: "Checkout Successful",
                    type: theresAResponse
                      ? BootstrapDialog.TYPE_SUCCESS
                      : BootstrapDialog.TYPE_DANGER,
                    callback: function (result) {
                      if (theresAResponse) {
                        resetData();
                        window.open(
                          `receipt.php?sale_id=${order_id_int}`,
                          "_blank"
                        );
                        window.location.reload();
                      }
                    },
                  });
                },
                "json" // Expected DataType
              );
            }
          }
        },
      });
      dialog.getModalDialog().css("width", "100%");
      dialog.getModalDialog().css("max-width", "919px");

      dialog.open();
    } else {
      dialogError("No items in cart");
    }
  }
});

document.addEventListener("keyup", (e) => {
  let targetEl = e.target;
  let targetElClasslist = targetEl.classList;

  if (targetEl.id === "userAmount") {
    let userAmt = parseFloat(targetEl.value);
    tenderedAmount = userAmt;
    change = userAmt - orderItemsOrderAmount;

    document.querySelector(".userChange .userChangeAmount").innerHTML = `$${
      change ? change.toFixed(2) : "0.00"
    }`;
    let el = document.querySelector(".userChangeAmount");
    if (change < 0) {
      el.classList.add("text-danger");
    } else {
      el.classList.remove("text-danger");
    }
  }
});
//reset the data
const resetData = () => {
  orders = {};

  orderItemsOrderAmount = 0.0;
  totalAmount = 0.0;
  change = 0.0;
  tenderedAmount = 0.0;
};
//add to order list
const addToOrder = (productInfo, pid, quantity) => {
  //add to order list table
  //refresh the products variable(updated stock)
  const totalAmount = productInfo["price"] * quantity;
  const curItemIds = Object.keys(orders);
  if (curItemIds.indexOf(pid) > -1) {
    //if exist just update the quantity and total
    console.log(" exist");
    products[pid]["stock"] -= quantity;
    orders[pid]["amount"] += totalAmount;
    orders[pid]["quantity"] += quantity;
    //Update the order Table
    updateOrderTable();
  } else {
    //if not exist add the product to the order list
    orders[pid] = {
      name: productInfo["product_name"],
      price: productInfo["price"],
      quantity: quantity,
      amount: totalAmount,
    };
    //update the main product info
    products[pid]["stock"] -= quantity;
    console.log("doesnt Exist");
    //Update the order Table
    updateOrderTable();
  }
};
const deleteOrder = (pid) => {
  let productInfo = products[pid];
  //delete the order
  BootstrapDialog.confirm({
    backdrop: "static",
    title: "Delete Order",
    message: `Are you sure you want to delete this <strong style ="color:red; font-size:20px">${productInfo["product_name"]}</strong>  order?`,
    type: BootstrapDialog.TYPE_DANGER,
    callback: (deleteOrder) => {
      if (deleteOrder) {
        //delete the order
        const curOrder = orders[pid];
        const curQuantity = curOrder["quantity"];
        const curStock = products[pid]["stock"];
        products[pid]["stock"] += curQuantity;
        delete orders[pid];
        //update the order table
        updateOrderTable();
      }
    },
  });
};

const productContainer = document.querySelector(".row");
const getDate = setInterval(() => {
  let date = new Date();
  let time = date.toLocaleTimeString();
  let monthYearDay = date.toLocaleDateString("default", {
    month: "long",
    year: "numeric",
    day: "numeric",
  });
  let FullDate = `${monthYearDay} ${time}`;
  textDate.innerHTML = FullDate;
}, 1000);
//listens for clicks in the products
