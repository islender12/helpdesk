<nav class="side-menu">
    <?php if ($this->session->rol_user == 1) { ?>
        <ul class="side-menu-list">
            <li class="blue-dirty">
                <a href="<?php ruta("home") ?>">
                    <span class="glyphicon glyphicon-th"></span>
                    <span class="lbl">Inicio</span>
                </a>
            </li>
            <li class="blue-dirty">
                <a href="<?php ruta("ticket/nuevoticket") ?>">
                    <span class="glyphicon glyphicon-th"></span>
                    <span class="lbl">Nuevo Ticket</span>
                </a>
            </li>
        <?php } ?>
        <li class="blue-dirty">
            <a href="<?php ruta("ticket") ?>">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">Consultar Ticket</span>
            </a>
        </li>
        </ul>
</nav><!--.side-menu-->