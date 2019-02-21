var chart = new CanvasJS.Chart("notp",
  {
    title: {
      text: "Date time axis with interval 3 months"
    },
    axisX: {
      interval: 1,
      intervalType: "month"
    },
    data: [
      {
        type: "line",
        dataPoints: [//array
          {
            x: new Date(2012, 03, 1),
            y: 26,
          },
          {
            x: new Date(2012, 04, 3),
            y: 38
          }
          , {
            x: new Date(2012, 05, 5),
            y: 43,

          }, {
            x: new Date(2012, 06, 7),
            y: 29,

          }, {
            x: new Date(2012, 07, 11),
            y: 41,

          }, {
            x: new Date(2012, 08, 11),
            y: 54,

          }, {
            x: new Date(2012, 09, 23),
            y: 66,

          }, {
            x: new Date(2012, 10, 25),
            y: 60,

          }, {
            x: new Date(2012, 11, 25),
            y: 53,

          }, {
            x: new Date(2012, 12, 25),
            y: 60,
          }
        ]
      }
    ]
  });

chart.render();