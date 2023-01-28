<!DOCTYPE html>
<html>

<?php require "views/head.php" ?>

<body>
    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box" action="" method="POST">
                    <div class="sign-avatar">
                        <img src="public/img/avatar-sign.png" alt="">
                    </div>
                    <header class="sign-title">Acceso</header>
                    <?php
                    if ($this->mensaje) { ?>
                        <div class="alert alert-danger alert-icon alert-close alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?php echo $this->mensaje ?>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Correo Electronico" value="<?php echo $this->email ?>" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="passwd" class="form-control" placeholder="Contraseña" />
                    </div>
                    <p class="text-right"><a href="sign-up.html">Cambiar Contraseña</a></p>
                    <button type="submit" name="enviar" class="btn btn-rounded">Acceder</button>
                    <!--<button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>-->
                </form>
            </div>
        </div>
    </div><!--.page-center-->


    <script src="public/js/lib/jquery/jquery.min.js"></script>
    <script src="public/js/lib/tether/tether.min.js"></script>
    <script src="public/js/lib/bootstrap/bootstrap.min.js"></script>
    <script src="public/js/plugins.js"></script>
    <script type="text/javascript" src="public/js/lib/match-height/jquery.matchHeight.min.js"></script>
    <script>
        $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });

            $(window).resize(function() {
                setTimeout(function() {
                    $('.page-center').matchHeight({
                        remove: true
                    });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                }, 100);
            });
        });
    </script>
    <script src="public/js/app.js"></script>
</body>

</html>