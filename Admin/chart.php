<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
// Define the xValues as month names
const xValues = ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

const yValues = [70000, 80000, 80000, 90000, 90000, 90000, 100000, 110000, 140000, 140000, 150000];

// Format y-axis ticks as per requirement
function formatYAxisTick(value, index, values) {
    if (value >= 10000000) {
        return (value / 10000000).toFixed(1) + ' Cr';
    } else if (value >= 100000) {
        return (value / 100000).toFixed(0) + ' Lakh';
    } else {
        return '₹' + value;
    }
}

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(255, 99, 132, 0.2)",
      borderColor: "rgba(255, 99, 132, 1)",
      borderWidth: 2,
      pointBackgroundColor: "rgba(255, 99, 132, 1)",
      pointBorderColor: "rgba(255, 255, 255, 1)",
      pointBorderWidth: 1,
      pointRadius: 4,
      pointHoverBackgroundColor: "rgba(255, 99, 132, 1)",
      pointHoverBorderColor: "rgba(255, 255, 255, 1)",
      pointHoverBorderWidth: 2,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{
        ticks: {
          callback: formatYAxisTick
        }
      }]
    }
  }
});
</script>

</body>
</html>
