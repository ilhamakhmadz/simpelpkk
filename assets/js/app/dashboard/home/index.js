$(document).ready(function() {
    the_table = $("#dataTable_Desa").DataTable({
        responsive: true,
        searching: true,
        pageLength: 5,
        lengthMenu: [
            [5, 10, 20, -1],
            [5, 10, 20, 'All']
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
        data: window.dataDesa ? window.dataDesa : [],
        columns: [
            {
                data: null,
                render: function(data, type, row) {
                    return '<a href="" class="text-gray-800 fw-bolder text-hover-primary fs-6">' + row.nama_desa + '</a><span class="text-muted fw-bold d-block mt-1">' + row.nama_kecamatan + '</span>';
                }
            },
            {
                data: 'laki',
                render: function(data) {
                    return '<div class="d-flex flex-stack mb-2"><span class="text-dark me-2 fs-6 fw-bolder">' + data + '</span></div>';
                }
            },
            {
                data: 'perempuan',
                render: function(data) {
                    return '<div class="d-flex flex-column w-100 me-3"><div class="d-flex flex-stack mb-2"><span class="text-dark me-2 fs-6 fw-bolder">' + data + '</span></div></div>';
                }
            },
            {
                data: 'penduduk',
                className: 'text-end pe-0',
                render: function(data) {
                    return '<div class="d-flex flex-stack mb-2"><span class="text-dark me-2 fs-6 fw-bolder">' + data + '</span></div>';
                }
            }
        ]
    });

    the_table2 = $("#dataTable_Kecamatan").DataTable({
        responsive: true,
        searching: true,
        pageLength: 5,
        lengthMenu: [
            [5, 10, 20, -1],
            [5, 10, 20, 'All']
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
        data: window.dataKecamatan ? window.dataKecamatan : [],
        columns: [
            {
                data: null,
                render: function(data, type, row) {
                    return '<a href="" class="text-gray-800 fw-bolder text-hover-primary fs-6">' + row.nama_kecamatan + '</a>';
                }
            },
            {
                data: 'laki',
                render: function(data) {
                    return '<div class="d-flex flex-stack mb-2"><span class="text-dark me-2 fs-6 fw-bolder">' + data + '</span></div>';
                }
            },
            {
                data: 'perempuan',
                render: function(data) {
                    return '<div class="d-flex flex-column w-100 me-3"><div class="d-flex flex-stack mb-2"><span class="text-dark me-2 fs-6 fw-bolder">' + data + '</span></div></div>';
                }
            },
            {
                data: 'penduduk',
                className: 'text-end pe-0',
                render: function(data) {
                    return '<div class="d-flex flex-stack mb-2"><span class="text-dark me-2 fs-6 fw-bolder">' + data + '</span></div>';
                }
            }
        ]
    });
});