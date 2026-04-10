var dataPrasarana = [];
$(document).ready(function() {
    $("#alamat").summernote();
    $("#keterangan").summernote();
    var e_kec = document.getElementById("div-kec");
    var e_desa = document.getElementById("div-desa");
    var e_dusun = document.getElementById("div-dusun");
    var e_rw = document.getElementById("div-rw");
    var e_rt = document.getElementById("div-rt");
    if ($('#level').val() == 'kecamatan') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'none';
        e_dusun.style.display = 'none';
        e_rw.style.display = 'none';
        e_rt.style.display = 'none';
    } else if ($('#level').val() == 'desa') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'none';
        e_rw.style.display = 'none';
        e_rt.style.display = 'none';
    } else if ($('#level').val() == 'dusun') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'block';
        e_rw.style.display = 'none';
        e_rt.style.display = 'none';
    } else if ($('#level').val() == 'rw') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'block';
        e_rw.style.display = 'block';
        e_rt.style.display = 'none';
    } else if ($('#level').val() == 'rt') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'block';
        e_rw.style.display = 'block';
        e_rt.style.display = 'block';
    } else {
        e_kec.style.display = 'none';
        e_desa.style.display = 'none';
        e_dusun.style.display = 'none';
        e_rw.style.display = 'none';
        e_rt.style.display = 'none';
    }
    $('select[name=level]').on('change', function() {
        if ($('#level').val() == 'kecamatan') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'none';
            e_dusun.style.display = 'none';
            e_rw.style.display = 'none';
            e_rt.style.display = 'none';
        } else if ($('#level').val() == 'desa') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'none';
            e_rw.style.display = 'none';
            e_rt.style.display = 'none';
        } else if ($('#level').val() == 'dusun') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'block';
            e_rw.style.display = 'none';
            e_rt.style.display = 'none';
        } else if ($('#level').val() == 'rw') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'block';
            e_rw.style.display = 'block';
            e_rt.style.display = 'none';
        } else if ($('#level').val() == 'rt') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'block';
            e_rw.style.display = 'block';
            e_rt.style.display = 'block';
        }
    });
});

$(document).ready(function() {
    $("#alamat").summernote();
    $("#keterangan").summernote();

    $("#kt_stepper_form_edit").submit(function(event) {

        var formInput = new FormData();
        // formInput.append('level', $('#level').val());
        // formInput.append('kd_kec', $('#kd_kec').val());
        // formInput.append('kd_desa', $('#kd_desa').val());
        formInput.append('jml_kelompok_pkk_rw', $('#jml_kelompok_pkk_rw').val());
        formInput.append('jml_kelompok_pkk_rt', $('#jml_kelompok_pkk_rt').val());
        formInput.append('jml_kelompok_dasawisma', $('#jml_kelompok_dasawisma').val());
        formInput.append('jml_krt', $('#jml_krt').val());
        formInput.append('jml_kk', $('#jml_kk').val());
        formInput.append('jml_laki', $('#jml_laki').val());
        formInput.append('jml_perempuan', $('#jml_perempuan').val());
        formInput.append('jml_penduduk', $('#jml_perempuan').val() + $('#jml_laki').val());
        formInput.append('jml_anggota_tp_pkk_laki', $('#jml_anggota_tp_pkk_laki').val());
        formInput.append('jml_anggota_tp_pkk_perempuan', $('#jml_anggota_tp_pkk_perempuan').val());
        formInput.append('jml_kader_umum_laki', $('#jml_kader_umum_laki').val());
        formInput.append('jml_kader_umum_perempuan', $('#jml_kader_umum_perempuan').val());
        formInput.append('jml_kader_khusus_laki', $('#jml_kader_khusus_laki').val());
        formInput.append('jml_kader_khusus_perempuan', $('#jml_kader_khusus_perempuan').val());
        formInput.append('jml_tenaga_sek_honorer_laki', $('#jml_tenaga_sek_honorer_laki').val());
        formInput.append('jml_tenaga_sek_honorer_perempuan', $('#jml_tenaga_sek_honorer_perempuan').val());
        formInput.append('jml_tenaga_sek_bantuan_laki', $('#jml_tenaga_sek_bantuan_laki').val());
        formInput.append('jml_tenaga_sek_bantuan_perempuan', $('#jml_tenaga_sek_bantuan_perempuan').val());

        formInput.append('kepala_desa', $('#kepala_desa').val());
        formInput.append('sekertariat_desa', $('#sekertariat_desa').val());
        formInput.append('kaur_tu', $('#kaur_tu').val());
        formInput.append('kaur_perencanaan', $('#kaur_perencanaan').val());
        formInput.append('kaur_keuangan', $('#kaur_keuangan').val());
        formInput.append('seksi_pemerintahan', $('#seksi_pemerintahan').val());
        formInput.append('seksi_kerjasama', $('#seksi_kerjasama').val());
        formInput.append('seksi_pelayanan', $('#seksi_pelayanan').val());
        formInput.append('staf_1', $('#staf_1').val());
        formInput.append('staf_2', $('#staf_2').val());
        formInput.append('staf_3', $('#staf_3').val());

        // console.log(formInput);
        $.ajax({
            url: site_url + "api/desa/Api_profil/edit/" + $('#id_profil').val() + "/" + $('#id_aparatur').val(),
            method: 'post',
            dataType: 'json',
            data: formInput,
            contentType: false,
            processData: false,
            success: function() {
                toastr.success("Berhasil Disimpan!", "Data Desa");
                window.location.href = site_url + "desa/profil";

            },
            error: function(err) {
                toastr.error("Gagal Disimpan!", "Data Desa");
                console.log('error', err);
                window.stop();
            },
        });

    });

});