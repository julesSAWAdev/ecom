<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle" src="img/profile_small.jpg"/>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold"><?php echo  $_SESSION["name"];?></span>
                                <span class="text-muted text-xs block"><?php echo  $_SESSION["role"];?><b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="dropdown-item" href="profile.html">Profile</a></li> 
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="login.html">Logout</a></li>
                            </ul>
                        </div>
                         
                    </li>
                    <?php 
                    $role = $_SESSION["role"];
                        if ($role == 'admin') {
                        echo "<li class='active'>
                            <a href='dashboard'><i class='fa fa-th-large'></i> <span class='nav-label'>Dashboard</span></a>
                            </li>";
                        echo "<li>
                                <a href='#'><i class='fa fa-user'></i> <span class='nav-label'>User management</span> <span class='fa arrow'></span></a>
                                <ul class='nav nav-second-level'>
                                <li class='active'><a href='users'>Users</a></li>
                                <li><a href='dashboard_2.html'>Roles management</a></li> 
                                </ul>
                                </li>";
                        echo "<li class=''>
                            <a href='#'><i class='fa fa-building-o'></i> <span class='nav-label'>Departments</span></a>
                            </li>";
                        echo "<li class=''>
                            <a href='#'><i class='fa fa-industry'></i> <span class='nav-label'>Suppliers</span></a>
                            </li>";
                        echo "<li>
                                <a href='#'><i class='fa fa-bar-chart-o'></i> <span class='nav-label'>Store management</span> <span class='fa arrow'></span></a>
                                <ul class='nav nav-second-level'>
                                <li class='active'><a href='index-2.html'>Products</a></li>
                                <li><a href='dashboard_2.html'>Product categories</a></li> 
                                <li><a href='dashboard_2.html'>Product Requisition</a></li>
                                </ul>
                                </li>";
                         } 
                         if ($role == 'Waiter') {
                         
                        echo "<li class='active'>
                                <a href='#'><i class='fa fa-bar-chart-o'></i> <span class='nav-label'>Orders</span> <span class='fa arrow'></span></a>
                                <ul class='nav nav-second-level'>
                                <li class='active'><a href='neworder'>New order</a></li>
                                <li><a href='myorders'>My orders</a></li>  
                                </ul>
                                </li>
                                <li><a href='buffet'>Buffet</a></li>  
                                </ul>
                                </li>";
                         } 
                         if ($role == 'Barman') {
                         
                        echo "<li class='active'>
                                <a href='#'><i class='fa fa-bar-chart-o'></i> <span class='nav-label'>Orders</span> <span class='fa arrow'></span></a>
                                <ul class='nav nav-second-level'>
                                <li class='active'><a href='neworder'>New order</a></li>
                                <li><a href='myorders'>My orders</a></li>  
                                </ul>
                                </li>";
                         echo "<li class=''>
                                <a href='#'><i class='fa fa-bar-chart-o'></i> <span class='nav-label'>Requisition</span> <span class='fa arrow'></span></a>
                                <ul class='nav nav-second-level'>
                                <li class='active'><a href='myrequisition'>All Requisitions</a></li>
                                <li><a href='requisition'>New Requisitions</a></li>  
                                </ul>
                                </li>";
                         } 
                    ?>
                   
                </ul>

            </div>
        </nav>