$(document).ready(function () {
  $("#tablaDatos tbody").on("click", "tr", function () {
    var cedula = $(this).attr("data-cedula");
    var nombre = $(this).find("td:eq(1)").text();
    var apellido = $(this).find("td:eq(2)").text();
    var direccion = $(this).find("td:eq(3)").text();
    var telefono = $(this).find("td:eq(4)").text();

    $('input[name="cedula"]').val(cedula);
    $('input[name="nombre"]').val(nombre);
    $('input[name="apellido"]').val(apellido);
    $('input[name="direccion"]').val(direccion);
    $('input[name="telefono"]').val(telefono);
  });
});
