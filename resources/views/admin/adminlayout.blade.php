<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Angel Shopping</title>

        <!-- Bootstrap Core CSS -->
        <link href="/admin/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="/admin/css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="/admin/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="/admin/css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="/admin/css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">Angel Shopping</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                
                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown navbar-inverse">                                        
                          
                            <li class="divider"></li>
                            <a href="logout"><li><i class="fa fa-sign-out fa-fw"> </i>Logout</a>
                            </li>
                        </ul>
                   
                </ul>
                <!-- /.navbar-top-links -->
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                           
                            <li>
                                <a href="/admin/admindashboard" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="/admin/manage_brand" class="active"><i class="fa fa-dashboard fa-fw"></i>Add  Brand</a>
                            </li>
                            <li>
                                <a href="/admin/manage_category"><i class="fa fa-table fa-fw"></i>Add Category</a>
                            </li>
                            <li>
                                <a href="/admin/manage_sub_category"><i class="fa fa-edit fa-fw"></i>Add Subcategory</a>
                            </li>
                            <li>
                                <a href="/admin/manage_product"><i class="fa fa-edit fa-fw"></i> Add Product</a>
                            </li>
                          
                            <li>
                                <a href="/admin/manage_user"><i class="fa fa-edit fa-fw"></i> Manage User</a>
                            </li>
                          
                           
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')
            
    </body>
</html>
