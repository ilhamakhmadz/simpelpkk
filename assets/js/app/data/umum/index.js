var the_table;
$(document).ready(function() {
    the_table = $("#pkk-umum").DataTable({
        responsive: true,
        searching: true,
        processing: true,
        serverSide: true,
        stateSave: true,
        "ajax": {
            "url": site_url + 'api/data/Api_umum',
            "type": "POST",
            "data": function(d) {
                d.year = $('#filter_tahun').val();
                d.kec_id = $('#filter_kecamatan').val();
            }
        },
        "columns": [{
                "data": "Nama_Kecamatan",
                "render": function(data, type, row) {
                    return '<a href="' + site_url + 'kecamatan/' + row.kode_kecamatan + '">' + data + '</a>';
                }
            },
            {
                "data": "jml_kelompok_pkk_rw",
                "render": function(data, type, row) {
                    return parseInt(data).toLocaleString();
                }
            },
            {
                "data": "jml_kelompok_pkk_rt",
                "render": function(data, type, row) {
                    return parseInt(data).toLocaleString();
                }
            },
            {
                "data": "jml_kelompok_dasawisma",
                "render": function(data, type, row) {
                    return parseInt(data).toLocaleString();
                }
            },
            {
                "data": "jml_krt",
                "render": function(data, type, row) {
                    return parseInt(data).toLocaleString();
                }
            },
            {
                "data": "jml_kk",
                "render": function(data, type, row) {
                    return parseInt(data).toLocaleString();
                }
            },
            {
                "data": "jml_laki",
                "render": function(data, type, row) {
                    return parseInt(data).toLocaleString();
                }
            },
            {
                "data": "jml_perempuan",
                "render": function(data, type, row) {
                    return parseInt(data).toLocaleString();
                }
            },
            {
                "data": "jml_anggota_tp_pkk_laki",
                "render": function(data, type, row) {
                    return parseInt(data).toLocaleString();
                }
            },
            {
                "data": "jml_anggota_tp_pkk_perempuan",
                "render": function(data, type, row) {
                    return parseInt(data).toLocaleString();
                }
            },
            {
                "data": "jml_kader_umum_laki",
                "render": function(data, type, row) {
                    return parseInt(data).toLocaleString();
                }
            },
            {
                "data": "jml_kader_umum_perempuan",
                "render": function(data, type, row) {
                    return parseInt(data).toLocaleString();
                }
            },
            {
                "data": "jml_kader_khusus_laki",
                "render": function(data, type, row) {
                    return parseInt(data).toLocaleString();
                }
            },
            {
                "data": "jml_kader_khusus_perempuan",
                "render": function(data, type, row) {
                    return parseInt(data).toLocaleString();
                }
            }
        ]
    });
});