<!DOCTYPE html>
<html lang="bn">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Price Analytics Panel</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { font-family: 'Segoe UI', sans-serif; }
.sidebar { height: 100vh; background: #1e293b; color: white; }
.sidebar .nav-link { color: #cbd5e1; font-weight: 500; }
.sidebar .nav-link:hover { background: #334155; color: #fff; border-radius: 8px; }
.content { padding: 20px; min-height: 100vh; background: #f8fafc; }
.card { padding: 20px; margin-bottom: 20px; }
.sticky-th thead th { position: sticky; top: 0; background: #fff; z-index: 1; }
.seasonal-bad { background: rgba(239, 68, 68, 0.15); }
.seasonal-good { background: rgba(16, 185, 129, 0.15); }
.seasonal-neutral { background: rgba(148, 163, 184, 0.15); }
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
        <h3>📈 Price Analytics (Wholesaler / Supplier / Retail)</h3>

        <!-- Filters -->
        <div class="row g-3 align-items-end mt-3">
          <div class="col-md-3">
            <label class="form-label">Product</label>
            <select id="filterProduct" class="form-select">
              <option>Beef</option>
              <option>Chicken</option>
              <option>Mutton</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Region</label>
            <select id="filterRegion" class="form-select">
              <option>All</option>
              <option>Dhaka</option>
              <option>Chattogram</option>
              <option>Rajshahi</option>
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
          <div class="col-lg-7 mb-4">
            <canvas id="priceTrendChart"></canvas>
          </div>
          <div class="col-lg-5 mb-4">
            <canvas id="regionalBarChart"></canvas>
          </div>
        </div>

        <!-- Price Table -->
        <div class="table-responsive sticky-th">
          <table class="table table-striped table-bordered" id="price-table">
            <thead>
              <tr>
                <th>Date (YYYY-MM)</th>
                <th>Product</th>
                <th>Region</th>
                <th>Wholesaler</th>
                <th>Supplier</th>
                <th>Retail</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
        <button class="btn btn-success btn-sm mt-2" onclick="addPrice()">➕ Add Price</button>

        <!-- Seasonality Table -->
        <div class="mt-3">
          <h6 class="mb-2">Seasonality (Retail) — % deviation from overall mean (selected product)</h6>
          <div class="table-responsive">
            <table class="table table-bordered text-center" id="seasonality-table">
              <thead>
                <tr><th>Month</th><th>Δ%</th></tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
          <small class="text-muted">Green = below average price, Red = above average price.</small>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// =================== SAMPLE PRICE DATA ===================
let priceData = [
  {date:'2025-01', product:'Beef', region:'Dhaka', wholesaler:640, supplier:660, retail:700},
  {date:'2025-02', product:'Beef', region:'Dhaka', wholesaler:650, supplier:670, retail:710},
  {date:'2025-03', product:'Beef', region:'Dhaka', wholesaler:660, supplier:680, retail:720},
  {date:'2025-04', product:'Beef', region:'Dhaka', wholesaler:670, supplier:690, retail:735},
  {date:'2025-01', product:'Chicken', region:'Dhaka', wholesaler:160, supplier:170, retail:190},
  {date:'2025-02', product:'Chicken', region:'Dhaka', wholesaler:165, supplier:175, retail:195},
  {date:'2025-01', product:'Mutton', region:'Dhaka', wholesaler:900, supplier:930, retail:980},
  {date:'2025-03', product:'Mutton', region:'Dhaka', wholesaler:920, supplier:950, retail:1000},
];

const $product = document.getElementById('filterProduct');
const $region  = document.getElementById('filterRegion');
const $from    = document.getElementById('filterFrom');
const $to      = document.getElementById('filterTo');
const $apply   = document.getElementById('applyFilters');

let priceTrendChart, regionalBar;

function ymToDate(ym){ const [y,m]=ym.split('-').map(Number); return new Date(y,m-1,1); }
function inRange(ym, fromYM, toYM){ const d=ymToDate(ym), f=ymToDate(fromYM), t=ymToDate(toYM); return d>=f && d<=t; }

function filterData(){
  const prod = $product.value;
  const reg  = $region.value;
  const from = $from.value;
  const to   = $to.value;
  let rows = priceData.filter(r=> r.product===prod && inRange(r.date, from, to));
  if(reg!=='All') rows = rows.filter(r=> r.region===reg);
  rows.sort((a,b)=> ymToDate(a.date)-ymToDate(b.date));
  return rows;
}

function renderPriceTable(rows){
  const tbody = document.querySelector('#price-table tbody');
  tbody.innerHTML='';
  rows.forEach((r,idx)=>{
    const tr=document.createElement('tr');
    tr.innerHTML=`<td>${r.date}</td><td>${r.product}</td><td>${r.region}</td>
                  <td>${r.wholesaler}</td><td>${r.supplier}</td><td>${r.retail}</td>
                  <td>
                    <button class="btn btn-sm btn-warning" onclick="editPrice(${idx})">Edit</button>
                    <button class="btn btn-sm btn-danger" onclick="deletePrice(${idx})">Delete</button>
                  </td>`;
    tbody.appendChild(tr);
  });
}

function movingAverage(arr, window=3){
  const out=[];
  for(let i=0;i<arr.length;i++){
    const slice=arr.slice(Math.max(0,i-window+1), i+1);
    const avg = slice.reduce((s,v)=>s+v,0)/slice.length;
    out.push(parseFloat(avg.toFixed(2)));
  }
  return out;
}

function updatePriceCharts(rows){
  const ctxTrend = document.getElementById('priceTrendChart').getContext('2d');
  const ctxReg   = document.getElementById('regionalBarChart').getContext('2d');

  const labels = rows.map(r=>r.date);
  const wholesaler = rows.map(r=>r.wholesaler);
  const supplier   = rows.map(r=>r.supplier);
  const retail     = rows.map(r=>r.retail);
  const retailMA   = movingAverage(retail,3);

  if(priceTrendChart) priceTrendChart.destroy();
  priceTrendChart = new Chart(ctxTrend,{
    type:'line',
    data:{labels, datasets:[
      {label:'Wholesaler', data:wholesaler, borderColor:'#3b82f6', backgroundColor:'rgba(59,130,246,.15)', tension:.3, fill:true},
      {label:'Supplier', data:supplier, borderColor:'#10b981', backgroundColor:'rgba(16,185,129,.15)', tension:.3, fill:true},
      {label:'Retail', data:retail, borderColor:'#ef4444', backgroundColor:'rgba(239,68,68,.15)', tension:.3, fill:true},
      {label:'Retail (3-mo MA)', data:retailMA, borderColor:'#8b5cf6', borderDash:[6,6], pointRadius:0}
    ]},
    options:{responsive:true, scales:{y:{beginAtZero:false}}, plugins:{legend:{position:'bottom'}}}
  });

  const prod = $product.value;
  const from = $from.value, to=$to.value;
  const regions = ['Dhaka','Chattogram','Rajshahi'];
  const regAvg = regions.map(rg=>{
    const r = priceData.filter(x=>x.product===prod && x.region===rg && inRange(x.date,from,to));
    if(!r.length) return 0;
    return parseFloat((r.reduce((s,v)=>s+v.retail,0)/r.length).toFixed(2));
  });
  if(regionalBar) regionalBar.destroy();
  regionalBar = new Chart(ctxReg,{
    type:'bar',
    data:{labels:regions, datasets:[{label:'Avg Retail (BDT/kg)', data:regAvg, backgroundColor:'#f59e0b'}]},
    options:{responsive:true, scales:{y:{beginAtZero:false}}, plugins:{legend:{display:true, position:'bottom'}}}
  });
}

function computeSeasonality(product){
  const from=$from.value, to=$to.value;
  const inRangeRows = priceData.filter(r=>r.product===product && inRange(r.date,from,to));
  if(!inRangeRows.length) return [];
  const overallMean = inRangeRows.reduce((s,v)=>s+v.retail,0)/inRangeRows.length;
  const monthMap = {};
  inRangeRows.forEach(r=>{ const m=r.date.split('-')[1]; (monthMap[m] ||= []).push(r.retail); });
  const result=[];
  for(let m=1;m<=12;m++){
    const key=String(m).padStart(2,'0');
    const arr=monthMap[key]||[];
    if(arr.length){
      const mean = arr.reduce((s,v)=>s+v,0)/arr.length;
      const deltaPct = ((mean-overallMean)/overallMean)*100;
      result.push({month:key, delta:parseFloat(deltaPct.toFixed(1))});
    }else result.push({month:key, delta:null});
  }
  return result;
}

function renderSeasonalityTable(product){
  const tbody=document.querySelector('#seasonality-table tbody');
  tbody.innerHTML='';
  const rows=computeSeasonality(product);
  rows.forEach(r=>{
    const tr=document.createElement('tr');
    let cls='seasonal-neutral';
    if(r.delta!==null){ cls = r.delta>=2?'seasonal-bad':r.delta<=-2?'seasonal-good':'seasonal-neutral'; }
    tr.innerHTML=`<td>${r.month}</td><td class="${r.delta===null?'':cls}">${r.delta===null?'—':(r.delta>0? '+'+r.delta:r.delta)+'%'}</td>`;
    tbody.appendChild(tr);
  });
}

function applyAll(){
  const rows=filterData();
  renderPriceTable(rows);
  updatePriceCharts(rows);
  renderSeasonalityTable($product.value);
}

// CRUD FUNCTIONS
function addPrice(){
  const date = prompt("Enter Date (YYYY-MM):","2025-05");
  const product = prompt("Enter Product:","Beef");
  const region = prompt("Enter Region:","Dhaka");
  const wholesaler = parseFloat(prompt("Enter Wholesaler Price:", "650"));
  const supplier   = parseFloat(prompt("Enter Supplier Price:", "670"));
  const retail     = parseFloat(prompt("Enter Retail Price:", "700"));
  if(date && product && region){
    priceData.push({date,product,region,wholesaler,supplier,retail});
    applyAll();
  }
}

function editPrice(index){
  const rows=filterData();
  const r=rows[index];
  if(!r) return;
  r.date = prompt("Edit Date (YYYY-MM):", r.date) || r.date;
  r.product = prompt("Edit Product:", r.product) || r.product;
  r.region = prompt("Edit Region:", r.region) || r.region;
  r.wholesaler = parseFloat(prompt("Edit Wholesaler Price:", r.wholesaler))||r.wholesaler;
  r.supplier = parseFloat(prompt("Edit Supplier Price:", r.supplier))||r.supplier;
  r.retail = parseFloat(prompt("Edit Retail Price:", r.retail))||r.retail;
  applyAll();
}

function deletePrice(index){
  const rows=filterData();
  const r=rows[index];
  if(r && confirm("Delete this entry?")){
    priceData = priceData.filter(x=>!(x.date===r.date && x.product===r.product && x.region===r.region));
    applyAll();
  }
}

$apply.addEventListener('click',applyAll);
applyAll();
</script>

</body>
</html>
