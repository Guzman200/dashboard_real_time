/* global Chart:false */

$(function () {
  'use strict'

  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */

  //-----------------------
  // - MONTHLY SALES CHART -
  //-----------------------

  // Get context with jQuery - using jQuery's .get() method.
  var salesChartCanvas = $('#salesChart').get(0).getContext('2d')

  var salesChartData = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [
      {
        label: 'Digital Goods',
        backgroundColor: 'rgba(60,141,188,0.9)',
        borderColor: 'rgba(60,141,188,0.8)',
        //pointRadius: true,
        //pointColor: '#28a745',
        //pointStrokeColor: 'rgba(60,141,188,1)',
        //pointHighlightFill: '#fff',
        //pointHighlightStroke: 'rgba(60,141,188,1)',
        data: [28, 48, 40, 19, 86, 27, 90]
      },
      {
        label: 'Electronics',
        backgroundColor: 'rgba(210, 214, 222, 1)',
        borderColor: 'rgba(210, 214, 222, 1)',
        //pointRadius: true,
        //pointColor: 'rgba(210, 214, 222, 1)',
        //pointStrokeColor: '#c1c7d1',
        //pointHighlightFill: '#fff',
        //pointHighlightStroke: 'rgba(220,220,220,1)',
        data: [65, 59, 80, 81, 56, 55, 40]
      }
    ]
  }

  var salesChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: true
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false
        }
      }],
      yAxes: [{
        gridLines: {
          display: false
        }
      }]
    },
    interaction: {
      mode: 'nearest',
      axis: 'x',
      intersect: false
    },
  }

  var salesChart = new Chart(salesChartCanvas, {
    type: 'line',
    data: salesChartData,
    options: salesChartOptions
  })

  

})




