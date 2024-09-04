<!DOCTYPE html>
<html lang="en">

<head>
    <title>Masterclass - Nueva</title>

    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:/ -->
    <!--[if lt IE 9]>
    <script src="https:/oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:/oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="codedthemes">
    <meta name="keywords" content=", Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="codedthemes">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/x-icon">

    <!-- Google font-->
    <link href="https:/fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">

    <!-- themify -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/icon/themify-icons/themify-icons.css">

    <!-- iconfont -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/icon/icofont/css/icofont.css">

    <!-- simple line icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/icon/simple-line-icons/css/simple-line-icons.css">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css">

    <!-- Responsive.css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/responsive.css">



</head>

<body class="sidebar-mini fixed">
    <div class="wrapper">
        <div class="loader-bg">
            <div class="loader-bar">
            </div>
        </div>
        <!-- Navbar-->
        <header class="main-header-top hidden-print">
            <a href="index.html" class="logo"><img class="img-fluid able-logo" src="<?php echo base_url(); ?>assets/images/logo.png" alt="Theme-logo"></a>
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
                <!-- Navbar Right Menu-->
                <div class="navbar-custom-menu">
                    <ul class="top-nav">
                        <!-- User Menu-->
                        <li class="dropdown">
                            <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                                <span><img class="img-circle " src="<?php echo base_url(); ?>assets/images/avatar-1.png" style="width:40px;" alt="User Image"></span>
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



        <!-- Sidebar chat end-->
        <div class="content-wrapper" style="margin-left: 0px !important;">
            <!-- Container-fluid starts -->
            <div class="container-fluid">
                <!-- Row Starts -->
                <div class="row">
                    <div class="col-sm-12 p-0">
                        <div class="main-header">
                            <h4>Acceso Masterclass</h4>
                            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                <li class="breadcrumb-item"><a href="index.html"><i class="icofont icofont-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#!">Masterclass</a>
                                </li>
                                <li class="breadcrumb-item"><a href="sample-page.html">Acceso</a>
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
                                    <div class="container-fluid" style="margin-top: 10px;">
                                        <div class="col-md-6" style="margin-top: 10px;">

                                            <img id="imagenPreview" src="<?php echo base_url() . $masterclass->imagen; ?>" alt="Previsualización de la Imagen" style="max-width: 100%;">

                                        </div>


                                        <div class="col-md-6" style="margin-top: 10px;">
                                            <!-- Tarjeta de Información -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <!-- Información del Docente -->
                                                    <div class="row">
                                                        <div class="col-sm-3 font-weight-bold">Docente:</div>
                                                        <div class="col-sm-9"><?php echo $masterclass->docente; ?></div>
                                                    </div>
                                                    <!-- Información de la Masterclass -->
                                                    <div class="row">
                                                        <div class="col-sm-3 font-weight-bold">Masterclass:</div>
                                                        <div class="col-sm-9"><?php echo $masterclass->titulo; ?></div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-3 font-weight-bold" >Id de la sesion:</div>
                                                        <div class="col-sm-9" id="session"><?php echo $masterclass->session; ?></div>
                                                    </div>
                                                    <!-- Información de la Fecha -->
                                                    <div class="row">
                                                        <div class="col-sm-3 font-weight-bold">Fecha:</div>
                                                        <div class="col-sm-9"><?php echo $masterclass->fecha; ?></div>
                                                    </div>
                                                    <!-- Información de la Hora -->
                                                    <div class="row">
                                                        <div class="col-sm-3 font-weight-bold">Hora:</div>
                                                        <div class="col-sm-9"><?php echo $masterclass->hora; ?></div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-3 font-weight-bold">Alumno:</div>
                                                        <div class="col-sm-9"><?php echo $alumno; ?></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-3 font-weight-bold">Matricula:</div>
                                                        <div class="col-sm-9"><?php echo $matricula; ?></div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-center" style="margin-top: 10px;">
                                            <!-- Botón para unirse -->
                                            <!-- Contador -->
                                            <div id="contador" class="mb-3">
                                                <h2>Tiempo restante para unirse:</h2>
                                                <p id="time" style="font-size: 24px;"></p>
                                            </div>
                                            <!-- Botón que se mostrará al finalizar el contador -->
                                            <button id="joinButton" class="btn btn-primary" id="unirse" style="display: none;">Unirse</button>
                                        </div>





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
                <a href="http:/www.google.com/chrome/">
                    <img src="<?php echo base_url(); ?>assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https:/www.mozilla.org/en-US/firefox/new/">
                    <img src="<?php echo base_url(); ?>assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http:/www.opera.com">
                    <img src="<?php echo base_url(); ?>assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https:/www.apple.com/safari/">
                    <img src="<?php echo base_url(); ?>assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http:/windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="<?php echo base_url(); ?>assets/images/browser/ie.png" alt="">
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
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/tether/dist/js/tether.min.js"></script>

    <!-- Required Fremwork -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- waves effects.js -->
    <script src="<?php echo base_url(); ?>assets/plugins/Waves/waves.min.js"></script>

    <!-- Scrollbar JS-->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js"></script>

    <!--classic JS-->
    <script src="<?php echo base_url(); ?>assets/plugins/classie/classie.js"></script>

    <!-- notification -->
    <script src="<?php echo base_url(); ?>assets/plugins/notification/js/bootstrap-growl.min.js"></script>

    <!-- custom js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/pages/elements.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/menu.min.js"></script>

    <script>
        $(document).ready(function() {
            // Configura la hora objetivo (20:00:00 del día actual)
            var objetivoHora = '13:00:00';

            // Calcula la fecha y hora objetivo
            var ahora = new Date();
            var horaObjetivo = new Date(ahora.toDateString() + ' ' + objetivoHora);

            // Si la hora objetivo ya pasó hoy, muestra el botón "Unirse" y no inicia el contador
            if (ahora > horaObjetivo) {
                mostrarBotonUnirse();
            } else {
                // Función para calcular la diferencia de tiempo y actualizar el contador
                function actualizarContador() {
                    var ahora = new Date().getTime();
                    var distancia = horaObjetivo - ahora;

                    // Cálculo de días, horas, minutos y segundos
                    var dias = Math.floor(distancia / (1000 * 60 * 60 * 24));
                    var horas = Math.floor((distancia % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutos = Math.floor((distancia % (1000 * 60 * 60)) / (1000 * 60));
                    var segundos = Math.floor((distancia % (1000 * 60)) / 1000);

                    // Mostrar el resultado en el elemento con id="time"
                    $('#time').text(dias + "d " + horas + "h " + minutos + "m " + segundos + "s");

                    // Si el contador llega a cero
                    if (distancia < 0) {
                        clearInterval(intervalo);
                        mostrarBotonUnirse();
                    }
                }

                // Inicia el contador y lo actualiza cada segundo
                var intervalo = setInterval(actualizarContador, 1000);
            }

            // Función para mostrar el botón y ocultar el contador
            function mostrarBotonUnirse() {
                $('#contador').hide();
                $('#joinButton').show();
            }
        });




        $('#ingresar').on('click', function(e) {
            let codigo_moderador = $("#codigo_moderador").val();
            let codigo_alumno = $("#codigo_alumno").val();
            let titulo = $("#titulo").val();
            let session = $("#session").val();
            let docente = $("#docente").val();
            $.ajax({
                type: "POST",
                url: "../crear-sala",
                data: {
                    codigo_moderador,
                    codigo_alumno,
                    titulo,
                    session,
                    docente
                },
                dataType: "json",
                success: function(response) {
                    window.location = response.url;
                }
            });

        });
    </script>

</body>

</html>