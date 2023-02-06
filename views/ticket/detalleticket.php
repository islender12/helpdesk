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
            <section class="activity-line">
                <article class="activity-line-item box-typical">
                    <div class="activity-line-date">
                        Monday<br />
                        sep 8
                    </div>
                    <header class="activity-line-item-header">
                        <div class="activity-line-item-user">
                            <div class="activity-line-item-user-photo">
                                <a href="#">
                                    <img src="<?php ruta("public/img/photo-64-2.jpg") ?>" alt="">
                                </a>
                            </div>
                            <div class="activity-line-item-user-name">Tim Colins</div>
                            <div class="activity-line-item-user-status">Developer, Palo Alto</div>
                        </div>
                    </header>
                    <div class="activity-line-action-list">
                        <section class="activity-line-action">
                            <div class="time">10:40 AM</div>
                            <div class="cont">
                                <div class="cont-in">
                                    <p>Started nes UI migration</p>
                                </div>
                            </div>
                        </section><!--.activity-line-action-->
                        <section class="activity-line-action">
                            <div class="time">10:40 AM</div>
                            <div class="cont">
                                <div class="cont-in">
                                    <p>Had a meeting about shopping cart experience, with Isobel Patterson, Josh Weller, Mark Taylor</p>
                                </div>
                            </div>
                        </section><!--.activity-line-action-->
                        <section class="activity-line-action">
                            <div class="time">10:40 AM</div>
                            <div class="cont">
                                <div class="cont-in">
                                    <p>Had a meeting about shopping cart experience, with Isobel Patterson, Josh Weller, Mark Taylor</p>

                                </div>
                            </div>
                        </section><!--.activity-line-action-->
                    </div><!--.activity-line-action-list-->
                </article><!--.activity-line-item-->
                <article class="activity-line-item box-typical">
                    <div class="activity-line-date">
                        Monday<br />
                        sep 8
                    </div>
                    <header class="activity-line-item-header">
                        <div class="activity-line-item-user">
                            <div class="activity-line-item-user-photo">
                                <a href="#">
                                    <img src="<?php ruta("public/img/photo-64-2.jpg") ?>" alt="">
                                </a>
                            </div>
                            <div class="activity-line-item-user-name">Tim Colins</div>
                            <div class="activity-line-item-user-status">Developer, Palo Alto</div>
                        </div>
                    </header>
                    <div class="activity-line-action-list">
                        <section class="activity-line-action">
                            <div class="time">10:40 AM</div>
                            <div class="cont">
                                <div class="cont-in">
                                    <p>Started nes UI migration</p>
                                </div>
                            </div>
                        </section><!--.activity-line-action-->
                        <section class="activity-line-action">
                            <div class="time">10:40 AM</div>
                            <div class="cont">
                                <div class="cont-in">
                                    <p>Had a meeting about shopping cart experience, with Isobel Patterson, Josh Weller, Mark Taylor</p>
                                </div>
                            </div>
                        </section><!--.activity-line-action-->
                        <section class="activity-line-action">
                            <div class="time">10:40 AM</div>
                            <div class="cont">
                                <div class="cont-in">
                                    <p>Had a meeting about shopping cart experience, with Isobel Patterson, Josh Weller, Mark Taylor</p>

                                </div>
                            </div>
                        </section><!--.activity-line-action-->
                    </div><!--.activity-line-action-list-->
                </article><!--.activity-line-item-->
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