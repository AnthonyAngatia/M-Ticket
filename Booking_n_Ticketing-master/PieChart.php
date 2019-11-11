<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Statistics</title>
</head>
<body>
<div class="wrap">
<h2>Ticket Sales</h2>
<canvas id="myChart"></canvas>

</div>
<script>
// let ctx = document.getElementById('myChart').getContent('2d');
// let labels = ['x', 'y', 'z'];
// let color = ['red', 'blue', 'brown'];

// let myChart = new Chart(ctx, {
//     type: 'pie',
//     data:{
//         datasets: [{
//             data: [31, 10 ,5],
//             backgroundColor:color
//         }],
//         labels: labels
//     },
//     options: (
//         responsive: true
//     )

// })
let ctx = document.getElementById('myChart').getContext('2d');
let labels = ['Pizza 🍕', 'Taco 🌮', 'Hot Dog 🌭', 'Sushi 🍣'];
let colorHex = ['#FB3640', '#EFCA08', '#43AA8B', '#253D5B'];

let myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    datasets: [{
      data: [30, 10, 40, 20],
      backgroundColor: colorHex
    }],
    labels: labels
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom'
    },
    plugins: {
      datalabels: {
        color: '#fff',
        anchor: 'end',
        align: 'start',
        offset: -10,
        borderWidth: 2,
        borderColor: '#fff',
        borderRadius: 25,
        backgroundColor: (context) => {
          return context.dataset.backgroundColor;
        },
        font: {
          weight: 'bold',
          size: '10'
        },
        formatter: (value) => {
          return value + ' %';
        }
      }
    }
  }
})


</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    
</body>
</html>