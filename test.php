<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chart.js Example</title>
  <!-- Include Chart.js library -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <h1>กราฟแสดงข้อมูล</h1>
  <select id="dataSelect">
    <option value="data1">ข้อมูล 1</option>
    <option value="data2">ข้อมูล 2</option>
    <option value="data3">ข้อมูล 3</option>
  </select>
  <div style="width: 80%; margin: auto;">
    <canvas id="myChart"></canvas>
  </div>

  <script src="script.js"></script>
</body>
</html>

<script>
    // ไฟล์ script.js

// เลือกอิลิเมนต์ต่างๆ
const dataSelect = document.getElementById('dataSelect');
const canvas = document.getElementById('myChart');

// ข้อมูลสำหรับแต่ละกราฟ
const datasets = {
  data1: [10, 20, 30, 40, 50],
  data2: [5, 15, 25, 35, 45],
  data3: [2, 4, 6, 8, 10]
};

// สร้างกราฟเริ่มต้น
const ctx = canvas.getContext('2d');
const myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['ตัวอย่าง 1', 'ตัวอย่าง 2', 'ตัวอย่าง 3', 'ตัวอย่าง 4', 'ตัวอย่าง 5'],
    datasets: [{
      label: 'ข้อมูล',
      data: datasets.data1,
      backgroundColor: 'rgba(75, 192, 192, 0.2)',
      borderColor: 'rgba(75, 192, 192, 1)',
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});

// เมื่อเลือกค่าในตัวเลือก
dataSelect.addEventListener('change', function () {
  const selectedData = dataSelect.value;
  myChart.data.datasets[0].data = datasets[selectedData];
  myChart.update();
});

</script>