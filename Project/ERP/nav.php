<div class="sidebar" data-background-color="white" data-active-color="danger">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    ERP - Sales Module
                </a>
            </div>
            <ul class="nav">
                <li <?php echo $page_name == "Dashboard" ? 'class="active"':''; ?> >
                    <a href="index.php">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li <?php echo $page_name == "Customer" ? 'class="active"':''; ?>>
                    <a href="#">
                        <i class="ti-user"></i>
                        <p>Customer</p>
                    </a>
                </li>
                <li <?php echo $page_name == "Product" ? 'class="active"':''; ?>>
                    <a href="#">
                        <i class="ti-tag"></i>
                        <p>Product</p>
                    </a>
                </li>
                <li <?php echo $page_name == "Sales" ? 'class="active"':''; ?>>
                    <a href="sales.php">
                        <i class="ti-money"></i>
                        <p>Sales</p>
                    </a>
                </li>
                <li <?php echo $page_name == "Delivery" ? 'class="active"':''; ?>>
                    <a href="#">
                        <i class="ti-truck"></i>
                        <p>Delivery & Invoicing</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?php echo $page_name; ?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-settings"></i>
                                    <p>Settings</p>
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#"><i class="ti-shift-right"></i> Logout</a></li>
                              </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>