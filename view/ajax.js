$(document).ready(function () {
  cargarDatos();

  $("#btnCrear").click(function (event) {
    event.preventDefault();
    var { cedula, nombre, apellido, direccion, telefono } = obtenerInputs();

    $.ajax({
      url: "../controller/controllerEstudiante.php",
      type: "POST",
      data: { cedula, nombre, apellido, direccion, telefono },
      success: function (response) {
        cargarDatos();
        cargarFormulario();
      },
      error: function (response) {},
    });
  });

  $("#btnEliminar").click(function (event) {
    event.preventDefault();
    var cedula = $("#cedula").val();
    $.ajax({
      url: "../controller/controllerEstudiante.php?cedula=" + cedula,
      type: "DELETE",
      success: function (response) {
        cargarDatos();
        cargarFormulario();
      },
    });
  });

  $("#btnEditar").click(function (event) {
    event.preventDefault();
    var { cedula, nombre, apellido, direccion, telefono } = obtenerInputs();

    $.ajax({
      url: `../controller/controllerEstudiante.php?cedula=${cedula}&nombre=${nombre}&apellido=${apellido}&direccion=${direccion}&telefono=${telefono}`,
      type: "PUT",
      success: function (response) {
        cargarDatos();
        cargarFormulario();
      },
      error: function (response) {},
    });
  });
});

function cargarDatos() {
  $.ajax({
    url: "../controller/controllerEstudiante.php",
    type: "GET",
    data: "json",
    success: function (data) {
      mostrarTabla(data);
    },
  });
}

function mostrarTabla(data) {
  var tabla = $("#tablaDatos tbody");
  tabla.empty();
  $.each(JSON.parse(data), function (index, item) {
    tabla.append(
      "<tr data-cedula='" +
        item.cedula +
        "' class='bg-gray-100 hover:bg-gray-200'><td class='px-4 py-2'>" +
        item.cedula +
        "</td><td class='px-8 py-2'>" +
        item.nombre +
        "</td><td class='px-8 py-2'>" +
        item.apellido +
        "</td><td class='px-8 py-2'>" +
        item.direccion +
        "</td><td class='px-8 py-2'>" +
        item.telefono +
        "</td></tr>"
    );
  });
}

function obtenerInputs() {
  var cedula = $("#cedula").val();
  var nombre = $("#nombre").val();
  var apellido = $("#apellido").val();
  var direccion = $("#direccion").val();
  var telefono = $("#telefono").val();
  return { cedula, nombre, apellido, direccion, telefono };
}

function cargarFormulario() {
  $("#cedula").val("");
  $("#nombre").val("");
  $("#apellido").val("");
  $("#direccion").val("");
  $("#telefono").val("");
}
