function displayDailyCustomerChart(){
  $.ajax({
    url: "https://demosalon.000webhostapp.com/fetchDailyCustomerChartData.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var days = [];
      var customerCount = [];

      for(var i in data) {
        days.push(data[i].day);
        customerCount.push(data[i].count);
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
    error: function(data) {
      console.log(data);
    }
  });
}

function init() 
{
    var generateReport = document.getElementById("daily_customer");
    
    generateReport.onsubmit = displayDailyCustomerChart;
    
}

document.addEventListener("DOMContentLoaded",init);
