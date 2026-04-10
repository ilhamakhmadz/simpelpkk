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

    $("#form_edit").validate({
        submitHandler: function(form) {
            var formInput = new FormData(form);
            formInput.append('id', $('#id').val());
            // formInput.append('level', $('#level').val());
            formInput.append('kader_pkdrt', $('#kader_pkdrt').val());
            formInput.append('kader_pkbn', $('#kader_pkbn').val());
            formInput.append('kader_polaasuh', $('#kader_polaasuh').val());
            formInput.append('pkbn_klpsimulasi', $('#pkbn_klpsimulasi').val());
            formInput.append('pkbn_angg', $('#pkbn_angg').val());
            formInput.append('pkdrt_klpsimulasi', $('#pkdrt_klpsimulasi').val());
            formInput.append('pkdrt_angg', $('#pkdrt_angg').val());
            formInput.append('polaasuh_klp', $('#polaasuh_klp').val());
            formInput.append('polaasuh_anggota', $('#polaasuh_anggota').val());
            formInput.append('lansia_klp', $('#lansia_klp').val());
            formInput.append('lansia_angg', $('#lansia_angg').val());
            formInput.append('kelompok_kerjabakti', $('#kelompok_kerjabakti').val());
            formInput.append('kelompok_kematian', $('#kelompok_kematian').val());
            formInput.append('kelompok_keagamaan', $('#kelompok_keagamaan').val());
            formInput.append('kelompok_jimpitan', $('#kelompok_jimpitan').val());
            formInput.append('kelompok_arisan', $('#kelompok_arisan').val());
            formInput.append('keterangan', $('#keterangan').val());
            // console.log($('#id').val());
            $.ajax({
                url: site_url + "api/pokja/Api_pokja1/edit/" + $('#id').val(),
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function() {
                    toastr.success("Berhasil Mengubah Data!", "Data Kegiatan Pokja I");
                    setTimeout(function() {
                            window.location.href = site_url + "pokja/pokja1";
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