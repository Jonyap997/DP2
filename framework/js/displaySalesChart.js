$(document).ready(function(){
  $.ajax({
    url: "https://demosalon.000webhostapp.com/fetchSalesChartData.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var months = [];
      var monthlySales = [];

      for(var i in result) {
        months.push(result[i].month);
        monthlySales.push(result[i].sales);
      }
        
    document.getElementById("generate_PDF").style.visibility = "visible";

      var chartdata = {
        labels: months,
        datasets : [
          {
            label: 'Monthly Sales',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: monthlySales
          }
        ]
      };

      var ctx = $("#salesChart");

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

{
    var generateSalesReport = document.getElementById("sales_report");
    var generateDailyCustomerReport = document.getElementById("daily_customer");
    var generateHairdresserPerformanceReport = document.getElementById("hairdresser_performance");
    
    generateSalesReport.onsubmit = displaySalesChart;
    generateDailyCustomerReport.onsubmit = displayDailyCustomerChart;
    generateHairdresserPerformanceReport.onsubmit = displayHairdresserPerformanceChart;
}

window.onload = init;


