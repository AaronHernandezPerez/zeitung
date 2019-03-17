// Obsoleta
//<script src="<?= base_url('assets/libraries/chartjs/moment-with-locales.js') ?>"></script>
//<script src="<?= base_url('assets/libraries/chartjs/Chart.bundle.js') ?>"></script>
var config = {
  type: 'line',
  data: {
    datasets: [{
      label: "Noticias Publicadas",
      data: [
        { x: '2018-01-15', y: 1 },
        { x: '2018-05-15', y: 1 },
        { x: '2018-07-15', y: 1 },
        { x: '2018-09-15', y: 1 },
        { x: '2018-10-15', y: 1 },
        { x: '2018-12-15', y: 1 },
        { x: '2018-12-16', y: 1 },
        { x: '2018-12-17', y: 1 },
      ],
    }]
  },
  options: {
    responsive: true,
    tooltips: {
      mode: 'index',
      intersect: false,
    },
    scales: {
      xAxes: [{
        type: 'time',
        time: {
          unit: 'month',
        }
      }]
    }
  }
};

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



var ctx = document.getElementById("notp");
var myLine = new Chart(ctx, config);


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

// new Chart(document.getElementById("noticiasP2"), {
//   type: 'line',
//   data: {
//     datasets: [{
//       data: data,
//       borderColor: "#3e95cd",
//       fill: false
//     }]
//   },
//   options: {
//     scales: {
//       xAxes: [{
//         type: 'time',
//         time: {
//           unit: 'month'
//         }
//       }]
//     },
//     legend: false
//   }
// });

window.chartColors = {
  red: 'rgb(255, 99, 132)',
  orange: 'rgb(255, 159, 64)',
  yellow: 'rgb(255, 205, 86)',
  green: 'rgb(75, 192, 192)',
  blue: 'rgb(54, 162, 235)',
  purple: 'rgb(153, 102, 255)',
  grey: 'rgb(231,233,237)'
};

var line1 = [
  { x: '2017-04-15', y: 10 },
  { x: '2017-09-15', y: 1 },
  { x: '2018-09-15', y: 25 },
];

var config = {
  type: 'line',
  data: {
    datasets: [{
      label: "My First dataset",
      backgroundColor: window.chartColors.red,
      borderColor: window.chartColors.red,
      data: line1,
    }]
  },
  options: {
    responsive: true,
    title: {
      display: true,
      text: 'Chart.js - Get X-Axis Region on Click'
    },
    tooltips: {
      mode: 'index',
      intersect: false,
    },
    scales: {
      xAxes: [{
        type: 'time',
        time: {
          unit: 'month',
        }
      }]
    }
  }
};

var ctx = document.getElementById("canvas").getContext("2d");
var myLine = new Chart(ctx, config);