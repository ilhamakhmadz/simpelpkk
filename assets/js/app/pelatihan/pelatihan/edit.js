var datapelatihan = [];
$(document).ready(function() {

    $('#form_edit').validate({
        submitHandler: function(form) {

            var formInput = new FormData(form);
            formInput.append('id_pelatihan', $('#id_pelatihan').val());
            formInput.append('nama', $('#nama').val());
            formInput.append('peserta', $('#peserta').val());
            formInput.append('jumlah', $('#jumlah').val());
            $.ajax({
                url: site_url + "api/pelatihan/Api_pelatihan/edit/" + $('#id').val(),
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function() {
                    toastr.success("Berhasil Disimpan!", "Data Desa");
                    setTimeout(function() {
                            window.location.href = site_url + "pelatihan/pelatihan/view/" + $('#id_pelatihan').val();
                        },
                        2000)
                },
                error: function(err) {
                    toastr.error("Gagal Disimpan!", "Data Desa");
                    console.log('error', err)
                        // window.location.href = site_url + "master/desa";
                    window.stop();

                },
            });
        }
    });

});