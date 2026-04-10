$(document).ready(function() {

    $("#alamat").summernote();
    $("#keterangan").summernote();
    $("#form_edit").validate({
        submitHandler: function(form) {
            var formInput = new FormData(form);
            formInput.append('id', $('#id').val());
            formInput.append('kader_pangan', $('#kader_pangan').val());
            formInput.append('kader_sandang', $('#kader_sandang').val());
            formInput.append('kader_tatalaksana_rumahtangga', $('#kader_tatalaksana_rumahtangga').val());
            formInput.append('pangan_beras', $('#pangan_beras').val());
            formInput.append('pangan_nonberas', $('#pangan_nonberas').val());
            formInput.append('pangan_peternakan', $('#pangan_peternakan').val());
            formInput.append('pangan_perikanan', $('#pangan_perikanan').val());
            formInput.append('pangan_warunghidup', $('#pangan_warunghidup').val());
            formInput.append('pangan_lumbunghidup', $('#pangan_lumbunghidup').val());
            formInput.append('pangan_toga', $('#pangan_toga').val());
            formInput.append('pangan_tanaman_keras', $('#pangan_tanaman_keras').val());
            formInput.append('industri_pangan', $('#industri_pangan').val());
            formInput.append('insdustri_sandang', $('#insdustri_sandang').val());
            formInput.append('industri_jasa', $('#industri_jasa').val());
            formInput.append('rumah_sehat', $('#rumah_sehat').val());
            formInput.append('rumah_tidaksehat', $('#rumah_tidaksehat').val());
            formInput.append('keterangan', $('#keterangan').val());
            $.ajax({
                url: site_url + "api/pokja/Api_pokja3/edit/" + $('#id').val(),
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function() {
                    toastr.success("Berhasil Mengubah Data!", "Data Kegiatan Pokja III");
                    setTimeout(function() {
                            window.location.href = site_url + "pokja/pokja3";
                        },
                        2000)
                },
                error: function(err) {
                    toastr.error("Gagal Mengubah Data!", "Kegiatan Pokja I");
                    console.log('error', err)
                        // window.location.href = site_url + "master/desa";
                    window.stop();

                },
            });
        }
    });

});