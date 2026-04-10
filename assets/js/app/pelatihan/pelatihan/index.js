function deleteItem($id)
{

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
    $('body').on('click', 'a#close-toastr', function ()
    {
        $(this).closest('.toast').remove();
    });
    // alert('deasdajkd');
    // swal({
    //         title: "Apakah Anda Yakin?",
    //         text: "Setelah dihapus, Data hanya dapat dipulihkan di database!!",
    //         icon: "warning",
    //         buttons: true,
    //         dangerMode: true,
    //     })
    //     .then((willDelete) => {
    //         if (willDelete) {
    //             swal("Data berhasil dihapus!", {
    //                 icon: "success",
    //             });

    //             window.location = site_url + "api/master/Api_kecamatan/delete/" + $id;
    //         } else {
    //             swal("Data tidak berhasil dihapus!");
    //         }
    //     });

}
var the_table;
$(document).ready(function ()
{
    the_table = $("#dataTable_pelatihan").DataTable({
        responsive: true,
        searching: true,
        processing: true,
        serverSide: true,
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
            "url": site_url + 'api/pelatihan/Api_pelatihan',
            "type": "POST"
        },
        "columns": [{
            "data": "id",
            "searchable": false,
            render: function (data, type, row, meta)
            {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        { "data": "date_year" },
        { "data": "nama_pelatihan" },
        { "data": "jml_pelatihan" },
        {
            "data": "id",
            "orderable": false,
            "render": function (data, type, row, meta)
            {
                return '<a href = "' + site_url + 'pelatihan/pelatihan/view/' + row.id_pelatihan + '" class="btn btn-icon btn-light-twitter me-5 " >\n\
                <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\n\
                    < rect x="0" y="0" width="24" height="24" />\n\
                    <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill - rule="nonzero" opacity = "0.4" />\n\
                    <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="1" />\n\
                </svg ></span > </a > ';
            }
        }
        ]
    });
});


function deleteYes($id)
{
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

    window.location = site_url + "api/pelatihan/Api_pelatihan/delete/" + $id;
}