$(document).ready(function() {
    $("#form_add").validate({
        submitHandler: function(form) {
            var formInput = new FormData(form);
            formInput.append('Kd_Kec', $('#kec_id').val());
            formInput.append('Kd_Desa', $('#kd_desa').val());
            formInput.append('Kd_Dusun', $('#kd_dusun').val());
            formInput.append('rw', $('#rw').val());
            formInput.append('rt', $('#rt').val());

            $.ajax({
                url: site_url + "api/master/Api_desa/add_rt",
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function() {
                    toastr.success("Berhasil Disimpan!", "Data RT");
                    setTimeout(function() {
                        window.location.href = site_url + "master/kecamatan/detail_rt/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val() + "/" + $('#rw').val();
                    }, 2000)
                },
                error: function(err) {
                    toastr.error("Gagal Disimpan!", "Data RT");
                    console.log('error', err);
                },
            });
        }
    });
});