<!DOCTYPE html>
<html lang="en">

<body class="sidebar-mini fixed">
    <div class="wrapper">
        <div class="loader-bg">
            <div class="loader-bar">
            </div>
        </div>
        <!-- Navbar-->

        <!-- Side-Nav-->


        <!-- Sidebar chat end-->
        <div class="content-wrapper">
            <!-- Container-fluid starts -->
            <div class="container-fluid">
                <!-- Row Starts -->
                <div class="row">
                    <div class="col-sm-12 p-0">
                        <div class="main-header">
                            <h4>Lista de Usuarios</h4>
                            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                <li class="breadcrumb-item"><a href="index.html"><i class="icofont icofont-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#!">Masterclass</a>
                                </li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Lista</a>
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
                                        <button class="btn btn-success btn-sm" onclick="window.location='<?php echo base_url(); ?>nueva-sesion'"><i class="fa-solid fa-pen-to-square"></i> Nueva</button>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-striped table-bordered table-hover table-sm" id="tbl_masterclass">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Título</th>
                                                    <th>Docente</th>
                                                    <th>Tipo</th>
                                                    <th>Fecha</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $a = 1;
                                                foreach ($usuarios as $u) { ?>
                                                    <tr>
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



    <!-- Required Jqurey -->




</body>

</html>