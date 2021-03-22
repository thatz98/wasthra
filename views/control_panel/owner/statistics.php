<script src="/public/js/libs/jquery.min.js"></script>

<style>
* {
  box-sizing: border-box;
}

body {
  background: #f3f3f4;
  line-height: normal;
  font-size: 16px;
  font-family: sans-serif;
}

a,
a:hover {
  text-decoration: none;
}

.rad-navigation {
  position: fixed;
  left: 0;
  right: 0;
  top: 0;
  height: 50px;
  box-shadow: 0 0px 9px 4px rgba(0, 0, 0, 0.1), 0 -5px 2px 2px rgba(0, 0, 0, 0.1);
  background: white;
  z-index: 10000;
}

.links {
  margin-right: 30px;
  position: relative;
}

.links li {
  list-style: none;
  position: relative;
  margin: 10px;
  display: inline-block;
}

.rad-dropmenu-item.active {
  display: block;
  -webkit-animation: flipInX .3s ease;
}

.rad-logo-container {
  width: 225px;
  text-align: center;
  height: 50px;
  float: left;
  -webkit-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
}

.rad-top-nav-container {
  float: right;
  -webkit-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
}

.rad-toggle-btn,
.rad-logo {
  text-decoration: none;
  position: relative;
  height: 50px;
  line-height: 50px;
  padding: 0 15px;
  font-size: 22px;
  font-weight: 900;
  text-transform: uppercase;
  text-decoration: none;
  color: #222533;
  display: inline-block;
}

.rad-toggle-btn:hover {
  background: #9494b8;
}

.rad-menu-item {
  position: relative;
  padding: 0 10px;
  line-height: 30px;
  height: 30px;
  color: #89949B;
  z-index: 5;
}

.rad-menu-badge {
  position: absolute;
  min-width: 20px;
  min-height: 20px;
  line-height: 20px;
  font-weight: bold;
  color: white;
  border-radius: 100%;
  font-size: 12px;
  background: #E94B3B;
  box-shadow: 0.5px 0.2px 1px rgba(0, 0, 0, 0.5);
  display: inline-block;
  text-align: center;
  top: -10px;
  z-index: 1;
}

.rad-dropmenu-item {
  position: absolute;
  right: 0;
  top: 40px;
  min-width: 250px;
  background: white;
  border-top: 5px solid #2f4050;
  border-radius: 2px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
  display: none;
}

.rad-dropmenu-item:before {
  content: "";
  position: absolute;
  border-width: 0 10px 10px 10px;
  border-style: solid;
  border-color: #2f4050 transparent;
  top: -14px;
  right: 8px;
}

.rad-dropmenu-footer,
.rad-dropmenu-header {
  display: block !important;
  background: #F9FAFB;
  text-transform: uppercase;
  font-weight: 700;
  font-size: 12px;
  margin: 0 !important;
  padding: 6px;
  text-align: center;
}

.rad-dropmenu-footer > a,
.rad-dropmenu-header > a {
  color: #98A0A3;
  line-height: 12px;
  text-decoration: none;
}

.rad-dropmenu-header {
  border-bottom: 1px solid #F2F2F2;
}

.rad-dropmenu-footer {
  border-top: 1px solid #F2F2F2;
}

.rad-sidebar {
  z-index: 9999;
  position: fixed;
  background: #2f4050;
  width: 225px;
  height: 100vh;
  top: 50px;
  left: 0;
  box-shadow: 0 0 4px rgba(0, 0, 0, 0.14), 2px 4px 8px rgba(0, 0, 0, 0.28);
  -webkit-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
}

.rad-sidebar li {
  text-align: left;
  height: 50px;
}

.rad-sidebar li a {
  text-decoration: none;
  height: 50px;
  display: block;
  color: white;
}

.rad-sidebar li a i {
  position: relative;
  width: 50px;
  height: 50px;
  line-height: 50px;
  text-align: center;
}

.rad-sidebar li a i:before {
  z-index: 10;
  position: relative;
}

.rad-sidebar li a > span {
  display: inline-block;
  padding-left: 10px;
  -webkit-transition: all .2s ease-in-out;
  -webkit-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}

.rad-sidebar li:hover {
  background: #263340;
}

.rad-sidebar li:hover .icon-bg {
  -webkit-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}

.icon-bg {
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  z-index: 1;
  width: 100%;
  -webkit-transform: translate3d(-47px, 0, 0);
  transform: translate3d(-47px, 0, 0);
  -webkit-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
}

.rad-bg-primary {
  background: #1C7EBB;
}

.rad-bg-success {
  background: #23AE89;
}

.rad-bg-danger {
  background: #E94B3B;
}

.rad-bg-warning {
  background: #F98E33;
}

.rad-bg-violet {
  background: #6A55C2;
}

