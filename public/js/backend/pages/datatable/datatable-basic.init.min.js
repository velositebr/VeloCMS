/****************************************
 *       Basic Table                   *
 ****************************************/
$('#default_table').DataTable( {
    "order": [[ 1, 'asc' ]],
    "info": false,
    "pagingType": "full_numbers",
    "language": {
        "decimal": ",",
        "thousands": ".",
        "lengthMenu": "Exibir _MENU_ resultados",
        "zeroRecords": "Nenhum resultado encontrado",
        "info": "Página _PAGE_ de _PAGES_",
        "infoEmpty": "Nenhum registro encontrado",
        "infoFiltered": "(resultados encontratos em _MAX_ registros)",
        "search": "Pesquisar:",
        "loadingRecords": "Carregando...",
        "processing":     "Processando...",
        "paginate": {
            "first":      "Primeiro",
            "last":       "Último",
            "next":       "Próximo",
            "previous":   "Anterior"
        },
    }
} );

$('#full_table').DataTable( {
    "order": [[ 1, 'asc' ]],
    "info": false,
    "scrollX": true,
    "pagingType": "full_numbers",
    "language": {
        "decimal": ",",
        "thousands": ".",
        "lengthMenu": "Exibir _MENU_ resultados",
        "zeroRecords": "Nenhum resultado encontrado",
        "info": "Página _PAGE_ de _PAGES_",
        "infoEmpty": "Nenhum registro encontrado",
        "infoFiltered": "(resultados encontratos em _MAX_ registros)",
        "search": "Pesquisar:",
        "loadingRecords": "Carregando...",
        "processing":     "Processando...",
        "paginate": {
            "first":      "Primeiro",
            "last":       "Último",
            "next":       "Próximo",
            "previous":   "Anterior"
        },
    }
} );

