$(document).ready(function() {
    // $('#kec_id').change(function ()
    // {
    //     $('#kd_kecamatan').val($('#kec_id').val());
    // });

    $("#form_add").validate({
        submitHandler: function(form) {
            var formInput = new FormData(form);
            formInput.append('Kd_Kec', $('#kec_id').val());
            formInput.append('Kd_Desa', $('#kd_desa').val());
            formInput.append('Kd_Dusun', $('#kd_dusun').val());
            formInput.append('rw', $('#rw').val());

            $.ajax({
                url: site_url + "api/master/Api_desa/add_rw",
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function() {
                    toastr.success("Berhasil Disimpan!", "Data RW");
                    setTimeout(function() {
                        window.location.href = site_url + "master/kecamatan/detail_rw/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val();
                    }, 2000)
                },
                error: function(err) {
                    toastr.error("Gagal Disimpan!", "Data RW");
                    console.log('error', err);
                },
            });
        }
    });
});