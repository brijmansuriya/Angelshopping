<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Angel Shopping - Admin Dashboard</title>
        <!-- Custom fonts for this template-->
        <link href="/admin/asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="/admin/asset/css/sb-admin-2.min.css" rel="stylesheet">
    </head>
    <div style="background: #050505;text-align: end;font-size: 20px;font-family: auto;">
        <a style="color: white">{{ Session::get('admin_email') }}</a>
    </div>
    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href='admindashboard'>
                    <div>
                    <div class="sidebar-brand-text mx-3">Angel Shopping</div>
                    </div>
                </a>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href='admindashboard'>
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>   
                    </a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                 <div class="sidebar-heading">
                    Pages
                </div>
                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="manage_brand">
                        <i class="fas fa-fw fa-plus"></i>
                        <span>Manage Brand</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_category">
                        <i class="fas fa-fw fa-plus"></i>
                        <span>Manage Category</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_sub_category">
                        <i class="fas fa-fw fa-plus"></i>
                        <span>Manage Sub Category</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_product">
                        <i class="fas fa-fw fa-plus"></i>
                        <span>Manage Product</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_order">
                        <i class="fas fa-fw fa-plus"></i>
                        <span>Manage Order</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_user">
                        <i class="fas fa-fw fa-plus"></i>
                        <span>Manage User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="customer_review">
                        <i class="fas fa-fw fa-plus"></i>
                        <span>Customer Review</span>
                    </a>
                </li>
                <!-- Divider -->            
                
                <hr class="sidebar-divider d-none d-md-block">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Logout
                </div>
                <!-- Nav Item - Logout -->
                <li class="nav-item">
                    <a class="nav-link" href="logout">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                        <span>Logout</span>
                    </a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <!-- Sidebar Toggler (Sidebar) -->
                
            </ul>
            <!-- End of Sidebar -->
        
            <!-- Content Wrapper -->
            <div class="container">
                @section('content')
                @show
            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Bootstrap core JavaScript-->
        <script src="/admin/asset/vendor/jquery/jquery.min.js"></script>
        <script src="/admin/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="/admin/asset/vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="/admin/asset/js/sb-admin-2.min.js"></script>
        <!-- Page level plugins -->
        <script src="/admin/asset/vendor/chart.js/Chart.min.js"></script>
        <!-- Page level custom scripts -->
        <script src="/admin/asset/js/demo/chart-area-demo.js"></script>
        <script src="/admin/asset/js/demo/chart-pie-demo.js"></script>
      
        @section('jsscript')
        @show
    </body>
</html>