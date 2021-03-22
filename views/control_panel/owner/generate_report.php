<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= (isset($this->title)) ? $this->title . ' | Wasthra' : 'Wasthra'; ?></title>
    <link rel="stylesheet" href="public/css/libs/font-awesome.min.css">
    <script src="public/js/libs/fontawesome.js"></script>
    <link rel="stylesheet" href="public/css/all.css">
    <script src="public/js/libs/jquery.min.js"></script>
</head>

<body>
    <div id="preloader-overlay"></div>
    <div id="spinner"></div>
    <div class="header" id="header">
        <div class="contaner">
            <div class="navbar">
                <div class="logo">
                    <img src="/public/images/logo.png" width="125px">
                </div>

                <nav>
        
                </nav>

            </div> 
        </div>
    </div>

<div class="small-container">
 <div class="per-page" style="">
 <th>Data Range<i onclick="showFilters('report-table',0,'dropdown-filter-1','checkbox-1','checkbox-all-1')"
                                    class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
                    <div class="dropdown-filter-dropdown" id="dropdown-filter-1" style="display:none;">
                        <div class="dropdown-filter-content">
                            <div class="close-icon">
                                <i class="fa fa-close" onclick="closeFilter('dropdown-filter-1')"></i>
                            </div>
                            <div class="dropdown-filter-sort" onclick="sortTable('report-table',0)">
                                <span>Daliy</span>
                            </div>
                            <div class="dropdown-filter-sort" onclick="sortTable('report-table',0)">
                                <span>Weekly</span>
                            </div>
                            <div class="dropdown-filter-sort" onclick="sortTable('report-table',0)">
                                <span>Monthly</span>
                            </div>
                            <div class="dropdown-filter-sort" onclick="sortTable('report-table',0)">
                                <span>Yearly</span>
                            </div>
                            <div class="dropdown-filter-sort" onclick="sortTable('report-table',0)">
                                <span>Custom</span>
                            </div>
                        </div>
                    </div></th>

</div>      


    <div class="table-container">
    <table id="report-table">
        <thead>
          <tr>
            <th>Gross Sales</th>
            <th>Discounts</th>
            <th>Returns</th>
            <th>Net Sales</th>
            <th>Total Sales</th>
        </tr>
     </thead>
        
            <tr>
                <td>LKR 200,000</td>
                <td>LKR 25,000</td>
                <td>LKR 10,000</td>
                <td>LKR 165,000</td>
                <td>LKR 165,000</td>     
             </tr>
             <tr>
                <td>LKR 300,000</td>
                <td>LKR 15,000</td>
                <td>LKR 5,000</td>
                <td>LKR 270,000</td>
                <td>LKR 270,000</td>     
             </tr>
             <tr>
                <td>LKR 100,000</td>
                <td>LKR 15,000</td>
                <td>LKR 15,000</td>
                <td>LKR 70,000</td>
                <td>LKR 70,000</td>     
             </tr>
    </table>
</div>
</div>




<div class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col-1">
                        <img src="/public/images/logo-white.png">
                        <div class="social-icons">
                            <a href="#"><i class="fa fa-facebook-square footer-icon"></i></a>
                            <a href="#"><i class="fa fa-twitter-square footer-icon"></i></a>
                            <a href="#"><i class="fa fa-google-plus-square footer-icon"></i></a>
                            <a href="#"><i class="fa fa-instagram footer-icon"></i></a>
                        </div>
                        
                    </div>
           
                </div>
                <hr>
                <div class="row">
                    <div class="col-2">
                        <p class="copyright">© 2020. All Rights Reserved.</p>
                    </div>
                    <div class="col-2">
                        <div class="payment-icons">
                            <i class="fa fa-lock footer-icon"></i>
                            <i class="fa fa-cc-visa footer-icon"></i>
                            <i class="fa fa-cc-mastercard footer-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    
 <?php require 'public/js/nav_menu.js'; ?>   

</body>



<script type="text/javascript" src="/public/js/preloader.js"></script>
<script type="text/javascript" src="/public/js/table_filter.js"></script>
<link rel="stylesheet" type="text/css" href="public/css/filter_dropdown.css">




<!-- 

<span>Date Range: </span><select name="per-page" id="per-page">
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
                <option value="monthly">Monthly</option>
                <option value="yearly">Yearly</option>         
        </select> -->