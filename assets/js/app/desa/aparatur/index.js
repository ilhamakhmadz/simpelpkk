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
                    return '<a href="' + site_url + 'desa/aparatur/view/' + row.id + '" class="btn btn-icon btn-light-twitter me-5 ">\n\
                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                            < rect x = "0" y = "0" width = "24" height = "24" />\n\
                        <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill - rule="nonzero" opacity = "0.4" />\n\
                        <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="1" />\n\
                        </svg ></span > </a >\n\
                    <a href="' + site_url + 'desa/aparatur/edit/' + row.id + '" class="btn btn-icon btn-light-facebook me-5 " >\n\
                        <span class="svg-icon svg-icon-success svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />\n\
                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1" />\n\
                        </svg></span> </a >\n\
                       ';
                }
            }
        ]
    });
});
$(document).ready(function() {
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
                    return '<a href="' + site_url + 'desa/aparatur/view/' + row.id + '" class="btn btn-icon btn-light-twitter me-5 ">\n\
                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                            < rect x = "0" y = "0" width = "24" height = "24" />\n\
                        <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill - rule="nonzero" opacity = "0.4" />\n\
                        <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="1" />\n\
                        </svg ></span > </a >\n\
                    <a href="' + site_url + 'desa/aparatur/edit/' + row.id + '" class="btn btn-icon btn-light-facebook me-5 " >\n\
                        <span class="svg-icon svg-icon-success svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />\n\
                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1" />\n\
                        </svg></span> </a >\n\
                       ';
                }
            }
        ]
    });
});

$(document).ready(function() {
    the_table1 = $("#dataTable_dusun").DataTable({
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
                    return '<a href="' + site_url + 'desa/aparatur/view/' + row.id + '" class="btn btn-icon btn-light-twitter me-5 ">\n\
                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                            < rect x = "0" y = "0" width = "24" height = "24" />\n\
                        <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill - rule="nonzero" opacity = "0.4" />\n\
                        <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="1" />\n\
                        </svg ></span > </a >\n\
                    <a href="' + site_url + 'desa/aparatur/edit/' + row.id + '" class="btn btn-icon btn-light-facebook me-5 " >\n\
                        <span class="svg-icon svg-icon-success svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />\n\
                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1" />\n\
                        </svg></span> </a >\n\
                       ';
                }
            }
        ]
    });
});

$(document).ready(function() {
    the_table1 = $("#dataTable_rw").DataTable({
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
                    return '<a href="' + site_url + 'desa/aparatur/view/' + row.id + '" class="btn btn-icon btn-light-twitter me-5 ">\n\
                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                            < rect x = "0" y = "0" width = "24" height = "24" />\n\
                        <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill - rule="nonzero" opacity = "0.4" />\n\
                        <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="1" />\n\
                        </svg ></span > </a >\n\
                    <a href="' + site_url + 'desa/aparatur/edit/' + row.id + '" class="btn btn-icon btn-light-facebook me-5 " >\n\
                        <span class="svg-icon svg-icon-success svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />\n\
                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1" />\n\
                        </svg></span> </a >\n\
                       ';
                }
            }
        ]
    });
});
$(document).ready(function() {
    the_table1 = $("#dataTable_rt").DataTable({
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
                    return '<a href="' + site_url + 'desa/aparatur/view/' + row.id + '" class="btn btn-icon btn-light-twitter me-5 ">\n\
                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                            < rect x = "0" y = "0" width = "24" height = "24" />\n\
                        <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill - rule="nonzero" opacity = "0.4" />\n\
                        <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="1" />\n\
                        </svg ></span > </a >\n\
                    <a href="' + site_url + 'desa/aparatur/edit/' + row.id + '" class="btn btn-icon btn-light-facebook me-5 " >\n\
                        <span class="svg-icon svg-icon-success svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />\n\
                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1" />\n\
                        </svg></span> </a >\n\
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