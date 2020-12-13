<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Admin Login</title>
        <!-- Custom fonts for this template-->
        <link href="/admin/asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="/admin/asset/css/sb-admin-2.min.css" rel="stylesheet">
    </head>
    <body>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
        @endif
        <div class="container">
            <div class="row my-5 pt-5">
                <div class="col-md-4 border p-2 col-md-offset-4 m-auto">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Admin Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="{{ action('AdminLoginController@store') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <input class="form-control" type="email" placeholder="Email Address" name="email" />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-primary">Login</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

</body>
</html>