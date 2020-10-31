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
                        <option value="delivery_staff">Delivery</option>
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
            <th >User Type<i onclick="showFilters('user-table',0,'dropdown-filter-1','checkbox-1','checkbox-all-1')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i><div class="dropdown-filter-dropdown" id="dropdown-filter-1" style="display:none;">
                <div class="dropdown-filter-content">
                    <div class="close-icon">
                        <span style="float: left;">Filters:</span>
                        <i class="fa fa-close" onclick="closeFilter('dropdown-filter-1')"></i>
                    </div>
                    <div class="dropdown-filter-sort" onclick="sortTable('user-table',0,'asc')">
                        <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                    </div>
                    <div class="dropdown-filter-sort" onclick="sortTable('user-table',0,'desc')">
                        <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                    </div>
                    <div class="dropdown-filter-search table-search">
                        <input type="text" id="dropdown-keyword-input-1" onkeyup="filterByDropdownKeyword('user-table',0,'dropdown-keyword-input-1')" placeholder="Filter by keyword..">
                    </div>
                    <div class="checkbox-container">
                        <input class="select-all" type="checkbox" id="checkbox-all-1" onchange="checkAll('user-table','checkbox-all-1')" checked="true"><span>Select All</span>
                        <div id="checkbox-1">
                        </div>
                        <i class="fas fa-eraser"></i><a onclick="clearFilters('user-table','checkbox-all-1')"> Clear Filters</a>
                    </div>
                </div>
            </div></th>
            
            <th >User Status<i onclick="showFilters('user-table',1,'dropdown-filter-2','checkbox-2','checkbox-all-2')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
            <div class="dropdown-filter-dropdown" id="dropdown-filter-2" style="display:none;">
                <div class="dropdown-filter-content">
                    <div class="close-icon">
                        <span style="float: left;">Filters:</span>
                        <i class="fa fa-close" onclick="closeFilter('dropdown-filter-2')"></i>
                    </div>
                    <div class="dropdown-filter-sort" onclick="sortTable('user-table',1,'asc')">
                        <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                    </div>
                    <div class="dropdown-filter-sort" onclick="sortTable('user-table',1,'desc')">
                        <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                    </div>
                    <div class="dropdown-filter-search table-search">
                        <input type="text" id="dropdown-keyword-input-2" onkeyup="filterByDropdownKeyword('user-table',1,'dropdown-keyword-input-2')" placeholder="Filter by keyword..">
                    </div>
                    <div class="checkbox-container">
                        <input class="select-all" type="checkbox" id="checkbox-all-2" onchange="checkAll('user-table','checkbox-all-2')" checked="true"><span>Select All</span>
                        <div id="checkbox-2">
                        </div>
                        <i class="fas fa-eraser"></i><a onclick="clearFilters('user-table','checkbox-all-2')"> Clear Filters</a>
                    </div>
                </div>
            </div></th>
            <th >First Name<i onclick="showFilters('user-table',2,'dropdown-filter-3','checkbox-3','checkbox-all-3')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
            <div class="dropdown-filter-dropdown" id="dropdown-filter-3" style="display:none;">
                <div class="dropdown-filter-content">
                    <div class="close-icon">
                        <span style="float: left;">Filters:</span>
                        <i class="fa fa-close" onclick="closeFilter('dropdown-filter-3')"></i>
                    </div>
                    <div class="dropdown-filter-sort" onclick="sortTable('user-table',2,'asc')">
                        <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                    </div>
                    <div class="dropdown-filter-sort" onclick="sortTable('user-table',2,'desc')">
                        <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                    </div>
                    <div class="dropdown-filter-search table-search">
                        <input type="text" id="dropdown-keyword-input-3" onkeyup="filterByDropdownKeyword('user-table',2,'dropdown-keyword-input-3')" placeholder="Filter by keyword..">
                    </div>
                    <div class="checkbox-container">
                        <input class="select-all" type="checkbox" id="checkbox-all-3" onchange="checkAll('user-table','checkbox-all-3')" checked="true"><span>Select All</span>
                        <div id="checkbox-3">
                        </div>
                        <i class="fas fa-eraser"></i><a onclick="clearFilters('user-table','checkbox-all-3')"> Clear Filters</a>
                    </div>
                </div>
            </div></th>
            <th >Last Name<i onclick="showFilters('user-table',3,'dropdown-filter-4','checkbox-4','checkbox-all-4')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
            <div class="dropdown-filter-dropdown" id="dropdown-filter-4" style="display:none;">
                <div class="dropdown-filter-content">
                    <div class="close-icon">
                        <span style="float: left;">Filters:</span>
                        <i class="fa fa-close" onclick="closeFilter('dropdown-filter-4')"></i>
                    </div>
                    <div class="dropdown-filter-sort" onclick="sortTable('user-table',3,'asc')">
                        <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                    </div>
                    <div class="dropdown-filter-sort" onclick="sortTable('user-table',3,'desc')">
                        <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                    </div>
                    <div class="dropdown-filter-search table-search">
                        <input type="text" id="dropdown-keyword-input-4" onkeyup="filterByDropdownKeyword('user-table',3,'dropdown-keyword-input-4')" placeholder="Filter by keyword..">
                    </div>
                    <div class="checkbox-container">
                        <input class="select-all" type="checkbox" id="checkbox-all-4" onchange="checkAll('user-table','checkbox-all-4')" checked="true"><span>Select All</span>
                        <div id="checkbox-4">
                        </div>
                        <i class="fas fa-eraser"></i><a onclick="clearFilters('user-table','checkbox-all-4')"> Clear Filters</a>
                    </div>
                </div>
            </div></th>
            <th >Gender<i onclick="showFilters('user-table',4,'dropdown-filter-5','checkbox-5','checkbox-all-5')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
            <div class="dropdown-filter-dropdown" id="dropdown-filter-5" style="display:none;">
                <div class="dropdown-filter-content">
                    <div class="close-icon">
                        <span style="float: left;">Filters:</span>
                        <i class="fa fa-close" onclick="closeFilter('dropdown-filter-5')"></i>
                    </div>
                    <div class="dropdown-filter-sort" onclick="sortTable('user-table',4,'asc')">
                        <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                    </div>
                    <div class="dropdown-filter-sort" onclick="sortTable('user-table',4,'desc')">
                        <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                    </div>
                    <div class="dropdown-filter-search table-search">
                        <input type="text" id="dropdown-keyword-input-5" onkeyup="filterByDropdownKeyword('user-table',4,'dropdown-keyword-input-5')" placeholder="Filter by keyword..">
                    </div>
                    <div class="checkbox-container">
                        <input class="select-all" type="checkbox" id="checkbox-all-5" onchange="checkAll('user-table','checkbox-all-5')" checked="true"><span>Select All</span>
                        <div id="checkbox-5">
                        </div>
                        <i class="fas fa-eraser"></i><a onclick="clearFilters('user-table','checkbox-all-5')"> Clear Filters</a>
                    </div>
                </div>
            </div></th>
            <th >Contact No.<i onclick="showFilters('user-table',5,'dropdown-filter-6','checkbox-6','checkbox-all-6')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
            <div class="dropdown-filter-dropdown" id="dropdown-filter-6" style="display:none;">
                <div class="dropdown-filter-content">
                    <div class="close-icon">
                        <span style="float: left;">Filters:</span>
                        <i class="fa fa-close" onclick="closeFilter('dropdown-filter-6')"></i>
                    </div>
                    <div class="dropdown-filter-sort" onclick="sortTable('user-table',5,'asc')">
                        <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                    </div>
                    <div class="dropdown-filter-sort" onclick="sortTable('user-table',5,'desc')">
                        <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                    </div>
                    <div class="dropdown-filter-search table-search">
                        <input type="text" id="dropdown-keyword-input-6" onkeyup="filterByDropdownKeyword('user-table',5,'dropdown-keyword-input-6')" placeholder="Filter by keyword..">
                    </div>
                    <div class="checkbox-container">
                        <input class="select-all" type="checkbox" id="checkbox-all-6" onchange="checkAll('user-table','checkbox-all-6')" checked="true"><span>Select All</span>
                        <div id="checkbox-6">
                        </div>
                        <i class="fas fa-eraser"></i><a onclick="clearFilters('user-table','checkbox-all-6')"> Clear Filters</a>
                    </div>
                </div>
            </div></th>
            <th id="heading-7">Email<i onclick="showFilters('user-table',6,'dropdown-filter-7','checkbox-7','checkbox-all-7')" class="fa fa-filter" aria-hidden="true" style="font-size: 13px; margin: 5px 0 0 5px;"></i>
            <div class="dropdown-filter-dropdown" id="dropdown-filter-7" style="display:none;">
                <div class="dropdown-filter-content">
                    <div class="close-icon">
                        <span style="float: left;">Filters:</span>
                        <i class="fa fa-close" onclick="closeFilter('dropdown-filter-7')"></i>
                    </div>
                    <div class="dropdown-filter-sort" onclick="sortTable('user-table',6,'asc')">
                        <i class="fas fa-sort-alpha-up"></i><span>Sort A to Z</span>
                    </div>
                    <div class="dropdown-filter-sort" onclick="sortTable('user-table',6,'desc')">
                        <i class="fas fa-sort-alpha-down-alt"></i><span>Sort Z to A</span>
                    </div>
                    <div class="dropdown-filter-search table-search">
                        <input type="text" id="dropdown-keyword-input-7" onkeyup="filterByDropdownKeyword('user-table',6,'dropdown-keyword-input-7')" placeholder="Filter by keyword..">
                    </div>
                    <div class="checkbox-container">
                        <input class="select-all" type="checkbox" id="checkbox-all-7" onchange="checkAll('user-table','checkbox-all-7')" checked="true"><span>Select All</span>
                        <div id="checkbox-7">
                        </div>
                        <i class="fas fa-eraser"></i><a onclick="clearFilters('user-table','checkbox-all-7')"> Clear Filters</a>
                    </div>
                </div>
            </div></th>
            <th>Options</th>
        </tr>
        <tbody id="table-body">
            
        
        <?php foreach ($this->userList as $user): ?>
            <tr><?php if($user['is_deleted']=='yes'){continue;}?>
                <td><?php echo $user['user_type']; ?></td>
                    <td><?php echo $user['user_status']; ?></td>
                    <td><?php echo $user['first_name']; ?></td>
                    <td><?php echo $user['last_name']; ?></td>
                    <td><?php echo $user['gender']; ?></td>
                    <td><?php echo $user['contact_no']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><a href="<?php echo URL ?>user/edit/<?php echo $user['user_id'].'/'.$user['user_type']; ?>"><button class="table-btn btn-blue">Edit</button></a>
                    <a href="<?php echo URL ?>user/delete/<?php echo $user['user_id'] ?>"><button class="table-btn btn-red">Delete</button></a></td>
            
            </tr>

        <?php endforeach;?>
        </tbody>
    </table>
    </div>
</div>

<script>
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
