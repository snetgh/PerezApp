   

 <div id="cm-menu">
            <nav class="cm-navbar cm-navbar-primary">
                <div class="cm-flex"><a href="index.php?cr_branch" class="cm-logo"></a></div>
                <div class="btn btn-primary md-menu-white" data-toggle="cm-menu"></div>
            </nav>
            <div id="cm-menu-content">
                <div id="cm-menu-items-wrapper">
                    <div id="cm-menu-scroller">
                        <ul class="cm-menu-items">

                            <li><a href="index.php?cr_branch" class="sf-building">Create Branch</a></li>
                            <li><a href="index.php?add_user" class="sf-profile-group">Add User</a></li>
                            <li><a href="index.php?manage_user" class="sf-wrench-screwdriver">Manage User</a></li>
                            <li><a href="index.php?view_all" class="sf-notepad">View All Users</a></li>
                            <li><a href="index.php?view_request" class="sf-phone">View Requests</a></li>
                            <li><a href="index.php?view_transfer" class="sf-gift">View Transfers</a></li>
                            <li><a href="index.php?view_sales" class="sf-money">View Sales</a></li>
                            <li><a href="index.php?view_inventory" class="sf-monitor">View Inventory</a></li>

                            <li><a href="index.php?change_pass" class="sf-sign-sync">Change Password</a></li>
                            <li><a href="../login.php" class="sf-lock">Logout</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <header id="cm-header">
            <nav class="cm-navbar cm-navbar-primary">
                <div class="btn btn-primary md-menu-white hidden-md hidden-lg" data-toggle="cm-menu"></div>
                <div class="cm-flex">
                    <h1>Home</h1> 
                    <form id="cm-search" action="index.html" method="get">
                        <input type="search" name="q" autocomplete="off" placeholder="Search...">
                    </form>
                </div>
                <div class="pull-right">
                    <div id="cm-search-btn" class="btn btn-primary md-search-white" data-toggle="cm-search"></div>
                </div>
                <div class="dropdown pull-right">
                    <button class="btn btn-primary md-account-circle-white" data-toggle="dropdown"></button>
                    <ul class="dropdown-menu">
                        <li class="disabled text-center">
                            <a style="cursor:default;"><strong><?php echo $_COOKIE['n']; ?></strong></a>
                        </li>
                        
                    </ul>
                </div>
            </nav>

        
        </header>
        <br><br> 





       