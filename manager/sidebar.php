  
 <div id="cm-menu">
            <nav class="cm-navbar cm-navbar-primary">
                <div class="cm-flex"><a href="index.php?daily_sales" class="cm-logo"></a></div>
                <div class="btn btn-primary md-menu-white" data-toggle="cm-menu"></div>
            </nav>
            <div id="cm-menu-content">
                <div id="cm-menu-items-wrapper">
                    <div id="cm-menu-scroller">
                        <ul class="cm-menu-items">

                            <li title="Total Daily Sales"><a href="index.php?daily_sales" class="sf-monitor">Branch Daily Sales</a></li>
                            <li><a href="index.php?all_products" class="sf-database">View All Products</a></li>
                            <li><a href="index.php?add_product" class="sf-sign-add">Add Product</a></li>
                            <li><a href="index.php?manage_product" class="sf-cogs">Manage Product</a></li>
                            <li title="Add Category"><a href="index.php?add_category" class="sf-layers">Add Category</a></li>
                            <li title="Manage Category"><a href="index.php?manage_category" class="sf-wrench-screwdriver">Manage Category</a></li>
                            <li title="Add a new user"><a href="index.php?add_user" class="sf-profile-group">Add User</a></li>
                            <li title="Manage user"><a href="index.php?manage_user" class="sf-wrench">Manage User</a></li>
                            <li title="Request for products"><a href="index.php?request_product" class="sf-phone">Request Product</a></li>
                            <li title="View All Requests Made To Other Branches"><a href="index.php?all_requests" class="sf-file-text">View All Requests</a></li>
                            <li title="Approve products"><a href="index.php?transfer_in" class="sf-thumb-up">Approve Transfer-In</a></li>
                            <li title="Transfer products to other branches"><a href="index.php?transfer_out" class="sf-gift">Transfer Product-Out</a></li>
                            <li title="Transfers made to other branches"><a href="index.php?all_transfers" class="sf-file-note">View All Transfers</a></li>
                            <li title="View Product Request"><a href="index.php?product_requests" class="sf-bullhorn">Product Requests</a></li>
                            
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






       