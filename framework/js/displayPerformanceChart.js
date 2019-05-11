function displayPerformanceChart(){
  $.ajax({
    url: "https://demosalon.000webhostapp.com/fetchPerformanceChartData.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var hairdressers = [];
      var customerCount = [];

      for(var i in data) {
        hairdressers.push(data[i].hairdressers);
        customerCount.push(data[i].customers);
      }
        
    document.getElementById("generate_PDF").style.visibility = "visible";

      var chartdata = {
        labels: hairdressers,
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

      var ctx = $("#performanceChart");

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
    var generateReport = document.getElementById("hairdresser_performance");
    
    generateReport.onsubmit = displayPerformanceChart;
    
}

document.addEventListener("DOMContentLoaded",init);

