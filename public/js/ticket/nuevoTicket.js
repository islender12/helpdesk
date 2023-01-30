function init() {
  $("#ticket_form").on("submit", function (e) {
    guardar(e);
  });
}

$(document).ready(function () {
  $(".summernote").summernote({
    height: 150,
  });
});

$(".swal-btn-success").click(function (e) {
  e.preventDefault();
  swal({
    title: "Good job!",
    text: "You clicked the button!",
    type: "success",
    confirmButtonClass: "btn-success",
    confirmButtonText: "Success",
  });
});

function guardar(e) {
  e.preventDefault();
  var formData = new FormData($("#ticket_form")[0]);

  $.ajax({
    type: "POST",
    url: "http://localhost/helpdesk/ticket/RegistarTicket",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      console.log(datos);
      if (datos == "insert") {
        swal("Correcto!", "Registrado Correctamente", "success");
        resetform();
      } else if (datos == "error") {
        swal("Error!", "Ha Ocurrido un Error", "error");
      } else {
        swal(datos);
      }
    },
  });
}

function resetform() {
  $("form select").each(function () {
    this.selectedIndex = 0;
  });
  $("form input[type=text] , form textarea").each(function () {
    this.value = "";
  });
  $("#descripcion").summernote("reset");
}
init();
