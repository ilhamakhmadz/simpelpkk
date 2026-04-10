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
$(document).ready(function() {
    the_table = $("#dataTable_profil_kecamatan").DataTable({
        responsive: true,
        searching: true,
        processing: true,
        serverSide: true,
        "aaSorting": [
            [1, 'desc']
        ],
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">",
        stateSave: true,
        "ajax": {
            "url": site_url + 'api/desa/Api_profil/kecamatan',
            "type": "POST"
        },
        "columns": [{
                "data": "id",
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
            { "data": "date_year" },
            { "data": "Nama_Kecamatan" },
            { "data": "jml_kk" },
            { "data": "jml_penduduk" },
            {
                "data": "id",
                "orderable": false,
                "render": function(data, type, row, meta) {
                    return '<a href="' + site_url + 'desa/profil/view/' + row.id + '" class="btn btn-icon btn-light-twitter me-5 ">\n\
                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g opacity="0.25">\n\
                            <path d="M2 15C2 16.6569 3.34315 18 5 18L19 18C20.6569 18 22 16.6569 22 15V5C22 3.34315 20.6569 2 19 2H5C3.34315 2 2 3.34315 2 5V15Z" fill="#12131A"/>\n\
                            <path d="M8 20C7.44772 20 7 20.4477 7 21C7 21.5523 7.44772 22 8 22H16C16.5523 22 17 21.5523 17 21C17 20.4477 16.5523 20 16 20H8Z" fill="#12131A"/></g>\n\
                            <path d="M7 6C6.44772 6 6 6.44772 6 7C6 7.55228 6.44772 8 7 8H14C14.5523 8 15 7.55228 15 7C15 6.44772 14.5523 6 14 6H7Z" fill="#12131A"/>\n\
                            <path d="M7 10C6.44772 10 6 10.4477 6 11C6 11.5523 6.44772 12 7 12H9C9.55229 12 10 11.5523 10 11C10 10.4477 9.55229 10 9 10H7Z" fill="#12131A"/>\n\
                            </svg></span></a>\n\
                            <a href = "' + site_url + 'desa/profil/edit/' + row.id + '" class="btn btn-icon btn-light-facebook me-5 " >\n\
                            <span class="svg-icon svg-icon-success svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\n\
                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\n\
                            </svg></span></a>\n\
                            <a href="#" onclick="deleteItem(' + row.id + ')" class="btn btn-icon btn-light-google me-5 ">\n\
                            <span class="svg-icon svg-icon-danger svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\n\
                                    <polygon points="0 0 24 0 24 24 0 24"/>\n\
                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>\n\
                                    <path d="M10.5857864,13 L9.17157288,11.5857864 C8.78104858,11.1952621 8.78104858,10.5620972 9.17157288,10.1715729 C9.56209717,9.78104858 10.1952621,9.78104858 10.5857864,10.1715729 L12,11.5857864 L13.4142136,10.1715729 C13.8047379,9.78104858 14.4379028,9.78104858 14.8284271,10.1715729 C15.2189514,10.5620972 15.2189514,11.1952621 14.8284271,11.5857864 L13.4142136,13 L14.8284271,14.4142136 C15.2189514,14.8047379 15.2189514,15.4379028 14.8284271,15.8284271 C14.4379028,16.2189514 13.8047379,16.2189514 13.4142136,15.8284271 L12,14.4142136 L10.5857864,15.8284271 C10.1952621,16.2189514 9.56209717,16.2189514 9.17157288,15.8284271 C8.78104858,15.4379028 8.78104858,14.8047379 9.17157288,14.4142136 L10.5857864,13 Z" fill="#000000"/>\n\
                                </g>\n\
                            </svg></span>\n\
                            </a>';
                }
            }
        ]
    });
    the_table1 = $("#dataTable_profil_desa").DataTable({
        responsive: true,
        searching: true,
        processing: true,
        serverSide: true,
        "aaSorting": [
            [1, 'desc']
        ],
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">",
        stateSave: true,
        "ajax": {
            "url": site_url + 'api/desa/Api_profil/desa',
            "type": "POST"
        },
        "columns": [{
                "data": "id",
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
            { "data": "date_year" },
            {
                "data": "Nama_Kecamatan",
                "render": function(data, type, row, meta) {
                    if (data != null) {
                        return "Kec " + data + "<br> Desa " + row.Nama_Desa;
                    } else {
                        return "Kec " + data + "<br> Desa -";
                    }

                }
            },
            { "data": "jml_kk" },
            { "data": "jml_penduduk" },
            {
                "data": "id",
                "orderable": false,
                "render": function(data, type, row, meta) {
                    return '<a href="' + site_url + 'desa/profil/view/' + row.id + '" class="btn btn-icon btn-light-twitter me-5 ">\n\
                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g opacity="0.25">\n\
                            <path d="M2 15C2 16.6569 3.34315 18 5 18L19 18C20.6569 18 22 16.6569 22 15V5C22 3.34315 20.6569 2 19 2H5C3.34315 2 2 3.34315 2 5V15Z" fill="#12131A"/>\n\
                            <path d="M8 20C7.44772 20 7 20.4477 7 21C7 21.5523 7.44772 22 8 22H16C16.5523 22 17 21.5523 17 21C17 20.4477 16.5523 20 16 20H8Z" fill="#12131A"/></g>\n\
                            <path d="M7 6C6.44772 6 6 6.44772 6 7C6 7.55228 6.44772 8 7 8H14C14.5523 8 15 7.55228 15 7C15 6.44772 14.5523 6 14 6H7Z" fill="#12131A"/>\n\
                            <path d="M7 10C6.44772 10 6 10.4477 6 11C6 11.5523 6.44772 12 7 12H9C9.55229 12 10 11.5523 10 11C10 10.4477 9.55229 10 9 10H7Z" fill="#12131A"/>\n\
                            </svg></span></a>\n\
                            <a href = "' + site_url + 'desa/profil/edit/' + row.id + '" class="btn btn-icon btn-light-facebook me-5 " >\n\
                            <span class="svg-icon svg-icon-success svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\n\
                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\n\
                            </svg></span></a>\n\
                            <a href="#" onclick="deleteItem(' + row.id + ')" class="btn btn-icon btn-light-google me-5 ">\n\
                            <span class="svg-icon svg-icon-danger svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\n\
                                    <polygon points="0 0 24 0 24 24 0 24"/>\n\
                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>\n\
                                    <path d="M10.5857864,13 L9.17157288,11.5857864 C8.78104858,11.1952621 8.78104858,10.5620972 9.17157288,10.1715729 C9.56209717,9.78104858 10.1952621,9.78104858 10.5857864,10.1715729 L12,11.5857864 L13.4142136,10.1715729 C13.8047379,9.78104858 14.4379028,9.78104858 14.8284271,10.1715729 C15.2189514,10.5620972 15.2189514,11.1952621 14.8284271,11.5857864 L13.4142136,13 L14.8284271,14.4142136 C15.2189514,14.8047379 15.2189514,15.4379028 14.8284271,15.8284271 C14.4379028,16.2189514 13.8047379,16.2189514 13.4142136,15.8284271 L12,14.4142136 L10.5857864,15.8284271 C10.1952621,16.2189514 9.56209717,16.2189514 9.17157288,15.8284271 C8.78104858,15.4379028 8.78104858,14.8047379 9.17157288,14.4142136 L10.5857864,13 Z" fill="#000000"/>\n\
                                </g>\n\
                            </svg></span>\n\
                            </a>';
                }
            }
        ]
    });
    the_table2 = $("#dataTable_profil_dusun").DataTable({
        responsive: true,
        searching: true,
        processing: true,
        serverSide: true,
        "aaSorting": [
            [1, 'desc']
        ],
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">",
        stateSave: true,
        "ajax": {
            "url": site_url + 'api/desa/Api_profil/dusun',
            "type": "POST"
        },
        "columns": [{
                "data": "id",
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
            { "data": "date_year" },
            {
                "data": "Nama_Kecamatan",
                "render": function(data, type, row, meta) {
                    return "Kec " + data + "<br> Desa " + row.Nama_Desa;
                }
            },
            {
                "data": "nama_dusun",
                "render": function(data, type, row, meta) {
                    return data;
                }
            },

            { "data": "jml_kk" },
            { "data": "jml_penduduk" },
            {
                "data": "id",
                "orderable": false,
                "render": function(data, type, row, meta) {
                    return '<a href="' + site_url + 'desa/profil/view/' + row.id + '" class="btn btn-icon btn-light-twitter me-5 ">\n\
                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g opacity="0.25">\n\
                            <path d="M2 15C2 16.6569 3.34315 18 5 18L19 18C20.6569 18 22 16.6569 22 15V5C22 3.34315 20.6569 2 19 2H5C3.34315 2 2 3.34315 2 5V15Z" fill="#12131A"/>\n\
                            <path d="M8 20C7.44772 20 7 20.4477 7 21C7 21.5523 7.44772 22 8 22H16C16.5523 22 17 21.5523 17 21C17 20.4477 16.5523 20 16 20H8Z" fill="#12131A"/></g>\n\
                            <path d="M7 6C6.44772 6 6 6.44772 6 7C6 7.55228 6.44772 8 7 8H14C14.5523 8 15 7.55228 15 7C15 6.44772 14.5523 6 14 6H7Z" fill="#12131A"/>\n\
                            <path d="M7 10C6.44772 10 6 10.4477 6 11C6 11.5523 6.44772 12 7 12H9C9.55229 12 10 11.5523 10 11C10 10.4477 9.55229 10 9 10H7Z" fill="#12131A"/>\n\
                            </svg></span></a>\n\
                            <a href = "' + site_url + 'desa/profil/edit/' + row.id + '" class="btn btn-icon btn-light-facebook me-5 " >\n\
                            <span class="svg-icon svg-icon-success svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\n\
                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\n\
                            </svg></span></a>\n\
                            <a href="#" onclick="deleteItem(' + row.id + ')" class="btn btn-icon btn-light-google me-5 ">\n\
                            <span class="svg-icon svg-icon-danger svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\n\
                                    <polygon points="0 0 24 0 24 24 0 24"/>\n\
                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>\n\
                                    <path d="M10.5857864,13 L9.17157288,11.5857864 C8.78104858,11.1952621 8.78104858,10.5620972 9.17157288,10.1715729 C9.56209717,9.78104858 10.1952621,9.78104858 10.5857864,10.1715729 L12,11.5857864 L13.4142136,10.1715729 C13.8047379,9.78104858 14.4379028,9.78104858 14.8284271,10.1715729 C15.2189514,10.5620972 15.2189514,11.1952621 14.8284271,11.5857864 L13.4142136,13 L14.8284271,14.4142136 C15.2189514,14.8047379 15.2189514,15.4379028 14.8284271,15.8284271 C14.4379028,16.2189514 13.8047379,16.2189514 13.4142136,15.8284271 L12,14.4142136 L10.5857864,15.8284271 C10.1952621,16.2189514 9.56209717,16.2189514 9.17157288,15.8284271 C8.78104858,15.4379028 8.78104858,14.8047379 9.17157288,14.4142136 L10.5857864,13 Z" fill="#000000"/>\n\
                                </g>\n\
                            </svg></span>\n\
                            </a>';
                }
            }
        ]
    });
    the_table3 = $("#dataTable_profil_rw").DataTable({
        responsive: true,
        searching: true,
        processing: true,
        serverSide: true,
        "aaSorting": [
            [1, 'desc']
        ],
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">",
        stateSave: true,
        "ajax": {
            "url": site_url + 'api/desa/Api_profil/rw',
            "type": "POST"
        },
        "columns": [{
                "data": "id",
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
            { "data": "date_year" },
            {
                "data": "Nama_Kecamatan",
                "render": function(data, type, row, meta) {
                    return "Kec " + data + "<br> Desa " + row.Nama_Desa;
                }
            },
            {
                "data": "nama_dusun",
                "render": function(data, type, row, meta) {
                    return 'Dusun : ' + data + '<br>RW : ' + row.rw;
                }
            },
            { "data": "jml_kk" },
            { "data": "jml_penduduk" },
            {
                "data": "id",
                "orderable": false,
                "render": function(data, type, row, meta) {
                    return '<a href="' + site_url + 'desa/profil/view/' + row.id + '" class="btn btn-icon btn-light-twitter me-5 ">\n\
                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g opacity="0.25">\n\
                            <path d="M2 15C2 16.6569 3.34315 18 5 18L19 18C20.6569 18 22 16.6569 22 15V5C22 3.34315 20.6569 2 19 2H5C3.34315 2 2 3.34315 2 5V15Z" fill="#12131A"/>\n\
                            <path d="M8 20C7.44772 20 7 20.4477 7 21C7 21.5523 7.44772 22 8 22H16C16.5523 22 17 21.5523 17 21C17 20.4477 16.5523 20 16 20H8Z" fill="#12131A"/></g>\n\
                            <path d="M7 6C6.44772 6 6 6.44772 6 7C6 7.55228 6.44772 8 7 8H14C14.5523 8 15 7.55228 15 7C15 6.44772 14.5523 6 14 6H7Z" fill="#12131A"/>\n\
                            <path d="M7 10C6.44772 10 6 10.4477 6 11C6 11.5523 6.44772 12 7 12H9C9.55229 12 10 11.5523 10 11C10 10.4477 9.55229 10 9 10H7Z" fill="#12131A"/>\n\
                            </svg></span></a>\n\
                            <a href = "' + site_url + 'desa/profil/edit/' + row.id + '" class="btn btn-icon btn-light-facebook me-5 " >\n\
                            <span class="svg-icon svg-icon-success svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\n\
                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\n\
                            </svg></span></a>\n\
                            <a href="#" onclick="deleteItem(' + row.id + ')" class="btn btn-icon btn-light-google me-5 ">\n\
                            <span class="svg-icon svg-icon-danger svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\n\
                                    <polygon points="0 0 24 0 24 24 0 24"/>\n\
                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>\n\
                                    <path d="M10.5857864,13 L9.17157288,11.5857864 C8.78104858,11.1952621 8.78104858,10.5620972 9.17157288,10.1715729 C9.56209717,9.78104858 10.1952621,9.78104858 10.5857864,10.1715729 L12,11.5857864 L13.4142136,10.1715729 C13.8047379,9.78104858 14.4379028,9.78104858 14.8284271,10.1715729 C15.2189514,10.5620972 15.2189514,11.1952621 14.8284271,11.5857864 L13.4142136,13 L14.8284271,14.4142136 C15.2189514,14.8047379 15.2189514,15.4379028 14.8284271,15.8284271 C14.4379028,16.2189514 13.8047379,16.2189514 13.4142136,15.8284271 L12,14.4142136 L10.5857864,15.8284271 C10.1952621,16.2189514 9.56209717,16.2189514 9.17157288,15.8284271 C8.78104858,15.4379028 8.78104858,14.8047379 9.17157288,14.4142136 L10.5857864,13 Z" fill="#000000"/>\n\
                                </g>\n\
                            </svg></span>\n\
                            </a>';
                }
            }
        ]
    });
    the_table4 = $("#dataTable_profil_rt").DataTable({
        responsive: true,
        searching: true,
        processing: true,
        serverSide: true,
        "aaSorting": [
            [1, 'desc']
        ],
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +

            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">",
        stateSave: true,
        "ajax": {
            "url": site_url + 'api/desa/Api_profil/rt',
            "type": "POST"
        },
        "columns": [{
                "data": "id",
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
            { "data": "date_year" },
            {
                "data": "Nama_Kecamatan",
                "render": function(data, type, row, meta) {
                    return "Kec " + data + "<br> Desa " + row.Nama_Desa;
                }
            },
            {
                "data": "nama_dusun",
                "render": function(data, type, row, meta) {
                    return 'Dusun : ' + data + '<br>RW : ' + row.rw + '<br>RT : ' + row.rt;
                }
            },
            { "data": "jml_kk" },
            { "data": "jml_penduduk" },
            {
                "data": "id",
                "orderable": false,
                "render": function(data, type, row, meta) {
                    return '<a href="' + site_url + 'desa/profil/view/' + row.id + '" class="btn btn-icon btn-light-twitter me-5 ">\n\
                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g opacity="0.25">\n\
                            <path d="M2 15C2 16.6569 3.34315 18 5 18L19 18C20.6569 18 22 16.6569 22 15V5C22 3.34315 20.6569 2 19 2H5C3.34315 2 2 3.34315 2 5V15Z" fill="#12131A"/>\n\
                            <path d="M8 20C7.44772 20 7 20.4477 7 21C7 21.5523 7.44772 22 8 22H16C16.5523 22 17 21.5523 17 21C17 20.4477 16.5523 20 16 20H8Z" fill="#12131A"/></g>\n\
                            <path d="M7 6C6.44772 6 6 6.44772 6 7C6 7.55228 6.44772 8 7 8H14C14.5523 8 15 7.55228 15 7C15 6.44772 14.5523 6 14 6H7Z" fill="#12131A"/>\n\
                            <path d="M7 10C6.44772 10 6 10.4477 6 11C6 11.5523 6.44772 12 7 12H9C9.55229 12 10 11.5523 10 11C10 10.4477 9.55229 10 9 10H7Z" fill="#12131A"/>\n\
                            </svg></span></a>\n\
                            <a href = "' + site_url + 'desa/profil/edit/' + row.id + '" class="btn btn-icon btn-light-facebook me-5 " >\n\
                            <span class="svg-icon svg-icon-success svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\n\
                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\n\
                            </svg></span></a>\n\
                            <a href="#" onclick="deleteItem(' + row.id + ')" class="btn btn-icon btn-light-google me-5 ">\n\
                            <span class="svg-icon svg-icon-danger svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\n\
                                    <polygon points="0 0 24 0 24 24 0 24"/>\n\
                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>\n\
                                    <path d="M10.5857864,13 L9.17157288,11.5857864 C8.78104858,11.1952621 8.78104858,10.5620972 9.17157288,10.1715729 C9.56209717,9.78104858 10.1952621,9.78104858 10.5857864,10.1715729 L12,11.5857864 L13.4142136,10.1715729 C13.8047379,9.78104858 14.4379028,9.78104858 14.8284271,10.1715729 C15.2189514,10.5620972 15.2189514,11.1952621 14.8284271,11.5857864 L13.4142136,13 L14.8284271,14.4142136 C15.2189514,14.8047379 15.2189514,15.4379028 14.8284271,15.8284271 C14.4379028,16.2189514 13.8047379,16.2189514 13.4142136,15.8284271 L12,14.4142136 L10.5857864,15.8284271 C10.1952621,16.2189514 9.56209717,16.2189514 9.17157288,15.8284271 C8.78104858,15.4379028 8.78104858,14.8047379 9.17157288,14.4142136 L10.5857864,13 Z" fill="#000000"/>\n\
                                </g>\n\
                            </svg></span>\n\
                            </a>';
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

    window.location = site_url + "api/desa/Api_profil/delete/" + $id;
}