
  <div id="cm-menu">
            <nav class="cm-navbar cm-navbar-primary">
                <div class="cm-flex"><a href="index.php?approve" class="cm-logo"></a></div>
                <div class="btn btn-primary md-menu-white" data-toggle="cm-menu"></div>
            </nav>
            <div id="cm-menu-content">
                <div id="cm-menu-items-wrapper">
                    <div id="cm-menu-scroller">
                        <ul class="cm-menu-items">
                            <li title="Record New Arrivals"><a href="index.php?approve" class=" sf-handshake">Record Arrivals</a></li>
                            <li title="View Recorded Products"><a href="index.php?processed" class="sf-shield-ok">View Recorded</a></li>
                            <li title="Change Your Password"><a href="index.php?pass" class="sf-cloud-sync">Change Password</a></li>
                            <li title="End your session"><a href="../login.php" class="sf-lock">Logout</a></li>
                
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

        





       