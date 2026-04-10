$(document).ready(function() {

    $("#alamat").summernote();
    $("#keterangan").summernote();

    $("#form_edit").validate({
        submitHandler: function(form) {
            var formInput = new FormData(form);
            formInput.append('id', $('#id').val());
            formInput.append('kader_posyandu', $('#kader_posyandu').val());
            formInput.append('kader_gizi', $('#kader_gizi').val());
            formInput.append('kader_kesling', $('#kader_kesling').val());
            formInput.append('kader_penyuluhan_narkoba', $('#kader_penyuluhan_narkoba').val());
            formInput.append('kader_phbs', $('#kader_phbs').val());
            formInput.append('kader_kb', $('#kader_kb').val());
            formInput.append('kes_posyandu_jml', $('#kes_posyandu_jml').val());
            formInput.append('kes_posyandu_terintegrasi', $('#kes_posyandu_terintegrasi').val());
            formInput.append('kes_posyandu_klp', $('#kes_posyandu_klp').val());
            formInput.append('kes_posyandu_lansia_anggota', $('#kes_posyandu_lansia_anggota').val());
            formInput.append('kes_posyandu_lansia_kartu_gratis', $('#kes_posyandu_lansia_kartu_gratis').val());
            formInput.append('rumah_jamban', $('#rumah_jamban').val());
            formInput.append('rumah_spai', $('#rumah_spai').val());
            formInput.append('rumah_pembuangan_sampah', $('#rumah_pembuangan_sampah').val());
            formInput.append('jml_mck', $('#jml_mck').val());
            formInput.append('krt_pdam', $('#krt_pdam').val());
            formInput.append('krt_sumur', $('#krt_sumur').val());
            formInput.append('krt_lainnya', $('#krt_lainnya').val());
            formInput.append('jum_pus', $('#jum_pus').val());
            formInput.append('jum_wus', $('#jum_wus').val());
            formInput.append('akseptor_kb_l', $('#akseptor_kb_l').val());
            formInput.append('akseptor_kb_p', $('#akseptor_kb_p').val());
            formInput.append('pnya_tab_keluarga', $('#pnya_tab_keluarga').val());
            formInput.append('keterangan', $('#keterangan').val());
            $.ajax({
                url: site_url + "api/pokja/Api_pokja4/edit/" + $('#id').val(),
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function() {
                    toastr.success("Berhasil Mengubah Data!", "Data Kegiatan Pokja IV");
                    setTimeout(function() {
                            window.location.href = site_url + "pokja/pokja4";
                        },
                        2000)
                },
                error: function(err) {
                    toastr.error("Gagal Mengubah Data!", "Kegiatan Pokja IV");
                    console.log('error', err)
                        // window.location.href = site_url + "master/desa";
                    window.stop();

                },
            });
        }
    });

});