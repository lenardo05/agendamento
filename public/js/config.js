$(document).ready( function () {

    $.extend($.fn.dataTable.defaults, {
        language: { url: "js/pt-br.json" }
    });
    
    $('#dt_table').DataTable();
});
