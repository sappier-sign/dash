

// Dashboard 1 Morris-chart
var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

Morris.Area({
        element: 'morris-area-chart',
        data: [{
            month: '2017-01',
            Successful: 0,
            Failed: 0,
            Total: 0
        }, {
            month: '2017-02',
            Successful: 45,
            Failed: 35,
            Total: 20
        }, {
            month: '2017-03',
            Successful: 52,
            Failed: 42,
            Total: 32
        }, {
            month: '2017-04',
            Successful: 45,
            Failed: 35,
            Total: 20
        }, {
            month: '2017-05',
            Successful: 20,
            Failed: 62,
            Total: 52
        }, {
            month: '2017-06',
            Successful: 85,
            Failed: 75,
            Total: 60
        }, {
            month: '2017-07',
            Successful: 85,
            Failed: 75,
            Total: 60
        }, {
            month: '2017-08',
            Successful: 85,
            Failed: 75,
            Total: 60
        },{
            month: '2017-009',
            Successful: 30,
            Failed: 40,
            Total: 34
        }],
        xkey: 'month',
        ykeys: ['Successful', 'Failed', 'Total'],
        labels: ['Successful Transactions', 'Failed Transactions', 'Amount Settled'],
        xLabelFormat: function(x){
            var month = months[x.getMonth()];
            return month;
        },
        dateFormat: function(x){
            var month = months [new Date(x).getMonth()];
            return month;
        },
        pointSize: 0,
        fillOpacity: 0.6,
        pointStrokeColors: ['#BFBFBF', '#51e4ff', '#16198d'],
        behaveLikeLine: true,
        gridLineColor: '#eef0f2',
        lineWidth: 1,
        hideHover: 'auto',
        lineColors: ['#BFBFBF', '#51e4ff', '#16198d'],
      

        resize: true
        
    });

        google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
            title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }




 $('.vcarousel').carousel({
            interval: 3000
         });