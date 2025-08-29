<!DOCTYPE html>
<html lang="bn">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meat Consumption</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body { font-family: 'Segoe UI', sans-serif; }
    .sidebar { height: 100vh; background: #1e293b; color: white; }
    .sidebar .nav-link { color: #cbd5e1; font-weight: 500; }
    .sidebar .nav-link:hover { background: #334155; color: #fff; border-radius: 8px; }
    .content { padding: 20px; min-height: 100vh; background: #f8fafc; }
    .card { padding: 20px; margin-bottom: 20px; }
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
        <a href="meatconsumption.php" class="nav-link active">📈 Meat Consumption</a>
        <a href="order.php" class="nav-link">📦 Order</a>
      </nav>
    </div>

    <!-- Content -->
    <div class="col-md-9 col-lg-10 content">

      <!-- Top Cards -->
      <div class="row mb-4">
        <div class="col-md-4">
          <div class="card text-center">
            <h5>Average Meat Intake</h5>
            <h3>220g/day</h3>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-center">
            <h5>Nutrient Deficiency Alerts</h5>
            <h3 class="text-danger">3 Regions</h3>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-center">
            <h5>Most Consumed Meat</h5>
            <h3>Broiler Chicken</h3>
          </div>
        </div>
      </div>

      <!-- Nutritional Intake Over Time -->
      <div class="card">
        <h5>Nutritional Intake Over Time</h5>
        <canvas id="nutritionalChart"></canvas>
      </div>

      <!-- Meat Consumption by Region -->
      <div class="card">
        <h5>Meat Consumption by Region</h5>
        <canvas id="regionChart"></canvas>
      </div>

      <!-- Demographic Table -->
      <div class="card">
        <h5>Demographic Consumption Analysis</h5>
        <table class="table table-bordered">
          <thead class="table-light">
            <tr>
              <th>Age Group</th>
              <th>Average Meat Intake</th>
              <th>Recommended Intake</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>0–12 (Children)</td><td>90g</td><td>100g</td><td class="text-danger">Low</td></tr>
            <tr><td>13–25 (Youth)</td><td>180g</td><td>160g</td><td class="text-success">Balanced</td></tr>
            <tr><td>26–45 (Adults)</td><td>240g</td><td>200g</td><td class="text-success">Balanced</td></tr>
            <tr><td>46+ (Elderly)</td><td>100g</td><td>150g</td><td class="text-warning">Below</td></tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

<script>
// Nutritional Intake Chart
new Chart(document.getElementById('nutritionalChart'), {
  type: 'bar',
  data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
    datasets: [
      { label: 'Protein (g)', data: [180,190,200,210,220], backgroundColor: '#3b82f6' },
      { label: 'Iron (mg)', data: [12,14,13,15,16], backgroundColor: '#22c55e' },
      { label: 'Vitamin B12 (µg)', data: [2.1,2.3,2.0,2.5,2.7], backgroundColor: '#facc15' }
    ]
  },
  options: { responsive: true, plugins: { legend: { position: 'top' } } }
});

// Region Meat Consumption Chart
new Chart(document.getElementById('regionChart'), {
  type: 'bar',
  data: {
    labels: ['Dhaka','Chittagong','Khulna','Rajshahi','Sylhet'],
    datasets: [
      { label: 'Meat Consumption (kg/month)', data: [320,280,220,150,180], backgroundColor: '#ef4444' }
    ]
  },
  options: { responsive: true, plugins: { legend: { display: false } } }
});
</script>

</body>
</html>
