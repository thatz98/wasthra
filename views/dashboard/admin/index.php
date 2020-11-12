<?php require 'views/header_dashboard.php'; ?>

<div class="small-container">
<div class="row">
				<h2 class="title title-min">Dashboard</h2>
			</div>
</div>
<div class="dashboard">
        <div class="container">
			
            <div class="row">
                <div class="col-4">
                	<div class="content">
                		<a href="<?php echo URL; ?>orders/orderDashboard">
      						<div class="content-overlay"></div>
      						<div class="content-onlay">
      							<div class="content-details fadeOut-top">
      									<p>Orders</p>
       							
      						</div></div>
      						<img class="content-image" src="<?php echo URL; ?>public/images/dash-10.png">
      						<div class="content-details fadeIn-bottom">
       							<p>Orders</p>
      						</div>
      					</a>
      				</div>
                </div>
                <div class="col-4">
                	<div class="content">
                		<a href="<?php echo URL; ?>user">
      						<div class="content-overlay"></div>
      						<div class="content-onlay">
      							<div class="content-details fadeOut-top">
      									<p>Users</p>
       							
      						</div></div>
      						<img class="content-image" src="<?php echo URL; ?>public/images/dash-1.png">
      						<div class="content-details fadeIn-bottom">
       							<p>Users</p>
      						</div>
      					</a>
      				</div>
                </div>
                <div class="col-4">
                	<div class="content">
                		<a href="<?php echo URL; ?>products">
      						<div class="content-overlay"></div>
      						<div class="content-onlay">
      							<div class="content-details fadeOut-top">
      									<p>Products</p>
       							
      						</div></div>
      						<img class="content-image" src="<?php echo URL; ?>public/images/dash-16.png">
      						<div class="content-details fadeIn-bottom">
       							<p>Products</p>
      						</div>
      					</a>
      				</div>
                </div>
                <div class="col-4">
                	<div class="content">
                		<a href="<?php echo URL; ?>productCategories">
      						<div class="content-overlay"></div>
      						<div class="content-onlay">
      							<div class="content-details fadeOut-top">
      									<p>Product Categories</p>
       							
      						</div></div>
      						<img class="content-image" src="<?php echo URL; ?>public/images/dash-7.png">
      						<div class="content-details fadeIn-bottom">
       							<p>Product Categories</p>
      						</div>
      					</a>
      				</div>
                </div>
                
        </div>
    </div>
</div>



    <?php require 'views/footer_dashboard.php'; ?>