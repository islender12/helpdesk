function init() {}

$(document).ready(function () {
  var parametro_id = getUrlParameter();
  console.log(parametro_id);
});

// funcion que me obtiene el id que pasamos por url
function getUrlParameter() {
  // Obtenemos el id de la url
  urlActual = window.location.href;
  urlActual = urlActual.split("/")[6];
  return urlActual;
}

$(function () {
  $(".fancybox").fancybox({
    padding: 0,
    openEffect: "none",
    closeEffect: "none",
  });
});

init();
