$(document).ready(function() {
    $('#dataTable_anggota').DataTable({
        responsive: true,
        searching: true,
        processing: true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        stateSave: true,
        dom: 'Bfrtip',
        buttons: [
            // 'excel', 'pdf', 'print'
        ],
    });
});