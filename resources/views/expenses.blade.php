<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Hyunglere">
    <title>Expense Manager | Landing page</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/default-dark.css') }}" id="theme" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class=" logo-center fix-header card-no-border">
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<div id="main-wrapper">
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">
                    <!-- Logo icon -->
                    <b>
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                        <!-- Light Logo icon -->
                        <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span>
                         <!-- dark Logo text -->
                         <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                        <!-- Light Logo text -->
                         <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav mr-auto mt-md-0 ">
                    <!-- This is  -->
                    <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="icon-arrow-left-circle"></i></a> </li>
                    <!-- ============================================================== -->
                </ul>
                <ul class="navbar-nav my-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-user"></i></a>
                        <div class="dropdown-menu dropdown-menu-right animated flipInY">
                            <ul class="dropdown-user">
                                <li>
                                    <div class="dw-user-box">
                                        <div class="u-img"><i class="ti-user"></i></div>
                                        <div class="u-text">
                                            <h4>{{ Auth::user()->name }}</h4>
                                            <p class="text-muted">{{ Auth::user()->email }}</p>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper" style="min-height: 600px;">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-6 col-8 align-self-center">
                    <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> Home</li>
                        <li class="breadcrumb-item active">Expenses</li>
                    </ol>
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->

            @if($errors->has('date'))
            <div class="row">
                <p class="alert alert-danger">{{ $errors->first('date') }}</p>
            </div>
            @endif

            @if($errors->has('value'))
                <div class="row">
                    <p class="alert alert-danger">{{ $errors->first('value') }}</p>
                </div>
            @endif

            @if($errors->has('reason'))
                <div class="row">
                    <p class="alert alert-danger">{{ $errors->first('reason') }}</p>
                </div>
            @endif

            @if(session()->has('message'))
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                        <p class="text-center text-success alert alert-success">{{ session('message') }} </p>

                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#exModal"><i class="fa fa-plus-circle"></i> Add Expense</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Expenses</h4>
                            <div class="table-responsive m-t-40">
                                <table id="myTable" class="table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Value</th>
                                            <th>Reason</th>
                                            <th>VAT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($expenses as $exp)
                                            <tr>
                                                <td>{{ $exp->date }}</td>
                                                <td> &#163;{{ $exp->value }}</td>
                                                <td>{{ $exp->reason }}</td>
                                                <td>&#163;{{ ($exp->value) * 0.2 }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <div class="modal fade" id="exModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                <div class="modal-dialog" role="document">
                    <form class="form-material" action="{{ route('expense') }}" method="post">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel1">Add a new Expense</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exdate" class="control-label">Date of Expense:</label>
                                    <input type="date" name="date" required autofocus class="form-control" id="exdate">
                                </div>
                                <div class="form-group">
                                    <label for="exval" class="control-label">Value of Expense:</label>
                                    <input type="" pattern="^(\d.*)\.(\d.{0,2})([A-Za-z]{3})$" required class="form-control" id="exval">
                                    <span id="vat"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exval" class="control-label">Value in pounds(&#163;):</label>
                                    <input type="" readonly name="value" required class="form-control" id="exvalp">
                                    <span id="vat"></span>
                                </div>
                                <div class="form-group">
                                    <label for="expres" class="control-label">Reason for Expense:</label>
                                    <textarea class="form-control" id="expres" required name="reason"></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Expense</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ============================================================== -->
        </div>
        <footer class="footer text-center">
            © {{ date('Y') }} Expense Manager by HyUnG
        </footer>
    </div>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/waves.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script>

    var endpoint = 'latest';
    var access_key = 'e6c80c8072c09aa89c3b494cd40690c5';

    $(function () {
       $('#myTable').DataTable();

       $('#exval').keyup(function () {
           var $this = $(this)
           if($(this).val().slice(-3) === 'EUR' || $(this).val().slice(-3) === 'eur'){
               $('#vat').html("VAT: "+ $this.val().slice(0,-3) * 0.2);
           }else{
               $('#vat').html("VAT: "+ $this.val() * 0.2);
           }

       });
        $('#exval').on('change', function(){
            if($(this).val().slice(-3) === 'EUR' || $(this).val().slice(-3) === 'eur'){
                console.log('converting...');
                $(this).after('<p id="gbp">GBP: &#163;<i class="fa fa-spinner fa-spin"></i></p>')
                let fm = $(this).val();
                let amount = fm.slice(0,-3);
                console.log('http://data.fixer.io/api/'+endpoint+'?access_key=' + access_key);
                $.ajax({
                    url: 'http://data.fixer.io/api/'+endpoint+'?access_key=' + access_key,
                    dataType: 'jsonp',
                    success: function (json) {
                        let am =amount * json.rates.GBP
                        console.log(am);
                        $('#gbp').html('<p id="gbp">GBP: &#163; '+ am +'</p>')
                        $('#exvalp').val(am);
                    },
                });
            }

        });
    });
</script>
</body>

</html>

