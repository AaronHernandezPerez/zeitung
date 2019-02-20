console.log('xd');

var ctx = $("#noticiasP");

var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Earnings",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 25],
    }],
  },
  options: {
    // maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,

        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
    }
  }
});


var data = [{
  x: new moment().add(-10, "months"),
  y: Math.random() * 100
},
{
  x: new moment().add(-8, "months"),
  y: Math.random() * 100
},
{
  x: new moment().add(-6, "months"),
  y: Math.random() * 100
},
{
  x: new moment().add(-4, "months"),
  y: Math.random() * 100
},
{
  x: new moment().add(-2, "months"),
  y: Math.random() * 100
},
{
  x: new moment().add(-0, "months"),
  y: Math.random() * 100
},
];

new Chart(document.getElementById("noticiasP2"), {
  type: 'line',
  data: {
    datasets: [{
      data: data,
      borderColor: "#3e95cd",
      fill: false
    }]
  },
  options: {
    scales: {
      xAxes: [{
        type: 'time',
        time: {
          unit: 'month'
        }
      }]
    },
    legend: false
  }
});