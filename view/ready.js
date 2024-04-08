$(document).ready(function () {
  // Capturar clic en la fila de la tabla
  $("#tablaDatos tbody").on("click", "tr", function () {
    // Obtener los datos de la fila clicada
    var cedula = $(this).attr("data-cedula");
    var nombre = $(this).find("td:eq(1)").text();
    var apellido = $(this).find("td:eq(2)").text();
    var direccion = $(this).find("td:eq(3)").text();
    var telefono = $(this).find("td:eq(4)").text();

    // Mostrar los datos en el formulario
    $('input[name="cedula"]').val(cedula);
    $('input[name="nombre"]').val(nombre);
    $('input[name="apellido"]').val(apellido);
    $('input[name="direccion"]').val(direccion);
    $('input[name="telefono"]').val(telefono);
  });
});