.rad-sidebar.rad-nav-min {
  width: 50px !important;
}

.rad-sidebar.rad-nav-min .rad-sidebar-item {
  -webkit-transform: translate3d(-200px, 0, 0);
  transform: translate3d(-200px, 0, 0);
}

.rad-sidebar.rad-nav-min .icon-bg {
  -webkit-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}

.rad-sidebar.rad-nav-min .icon-bg:hover {
  opacity: .4;
}

.rad-body-wrapper {
  position: absolute;
  left: 250px;
  top: 75px;
  width: auto;
  right: 0;
  -webkit-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
}

.rad-body-wrapper.rad-nav-min {
  left: 50px;
}

.rad-chart {
  height: 250px;
}

@-webkit-keyframes flipInX {
  0% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
    -webkit-transition-timing-function: ease-in;
    transition-timing-function: ease-in;
    opacity: 0;
  }
  40% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
    -webkit-transition-timing-function: ease-in;
    transition-timing-function: ease-in;
  }
  60% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
    transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
    opacity: 1;
  }
  80% {
    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
    transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
  }
  100% {
    -webkit-transform: perspective(400px);
    transform: perspective(400px);
  }
}

@media screen and (max-width: 850px) {
  .rad-navigation {
    height: 100px;
  }
  .rad-logo-container {
    display: block;
    float: none;
    width: 100%;
    border-bottom: 1px solid #F2F2F2;
  }
  .rad-top-nav-container {
    display: block;
    float: none;
    height: 50px;
    font-size: 12px;
    background: white;
  }
  .rad-menu-badge {
    font-size: 10px;
    min-width: 15px;
    min-height: 15px;
    line-height: 15px;
  }
  .links {
    float: right;
  }
  .rad-sidebar {
    top: 100px;
  }
  .rad-sidebar.rad-nav-min {
    -webkit-transform: translate3d(-200px, 0, 0);
    transform: translate3d(-200px, 0, 0);
  }
  .rad-body-wrapper {
    top: 125px;
    position: relative;
  }
  .rad-body-wrapper.rad-nav-min {
    left: 0px;
  }
}

.panel {
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
  border-radius: 0 !important;
}

.panel-heading {
  background: #2f4050 !important;
  border-radius: 0;
  padding: 15px;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
}

.panel-heading .panel-title {
  text-transform: uppercase;
  font-weight: 600;
  font-size: 12px;
  color: #dce0f3;
}

#areaChart path[Attributes Style] {
  fill: #39c7aa;
  stroke: none;
  fill-opacity: 1;
}
</style>
<section>
  <header>
    <nav class="rad-navigation">
      <div class="rad-logo-container">
        <a href="#" class="rad-logo">Ash-Board</a>
        <a href="#" class="rad-toggle-btn pull-right"><i class="fa fa-bars"></i></a>
      </div>
      <div class="rad-top-nav-container">
        <ul class="links">
          <li>
            <a class="rad-menu-item" href="#"><i class="fa fa-comment-o"></i></a>
          </li>
          <li class="rad-dropdown"><a class="rad-menu-item" href="#"><i class="fa fa-envelope-o"><span class="rad-menu-badge">3</span></i></a>
            <ul class="rad-dropmenu-item">
              <li class="rad-dropmenu-header"><a href="#">Your Notifications</a></li>
              <li class="rad-notification-item">
                <a class="rad-notification-content" href="#">

                </a>
              </li>
              <li class="rad-dropmenu-footer"><a href="#">See all notifications</a></li>
            </ul>
          </li>
          <li class="rad-dropdown"><a class="rad-menu-item" href="#"><i class="fa fa-bell-o"><span class="rad-menu-badge">49</span></i></a>
            <ul class="rad-dropmenu-item">
              <li class="rad-dropmenu-header"><a href="#">Your Alerts</a></li>
              <li class="rad-notification-item">
                <a class="rad-notification-content" href="#">

                </a>
              </li>
              <li class="rad-dropmenu-footer"><a href="#">See all alerts</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
</section>
<aside>
  <nav class="rad-sidebar">
    <ul>
      <li>
        <a href="#" class="inbox">
          <i class="fa fa-dashboard"><span class="icon-bg rad-bg-success"></span></i>
          <span class="rad-sidebar-item">Control Panel</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-bar-chart-o">
						<span class="icon-bg rad-bg-danger"></span>
					</i>
          <span class="rad-sidebar-item">Ticket status</span>
        </a>
      </li>
      <li><a href="#" class="snooz"><i class="fa fa-line-chart"><span class="icon-bg rad-bg-primary"></span></i><span class="rad-sidebar-item">Call trends</span></a></li>
      <li><a href="#" class="done"><i class="fa fa-area-chart"><span class="icon-bg rad-bg-warning"></span></i><span class="rad-sidebar-item">Heat maps</span></a></li>
      <li><a href="#"><i class="fa fa-wrench"><span class="icon-bg rad-bg-violet"></span></i><span class="rad-sidebar-item">Settings</span></a></li>
    </ul>
  </nav>
