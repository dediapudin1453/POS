<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=ucwords($title)?> | LB-POS</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/pace/pace.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-purple sidebar-mini <?=$this->uri->segment(1) == 'sale' ? 'sidebar-collapse' : null?>">

    <div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?=base_url()?>" class="logo">
            <span class="logo-mini">y<b>P</b></span>
            <span class="logo-lg">yuk<b>POS</b></span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">2</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 2 notifications</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-th-list"></i> 5 new items added today
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?=base_url()?>assets/dist/img/user1-128x128.jpg" class="user-image">
                            <span class="hidden-xs"><?=$this->fungsi->user_login()->username?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="<?=base_url()?>assets/dist/img/user1-128x128.jpg">
                                <p>
                                    <?=$this->fungsi->user_login()->name?>
                                    <small><?=$this->fungsi->user_login()->address?></small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?=site_url('auth/logout')?>" class="btn btn-flat bg-red">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?=base_url()?>assets/dist/img/user1-128x128.jpg" class="img-circle">
                </div>
                <div class="pull-left info">
                    <p><?=ucfirst($this->fungsi->user_login()->username)?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form> -->
            <form method="get" class="sidebar-form" id="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search..." id="search-input">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN MENU</li>
                <li class="<?=$this->uri->segment(1) == 'dashboard' ? 'active' : null?>">
                    <a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>
                <li class="<?=$this->uri->segment(1) == 'supplier' ? 'active' : null?>">
                    <a href="<?=site_url('supplier')?>">
                        <i class="fa fa-truck"></i> <span>Suppliers</span>
                        <span class="pull-right-container">
                            <span class="label bg-purple pull-right"><?=$this->fungsi->count_supplier()?></span>
                        </span>
                    </a>
                </li>
                <li class="<?=$this->uri->segment(1) == 'customer' ? 'active' : null?>">
                    <a href="<?=site_url('customer')?>">
                        <i class="fa fa-users"></i> <span>Customers</span>
                        <span class="pull-right-container">
                            <span class="label bg-purple pull-right"><?=$this->fungsi->count_customer()?></span>
                        </span>
                    </a>
                </li>
                <li class="treeview <?=$this->uri->segment(1) == 'category'
                || $this->uri->segment(1) == 'unit' 
                || $this->uri->segment(1) == 'item' ? 'active' : null?>">
                    <a href="#">
                        <i class="fa fa-archive"></i> <span>Products</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?=$this->uri->segment(1) == 'category' ? 'active' : null?>">
                            <a href="<?=site_url('category')?>"><i class="fa fa-circle-o"></i> Categories</a>
                        </li>
                        <li class="<?=$this->uri->segment(1) == 'unit' ? 'active' : null?>">
                            <a href="<?=site_url('unit')?>"><i class="fa fa-circle-o"></i> Units</a>
                        </li>
                        <li class="<?=$this->uri->segment(1) == 'item' ? 'active' : null?>">
                            <a href="<?=site_url('item')?>"><i class="fa fa-circle-o text-green"></i> <b>Items</b></a>
                        </li>
                    </ul>
                </li>
                <li class="treeview <?=$this->uri->segment(1) == 'sale' 
                || $this->uri->segment(1) == 'stock' ? 'active' : null?>">
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i> <span>Transaction</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?=$this->uri->segment(1) == 'sale' ? 'active' : null?>">
                            <a href="<?=site_url('sale')?>"><i class="fa fa-circle-o text-green"></i> <b>Sales</b></a>
                        </li>
                        <li class="<?=($this->uri->segment(1) == 'stock' 
                        && $this->uri->segment(2) == 'in') ? 'active' : null?>">
                            <a href="<?=site_url('stock/in')?>"><i class="fa fa-circle-o text-green"></i> Stock In / Purchases</a>
                        </li>
                        <li class="<?=($this->uri->segment(1) == 'stock' 
                        && $this->uri->segment(2) == 'out') ? 'active' : null?>">
                            <a href="<?=site_url('stock/out')?>"><i class="fa fa-circle-o"></i> Stock Out</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-circle-o"></i> <span class="text-danger">Stock Opname</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-circle-o"></i> <span class="text-danger">Item Return</span></a>
                        </li>
                    </ul>
                </li>
                <li class="treeview <?=$this->uri->segment(1) == 'report' ? 'active' : null?>">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i> <span>Reports</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?=$this->uri->segment(1) == 'report' 
                        && $this->uri->segment(2) == 'sale' ? 'active' : null?>">
                            <a href="<?=site_url('report/sale')?>"><i class="fa fa-circle-o"></i> Sales</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-circle-o"></i> Stock In/Out</a>
                        </li>
                    </ul>
                </li>

                <li class="<?=$this->uri->segment(1) == 'franchise' ? 'active' : null?>">
                    <a href="<?=site_url('franchise')?>"><i class="fa fa-dashboard"></i> <span>Franchise</span></a>
                </li>

                <?php if($this->session->userdata('level') == 1) { ?>
                <li class="header">SETTINGS</li>
                <li class="<?=$this->uri->segment(1) == 'user' ? 'active' : null?>">
                    <a href="<?=site_url('user')?>"> <i class="fa fa-user">
                        </i> <span>Users / Employees</span>
                        <span class="pull-right-container">
                            <span class="label label-danger pull-right"><?=$this->fungsi->count_user()?></span>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#"> <i class="fa fa-gear"></i> <span>Configuration</span></a>
                </li>
                <?php } ?>
                
            </ul>
        </section>
    </aside>

    <script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?=$contents?>
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs"><b>Version</b> 0.1</div>
        <strong>Copyright &copy; <?=date('Y')?> - <a href="https://www.linggabuana.com/">Lingga Buana</a>.</strong> All rights reserved.
    </footer>

    </div>

    <script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/bower_components/PACE/pace.min.js"></script>
    <script src="<?=base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?=base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
    <script src="<?=base_url()?>assets/dist/js/demo.js"></script>

    <script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/bower_components/dataTables.checkboxes.js"></script>
    <script src="<?=base_url()?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="<?=base_url()?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
      // To make Pace works on Ajax calls
    $(document).ajaxStart(function () {
      Pace.restart()
    });
    <?php 
      if(isset($this->session->message)){ ?>
        alertify.set('notifier','position', 'top-right');
        alertify.success('<a style="color:white"><?= $this->session->message;?></a>');
    
    <?php } ?>
  </script>
    <script>
    $(document).ready(function() {
        $(document).ajaxStart(function() { Pace.restart() })

        $('#table1').DataTable()
    })
    </script>
    <?php (isset($code_js)?$this->load->view($code_js):""); ?>
</body>
</html>