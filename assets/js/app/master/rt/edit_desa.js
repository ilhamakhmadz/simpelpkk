$(document).ready(function() {
    $('#kec_id').change(function() {
        $('#kd_kecamatan').val($('#kec_id').val());
    });
    $("#form_edit").validate({
        submitHandler: function(form) {
            var formInput = new FormData(form);
            formInput.append('Kd_Kec', $('#kd_kecamatan').val());
            formInput.append('Kd_Desa', $('#kd_kecamatan').val() + $('#kd_desa').val());
            formInput.append('Nama_Desa', $('#nama_desa').val());

            $.ajax({
                url: site_url + "api/master/Api_desa/edit/" + $('#id').val(),
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function() {
                    toastr.success("Berhasil Disimpan!", "Data Desa");
                    setTimeout(function() {
                        window.location.href = site_url + "master/kecamatan/detail/" + $('#kd_kecamatan').val();
                    }, 2000)
                },
                error: function(err) {
                    toastr.error("Gagal Disimpan!", "Data Desa");
                    console.log('error', err);
                },
            });
        }
    });
});