$(document).ready(function()
{
    $.ajax({
        type: "POST",
        url: "common/dataapi.php",
        success: function (data) 
        {
            var order_pending = [];
            var order_complete = [];
            
            for(var i in data)
            {
                order_pending.push("" + data[i].order_pending);
                order_complete.push(data[i].order_complete);
            }

            var pidata = 
            {
                labels: ["Direct", "Referral", "Social"],
                datasets: [{
                  data: [55, 30, 15],
                  backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                  hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                  hoverBorderColor: "rgba(234, 236, 244, 1)",
                }]
            }

            var pieoption =
            {
                maintainAspectRatio: false,
                tooltips: {
                  backgroundColor: "rgb(255,255,255)",
                  bodyFontColor: "#858796",
                  borderColor: '#dddfeb',
                  borderWidth: 1,
                  xPadding: 15,
                  yPadding: 15,
                  displayColors: false,
                  caretPadding: 10,
                },
                legend: {
                  display: false
                },
                cutoutPercentage: 80,
            }
            var ctx = document.getElementById("myPieChart");
            var myPieChart = new Chart(ctx, 
                {
                    type: 'doughnut',
                    data: pidata,
                    options: pieoption
                })
        },
        error: function(data)
        {
            console.log(data);
        }
    });
});