<?php require 'views/header_dashboard.php'; ?>

<link rel="stylesheet" href="/wasthra/public/css/dashboard.css">
<script src="/wasthra/public/js/libs/chart.min.js"></script>

<div class="container grey-back">
    <h2 class="title title-min">Statistics</h2>
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
                        <h1><?php echo $this->visitorCount[0][0];?></h1>
                    </div>
                    <div class="col-60p">
                        <canvas id="total-visitors" height="200px"></canvas>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="row">
                    <h3>Total Sales</h3>
                </div>
                <div class="row">
                    <div class="col-40p">
                        <h1><?php echo $this->salesCount[0][0];?></h1>
                    </div>
                    <div class="col-60p">
                        <canvas id="total-customers" height="200px"></canvas>
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
                        <h1><?php echo number_format(($this->salesCount[0][0]*100)/$this->visitorCount[0][0], 2, '.', '').'%';?></h1>
                    </div>
                    <div class="col-60p">
                        <canvas id="conversion-rate" height="200px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="row">
                    <h3>Total Orders</h3>
                </div>
                <div class="row">
                    <div class="col">
                        <h1><?php echo $this->totalOrderCount[0][0];?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="row">
                    <h3>Total Revenue</h3>
                </div>
                <div class="row">
                    <div class="col">
                        <h1><?php echo 'LKR '.number_format($this->revenueAndCost[0]['revenue'], 2, '.', '');?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="row">
                    <h3>Total Cost</h3>
                </div>
                <div class="row">
                    <div class="col">
                        <h1><?php echo 'LKR '.number_format($this->revenueAndCost[0]['cost'], 2, '.', '');?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="row">
                    <h3>Total Profit</h3>
                </div>
                <div class="row">
                    <div class="col">
                        <h1><?php echo 'LKR '.number_format($this->revenueAndCost[0]['revenue']-$this->revenueAndCost[0]['cost'], 2, '.', '');?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <div class="card">
                <div class="row">
                    <h3>Total Sales per Category</h3>
                </div>
                <div class="row">
                    <div class="col pad-l-r-50">
                        <canvas id="sales-per-category" width="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card">
                <div class="row">
                    <h3>Total Sales per City</h3>
                </div>
                <div class="row">
                    <div class="col pad-l-r-50">
                        <canvas id="sales-per-city" width="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="wide-col">
            <div class="card">
                <div class="row">
                    <h3>Sales Distribution</h3>
                </div>
                <div class="row center">
                    <canvas id="myChart" height="400"></canvas>
                </div>

            </div>
        </div>

    </div>

    

</div>



<script>
    new Chart(document.getElementById('total-visitors'), {
        type: 'line',
        data: {
            labels: [1, 2, 3, 4, 5, 6],
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
        options: {
            responsive: true,
            elements: {
                point: {
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
                        display: false
                    },
                    ticks: {
                        display: false
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false
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
            labels: [1, 2, 3, 4, 5, 6],
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
        options: {
            responsive: true,
            elements: {
                point: {
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
                        display: false
                    },
                    ticks: {
                        display: false
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false
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
            labels: [1, 2, 3, 4, 5, 6],
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
        options: {
            responsive: true,
            elements: {
                point: {
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
                        display: false
                    },
                    ticks: {
                        display: false
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false
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
            labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25,
                26, 27, 28, 29, 30
            ],
            datasets: [{
                label: 'Number of Sales',
                data: [12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3,
                    12, 19, 3, 5, 2
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 2,
                fill: 'start',
                borderColor: "#ff523b",
                backgroundColor: 'rgba(255, 82, 59, 0.3)',
                pointBackgroundColor: "#ff523b",
                pointBorderColor: "#ff523b",
                pointHoverBackgroundColor: "#feff3b",
                pointHoverBorderColor: "#feff3b"
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
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
    new Chart(document.getElementById('sales-per-category'), {
        type: 'doughnut',
        data: {
            labels: ['Gents', 'Ladies', 'Couple'],
            datasets: [{
                label: 'Number of Sales',
                data: [<?php if(isset($this->totalSalesPerCategory[0])) echo $this->totalSalesPerCategory[0]['sales'];?>, <?php if(isset($this->totalSalesPerCategory[1])) echo $this->totalSalesPerCategory[1]['sales'];?>, <?php if(isset($this->totalSalesPerCategory[2])) echo $this->totalSalesPerCategory[2]['sales'];?>],
                backgroundColor: [

                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderColor: [

                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            tooltips: {
  callbacks: {
    label: function(tooltipItem, data) {
      //get the concerned dataset
      var dataset = data.datasets[tooltipItem.datasetIndex];
      //calculate the total of this data set
      var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
        return previousValue + currentValue;
      });
      //get the current items value
      var currentValue = dataset.data[tooltipItem.index];
      //calculate the precentage based on the total and current item, also this does a rough rounding to give a whole number
      var percentage = Math.floor(((currentValue/total) * 100)+0.5);

      return percentage + "%";
    }
  }
},
            legend: {
                display: true,
                position: 'right'
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        display: false
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        display: false
                    }
                }]
            }
        }
    });

    new Chart(document.getElementById('sales-per-city'), {
        type: 'doughnut',
        data: {
            labels: [<?php echo $this->totalSalesPerCity['cities'];?>],
            datasets: [{
                label: 'Number of Sales',
                data: [<?php echo $this->totalSalesPerCity['sales'];?>],
                backgroundColor: [
                    'rgba(236, 128, 0, 1)',
                    'rgba(222, 236, 0 , 1)',
                    'rgba(115, 236, 0 , 1)',
                    'rgba(0, 236, 221, 1)',
                    'rgba(0, 101, 236, 1)',
                    'rgba(193, 0, 236, 1)'
                ],
                borderColor: [
                    'rgba(236, 128, 0, 1)',
                    'rgba(222, 236, 0 , 1)',
                    'rgba(115, 236, 0 , 1)',
                    'rgba(0, 236, 221, 1)',
                    'rgba(0, 101, 236, 1)',
                    'rgba(193, 0, 236, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            tooltips: {
  callbacks: {
    label: function(tooltipItem, data) {
      //get the concerned dataset
      var dataset = data.datasets[tooltipItem.datasetIndex];
      //calculate the total of this data set
      var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
        return previousValue + currentValue;
      });
      //get the current items value
      var currentValue = dataset.data[tooltipItem.index];
      //calculate the precentage based on the total and current item, also this does a rough rounding to give a whole number
      var percentage = Math.floor(((currentValue/total) * 100)+0.5);

      return percentage + "%";
    }
  }
},
            legend: {
                display: true,
                position: 'right'
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        display: false
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        display: false
                    }
                }]
            }
        }
    });
</script>


<?php require 'views/footer_dashboard.php'; ?>