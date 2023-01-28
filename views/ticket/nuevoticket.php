<!DOCTYPE html>
<html>

<?php
require "views/head.php";
?>

<body class="with-side-menu">
    <?php
    require "views/header.php";
    ?>

    <div class="mobile-menu-left-overlay"></div>
    <?php
    require "views/nav.php";
    ?>

    <div class="page-content">
        <div class="container-fluid">
            <header class="section-header">
                <div class="tbl">
                    <div class="tbl-row">
                        <div class="tbl-cell">
                            <h3>Nuevo Ticket</h3>
                            <ol class="breadcrumb breadcrumb-simple">
                                <li><a href="<?php ruta("ticket") ?>">Ticket</a></li>
                                <li class="active">Nuevo Ticket</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </header> <!--.section-header-->
            <div class="box-typical box-typical-padding">
                <p>
                    Desde esta Sección Podras Generar Nuevos Tickets del servicio de ayuda
                </p>
                <h5 class="m-t-lg with-border">Ingresar Información</h5>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label for="categoria" class="form-label semibold">Categoria</label>
                                <select id="categoria" class="form-control">
                                    <?php foreach ($this->categoria as $categoria) { ?>
                                        <option value="<?php echo ucfirst($categoria->id_cat) ?>"><?php echo ucfirst($categoria->nombre_cat)  ?></option>
                                    <?php } ?>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="descripcion">Descripción</label>
                                <div class="summernote-theme-1" id="ticket_description">
                                    <textarea class="summernote" name="descripcion" id="descripcion">Hello Summernote</textarea>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <button type="button" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
                        </div>
                    </div><!--.row-->
                </form><!--form-->
            </div><!-- box-typical box-typical-padding -->
        </div><!--.container-fluid-->
    </div><!--.page-content-->

    <?php
    require "views/scripts.php";
    ?>
</body>

</html>