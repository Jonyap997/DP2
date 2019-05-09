$(document).ready(function(){
  $.ajax({
    url: "https://demosalon.000webhostapp.com/fetchDailyCustomerChartData.php",
    method: "GET",
    success: function(result) {
      console.log(result);
      var days = [];
      var customerCount = [];

      for(var i in result) {
        days.push(result[i].day);
        customerCount.push(result[i].count);
      }
        
    document.getElementById("generate_PDF").style.visibility = "visible";

      var chartdata = {
        labels: days,
        datasets : [
          {
            label: 'Daily Customer',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: customerCount
          }
        ]
      };

      var ctx = $("#dailyCustomerChart");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata
      });
    },
    error: function(result) {
      console.log(result);
    }
  });
});
