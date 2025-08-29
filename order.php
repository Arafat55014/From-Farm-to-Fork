<!DOCTYPE html>
<html lang="bn">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Order Panel</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { font-family: 'Segoe UI', sans-serif; }
.sidebar { height: 100vh; background: #1e293b; color: white; }
.sidebar .nav-link { color: #cbd5e1; font-weight: 500; }
.sidebar .nav-link:hover { background: #334155; color: #fff; border-radius: 8px; }
.content { padding: 20px; min-height: 100vh; background: #f8fafc; }
.card { margin-bottom: 15px; }
.table-actions button { margin-right: 5px; }
</style>
</head>
<body>
<div class="container-fluid">
<div class="row">
  <!-- Sidebar -->
  <div class="col-md-3 col-lg-2 p-0 sidebar">
    <h2 class="text-white p-3">⚙️ Admin Panel</h2>
    <nav class="nav flex-column mt-2">
      <a href="livestock.php" class="nav-link">🐄 Livestock</a>
      <a href="warehouse.php" class="nav-link">🏬 Warehouse</a>
      <a href="agent.php" class="nav-link">👨‍💼 Agent Price Analytics</a>
      <a href="retailer.php" class="nav-link">🛒 Retailer</a>
      <a href="meatproduction.php" class="nav-link">🥩 Meat Production</a>
      <a href="meatconsumption.php" class="nav-link">📈 Meat Consumption</a>
      <a href="order.php" class="nav-link">📦 Order</a>
    </nav>
  </div>

  <!-- Main Content -->
  <div class="col-md-9 col-lg-10 content">
    <h1>📦 Order Panel</h1>
    <p>Manage orders, quantities, prices, and who is ordering.</p>

    <div class="row">
      <!-- Order Table -->
      <div class="col-12">
        <div class="card p-3">
          <h5>Orders</h5>
          <table class="table table-bordered" id="order-table">
            <thead>
              <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Ordered By</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price (৳)</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
          <button class="btn btn-primary btn-sm" onclick="addOrder()">Add Order</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<script>
// Orders Data
let orders = [
  {id:"O-001", customer:"Shop A", orderedBy:"Agent", product:"Beef", qty:20, price:15000, status:"Pending"},
  {id:"O-002", customer:"Shop B", orderedBy:"Retailer", product:"Chicken", qty:15, price:7500, status:"Shipped"}
];

// Render Table
function renderOrderTable(){
  const tbody = document.getElementById("order-table").getElementsByTagName('tbody')[0];
  tbody.innerHTML="";
  orders.forEach((o,i)=>{
    const row = tbody.insertRow();
    row.innerHTML=`
      <td>${o.id}</td>
      <td>${o.customer}</td>
      <td>${o.orderedBy}</td>
      <td>${o.product}</td>
      <td>${o.qty}</td>
      <td>৳${o.price}</td>
      <td>${o.status}</td>
      <td class="table-actions">
        <button class="btn btn-sm btn-warning" onclick="editOrder(${i})">Edit</button>
        <button class="btn btn-sm btn-danger" onclick="deleteOrder(${i})">Delete</button>
      </td>`;
  });
}

// CRUD
function addOrder(){
  const id = prompt("Order ID:");
  const customer = prompt("Customer/Retailer Name:");
  const orderedBy = prompt("Who is ordering? (Agent/Retailer):");
  const product = prompt("Product:");
  const qty = parseInt(prompt("Quantity:"),10);
  const price = parseFloat(prompt("Price (৳):"));
  const status = prompt("Status (Pending/Processing/Shipped/Delivered):");
  if(id && customer && orderedBy && product && qty>=0 && price>=0 && status){
    orders.push({id,customer,orderedBy,product,qty,price,status});
    renderOrderTable();
  }
}
function editOrder(i){
  const o = orders[i];
  const id = prompt("Edit Order ID:",o.id);
  const customer = prompt("Edit Customer:",o.customer);
  const orderedBy = prompt("Edit Ordered By (Agent/Retailer):",o.orderedBy);
  const product = prompt("Edit Product:",o.product);
  const qty = parseInt(prompt("Edit Quantity:",o.qty),10);
  const price = parseFloat(prompt("Edit Price (৳):",o.price),10);
  const status = prompt("Edit Status:",o.status);
  if(id && customer && orderedBy && product && qty>=0 && price>=0 && status){
    orders[i]={id,customer,orderedBy,product,qty,price,status};
    renderOrderTable();
  }
}
function deleteOrder(i){
  if(confirm("Delete this order?")){
    orders.splice(i,1);
    renderOrderTable();
  }
}

// Initial Render
renderOrderTable();
</script>
</body>
</html>
