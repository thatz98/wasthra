<?php require 'views/header_dashboard.php'; ?>

<link rel="stylesheet" type="text/css" href="<?php echo URL?>public/css/filter_dropdown.css">

<div class="container">
    <div class="row">
        <h2>Users</h2>
    </div>
    <div class="" >
        <button class="btn btn-square" onclick="formToggle()">+ Add New User</button>
        <form action="<?php echo URL; ?>user/create" id="addFrom" class="hidden-form" method="post">
            <div class="row-top">
                <div class="col-3 pad-30-0-0-85">
                    <label>First Name</label><br>
                    <input type="text" name="first_name" data-helper="First Name" onfocusout="validateFirstName()" id="first_name">
                    <div class="helper-text"><span></span></div>
                    <label>Mobile Number</label><br>
                    <input type="text" name="contact_no" data-helper="Mobile No." placeholder="07XXXXXXXX" onfocusout="validateContactNo()" id="contact_no">
                    <div class="helper-text"><span></span></div>
                    <label>Password : </label><br>
                    <input type="password" name="password" data-helper="Password" onfocusout="validatePassword()" id="password"><div class="helper-text"><span></span></div>
                </div>
                <div class="col-3 pad-30-0-0-85">
                    <label>Last Name</label><br>
                    <input type="text" name="last_name" data-helper="Last Name" onfocusout="validateLastName()" id="last_name">
                    <div class="helper-text"><span></span></div>
                    <label>Email</label><br>
                    <input type="email" name="email" data-helper="Email" onfocusout="validateEmail()" id="email">
                    <div class="helper-text"><span></span></div>
                    <label>Confirm Password</label><br>
                    <input type="password" name="conf_password" onfocusout="validateConfirmPassword()" id="conf_password">
                    <div class="helper-text"><span></span></div>
                </div>
                <div class="col-3 pad-30-0-0-85">
                    <label>NIC</label><br>
                    <input type="text" name="nic" data-helper="NIC" onfocusout="validateNIC()" id="nic">
                    <div class="helper-text"><span></span></div>
                    <label>Gender</label><br>
                    <select name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <div class="helper-text"><span></span></div>
                    <label>User Type : </label><br>
                    <select name="user_type">
                        <option value="admin">Admin</option>
                        <option value="owner">Owner</option>
                        <option value="delivery">Delivery</option>
                    </select>
                    <div class="helper-text"><span></span></div>
                </div>
            </div>
            <div class="center-btn">
                <button type="submit" class="btn">Add New User</button>
            </div>
        </form>
    </div>
    <div class="table-search">
        <input type="text" id="keyword-input" style="width: 300px;" onkeyup="filterByKeyword('user-table',7)" placeholder="Search & filter entire table by keyword..">
    </div>
        
    <div class="table-container">
    <table id="user-table">
        <tr>
            <th onclick="showFilters('user-table',0,'dropdown-filter-0','checkbox-0')">NIC<i class="fa fa-filter" aria-hidden="true" style="float: right; font-size: 14px; margin-top: 5px;"></i></th>
            <div class="dropdown-filter-dropdown" id="dropdown-filter-0" style="display:none;">
                <div class="dropdown-filter-content">
                    <div class="close-icon">
                        <span style="float: left;">Filters:</span>
                        <i class="fa fa-close" onclick="closeFilter('dropdown-filter-0')"></i>
                    </div>
                    <div class="dropdown-filter-sort" onclick="sortTable('user-table',0,'asc')">
                        <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                    </div>
                    <div class="dropdown-filter-sort" onclick="sortTable('user-table',0,'desc')">
                        <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                    </div>
                    <div class="dropdown-filter-search table-search">
                        <input type="text" id="dropdown-keyword-input-0" onkeyup="filterByDropdownKeyword('user-table',0,'dropdown-keyword-input-0')" placeholder="Filter by keyword..">
                    </div>
                    <div class="checkbox-container">
                        <input class="select-all" type="checkbox" id="checkbox-all" onchange="checkAll('user-table')" checked="true"><span>Select All</span>
                        <div id="checkbox-0">
                        </div>
                        <i class="fas fa-eraser"></i><a onclick="clearFilters('user-table')"> Clear Filters</a>
                    </div>
                </div>
            </div>
            <th onclick="showFilters('user-table',1,'dropdown-filter-1','checkbox-1')">NIC<i class="fa fa-filter" aria-hidden="true" style="float: right; font-size: 14px; margin-top: 5px;"></i></th>
            <div class="dropdown-filter-dropdown" id="dropdown-filter-1" style="display:none;">
                <div class="dropdown-filter-content">
                    <div class="close-icon">
                        <span style="float: left;">Filters:</span>
                        <i class="fa fa-close" onclick="closeFilter('dropdown-filter-1')"></i>
                    </div>
                    <div class="dropdown-filter-sort" onclick="sortTable('user-table',1,'asc')">
                        <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                    </div>
                    <div class="dropdown-filter-sort" onclick="sortTable('user-table',1,'desc')">
                        <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                    </div>
                    <div class="dropdown-filter-search table-search">
                        <input type="text" id="dropdown-keyword-input-1" onkeyup="filterByDropdownKeyword('user-table',1,'dropdown-keyword-input-1')" placeholder="Filter by keyword..">
                    </div>
                    <div class="checkbox-container">
                        <input class="select-all" type="checkbox" id="checkbox-all" onchange="checkAll('user-table')" checked="true"><span>Select All</span>
                        <div id="checkbox-1">
                        </div>
                        <i class="fas fa-eraser"></i><a onclick="clearFilters('user-table')"> Clear Filters</a>
                    </div>
                </div>
            </div>
            <th onclick="sortTable('user-table',2)">User Status</th>
            <th onclick="sortTable('user-table',3)">First Name</th>
            <th onclick="sortTable('user-table',4)">Last Name</th>
            <th onclick="sortTable('user-table',5)">Gender</th>
            <th onclick="sortTable('user-table',6)">Contact No.</th>
            <th onclick="sortTable('user-table',7)">Email</th>
            <th onclick="sortTable('user-table',8)">Address</th>
            <th onclick="sortTable('user-table',9)">City</th>
            <th onclick="sortTable('user-table',10)">Postal Code</th>
            <th>Options</th>
        </tr>
        <tbody id="table-body">
            
        
        <?php foreach ($this->userList as $user): ?>
            <tr>
                <td><?php echo $user['nic']; ?></td>
                <td><?php echo $user['user_type']; ?></td>
                    <td><?php echo $user['user_status']; ?></td>
                    <td><?php echo $user['first_name']; ?></td>
                    <td><?php echo $user['last_name']; ?></td>
                    <td><?php echo $user['gender']; ?></td>
                    <td><?php echo $user['contact_no']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="<?php echo URL ?>user/edit/<?php echo $user['nic'] ?>"><button class="table-btn btn-blue">Edit</button></a>
                    <a href="<?php echo URL ?>user/delete/<?php echo $user['nic'] ?>"><button class="table-btn btn-red">Delete</button></a></td>
            
            </tr>

        <?php endforeach;?>
        </tbody>
    </table>
    </div>
</div>

<script>
      //  var addFrom = document.getElementByClassName("dash-form-container");
        var addFrom = document.getElementById("addFrom");
        addFrom.style.maxHeight = "0px";
        addFrom.style.overflow = "0px";

        function formToggle(){
if(addFrom.style.maxHeight == "0px"){
    addFrom.style.maxHeight = "none";
} else{
    addFrom.style.maxHeight = "0px";
}
        }
    </script>


<script type="text/javascript" src="<?php echo URL ?>public/js/table_filter.js"></script>
<script type="text/javascript" src="<?php echo URL ?>public/js/sort_table.js"></script>
<script type="text/javascript" src="<?php echo URL ?>public/js/form_validation.js"></script>
<script type="text/javascript" src="<?php echo URL ?>util/form/user_form_validation.js"></script>

<?php require 'views/footer_dashboard.php'; ?>
