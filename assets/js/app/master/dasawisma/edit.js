$(document).ready(function() {
    $('#kec_id').change(function() {
        $('#kd_kecamatan').val($('#kec_id').val());
    });
    $("#form_edit").validate({
        submitHandler: function(form) {
            var formInput = new FormData(form);
            formInput.append('Kd_Kec', $('#kec_id').val());
            formInput.append('Kd_Desa', $('#kd_desa').val());
            formInput.append('Kd_Dusun', $('#kd_dusun').val());
            formInput.append('rw', $('#rw').val());
            formInput.append('rt', $('#rt').val());
            formInput.append('dasawisma', $('#dasawisma').val());

            $.ajax({
                url: site_url + "api/master/Api_desa/edit_dasawisma/" + $('#id').val(),
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function() {
                    toastr.success("Berhasil diUbah!", "Data Dasawisma");
                    setTimeout(function() {
                        window.location.href = site_url + "master/kecamatan/detail_dasawisma/" + $('#kd_desa').val() + "/" +
                            $('#kd_dusun').val() + "/" + $('#rw').val() + "/" + $('#rt').val();
                    }, 2000)
                },
                error: function(err) {
                    toastr.error("Gagal Disimpan!", "Data Dasawisma");
                    console.log('error', err);
                },
            });
        }
    });
});