var TableAdvanced = function () {
    var initTable2 = function () {
        var table = $('#sample_2');        
        var oTable = table.dataTable({
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            language: {
                emptyTable: "No hay datos disponibles",
                info: "Viendo _START_ a _END_ de  _TOTAL_ Registros",
                infoEmpty: "La tabla esta vacía",
                infoFiltered: "(filtrado de un total de _MAX_ Registros)",
                lengthMenu: "Show _MENU_ entries",
                search: "Buscar:",
                zeroRecords: "No se encontró ningún registro",
                oPaginate: {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                }
            },
            //ordering: false,
            order: [],
            aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            iDisplayLength: 25,
            dom: 'Bfrtip' 

        });
    }

    var megasystemas_tables = function () {
        var table = $('table.instalados_mega');        
        var oTable = table.dataTable({
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            language: {
                emptyTable: "No hay datos disponibles",
                info: "Viendo _START_ a _END_ de  _TOTAL_ Registros",
                infoEmpty: "La tabla esta vacía",
                infoFiltered: "(filtrado de un total de _MAX_ Registros)",
                lengthMenu: "Show _MENU_ entries",
                search: "Buscar:",
                zeroRecords: "No se encontró ningún registro",
                oPaginate: {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                }
            },
            //ordering: false,
            order: [],
            aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            iDisplayLength: 25,
            dom: 'Bfrtip' 

        });
    }

    var facturasPerfil = function () {
        var table = $('#facturas_perfil');        
        var oTable = table.dataTable({
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            language: {
                emptyTable: "No hay datos disponibles",
                info: "Viendo _START_ a _END_ de  _TOTAL_ Registros",
                infoEmpty: "La tabla esta vacía",
                infoFiltered: "(filtrado de un total de _MAX_ Registros)",
                lengthMenu: "Show _MENU_ entries",
                search: "Buscar:",
                zeroRecords: "No se encontró ningún registro",
                oPaginate: {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                }
            },
            //ordering: false,
            order: [],
            aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            iDisplayLength: 10,
            dom: 'Bfrtip' 

        });
    }
	
	var michelon = function () {
        var table = $('#michelon');
        var oTable = table.dataTable({
            language: {
                emptyTable: "No hay datos disponibles",
                info: "Viendo _START_ a _END_ de  _TOTAL_ Registros",
                infoEmpty: "La tabla esta vacía",
                infoFiltered: "(filtrado de un total de _MAX_ Registros)",
                lengthMenu: "Show _MENU_ entries",
                search: "Buscar:",
                zeroRecords: "No se encontró ningún registro",
                oPaginate: {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                }
            },
            //ordering: false,
            order: [],
            aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            iDisplayLength: 25,
            dom: 'Bfrtip' 
        });
    }	
	
	var initTable6 = function () {

        var table = $('#sample_6');
        var oTable = table.dataTable({
            language: {
                emptyTable: "No hay datos disponibles",
                info: "Viendo _START_ a _END_ de  _TOTAL_ Registros",
                infoEmpty: "La tabla esta vacía",
                infoFiltered: "(filtrado de un total de _MAX_ Registros)",
                lengthMenu: "Show _MENU_ entries",
                search: "Buscar:",
                zeroRecords: "No se encontró ningún registro",
                oPaginate: {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                }
            },
            //ordering: false,
            order: [],
            aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            iDisplayLength: 25,
            dom: 'Bfrtip'         
        });
    }
	
    return {
       //main function to initiate the module
        init: function () {
            if (!jQuery().dataTable) {
                return;
            }

            //console.log('me 1');
				initTable2();
                megasystemas_tables();
                facturasPerfil();
				michelon();
				initTable6();
            //console.log('me 2');
        }

    };

}();