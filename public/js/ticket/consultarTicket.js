var tabla;
function init() {}
$(document).ready(function () {
  ListarTicket();
  // Lo optimo seria crear un websocket pero usaremos esto por este momento
  setInterval(destroyTable, 60000); // Cada minuto (60000 milisegundos) se recarga el datatable
});

function destroyTable() {
  tabla.destroy();
  ListarTicket();
}

function ListarTicket() {
  tabla = $("#ticket_data").DataTable({
    order: [[4, "desc"]],
    responsive: true,
    aProcessing: true,
    aServerSide: true,
    // dom: "Bfrtip",
    // buttons: ["excelHtml5", "csvHtml5", "pdfHtml5"],
    language: {
      sProcessing: "Procesando ....",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se Encontraron Resultados",
      sEmptyTable: "Ningun dato disponible en esta Tabla",
      sInfo: "Mostrando un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando un Total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar: ",
      sLoadingRecords: "Cargando ... ",
      oPaginate: {
        sFirst: "Primero",
        sLast: "último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
    },
    ajax: {
      type: "post",
      url: "http://localhost/helpdesk/ticket/ListarTicket",
      dataType: "json",
      error: function (e) {
        console.log(e.responseText);
      },
    },
  });
}
function verdetalleticket(id_ticket) {
  window.location.href = "ticket/verDetalleTicket/" + id_ticket;
}

init();
