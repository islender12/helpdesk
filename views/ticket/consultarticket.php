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
                            <h2>Consultar Ticket</h2>
                            <div class="subtitle">Modulo de Consultas de Tickets Help Desk</div>
                        </div>
                    </div>
                </div>
            </header>
            <section class="card">
                <div class="card-block">
                    <table id="ticket_data" class="display table table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="width: 10%;">Nro. Ticket</th>
                                <th>Categoria</th>
                                <th>Titutlo</th>
                                <th>Estado</th>
                                <th>Fecha Creación</th>
                                <th style="width: 30%;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="width: 10%;">Nro. Ticket</th>
                                <th>Categoria</th>
                                <th>Titutlo</th>
                                <th>Estado</th>
                                <th>Fecha Creación</th>
                                <th style="width: 30%;">Acciones</th>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </section>
        </div><!--.container-fluid-->
    </div><!--.page-content-->

    <?php
    require "views/scripts.php";
    ?>
    <script src="<?php ruta('public/js/ticket/consultarTicket.js') ?>"></script>
</body>

</html>