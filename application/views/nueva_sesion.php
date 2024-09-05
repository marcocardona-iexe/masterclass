<!DOCTYPE html>
<html lang="en">

<head>
    <title>Masterclass - Nueva</title>

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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">


</head>

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
                        <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>">
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
                            <h4>Nueva Sesion</h4>
                            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                <li class="breadcrumb-item"><a href="index.html"><i class="icofont icofont-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Sesiones</a>
                                </li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>nueva-sesion">Nueva</a>
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
                                    <div class="container mt-5">
                                        <h2>Formulario de Registro</h2>
                                        <form id="registroForm" enctype="multipart/form-data">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="titulo">Título</label>
                                                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="imagen">Imagen</label>
                                                    <input type="file" class="form-control-file" id="imagen" name="imagen" required>
                                                    <small id="imagenError" class="text-danger d-none">Solo se permiten archivos JPG.</small>
                                                    <div class="mt-3">
                                                        <img id="imagenPreview" src="#" alt="Previsualización de la Imagen" style="max-width: 100%; display: none;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nombreDocente">Nombre del Docente</label>
                                                    <input type="text" class="form-control" id="docente" name="docente" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nombreDocente">Correo del Docente</label>
                                                    <input type="text" class="form-control" id="correo_docente" name="correo_docente" required>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="codigoModerador">Código del Moderador</label>
                                                    <div class="d-flex">
                                                        <input type="text" class="form-control ml-2" id="codigo_docente" name="codigo_docente" required readonly>
                                                        <button class="btn btn-success" type="button" id="generar_codigo_moderador"><i class="fa-solid fa-arrows-rotate"></i></button>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="codigoAlumno">Código del Alumno</label>
                                                    <div class="d-flex">
                                                        <input type="text" class="form-control" id="codigo_alumno" name="codigo_alumno" required readonly>
                                                        <button class="btn btn-success" type="button" id="generar_codigo_alumno"><i class="fa-solid fa-arrows-rotate"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Tipo de sesión</label>
                                                    <select class="form-control" id="exampleFormControlSelect1" name="tipo">
                                                        <option>Seleccione una opción</option>
                                                        <option>MASTERCLASS</option>
                                                        <option>TALLER</option>
                                                    </select>
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fecha">Fecha</label>
                                                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="hora">Hora</label>
                                                    <input type="time" class="form-control" id="hora" name="hora" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary">Enviar</button>

                                            </div>


                                        </form>
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

    <script>
        //codigo_alumno
        $('#generar_codigo_moderador').on('click', function() {
            // Función para generar el código alfanumérico

            function generateCode(length) {
                var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                var code = '';
                for (var i = 0; i < length; i++) {
                    var randomIndex = Math.floor(Math.random() * characters.length);
                    code += characters.charAt(randomIndex);
                }
                return code;
            }

            // Genera un código de 8 caracteres

            let newCode = generateCode(8);
            $.ajax({
                type: "POST",
                url: "verifica-codigo-docente/" + newCode,
                dataType: "json",
                success: function(response) {
                    if (!response.existe) {
                        $('#codigo_docente').val(newCode);
                    } else {
                        alert("El codigo ya existe");
                    }
                }
            });

            // Muestra el código generado en el elemento <p> con id "codeOutput"
        });


        //codigo_alumno
        $('#generar_codigo_alumno').on('click', function() {
            // Función para generar el código alfanumérico

            function generateCode(length) {
                var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                var code = '';
                for (var i = 0; i < length; i++) {
                    var randomIndex = Math.floor(Math.random() * characters.length);
                    code += characters.charAt(randomIndex);
                }
                return code;
            }

            // Genera un código de 8 caracteres

            let newCode = generateCode(8);
            $.ajax({
                type: "POST",
                url: "verifica-codigo-alumno/" + newCode,
                dataType: "json",
                success: function(response) {
                    if (!response.existe) {
                        $('#codigo_alumno').val(newCode);
                    } else {
                        alert("El codigo ya existe");
                    }
                }
            });

            // Muestra el código generado en el elemento <p> con id "codeOutput"
        });


        $('#imagen').change(function() {
            var file = this.files[0];
            var fileType = file['type'];
            var validImageTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            var reader = new FileReader();

            if ($.inArray(fileType, validImageTypes) < 0) {
                // Si no es un JPG
                $('#imagen').addClass('is-invalid').removeClass('is-valid');
                $('#imagenError').removeClass('d-none');
                $('#imagenPreview').hide();
            } else {
                // Si es un JPG, previsualizar
                $('#imagen').addClass('is-valid').removeClass('is-invalid');
                $('#imagenError').addClass('d-none');

                reader.onload = function(e) {
                    $('#imagenPreview').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(file);
            }
        });


        // Al enviar el formulario con id 'registroForm'
        $('#registroForm').on('submit', function(e) {
            // Previene el comportamiento por defecto del formulario (que es enviar la solicitud al servidor y recargar la página)
            e.preventDefault();

            // Crear un objeto FormData con los datos del formulario
            var formData = new FormData(this);

            // Realizar una solicitud AJAX para enviar el formulario
            $.ajax({
                url: 'agregar-masterclass', // URL del servidor donde se enviarán los datos del formulario
                type: 'POST', // Método HTTP para enviar los datos
                data: formData, // Datos del formulario en formato FormData
                contentType: false, // Indica que no se debe establecer el tipo de contenido (el navegador lo hace automáticamente con FormData)
                processData: false, // Indica que no se debe procesar los datos (el navegador lo hace automáticamente con FormData)
                success: function(response) {
                    // Esta función se ejecuta si la solicitud se completa con éxito

                    // Muestra un mensaje de alerta indicando que el formulario se ha enviado con éxito
                    alert('Formulario enviado con éxito.');

                    // Recarga la página para reflejar cualquier cambio realizado en el servidor
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Esta función se ejecuta si ocurre un error durante la solicitud

                    // Muestra un mensaje de alerta indicando que hubo un error al enviar el formulario
                    alert('Error al enviar el formulario.');

                    // Aquí se puede agregar lógica adicional para manejar errores específicos si es necesario
                }
            });
        });
    </script>

</body>

</html>