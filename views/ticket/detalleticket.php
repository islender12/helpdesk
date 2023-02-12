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
                                <li class="active">Detalle Ticket</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </header> <!--.section-header-->
            <section class="activity-line">
            </section><!--.activity-line-->
        </div><!--.container-fluid-->
    </div><!--.page-content-->

    <?php
    require "views/scripts.php";
    ?>
    <script src="<?php ruta('public/js/lib/fancybox/jquery.fancybox.pack.js') ?>"></script>
    <script src="<?php ruta('public/js/ticket/detalleTicket.js') ?>"></script>
</body>

</html>