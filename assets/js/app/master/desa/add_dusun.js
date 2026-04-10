$(document).ready(function() {
    $('#kec_id').change(function() {
        $('#kd_kecamatan').val($('#kec_id').val());
    });

    $("#form_add").validate({
        submitHandler: function(form) {
            var formInput = new FormData(form);
            formInput.append('Kd_Kec', $('#kd_kecamatan').val());
            formInput.append('Kd_Desa', $('#kd_desa').val());
            formInput.append('dusun', $('#nama_dusun').val());

            $.ajax({
                url: site_url + "api/master/Api_desa/add_dusun",
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function() {
                    toastr.success("Berhasil Disimpan!", "Data Dusun");
                    setTimeout(function() {
                        window.location.href = site_url + "master/kecamatan/detail_dusun/" + $('#kd_desa').val();
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