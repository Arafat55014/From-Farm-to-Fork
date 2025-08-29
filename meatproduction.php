<!DOCTYPE html>
<html lang="bn">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Meat Production Records</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { font-family: 'Segoe UI', sans-serif; }
.sidebar { height: 100vh; background: #1e293b; color: white; }
.sidebar .nav-link { color: #cbd5e1; font-weight: 500; }
.sidebar .nav-link:hover { background: #334155; color: #fff; border-radius: 8px; }
.content { padding: 20px; min-height: 100vh; background: #f8fafc; }
.card { padding: 20px; margin-bottom: 20px; }
.sticky-th thead th { position: sticky; top: 0; background: #fff; z-index: 1; }
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
      <div class="card">
        <h3>📊 Meat Production Records by District/Division</h3>

        <!-- Filters -->
        <div class="row g-3 align-items-end mt-3">
          <div class="col-md-3">
            <label class="form-label">Division</label>
            <select id="filterDivision" class="form-select">
              <option>All</option>
              <option>Dhaka</option>
              <option>Chattogram</option>
              <option>Rajshahi</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">District</label>
            <select id="filterDistrict" class="form-select">
              <option>All</option>
              <option>Dhaka District</option>
              <option>Gazipur</option>
              <option>Comilla</option>
              <option>Rajshahi District</option>
            </select>
          </div>
          <div class="col-md-2">
            <label class="form-label">From</label>
            <input type="month" id="filterFrom" class="form-control" value="2025-01">
          </div>
          <div class="col-md-2">
            <label class="form-label">To</label>
            <input type="month" id="filterTo" class="form-control" value="2025-08">
          </div>
          <div class="col-md-2">
            <button id="applyFilters" class="btn btn-primary w-100">Apply</button>
          </div>
        </div>

        <!-- Charts -->
        <div class="row mt-4">
          <div class="col-lg-6 mb-4">
            <canvas id="livestockChart"></canvas>
          </div>
          <div class="col-lg-6 mb-4">
            <canvas id="meatYieldChart"></canvas>
          </div>
        </div>

        <!-- Meat Production Table -->
        <div class="table-responsive sticky-th">
          <table class="table table-striped table-bordered" id="production-table">
            <thead>
              <tr>
                <th>Date (YYYY-MM)</th>
                <th>Division</th>
                <th>District</th>
                <th>Livestock Count</th>
                <th>Slaughter Rate (%)</th>
                <th>Meat Yield (kg)</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// =================== SAMPLE DATA ===================
const productionData = [
  {date:'2025-01', division:'Dhaka', district:'Dhaka District', livestock:5000, slaughterRate:5, meatYield:2400},
  {date:'2025-02', division:'Dhaka', district:'Dhaka District', livestock:5200, slaughterRate:6, meatYield:2500},
  {date:'2025-03', division:'Dhaka', district:'Gazipur', livestock:3000, slaughterRate:4, meatYield:1100},
  {date:'2025-01', division:'Chattogram', district:'Comilla', livestock:4000, slaughterRate:5, meatYield:2000},
  {date:'2025-03', division:'Rajshahi', district:'Rajshahi District', livestock:3500, slaughterRate:6, meatYield:1800},
];

const $division = document.getElementById('filterDivision');
const $district = document.getElementById('filterDistrict');
const $from = document.getElementById('filterFrom');
const $to = document.getElementById('filterTo');
const $apply = document.getElementById('applyFilters');

let livestockChart, meatYieldChart;

function ymToDate(ym){ const [y,m]=ym.split('-').map(Number); return new Date(y,m-1,1); }
function inRange(ym, fromYM, toYM){ const d=ymToDate(ym), f=ymToDate(fromYM), t=ymToDate(toYM); return d>=f && d<=t; }

function filterData(){
  let rows = productionData.filter(r=>inRange(r.date, $from.value, $to.value));
  if($division.value!=='All') rows = rows.filter(r=> r.division=== $division.value);
  if($district.value!=='All') rows = rows.filter(r=> r.district=== $district.value);
  rows.sort((a,b)=> ymToDate(a.date)-ymToDate(b.date));
  return rows;
}

function renderTable(rows){
  const tbody = document.querySelector('#production-table tbody');
  tbody.innerHTML='';
  rows.forEach(r=>{
    const tr = document.createElement('tr');
    tr.innerHTML=`<td>${r.date}</td><td>${r.division}</td><td>${r.district}</td>
                  <td>${r.livestock}</td><td>${r.slaughterRate}</td><td>${r.meatYield}</td>`;
    tbody.appendChild(tr);
  });
}

function updateCharts(rows){
  const ctxLivestock = document.getElementById('livestockChart').getContext('2d');
  const ctxMeatYield = document.getElementById('meatYieldChart').getContext('2d');

  const labels = rows.map(r=>r.date + ' (' + r.district + ')');
  const livestockData = rows.map(r=>r.livestock);
  const meatYieldData = rows.map(r=>r.meatYield);

  if(livestockChart) livestockChart.destroy();
  livestockChart = new Chart(ctxLivestock,{
    type:'line',
    data:{labels, datasets:[{label:'Livestock Count', data:livestockData, borderColor:'#3b82f6', backgroundColor:'rgba(59,130,246,.15)', fill:true, tension:0.3}]},
    options:{responsive:true, plugins:{legend:{position:'bottom'}}}
  });

  if(meatYieldChart) meatYieldChart.destroy();
  meatYieldChart = new Chart(ctxMeatYield,{
    type:'bar',
    data:{labels, datasets:[{label:'Meat Yield (kg)', data:meatYieldData, backgroundColor:'#ef4444'}]},
    options:{responsive:true, plugins:{legend:{position:'bottom'}}}
  });
}

function applyAll(){
  const rows = filterData();
  renderTable(rows);
  updateCharts(rows);
}

$apply.addEventListener('click',applyAll);
applyAll();
</script>

</body>
</html>
