$(document).ready(function() {

    $("#alamat").summernote();
    $("#keterangan").summernote();

    $("#form_edit").validate({
        submitHandler: function(form) {
            var formInput = new FormData(form);
            formInput.append('id', $('#id').val());
            formInput.append('butahuruf', $('#butahuruf').val());
            formInput.append('paketAklpbelajar', $('#paketAklpbelajar').val());
            formInput.append('paketAwargabelajar', $('#paketAwargabelajar').val());
            formInput.append('paketBklpbelajar', $('#paketBklpbelajar').val());
            formInput.append('paketBwargabelajar', $('#paketBwargabelajar').val());
            formInput.append('paketCklpbelajar', $('#paketCklpbelajar').val());
            formInput.append('paketCwargabelajar', $('#paketCwargabelajar').val());
            formInput.append('kfklpbelajar', $('#kfklpbelajar').val());
            formInput.append('kfwargabelajar', $('#kfwargabelajar').val());
            formInput.append('paudsejenis', $('#paudsejenis').val());
            formInput.append('jmltamanbacaan', $('#jmltamanbacaan').val());
            formInput.append('bkbklp', $('#bkbklp').val());
            formInput.append('bkbibupeserta', $('#bkbibupeserta').val());
            formInput.append('bkbape', $('#bkbape').val());
            formInput.append('bkbsimulasi', $('#bkbsimulasi').val());
            formInput.append('kaderkhusus_tutorkf', $('#kaderkhusus_tutorkf').val());
            formInput.append('kaderkhusus_tutorpaud', $('#kaderkhusus_tutorpaud').val());
            formInput.append('kaderkhusus_bkb', $('#kaderkhusus_bkb').val());
            formInput.append('kaderkhusus_koperasi', $('#kaderkhusus_koperasi').val());
            formInput.append('kaderkhusus_keterampilan', $('#kaderkhusus_keterampilan').val());
            formInput.append('kaderdilatih_lp3pkk', $('#kaderdilatih_lp3pkk').val());
            formInput.append('kaderdilatih_tpk3pkk', $('#kaderdilatih_tpk3pkk').val());
            formInput.append('kaderdilatih_damaspkk', $('#kaderdilatih_damaspkk').val());
            formInput.append('koperasi_pemula_klp', $('#koperasi_pemula_klp').val());
            formInput.append('koperasi_pemula_peserta', $('#koperasi_pemula_peserta').val());
            formInput.append('koperasi_madya_klp', $('#koperasi_madya_klp').val());
            formInput.append('koperasi_madya_peserta', $('#koperasi_madya_peserta').val());
            formInput.append('koperasi_utama_klp', $('#koperasi_utama_klp').val());
            formInput.append('koperasi_utama_peserta', $('#koperasi_utama_peserta').val());
            formInput.append('koperasi_mandiri_klp', $('#koperasi_mandiri_klp').val());
            formInput.append('koperasi_mandiri_peserta', $('#koperasi_mandiri_peserta').val());
            formInput.append('koperasi_badanhukum_klp', $('#koperasi_badanhukum_klp').val());
            formInput.append('koperasi_badanhukum_angg', $('#koperasi_badanhukum_angg').val());
            formInput.append('keterangan', $('#keterangan').val());

            $.ajax({
                url: site_url + "api/pokja/Api_pokja2/edit/" + $('#id').val(),
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function() {
                    toastr.success("Berhasil Mengubah Data!", "Data Kegiatan Pokja II");
                    setTimeout(function() {
                            window.location.href = site_url + "pokja/pokja2";
                        },
                        2000)
                },
                error: function(err) {
                    toastr.error("Gagal Mengubah Data!", "Kegiatan Pokja II");
                    console.log('error', err)
                        // window.location.href = site_url + "master/desa";
                    window.stop();

                },
            });
        }
    });

});