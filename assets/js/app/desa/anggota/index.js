function deleteItem($id) {

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "100",
        "hideDuration": "1000",
        "timeOut": 0,
        "extendedTimeOut": 0,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "tapToDismiss": false
    };

    toastr.warning("Yakin akan menghapus data<br /><br /><a id='close-toastr' onclick='window.deleteYes(" + $id + ")' type='button' class='btn btn-outline-light btn-sm'>Yes</a>", "Hapus Data")
    $('body').on('click', 'a#close-toastr', function() {
        $(this).closest('.toast').remove();
    });
}
var the_table;
var the_table1;
$(document).ready(function() {
    the_table = $("#dataTable_kecamatan").DataTable({
        responsive: true,
        searching: true,
        processing: true,
        serverSide: true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        stateSave: true,
        dom: 'Bfrtip',
        buttons: [
            // 'excel', 'pdf', 'print'
        ],
        "ajax": {
            "url": site_url + 'api/desa/Api_aparatur/kecamatan',
            "type": "POST"
        },
        "columns": [{
                "data": "id",
                "searchable": false,
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "date_year" },
            { "data": "Nama_Kecamatan" },
            { "data": "kepala_desa" },
            { "data": "sekertariat_desa" },
            {
                "data": "id",
                "orderable": false,
                "render": function(data, type, row, meta) {
                    return '<a href="' + site_url + 'desa/anggota/detail/' + row.id + '">\n\
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n\
                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>\n\
                        <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"/>\n\
                        <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"/>\n\
                        </svg></a >\n\
                        ';
                }
            }
        ]
    });
    the_table1 = $("#dataTable_desa").DataTable({
        responsive: true,
        searching: true,
        processing: true,
        serverSide: true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        stateSave: true,
        dom: 'Bfrtip',
        buttons: [
            // 'excel', 'pdf', 'print'
        ],
        "ajax": {
            "url": site_url + 'api/desa/Api_aparatur/desa',
            "type": "POST"
        },
        "columns": [{
                "data": "id",
                "searchable": false,
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "date_year" },
            { "data": "Nama_Kecamatan" },
            { "data": "Nama_Desa" },
            { "data": "kepala_desa" },
            { "data": "sekertariat_desa" },
            {
                "data": "id",
                "orderable": false,
                "render": function(data, type, row, meta) {
                    return '<a href="' + site_url + 'desa/anggota/detail/' + row.id + '">\n\
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n\
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>\n\
                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"/>\n\
                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"/>\n\
                    </svg></a >\n\
                       ';
                }
            }
        ]
    });
    $("#dataTable_dusun").DataTable({
        responsive: true,
        searching: true,
        processing: true,
        serverSide: true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        stateSave: true,
        dom: 'Bfrtip',
        buttons: [
            // 'excel', 'pdf', 'print'
        ],
        "ajax": {
            "url": site_url + 'api/desa/Api_aparatur/dusun',
            "type": "POST"
        },
        "columns": [{
                "data": "id",
                "searchable": false,
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "date_year" },
            { "data": "Nama_Kecamatan" },
            { "data": "Nama_Desa" },
            { "data": "nama_dusun" },
            { "data": "kepala_desa" },
            { "data": "sekertariat_desa" },
            {
                "data": "id",
                "orderable": false,
                "render": function(data, type, row, meta) {
                    return '<a href="' + site_url + 'desa/anggota/detail/' + row.id + '">\n\
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n\
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>\n\
                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"/>\n\
                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"/>\n\
                    </svg></a >\n\
                       ';
                }
            }
        ]
    });
    $("#dataTable_rw").DataTable({
        responsive: true,
        searching: true,
        processing: true,
        serverSide: true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        stateSave: true,
        dom: 'Bfrtip',
        buttons: [
            // 'excel', 'pdf', 'print'
        ],
        "ajax": {
            "url": site_url + 'api/desa/Api_aparatur/rw',
            "type": "POST"
        },
        "columns": [{
                "data": "id",
                "searchable": false,
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "date_year" },
            { "data": "Nama_Kecamatan" },
            { "data": "Nama_Desa" },
            {
                "data": "nama_dusun",
                "render": function(data, type, row, meta) {
                    return 'Dusun : ' + data + '<br>RW : ' + row.rw;
                }
            },
            { "data": "kepala_desa" },
            { "data": "sekertariat_desa" },
            {
                "data": "id",
                "orderable": false,
                "render": function(data, type, row, meta) {
                    return '<a href="' + site_url + 'desa/anggota/detail/' + row.id + '">\n\
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n\
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>\n\
                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"/>\n\
                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"/>\n\
                    </svg></a >\n\
                       ';
                }
            }
        ]
    });
    $("#dataTable_rt").DataTable({
        responsive: true,
        searching: true,
        processing: true,
        serverSide: true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        stateSave: true,
        dom: 'Bfrtip',
        buttons: [
            // 'excel', 'pdf', 'print'
        ],
        "ajax": {
            "url": site_url + 'api/desa/Api_aparatur/rt',
            "type": "POST"
        },
        "columns": [{
                "data": "id",
                "searchable": false,
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "date_year" },
            { "data": "Nama_Kecamatan" },
            { "data": "Nama_Desa" },
            {
                "data": "nama_dusun",
                "render": function(data, type, row, meta) {
                    return 'Dusun : ' + data + '<br>RW : ' + row.rw + '<br>RT : ' + row.rt;
                }
            },
            { "data": "kepala_desa" },
            { "data": "sekertariat_desa" },
            {
                "data": "id",
                "orderable": false,
                "render": function(data, type, row, meta) {
                    return '<a href="' + site_url + 'desa/anggota/detail/' + row.id + '">\n\
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n\
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>\n\
                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"/>\n\
                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"/>\n\
                    </svg></a >\n\
                       ';
                }
            }
        ]
    });
});


function deleteYes($id) {
    toastr.clear();
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "100",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    toastr.success("Berhasil Menghapus data", "Hapus Data");

    window.location = site_url + "api/desa/Api_aparatur/delete/" + $id;
}