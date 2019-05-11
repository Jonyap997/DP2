function displaySalesChart()
{
  $.ajax({
    url: "https://demosalon.000webhostapp.com/salesReport.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var months = [];
      var monthlySales = [];

      for(var i in data) {
        months.push(data[i].month);
        monthlySales.push(data[i].sales);
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
    error: function(data) {
      console.log(data);
    }
  });
}

function init() 
{
    var generateReport = document.getElementById("sales_report");
    
    generateReport.onsubmit = displaySalesChart;
    
}

document.addEventListener("DOMContentLoaded",init);



