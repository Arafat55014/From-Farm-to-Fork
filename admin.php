<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { font-family: 'Segoe UI', sans-serif; }
.sidebar { height: 100vh; background: #1e293b; color: white; }
.sidebar .nav-link { color: #cbd5e1; font-weight: 500; }
.sidebar .nav-link:hover { background: #334155; color: #fff; border-radius: 8px; }
.content { padding: 20px; background: #f8fafc; min-height: 100vh; }
</style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3 col-lg-2 p-0 sidebar">
      <h2 class="text-white p-3">⚙️ Admin Panel</h2>
      <nav class="nav flex-column mt-2">
        <a href="livestock.html" class="nav-link">🐄 Livestock</a>
        <a href="warehouse.html" class="nav-link">🏬 Warehouse</a>
        <a href="agent.html" class="nav-link">👨‍💼 Agent Price Analytics</a>
        <a href="retailer.html" class="nav-link">🛒 Retailer</a>
        <a href="meatproduction.html" class="nav-link">🥩 Meat Production</a>
        <a href="meatconsumption.html" class="nav-link">📈 Meat Consumption</a>
        <a href="order.html" class="nav-link">📦 Order</a>
      </nav>
    </div>

    <div class="col-md-9 col-lg-10 content">
      <h1>🏠 Welcome to Admin Panel</h1>
      <p>Select a panel from the sidebar to edit features individually.</p>
    </div>
  </div>
</div>
</body>
</html>
