function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
      prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
      sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
      dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
      s = '',
      toFixedFix = function(n, prec) {
        var k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
      };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
      s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
      s[1] = s[1] || '';
      s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
  }


$(document).ready(function () 
{ 
    $.ajax
    ({
        type: "GET",
        url: "common/dataapi.php",
        success: function (data) 
        {
            var month = [];
            var totalrevnue = [];
            
            for (var i in data) 
            {
                month.push("" + data[i].month);
                totalrevnue.push(data[i].totalrevnue);
            }

            var chartdata =  
            {
                labels: month,
                datasets: 
                [{
                  label: "Earnings",
                  lineTension: 0.3,
                  backgroundColor: 'rgba(78, 115, 223, 0.05)',
                  borderColor: 'rgba(78, 115, 223, 1)',
                  pointRadius: 3,
                  pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                  pointBorderColor: 'rgba(78, 115, 223, 1)',
                  pointHoverRadius: 3,
                  pointHoverBackgroundColor: 'rgba(78, 115, 223, 1)',
                  pointHoverBorderColor: 'rgba(78, 115, 223, 1)',
                  pointHitRadius: 10,
                  pointBorderWidth: 2,
                  data: totalrevnue
                }]
            }

           

            var options = 
                {
                    maintainAspectRatio: false,
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
                            lineWidth: 0,
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
                        // Include a rupee sign in the ticks
                        callback: function(value, index, values) {
                            return '₹' + number_format(value);
                        }
                        },
                        gridLines: {
                        lineWidth: 0,
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
                    callbacks: {
                        label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ':₹' + number_format(tooltipItem.yLabel);
                        }
                    }
                    }
                }

            var ctx = document.getElementById("myAreaChart");
            var myLineChart = new Chart(ctx, 
            {
                type: 'line',
                data : chartdata,
                options: options,
            },
            )
        },
        error: function(data)
        {
         console.log(data);
        }    
        
    });
 });