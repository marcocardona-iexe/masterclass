<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quantum Able Bootstrap 4 Admin Dashboard Template</title>

    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="codedthemes">
    <meta name="keywords" content=", Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="codedthemes">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets//images/favicon.png" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url(); ?>assets//images/favicon.ico" type="image/x-icon">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">

    <!-- themify -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets//icon/themify-icons/themify-icons.css">

    <!-- iconfont -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets//icon/icofont/css/icofont.css">

    <!-- simple line icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets//icon/simple-line-icons/css/simple-line-icons.css">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets//plugins/bootstrap/css/bootstrap.min.css">

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets//css/main.css">

    <!-- Responsive.css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets//css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">


</head>
<style>
    #tbl_masterclass thead,
    #tbl_masterclass tbody {
        font-size: 12px;
    }
</style>

<body class="sidebar-mini fixed">
    <div class="wrapper">
        <div class="loader-bg">
            <div class="loader-bar">
            </div>
        </div>
        <!-- Navbar-->
        <header class="main-header-top hidden-print">
            <a href="index.html" class="logo"><img class="img-fluid able-logo" src="<?php echo base_url(); ?>assets//images/logo.png" alt="Theme-logo"></a>
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
                <!-- Navbar Right Menu-->
                <div class="navbar-custom-menu">
                    <ul class="top-nav">
                        <!-- User Menu-->
                        <li class="dropdown">
                            <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                                <span><img class="img-circle " src="<?php echo base_url(); ?>assets//images/avatar-1.png" style="width:40px;" alt="User Image"></span>
                                <span>Raul <b>Sandoval</b> <i class=" icofont icofont-simple-down"></i></span>

                            </a>
                            <ul class="dropdown-menu settings-menu">
                                <li><a href="#!"><i class="icon-settings"></i> Settings</a></li>
                                <li><a href="#"><i class="icon-user"></i> Profile</a></li>
                                <li><a href="#"><i class="icon-envelope-open"></i> My Messages</a></li>
                                <li class="p-0">
                                    <div class="dropdown-divider m-0"></div>
                                </li>
                                <li><a href="#"><i class="icon-lock"></i> Lock Screen</a></li>
                                <li><a href="login1.html"><i class="icon-logout"></i> Logout</a></li>

                            </ul>
                        </li>
                    </ul>

                </div>
            </nav>
        </header>
        <!-- Side-Nav-->
        <aside class="main-sidebar hidden-print ">
            <section class="sidebar" id="sidebar-scroll">
                <!-- Sidebar Menu-->
                <ul class="sidebar-menu">
                    <li class="nav-level">--- Masterclass</li>
                    <li class="treeview">
                        <a class="waves-effect waves-dark" href="index.html">
                            <i class="icon-speedometer"></i><span> Lista de Masterclass</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>

        <!-- Sidebar chat end-->
        <div class="content-wrapper">
            <!-- Container-fluid starts -->
            <div class="container-fluid">
                <!-- Row Starts -->
                <div class="row">
                    <div class="col-sm-12 p-0">
                        <div class="main-header">
                            <h4>Lista de Masterclass</h4>
                            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                <li class="breadcrumb-item"><a href="index.html"><i class="icofont icofont-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#!">Masterclass</a>
                                </li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Lista</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- Row end -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-block">
                                <div class="md-card-block">
                                    <div class="col-md-12 text-right" style="padding-bottom: 15px;">
                                        <button class="btn btn-success" onclick="window.location='<?php echo base_url(); ?>nueva-sesion'">Nueva</button>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-striped table-bordered table-hover table-sm" id="tbl_masterclass">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Título</th>
                                                    <th>Docente</th>
                                                    <th>Sala</th>
                                                    <th>Tipo</th>

                                                    <th>Fecha</th>
                                                    <th>Hora</th>
                                                    <th>Clave del moderador</th>
                                                    <th>Clave del alumno</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $a = 1;
                                                foreach ($masterclass as $m) { ?>
                                                    <tr>
                                                        <td><?php echo $a; ?></td>
                                                        <td><?php echo $m->titulo; ?></td>
                                                        <td><?php echo $m->docente; ?></td>
                                                        <td><?php echo $m->session; ?></td>
                                                        <td><?php echo $m->tipo; ?></td>

                                                        <td><?php echo $m->fecha; ?></td>
                                                        <td><?php echo $m->hora; ?></td>
                                                        <td><?php echo $m->codigo_docente; ?></td>
                                                        <td><?php echo $m->codigo_alumno; ?></td>
                                                        <td><?php echo ($m->status == 1) ? 'Activo' : 'Inactivo'; ?></td>
                                                        <th><i class="fa-solid fa-trash"></i></th>

                                                    </tr>
                                                <?php $a++;
                                                } ?>
                                                <!-- Puedes añadir más filas según sea necesario -->
                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid ends -->
        </div>
    </div>


    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="<?php echo base_url(); ?>assets//images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="<?php echo base_url(); ?>assets//images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="<?php echo base_url(); ?>assets//images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="<?php echo base_url(); ?>assets//images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="<?php echo base_url(); ?>assets//images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Jqurey -->
    <script src="<?php echo base_url(); ?>assets//plugins/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets//plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>assets//plugins/tether/dist/js/tether.min.js"></script>

    <!-- Required Fremwork -->
    <script src="<?php echo base_url(); ?>assets//plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- waves effects.js -->
    <script src="<?php echo base_url(); ?>assets//plugins/Waves/waves.min.js"></script>

    <!-- Scrollbar JS-->
    <script src="<?php echo base_url(); ?>assets//plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url(); ?>assets//plugins/jquery.nicescroll/jquery.nicescroll.min.js"></script>

    <!--classic JS-->
    <script src="<?php echo base_url(); ?>assets//plugins/classie/classie.js"></script>

    <!-- notification -->
    <script src="<?php echo base_url(); ?>assets//plugins/notification/js/bootstrap-growl.min.js"></script>

    <!-- custom js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets//js/main.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets//pages/elements.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets//js/menu.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tbl_masterclass').DataTable();
        });
    </script>

</body>

</html>