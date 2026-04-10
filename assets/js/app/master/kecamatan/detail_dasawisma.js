function deleteItem($id, $kd, $dusun, $rw, $rt) {
    // Pastikan semua nilai adalah string
    let idStr = String($id);
    let kdStr = String($kd);
    let dusunStr = String($dusun);
    let rwStr = String($rw);
    let rtStr = String($rt);

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

    toastr.warning(
        "Yakin akan menghapus data<br /><br />" +
        "<a id='close-toastr' onclick='window.deleteYes(\"" + idStr + "\", \"" + kdStr + "\", \"" + dusunStr + "\", \"" + rwStr + "\", \"" + rtStr + "\")' " +
        "type='button' class='btn btn-outline-light btn-sm'>Yes</a>",
        "Hapus Data"
    );
    I
    $('body').on('click', 'a#close-toastr', function() {
        $(this).closest('.toast').remove();
    });

}

$(document).ready(function() {
    $("#dataTable_dasawisma").DataTable({
        // responsive: true,
        searching: true,
        processing: true,
        // "language": {
        //     "lengthMenu": "Show _MENU_",
        // },
        // "dom": "<'row'" +
        //     "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
        //     "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
        //     ">" +

        //     "<'table-responsive'tr>" +

        //     "<'row'" +
        //     "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
        //     "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
        //     ">",
        stateSave: true,
    });
});

function deleteYes($id, $kd, $dusun, $rw, $rt) {
    let idStr = String($id);
    let kdStr = String($kd);
    let dusunStr = String($dusun);
    let rwStr = String($rw);
    let rtStr = String($rt);

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
    window.location = site_url + "api/master/Api_desa/delete_dasawisma/" + idStr + "/" + kdStr + "/" + dusunStr + "/" + rwStr + "/" + rtStr;
}