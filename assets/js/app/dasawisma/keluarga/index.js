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
        // $('body').on('click', 'a#close-toastr', function() {
        //     $(this).closest('.toast').remove();
        // });
}
var the_table;
var the_table1;
var the_table2;
var the_table3;
var the_table4;
var the_table5;
var the_table6;
var the_table7;
var the_table8;
$(document).ready(function() {
    the_table = $("#dataTable_kecamatan").DataTable({
        responsive: true,
        searching: true,
        "aaSorting": [
            [1, 'desc']
        ],
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
            "url": site_url + 'api/dasawisma/Api_keluarga/kecamatan',
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
            { "data": "total_laki" },
            { "data": "total_perempuan" },
            { "data": "jumlah_kk" },
            {
                "data": "id_data_keluarga",
                "orderable": false,
                "render": function(data, type, row, meta) {
                    return '<div class="d-flex align-items-center me-2">\n\
                                <a href="' + site_url + 'dasawisma/keluarga/detail/' + row.id_data_keluarga + '" class="btn btn-sm btn-icon btn-light-warning btn-active-light-default  me-1"\n\
                                    type="button" data-bs-toggle="tooltip" title="Detail Anggota">\n\
                                    <i class="bi bi-diagram-3 fs-3"></i>\n\
                                </a>\n\
                                <a href="' + site_url + 'dasawisma/keluarga/view/' + row.id_data_keluarga + '" class="btn btn-sm btn-icon btn-light-primary btn-active-light-default  me-1" \n\
                                    type="button" data-bs-toggle="tooltip" title="Lihat Data">\n\
                                    <i class="bi bi-eyeglasses fs-3"></i>\n\
                                </a>\n\
                                <a href = "' + site_url + 'dasawisma/keluarga/edit/' + row.id_data_keluarga + '" class="btn btn-sm btn-icon btn-light-success btn-active-light-default me-1" \n\
                                    type="button" data-bs-toggle="tooltip" title="Ubah Data">\n\
                                    <i class="bi bi-eyedropper fs-3"></i>\n\
                                </a>\n\
                                <a href="#" onclick="deleteItem(' + row.id_data_keluarga + ')"  class="btn btn-sm btn-icon btn-light-danger btn-active-light-default me-1" \n\
                                    type="button" data-bs-toggle="tooltip" title="Hapus">\n\
                                    <i class="bi bi-trash fs-3"></i>\n\
                                </a>\n\
                            </div>';
                }
            }
        ]
    });
    the_table1 = $("#dataTable_desa").DataTable({
        responsive: true,
        searching: true,
        "aaSorting": [
            [1, 'desc']
        ],
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
            "url": site_url + 'api/dasawisma/Api_keluarga/desa',
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
            { "data": "jumlah_kk" },
            {
                "data": "id_data_keluarga",
                "orderable": false,
                "render": function(data, type, row, meta) {
                    return '<div class="d-flex align-items-center me-2">\n\
                                <a href="' + site_url + 'dasawisma/keluarga/detail/' + row.id_data_keluarga + '" class="btn btn-sm btn-icon btn-light-warning btn-active-light-default  me-1"\n\
                                    type="button" data-bs-toggle="tooltip" title="Detail Anggota">\n\
                                    <i class="bi bi-diagram-3 fs-3"></i>\n\
                                </a>\n\
                                <a href="' + site_url + 'dasawisma/keluarga/view/' + row.id_data_keluarga + '" class="btn btn-sm btn-icon btn-light-primary btn-active-light-default  me-1" \n\
                                    type="button" data-bs-toggle="tooltip" title="Lihat Data">\n\
                                    <i class="bi bi-eyeglasses fs-3"></i>\n\
                                </a>\n\
                                <a href = "' + site_url + 'dasawisma/keluarga/edit/' + row.id_data_keluarga + '" class="btn btn-sm btn-icon btn-light-success btn-active-light-default me-1" \n\
                                    type="button" data-bs-toggle="tooltip" title="Ubah Data">\n\
                                    <i class="bi bi-eyedropper fs-3"></i>\n\
                                </a>\n\
                                <a href="#" onclick="deleteItem(' + row.id_data_keluarga + ')"  class="btn btn-sm btn-icon btn-light-danger btn-active-light-default me-1" \n\
                                    type="button" data-bs-toggle="tooltip" title="Hapus">\n\
                                    <i class="bi bi-trash fs-3"></i>\n\
                                </a>\n\
                            </div>';
                }
            }
        ]
    });
    the_table2 = $("#dataTable_dusun").DataTable({
        responsive: true,
        searching: true,
        "aaSorting": [
            [1, 'desc']
        ],
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
            "url": site_url + 'api/dasawisma/Api_keluarga/dusun',
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
            { "data": "jumlah_kk" },
            {
                "data": "id_data_keluarga",
                "orderable": false,
                "render": function(data, type, row, meta) {
                    return '<div class="d-flex align-items-center me-2">\n\
                                <a href="' + site_url + 'dasawisma/keluarga/detail/' + row.id_data_keluarga + '" class="btn btn-sm btn-icon btn-light-warning btn-active-light-default  me-1"\n\
                                    type="button" data-bs-toggle="tooltip" title="Detail Anggota">\n\
                                    <i class="bi bi-diagram-3 fs-3"></i>\n\
                                </a>\n\
                                <a href="' + site_url + 'dasawisma/keluarga/view/' + row.id_data_keluarga + '" class="btn btn-sm btn-icon btn-light-primary btn-active-light-default  me-1" \n\
                                    type="button" data-bs-toggle="tooltip" title="Lihat Data">\n\
                                    <i class="bi bi-eyeglasses fs-3"></i>\n\
                                </a>\n\
                                <a href = "' + site_url + 'dasawisma/keluarga/edit/' + row.id_data_keluarga + '" class="btn btn-sm btn-icon btn-light-success btn-active-light-default me-1" \n\
                                    type="button" data-bs-toggle="tooltip" title="Ubah Data">\n\
                                    <i class="bi bi-eyedropper fs-3"></i>\n\
                                </a>\n\
                                <a href="#" onclick="deleteItem(' + row.id_data_keluarga + ')"  class="btn btn-sm btn-icon btn-light-danger btn-active-light-default me-1" \n\
                                    type="button" data-bs-toggle="tooltip" title="Hapus">\n\
                                    <i class="bi bi-trash fs-3"></i>\n\
                                </a>\n\
                            </div>';
                }
            }
        ]
    });
    the_table3 = $("#dataTable_rw").DataTable({
        responsive: true,
        searching: true,
        "aaSorting": [
            [1, 'desc']
        ],
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
            "url": site_url + 'api/dasawisma/Api_keluarga/rw',
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
            { "data": "jumlah_kk" },
            {
                "data": "id_data_keluarga",
                "orderable": false,
                "render": function(data, type, row, meta) {
                    return '<div class="d-flex align-items-center me-2">\n\
                                <a href="' + site_url + 'dasawisma/keluarga/detail/' + row.id_data_keluarga + '" class="btn btn-sm btn-icon btn-light-warning btn-active-light-default  me-1"\n\
                                    type="button" data-bs-toggle="tooltip" title="Detail Anggota">\n\
                                    <i class="bi bi-diagram-3 fs-3"></i>\n\
                                </a>\n\
                                <a href="' + site_url + 'dasawisma/keluarga/view/' + row.id_data_keluarga + '" class="btn btn-sm btn-icon btn-light-primary btn-active-light-default  me-1" \n\
                                    type="button" data-bs-toggle="tooltip" title="Lihat Data">\n\
                                    <i class="bi bi-eyeglasses fs-3"></i>\n\
                                </a>\n\
                                <a href = "' + site_url + 'dasawisma/keluarga/edit/' + row.id_data_keluarga + '" class="btn btn-sm btn-icon btn-light-success btn-active-light-default me-1" \n\
                                    type="button" data-bs-toggle="tooltip" title="Ubah Data">\n\
                                    <i class="bi bi-eyedropper fs-3"></i>\n\
                                </a>\n\
                                <a href="#" onclick="deleteItem(' + row.id_data_keluarga + ')"  class="btn btn-sm btn-icon btn-light-danger btn-active-light-default me-1" \n\
                                    type="button" data-bs-toggle="tooltip" title="Hapus">\n\
                                    <i class="bi bi-trash fs-3"></i>\n\
                                </a>\n\
                            </div>';
                }
            }
        ]
    });
    the_table4 = $("#dataTable_rt").DataTable({
        responsive: true,
        searching: true,
        "aaSorting": [
            [1, 'desc']
        ],
        processing: true,
        serverSide: true,
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        stateSave: true,
        // dom: 'Bfrtip',
        // buttons: [
        //     'excel', 'pdf', 'print'
        // ],
        "ajax": {
            "url": site_url + 'api/dasawisma/Api_keluarga/rt',
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
            { "data": "jumlah_kk" },
            {
                "data": "id_data_keluarga",
                "orderable": false,
                "render": function(data, type, row, meta) {
                    return '<div class="d-flex align-items-center me-2">\n\
                                <a href="' + site_url + 'dasawisma/keluarga/detail/' + row.id_data_keluarga + '" class="btn btn-sm btn-icon btn-light-warning btn-active-light-default  me-1"\n\
                                    type="button" data-bs-toggle="tooltip" title="Detail Anggota">\n\
                                    <i class="bi bi-diagram-3 fs-3"></i>\n\
                                </a>\n\
                                <a href="' + site_url + 'dasawisma/keluarga/view/' + row.id_data_keluarga + '" class="btn btn-sm btn-icon btn-light-primary btn-active-light-default  me-1" \n\
                                    type="button" data-bs-toggle="tooltip" title="Lihat Data">\n\
                                    <i class="bi bi-eyeglasses fs-3"></i>\n\
                                </a>\n\
                                <a href = "' + site_url + 'dasawisma/keluarga/edit/' + row.id_data_keluarga + '" class="btn btn-sm btn-icon btn-light-success btn-active-light-default me-1" \n\
                                    type="button" data-bs-toggle="tooltip" title="Ubah Data">\n\
                                    <i class="bi bi-eyedropper fs-3"></i>\n\
                                </a>\n\
                                <a href="#" onclick="deleteItem(' + row.id_data_keluarga + ')"  class="btn btn-sm btn-icon btn-light-danger btn-active-light-default me-1" \n\
                                    type="button" data-bs-toggle="tooltip" title="Hapus">\n\
                                    <i class="bi bi-trash fs-3"></i>\n\
                                </a>\n\
                            </div>';
                }
            }
        ]
    });
    the_table5 = $("#dataTable_dasawisma").DataTable({
        responsive: true,
        searching: true,
        "aaSorting": [
            [1, 'desc']
        ],
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
            "url": site_url + 'api/dasawisma/Api_keluarga/dasawisma',
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
            { "data": "nama_dasawisma" },
            { "data": "jumlah_kk" },
            {
                "data": "id_data_keluarga",
                "orderable": false,
                "render": function(data, type, row, meta) {

                    return '<div class="d-flex align-items-center me-2">\n\
                                <a href="' + site_url + 'dasawisma/keluarga/detail/' + row.id_data_keluarga + '" class="btn btn-sm btn-icon btn-light-warning btn-active-light-default  me-1"\n\
                                    type="button" data-bs-toggle="tooltip" title="Detail Anggota">\n\
                                    <i class="bi bi-diagram-3 fs-3"></i>\n\
                                </a>\n\
                                <a href="' + site_url + 'dasawisma/keluarga/view/' + row.id_data_keluarga + '" class="btn btn-sm btn-icon btn-light-primary btn-active-light-default  me-1" \n\
                                    type="button" data-bs-toggle="tooltip" title="Lihat Data">\n\
                                    <i class="bi bi-eyeglasses fs-3"></i>\n\
                                </a>\n\
                                <a href = "' + site_url + 'dasawisma/keluarga/edit/' + row.id_data_keluarga + '" class="btn btn-sm btn-icon btn-light-success btn-active-light-default me-1" \n\
                                    type="button" data-bs-toggle="tooltip" title="Ubah Data">\n\
                                    <i class="bi bi-eyedropper fs-3"></i>\n\
                                </a>\n\
                                <a href="#" onclick="deleteItem(' + row.id_data_keluarga + ')"  class="btn btn-sm btn-icon btn-light-danger btn-active-light-default me-1" \n\
                                    type="button" data-bs-toggle="tooltip" title="Hapus">\n\
                                    <i class="bi bi-trash fs-3"></i>\n\
                                </a>\n\
                            </div>';
                }
            }
        ]
    });



    the_table7 = $("#dataTable_keluarga").DataTable({
        responsive: true,
        searching: true,
        "aaSorting": [
            [1, 'desc']
        ],
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
            "url": site_url + 'api/dasawisma/Api_keluarga/keluarga',
            "type": "POST"
        },
        "columns": [{
                "data": "id_data_keluarga",
                "searchable": false,
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                "data": "created_date",
                "render": function(data, type, row, meta) {
                    return data + "<br /><i>" + moment(data).fromNow() + "</i>";
                }
            },
            {
                "data": "Nama_Kecamatan",
                "render": function(data, type, row, meta) {
                    return data + '<br> Desa ' + row.Nama_Desa;
                }
            },
            {
                "data": "nama_dusun",
                "render": function(data, type, row, meta) {
                    return 'Dusun : ' + data + '<br>RW : ' + row.rw + '<br>RT : ' + row.rt + '<br>Dasawisma : ' + row.nama_dasawisma;
                }
            },
            { "data": "nama_kepala_keluarga" },
            { "data": "jumlah_kk" },
            {
                "data": "id_data_keluarga",
                "orderable": false,
                "render": function(data, type, row, meta) {

                    return '<div class="d-flex align-items-center me-2">\n\
                                <a href="' + site_url + 'dasawisma/keluarga/detail/' + row.id_data_keluarga + '" class="btn btn-sm btn-icon btn-light-warning btn-active-light-default  me-1"\n\
                                    type="button" data-bs-toggle="tooltip" title="Detail Anggota">\n\
                                    <i class="bi bi-diagram-3 fs-3"></i>\n\
                                </a>\n\
                                <a href="' + site_url + 'dasawisma/keluarga/view/' + row.id_data_keluarga + '" class="btn btn-sm btn-icon btn-light-primary btn-active-light-default  me-1" \n\
                                    type="button" data-bs-toggle="tooltip" title="Lihat Data">\n\
                                    <i class="bi bi-eyeglasses fs-3"></i>\n\
                                </a>\n\
                                <a href = "' + site_url + 'dasawisma/keluarga/edit/' + row.id_data_keluarga + '" class="btn btn-sm btn-icon btn-light-success btn-active-light-default me-1" \n\
                                    type="button" data-bs-toggle="tooltip" title="Ubah Data">\n\
                                    <i class="bi bi-eyedropper fs-3"></i>\n\
                                </a>\n\
                                <a href="#" onclick="deleteItem(' + row.id_data_keluarga + ')"  class="btn btn-sm btn-icon btn-light-danger btn-active-light-default me-1" \n\
                                    type="button" data-bs-toggle="tooltip" title="Hapus">\n\
                                    <i class="bi bi-trash fs-3"></i>\n\
                                </a>\n\
                            </div>';
                }
            }
        ]
    });
    the_table8 = $("#dataTable_keluarga_general").DataTable({
        responsive: true,
        searching: true,
        "aaSorting": [
            [1, 'desc']
        ],
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
            "url": site_url + 'api/dasawisma/Api_keluarga/keluarga',
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
                    return 'Dusun : ' + data + '<br>RW : ' + row.rw + '<br>RT : ' + row.rt + '<br>Dasawisma : ' + row.nama_dasawisma;
                }
            },
            { "data": "nama_kepala_keluarga" },
            { "data": "jumlah_kk" },
            {
                "data": "id_data_keluarga",
                "orderable": false,
                "render": function(data, type, row, meta) {
                    return '<div class="d-flex align-items-center me-2">\n\
                                <a href="' + site_url + 'dasawisma/keluarga/detail/' + row.id_data_keluarga + '" class="btn btn-sm btn-icon btn-light-warning btn-active-light-default  me-1"\n\
                                    type="button" data-bs-toggle="tooltip" title="Detail Anggota">\n\
                                    <i class="bi bi-diagram-3 fs-3"></i>\n\
                                </a>\n\
                                <a href="' + site_url + 'dasawisma/keluarga/view/' + row.id_data_keluarga + '" class="btn btn-sm btn-icon btn-light-primary btn-active-light-default  me-1" \n\
                                    type="button" data-bs-toggle="tooltip" title="Lihat Data">\n\
                                    <i class="bi bi-eyeglasses fs-3"></i>\n\
                                </a>\n\
                                <a href="#" onclick="deleteItem(' + row.id_data_keluarga + ')"  class="btn btn-sm btn-icon btn-light-danger btn-active-light-default me-1" \n\
                                    type="button" data-bs-toggle="tooltip" title="Hapus">\n\
                                    <i class="bi bi-trash fs-3"></i>\n\
                                </a>\n\
                            </div>';
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

    window.location = site_url + "api/dasawisma/Api_keluarga/delete/" + $id;
}