</aside>
<main>
  <section>
    <div class="rad-body-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 col-md-12 col-xs-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Area Chart</h3>
              </div>
              <div class="panel-body">
                <div id="areaChart" class="rad-chart"></div>
              </div>

            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Line Chart</h3>
              </div>
              <div class="panel-body">
                <div id="lineChart" class="rad-chart"></div>
              </div>

            </div>
          </div>
          <!-- here-->
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Donut Chart</h3>
              </div>
              <div class="panel-body">
                <div id="donutChart" class="rad-chart"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Bar Chart</h3>
              </div>
              <div class="panel-body">
                <div id="barChart" class="rad-chart"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<script>
    $(function() {

$(document).on("click", function(e) {
  var $item = $(".rad-dropmenu-item");
  if ($item.hasClass("active")) {
    $item.removeClass("active");
  }
});

$(".rad-toggle-btn").on('click', function() {
  $(".rad-sidebar").toggleClass("rad-nav-min");
  $(".rad-body-wrapper").toggleClass("rad-nav-min");
  setTimeout(function() {
    initializeCharts();
  }, 200);
});

$(".rad-dropdown >.rad-menu-item").on('click', function(e) {
  e.stopPropagation();
  $(".rad-dropmenu-item").removeClass("active");
  $(this).next(".rad-dropmenu-item").toggleClass("active");
});

$(window).resize(function() {
  $.throttle(250, setTimeout(function() {
    initializeCharts();
  }, 200));
});

var colors = [
  '#E94B3B',
  '#39C7AA',
  '#1C7EBB',
  '#F98E33'
];

var panelList = $('.row');

panelList.sortable({
  handle: '.row',
  update: function() {
    $('.panel', panelList).each(function(index, elem) {
      var $listItem = $(elem),
        newIndex = $listItem.index();
    });
  }
});

function initializeCharts() {

  $(".rad-chart").empty();

  Morris.Line({
    lineColors: colors,
    element: 'lineChart',
    data: [{
      year: '2011',
      value: 32
    }, {
      year: '2012',
      value: 17
    }, {
      year: '2013',
      value: 41
    }, {
      year: '2014',
      value: 26
    }, {
      year: '2015',
      value: 9
    }],
    xkey: 'year',
    ykeys: ['value'],
    labels: ['Value']
  });

  Morris.Donut({
    element: 'donutChart',
    data: [{
      value: 40,
      label: 'SS'
    }, {
      value: 15,
      label: 'baz'
    }, {
      value: 35,
      label: 'bar'
    }, {
      value: 15,
      label: 'baz'
    }, ],
    labelColor: '#23AE89',
    colors: colors
  });

  Morris.Bar({
    element: 'barChart',
    data: [{
      y: 'Jan',
      a: 55,
      b: 90,
      c: 12
    }, {
      y: 'Feb',
      a: 65,
      b: 15,
      c: 16
    }, {
      y: 'Mar',
      a: 50,
      b: 40,
      c: 05
    }, {
      y: 'May',
      a: 95,
      b: 65,
      c: 65
    }, {
      y: 'Jun',
      a: 50,
      b: 40,
      c: 20
    }, {
      y: 'Jul',
      a: 75,
      b: 65,
      c: 85
    }, {
      y: 'Aug',
      a: 10,
      b: 90,
      c: 90
    }, {
      y: 'Sep',
      a: 15,
      b: 65,
      c: 07
    }, {
      y: 'Oct',
      a: 75,
      b: 18,
      c: 13
    }, {
      y: 'Nov',
      a: 15,
      b: 65,
      c: 03
    }, {
      y: 'Dec',
      a: 03,
      b: 95,
      c: 02
    }],

    xkey: 'y',
    ykeys: ['a', 'b', 'c'],
    barColors: [

      '#39C7AA',
      '#1C7EBB',
      '#E94B3B',
    ],
    labels: ['Series ASH', 'Series SS']
  });

  Morris.Area({
    element: 'areaChart',
    lineColors: colors,
    data: [{
      y: '2006',
      a: 100,
      b: 90
    }, {
      y: '2007',
      a: 75,
      b: 65
    }, {
      y: '2008',
      a: 50,
      b: 40
    }, {
      y: '2009',
      a: 75,
      b: 65
    }, {
      y: '2010',
      a: 50,
      b: 40
    }, {
      y: '2011',
      a: 75,
      b: 65
    }, {
      y: '2012',
      a: 100,
      b: 90
    }],
    xkey: 'y',
    ykeys: ['a', 'b'],
    labels: ['Series ASH', 'Series SS']
  });

}

initializeCharts();
});
</script>