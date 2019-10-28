$(document).ready(function() {
    $('#tabla').DataTable( {
        "language": {
            "emptyTable":     "No hay datos disponibles",
            "info":           "Mostrando _START_ de _END_ de _TOTAL_ Entradas",
            "infoEmpty":      "Muestra 0 to 0 of 0 entradas",
            "infoFiltered":   "(Filtrado por _MAX_ total de entradas)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostrar _MENU_ entradas",
            "loadingRecords": "Cargando...",
            "processing":     "Procesando...",
            "search":         "Buscar:",
            "zeroRecords":    "No hay coincidencia",
            "paginate": {
                "first":      "Primero",
                "last":       "Ultimo",
                "next":       "Siguiente",
                "previous":   "Anterior"
            }
        }
    } );
} )

