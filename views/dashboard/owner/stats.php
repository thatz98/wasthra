<?php require 'views/header_dashboard.php'; ?>

<link rel="stylesheet" href="<?php echo URL; ?>public/css/dashboard.css">
<script src="<?php echo URL ?>public/js/libs/chart.min.js"></script>
 
<div class="container grey-back">
            <h2  class="title title-min">Statistics</h2>
            <div class="row">
                <nav class="filter-time">
                    <ul>
                        <li><a href="">Daily</a></li>
                        <li><a href="">Weekly</a></li>
                        <li><a href="">Monthly</a></li>
                        <li><a href="">Yearly</a></li>
                        <li><a href="">Custom</a></li>
                    </ul>
                </nav>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="row">
                        <h3>Total Visitors</h3>
                        </div>
                        <div class="row">
                            <div class="col-40p">
                            <h1>48.12%</h1>
                            </div>
                            <div class="col-60p">
                            <canvas id="total-visitors" height="200"></canvas>
                            </div>
                        
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="row">
                        <h3>Total Customers</h3>
                        </div>
                        <div class="row">
                        <div class="col-40p">
                            <h1>48.12%</h1>
                            </div>
                            <div class="col-60p">
                            <canvas id="total-customers" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="row">
                        <h3>Conversion Rate</h3>
                        </div>
                        <div class="row">
                        <div class="col-40p">
                            <h1>48.12%</h1>
                            </div>
                            <div class="col-60p">
                            <canvas id="conversion-rate" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card">
                    <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-3">
                    <div class="card">
                    <canvas id="myChart1" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
</div>



    
    <script>

new Chart(document.getElementById('total-visitors'), {
    type: 'line',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            data: [12, 19, 3, 5, 2, 3],
            borderWidth: 2,
            fill: false,
            borderColor: "#ff523b",
   backgroundColor: "#ff523b",
   pointHoverBackgroundColor: "#55bae7",
   pointHoverBorderColor: "#55bae7"
        }]
    },
    options: {elements: {
                    point:{
                        radius: 0
                    }
                },
        legend: {
        display: false
    },
    tooltips: {
        callbacks: {
           label: function(tooltipItem) {
                  return tooltipItem.yLabel;
           }
        }
    },
    scales: {
        xAxes: [{
            gridLines: {
                display:false
            },
            ticks: {
                display: false
            }
        }],
        yAxes: [{
            gridLines: {
                display:false
            },
            ticks: {
                display: false
            }   
        }]
    }
    }
});

new Chart(document.getElementById('conversion-rate'), {
    type: 'line',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            data: [12, 19, 3, 5, 2, 3],
            borderWidth: 2,
            fill: false,
            borderColor: "#ff523b",
   backgroundColor: "#ff523b",
   pointHoverBackgroundColor: "#55bae7",
   pointHoverBorderColor: "#55bae7"
        }]
    },
    options: {elements: {
                    point:{
                        radius: 0
                    }
                },
        legend: {
        display: false
    },
    tooltips: {
        callbacks: {
           label: function(tooltipItem) {
                  return tooltipItem.yLabel;
           }
        }
    },
    scales: {
        xAxes: [{
            gridLines: {
                display:false
            },
            ticks: {
                display: false
            }
        }],
        yAxes: [{
            gridLines: {
                display:false
            },
            ticks: {
                display: false
            }   
        }]
    }
    }
});

new Chart(document.getElementById('total-customers'), {
    type: 'line',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            data: [12, 19, 3, 5, 2, 3],
            borderWidth: 2,
            fill: false,
            borderColor: "#ff523b",
   backgroundColor: "#ff523b",
   pointHoverBackgroundColor: "#55bae7",
   pointHoverBorderColor: "#55bae7"
        }]
    },
    options: {elements: {
                    point:{
                        radius: 0
                    }
                },
        legend: {
        display: false
    },
    tooltips: {
        callbacks: {
           label: function(tooltipItem) {
                  return tooltipItem.yLabel;
           }
        }
    },
    scales: {
        xAxes: [{
            gridLines: {
                display:false
            },
            ticks: {
                display: false
            }
        }],
        yAxes: [{
            gridLines: {
                display:false
            },
            ticks: {
                display: false
            }   
        }]
    }
    }
});


var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 2,
            fill: false,
            borderColor: "#ff523b",
   backgroundColor: "#ff523b",
   pointBackgroundColor: "#55bae7",
   pointBorderColor: "#55bae7",
   pointHoverBackgroundColor: "#55bae7",
   pointHoverBorderColor: "#55bae7"
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
<script>


var ctx = document.getElementById('myChart1');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>