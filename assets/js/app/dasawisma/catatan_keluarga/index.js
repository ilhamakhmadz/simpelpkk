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
var the_table2;
var the_table3;
var the_table4;
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
        "url": site_url + 'api/dasawisma/Api_catatan_keluarga/kecamatan',
        "type": "POST"
    },
    "columns": [{
            "data": "id_data_keluarga",
            "searchable": false,
            render: function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        { "data": "date_year" },
        { "data": "Nama_Kecamatan" },
        { "data": "nama_kepala_keluarga" },
        { "data": "jumlah_kk" },
        { "data": "kreteria_rumah" },
        {
            "data": "id_data_keluarga",
            "orderable": false,
            "render": function(data, type, row, meta) {
                return '<a href="' + site_url + 'dasawisma/catatan_keluarga/detail/' + row.id_data_keluarga + '" class="btn btn-icon btn-light-facebook me-5 ">\n\
                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n\
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor"/>\n\
                            <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>\n\
                            <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>\n\
                            <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>\n\
                            </svg></span>\n\
                            </a>\n\
                            <a href="' + site_url + 'dasawisma/catatan_keluarga/view/' + row.id_data_keluarga + '" class="btn btn-icon btn-light-twitter me-5 ">\n\
                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g opacity="0.25">\n\
                            <path d="M2 15C2 16.6569 3.34315 18 5 18L19 18C20.6569 18 22 16.6569 22 15V5C22 3.34315 20.6569 2 19 2H5C3.34315 2 2 3.34315 2 5V15Z" fill="#12131A"/>\n\
                            <path d="M8 20C7.44772 20 7 20.4477 7 21C7 21.5523 7.44772 22 8 22H16C16.5523 22 17 21.5523 17 21C17 20.4477 16.5523 20 16 20H8Z" fill="#12131A"/></g>\n\
                            <path d="M7 6C6.44772 6 6 6.44772 6 7C6 7.55228 6.44772 8 7 8H14C14.5523 8 15 7.55228 15 7C15 6.44772 14.5523 6 14 6H7Z" fill="#12131A"/>\n\
                            <path d="M7 10C6.44772 10 6 10.4477 6 11C6 11.5523 6.44772 12 7 12H9C9.55229 12 10 11.5523 10 11C10 10.4477 9.55229 10 9 10H7Z" fill="#12131A"/>\n\
                            </svg></span></a>';
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
        "url": site_url + 'api/dasawisma/Api_catatan_keluarga/desa',
        "type": "POST"
    },
    "columns": [{
            "data": "id_data_keluarga",
            "searchable": false,
            render: function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        { "data": "date_year" },
        { "data": "Nama_Kecamatan" },
        { "data": "Nama_Desa" },
        { "data": "nama_kepala_keluarga" },
        { "data": "jumlah_kk" },
        { "data": "kreteria_rumah" },
        {
            "data": "id_data_keluarga",
            "orderable": false,
            "render": function(data, type, row, meta) {
                return '<a href="' + site_url + 'dasawisma/catatan_keluarga/detail/' + row.id_data_keluarga + '" class="btn btn-icon btn-light-facebook me-5 ">\n\
                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n\
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor"/>\n\
                            <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>\n\
                            <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>\n\
                            <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>\n\
                            </svg></span>\n\
                            </a>\n\
                            <a href="' + site_url + 'dasawisma/catatan_keluarga/view/' + row.id_data_keluarga + '" class="btn btn-icon btn-light-twitter me-5 ">\n\
                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g opacity="0.25">\n\
                            <path d="M2 15C2 16.6569 3.34315 18 5 18L19 18C20.6569 18 22 16.6569 22 15V5C22 3.34315 20.6569 2 19 2H5C3.34315 2 2 3.34315 2 5V15Z" fill="#12131A"/>\n\
                            <path d="M8 20C7.44772 20 7 20.4477 7 21C7 21.5523 7.44772 22 8 22H16C16.5523 22 17 21.5523 17 21C17 20.4477 16.5523 20 16 20H8Z" fill="#12131A"/></g>\n\
                            <path d="M7 6C6.44772 6 6 6.44772 6 7C6 7.55228 6.44772 8 7 8H14C14.5523 8 15 7.55228 15 7C15 6.44772 14.5523 6 14 6H7Z" fill="#12131A"/>\n\
                            <path d="M7 10C6.44772 10 6 10.4477 6 11C6 11.5523 6.44772 12 7 12H9C9.55229 12 10 11.5523 10 11C10 10.4477 9.55229 10 9 10H7Z" fill="#12131A"/>\n\
                            </svg></span></a>';
            }
        }
    ]
});
the_table2 = $("#dataTable_dusun").DataTable({
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
        "url": site_url + 'api/dasawisma/Api_catatan_keluarga/dusun',
        "type": "POST"
    },
    "columns": [{
            "data": "id_data_keluarga",
            "searchable": false,
            render: function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        { "data": "date_year" },
        { "data": "Nama_Kecamatan" },
        { "data": "Nama_Desa" },
        { "data": "nama_dusun" },
        { "data": "nama_kepala_keluarga" },
        { "data": "jumlah_kk" },
        { "data": "kreteria_rumah" },
        {
            "data": "id_data_keluarga",
            "orderable": false,
            "render": function(data, type, row, meta) {
                return '<a href="' + site_url + 'dasawisma/catatan_keluarga/detail/' + row.id_data_keluarga + '" class="btn btn-icon btn-light-facebook me-5 ">\n\
                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n\
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor"/>\n\
                            <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>\n\
                            <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>\n\
                            <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>\n\
                            </svg></span>\n\
                            </a>\n\
                            <a href="' + site_url + 'dasawisma/catatan_keluarga/view/' + row.id_data_keluarga + '" class="btn btn-icon btn-light-twitter me-5 ">\n\
                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g opacity="0.25">\n\
                            <path d="M2 15C2 16.6569 3.34315 18 5 18L19 18C20.6569 18 22 16.6569 22 15V5C22 3.34315 20.6569 2 19 2H5C3.34315 2 2 3.34315 2 5V15Z" fill="#12131A"/>\n\
                            <path d="M8 20C7.44772 20 7 20.4477 7 21C7 21.5523 7.44772 22 8 22H16C16.5523 22 17 21.5523 17 21C17 20.4477 16.5523 20 16 20H8Z" fill="#12131A"/></g>\n\
                            <path d="M7 6C6.44772 6 6 6.44772 6 7C6 7.55228 6.44772 8 7 8H14C14.5523 8 15 7.55228 15 7C15 6.44772 14.5523 6 14 6H7Z" fill="#12131A"/>\n\
                            <path d="M7 10C6.44772 10 6 10.4477 6 11C6 11.5523 6.44772 12 7 12H9C9.55229 12 10 11.5523 10 11C10 10.4477 9.55229 10 9 10H7Z" fill="#12131A"/>\n\
                            </svg></span></a>';
            }
        }
    ]
});
the_table3 = $("#dataTable_rw").DataTable({
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
        "url": site_url + 'api/dasawisma/Api_catatan_keluarga/rw',
        "type": "POST"
    },
    "columns": [{
            "data": "id_data_keluarga",
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
        { "data": "nama_kepala_keluarga" },
        { "data": "jumlah_kk" },
        { "data": "kreteria_rumah" },
        {
            "data": "id_data_keluarga",
            "orderable": false,
            "render": function(data, type, row, meta) {
                return '<a href="' + site_url + 'dasawisma/catatan_keluarga/detail/' + row.id_data_keluarga + '" class="btn btn-icon btn-light-facebook me-5 ">\n\
                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n\
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor"/>\n\
                            <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>\n\
                            <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>\n\
                            <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>\n\
                            </svg></span>\n\
                            </a>\n\
                            <a href="' + site_url + 'dasawisma/catatan_keluarga/view/' + row.id_data_keluarga + '" class="btn btn-icon btn-light-twitter me-5 ">\n\
                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g opacity="0.25">\n\
                            <path d="M2 15C2 16.6569 3.34315 18 5 18L19 18C20.6569 18 22 16.6569 22 15V5C22 3.34315 20.6569 2 19 2H5C3.34315 2 2 3.34315 2 5V15Z" fill="#12131A"/>\n\
                            <path d="M8 20C7.44772 20 7 20.4477 7 21C7 21.5523 7.44772 22 8 22H16C16.5523 22 17 21.5523 17 21C17 20.4477 16.5523 20 16 20H8Z" fill="#12131A"/></g>\n\
                            <path d="M7 6C6.44772 6 6 6.44772 6 7C6 7.55228 6.44772 8 7 8H14C14.5523 8 15 7.55228 15 7C15 6.44772 14.5523 6 14 6H7Z" fill="#12131A"/>\n\
                            <path d="M7 10C6.44772 10 6 10.4477 6 11C6 11.5523 6.44772 12 7 12H9C9.55229 12 10 11.5523 10 11C10 10.4477 9.55229 10 9 10H7Z" fill="#12131A"/>\n\
                            </svg></span></a>';
            }
        }
    ]
});
the_table4 = $("#dataTable_rt").DataTable({
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
        "url": site_url + 'api/dasawisma/Api_catatan_keluarga/rt',
        "type": "POST"
    },
    "columns": [{
            "data": "id_data_keluarga",
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
        { "data": "nama_kepala_keluarga" },
        { "data": "jumlah_kk" },
        { "data": "kreteria_rumah" },
        {
            "data": "id_data_keluarga",
            "orderable": false,
            "render": function(data, type, row, meta) {
                return '<a href="' + site_url + 'dasawisma/catatan_keluarga/detail/' + row.id_data_keluarga + '" class="btn btn-icon btn-light-facebook me-5 ">\n\
                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n\
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor"/>\n\
                            <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>\n\
                            <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>\n\
                            <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>\n\
                            </svg></span>\n\
                            </a>\n\
                            <a href="' + site_url + 'dasawisma/catatan_keluarga/view/' + row.id_data_keluarga + '" class="btn btn-icon btn-light-twitter me-5 ">\n\
                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g opacity="0.25">\n\
                            <path d="M2 15C2 16.6569 3.34315 18 5 18L19 18C20.6569 18 22 16.6569 22 15V5C22 3.34315 20.6569 2 19 2H5C3.34315 2 2 3.34315 2 5V15Z" fill="#12131A"/>\n\
                            <path d="M8 20C7.44772 20 7 20.4477 7 21C7 21.5523 7.44772 22 8 22H16C16.5523 22 17 21.5523 17 21C17 20.4477 16.5523 20 16 20H8Z" fill="#12131A"/></g>\n\
                            <path d="M7 6C6.44772 6 6 6.44772 6 7C6 7.55228 6.44772 8 7 8H14C14.5523 8 15 7.55228 15 7C15 6.44772 14.5523 6 14 6H7Z" fill="#12131A"/>\n\
                            <path d="M7 10C6.44772 10 6 10.4477 6 11C6 11.5523 6.44772 12 7 12H9C9.55229 12 10 11.5523 10 11C10 10.4477 9.55229 10 9 10H7Z" fill="#12131A"/>\n\
                            </svg></span></a>';
            }
        }
    ]
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

    window.location = site_url + "api/dasawisma/Api_catatan_keluarga/delete/" + $id;
}