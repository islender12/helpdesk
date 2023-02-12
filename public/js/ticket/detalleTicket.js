var sectionDetalle = document.querySelector(".activity-line");

function init() {}

$(document).ready(function () {
  cargarDetalleTicket();
});

// funcion que me obtiene el id que pasamos por url

function getIdByUrl() {
  // Obtenemos el id de la url
  urlActual = window.location.href;
  urlActual = urlActual.split("/")[6];
  return urlActual;
}

async function cargarDetalleTicket() {
  const id_ticket = getIdByUrl();
  try {
    const response = await fetch(
      `http://localhost/helpdesk/ticket/ListarDetalleTicket/${id_ticket}`
    );
    const datos = await response.json();
    if (datos.length === 0) {
      let articleHTML = `<article class="activity-line-item box-typical">

      <header class="activity-line-item-header">
            <div class="activity-line-item-user">
                <div class="activity-line-item-user-name">No se Ha Generado un Detalle de este Ticket</div>
                <div class="activity-line-item-user-status">Error</div>
            </div>
        </header>
      
      </article>`;
      sectionDetalle.innerHTML += articleHTML;
    } else {
      let articleHTML = "";
      datos.forEach((dato) => {
        var fecha = new Date(dato.fecha_creacion);
        var hora = fecha.toLocaleTimeString(["en-US"],{hour:"2-digit",minute:"2-digit"});
        var opciones = {
          weekday: "long",
          year: "numeric",
          month: "long",
          day: "numeric",
        };
        var fechaEspanol = fecha.toLocaleDateString("es-ES", opciones);
        console.log(fechaEspanol);

        articleHTML += `<article class="activity-line-item box-typical">
        <div class="activity-line-date">
            ${fechaEspanol}
        </div>
        <header class="activity-line-item-header">
            <div class="activity-line-item-user">
                <div class="activity-line-item-user-photo">
                    <a href="#">
                        <img src="http://localhost/helpdesk/public/img/user.jpg" alt="">
                    </a>
                </div>
                <div class="activity-line-item-user-name">${dato.nombre}</div>
                <div class="activity-line-item-user-status">${dato.rol}</div>
            </div>
        </header>
        <div class="activity-line-action-list">
            <section class="activity-line-action">
                <div class="time">${hora}</div>
                <div class="cont">
                    <div class="cont-in">
                        <p>${dato.descripcion_ticket}</p>
                    </div>
                </div>
            </section><!--.activity-line-action-->
        </div><!--.activity-line-action-list-->
    </article><!--.activity-line-item-->`;
      });
      sectionDetalle.innerHTML += articleHTML;
    }
  } catch (error) {
    console.error(error);
  }
}

$(function () {
  $(".fancybox").fancybox({
    padding: 0,
    openEffect: "none",
    closeEffect: "none",
  });
});

init();
