<!DOCTYPE html>
<html lang="en">



<body class="sidebar-mini fixed">
    <div class="wrapper">
        <div class="loader-bg">
            <div class="loader-bar">
            </div>
        </div>



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




</body>

</html>