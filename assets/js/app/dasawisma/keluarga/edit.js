var year = new Date().getFullYear();
$(document).ready(function() {
    $("#keterangan").summernote();
    var e_kec = document.getElementById("div-kec");
    var e_desa = document.getElementById("div-desa");
    var e_dusun = document.getElementById("div-dusun");
    var e_rw = document.getElementById("div-rw");
    var e_rt = document.getElementById("div-rt");
    var e_dasawisma = document.getElementById("div-dasawisma");
    if ($('#level').val() == 'kecamatan') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'none';
        e_dusun.style.display = 'none';
        e_rw.style.display = 'none';
        e_rt.style.display = 'none';
        e_dasawisma.style.display = 'none';
        $.ajax({
            dataType: 'json',
            url: site_url + "api/dasawisma/Api_keluarga/get_kecamatan/" + year + "/" + $('#kd_kec').val(),
            success: function(data) {
                $('#jumlah_kk_update').val(data.jml_jumlah_kk);
                $('#total_laki_update').val(data.jml_total_laki);
                $('#total_perempuan_update').val(data.jml_total_perempuan);
                $('#balita_laki_update').val(data.jml_balita_laki);
                $('#balita_perempuan_update').val(data.jml_balita_perempuan);
                $('#jumlah_PUS_update').val(data.jml_jumlah_PUS);
                $('#jumlah_WUS_update').val(data.jml_jumlah_WUS);
                $('#jumlah_ibu_hamil_update').val(data.jml_jumlah_ibu_hamil);
                $('#jumlah_menyusui_update').val(data.jml_jumlah_menyusui);
                $('#jumlah_lansia_update').val(data.jml_jumlah_lansia);
                $('#jumlah_buta_update').val(data.jml_jumlah_buta);
                $('#berkebutuhan_khusus_update').val(data.jml_berkebutuhan_khusus);
                $('#rumah_sehat_layak_huni_update').val(data.jml_rumah_sehat_layak_huni);
                $('#rumah_tidak_sehat_layak_huni_update').val(data.jml_rumah_tidak_sehat_layak_huni);
                $('#rumah_memiliki_tps_update').val(data.jml_rumah_memiliki_tps);
                $('#rumah_memiliki_spal_update').val(data.jml_rumah_memiliki_spal);
                $('#rumah_memiliki_jamban_update').val(data.jml_rumah_memiliki_jamban);
                $('#rumah_menempel_sp4k_update').val(data.jml_rumah_menempel_sp4k);
                $('#pdam_update').val(data.jml_pdam);
                $('#sumur_update').val(data.jml_sumur);
                $('#sumber_air_lain_update').val(data.jml_sumber_air_lain);
                $('#beras_update').val(data.jml_beras);
                $('#non_beras_update').val(data.jml_non_beras);
                $('#mengikuti_up2k_update').val(data.jml_mengikuti_up2k);
                $('#pemanfaatan_tanah_update').val(data.jml_pemanfaatan_tanah);
                $('#industri_rumah_tangga_update').val(data.jml_industri_rumah_tangga);
                $('#kerja_bhakti_update').val(data.jml_kerja_bhakti);
            }
        });
    } else if ($('#level').val() == 'desa') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'none';
        e_rw.style.display = 'none';
        e_rt.style.display = 'none';
        $.ajax({
            dataType: 'json',
            url: site_url + "api/dasawisma/Api_keluarga/get_desa/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val(),
            success: function(data) {
                $('#jumlah_kk_update').val(data.jml_jumlah_kk);
                $('#total_laki_update').val(data.jml_total_laki);
                $('#total_perempuan_update').val(data.jml_total_perempuan);
                $('#balita_laki_update').val(data.jml_balita_laki);
                $('#balita_perempuan_update').val(data.jml_balita_perempuan);
                $('#jumlah_PUS_update').val(data.jml_jumlah_PUS);
                $('#jumlah_WUS_update').val(data.jml_jumlah_WUS);
                $('#jumlah_ibu_hamil_update').val(data.jml_jumlah_ibu_hamil);
                $('#jumlah_menyusui_update').val(data.jml_jumlah_menyusui);
                $('#jumlah_lansia_update').val(data.jml_jumlah_lansia);
                $('#jumlah_buta_update').val(data.jml_jumlah_buta);
                $('#berkebutuhan_khusus_update').val(data.jml_berkebutuhan_khusus);
                $('#rumah_sehat_layak_huni_update').val(data.jml_rumah_sehat_layak_huni);
                $('#rumah_tidak_sehat_layak_huni_update').val(data.jml_rumah_tidak_sehat_layak_huni);
                $('#rumah_memiliki_tps_update').val(data.jml_rumah_memiliki_tps);
                $('#rumah_memiliki_spal_update').val(data.jml_rumah_memiliki_spal);
                $('#rumah_memiliki_jamban_update').val(data.jml_rumah_memiliki_jamban);
                $('#rumah_menempel_sp4k_update').val(data.jml_rumah_menempel_sp4k);
                $('#pdam_update').val(data.jml_pdam);
                $('#sumur_update').val(data.jml_sumur);
                $('#sumber_air_lain_update').val(data.jml_sumber_air_lain);
                $('#beras_update').val(data.jml_beras);
                $('#non_beras_update').val(data.jml_non_beras);
                $('#mengikuti_up2k_update').val(data.jml_mengikuti_up2k);
                $('#pemanfaatan_tanah_update').val(data.jml_pemanfaatan_tanah);
                $('#industri_rumah_tangga_update').val(data.jml_industri_rumah_tangga);
                $('#kerja_bhakti_update').val(data.jml_kerja_bhakti);
            }
        });
        e_dasawisma.style.display = 'none';
    } else if ($('#level').val() == 'dusun') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'block';
        e_rw.style.display = 'none';
        e_rt.style.display = 'none';
        e_dasawisma.style.display = 'none';
        $.ajax({
            dataType: 'json',
            url: site_url + "api/dasawisma/Api_keluarga/get_dusun/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#dusun').val(),
            success: function(data) {
                $('#jumlah_kk_update').val(data.jml_jumlah_kk);
                $('#total_laki_update').val(data.jml_total_laki);
                $('#total_perempuan_update').val(data.jml_total_perempuan);
                $('#balita_laki_update').val(data.jml_balita_laki);
                $('#balita_perempuan_update').val(data.jml_balita_perempuan);
                $('#jumlah_PUS_update').val(data.jml_jumlah_PUS);
                $('#jumlah_WUS_update').val(data.jml_jumlah_WUS);
                $('#jumlah_ibu_hamil_update').val(data.jml_jumlah_ibu_hamil);
                $('#jumlah_menyusui_update').val(data.jml_jumlah_menyusui);
                $('#jumlah_lansia_update').val(data.jml_jumlah_lansia);
                $('#jumlah_buta_update').val(data.jml_jumlah_buta);
                $('#berkebutuhan_khusus_update').val(data.jml_berkebutuhan_khusus);
                $('#rumah_sehat_layak_huni_update').val(data.jml_rumah_sehat_layak_huni);
                $('#rumah_tidak_sehat_layak_huni_update').val(data.jml_rumah_tidak_sehat_layak_huni);
                $('#rumah_memiliki_tps_update').val(data.jml_rumah_memiliki_tps);
                $('#rumah_memiliki_spal_update').val(data.jml_rumah_memiliki_spal);
                $('#rumah_memiliki_jamban_update').val(data.jml_rumah_memiliki_jamban);
                $('#rumah_menempel_sp4k_update').val(data.jml_rumah_menempel_sp4k);
                $('#pdam_update').val(data.jml_pdam);
                $('#sumur_update').val(data.jml_sumur);
                $('#sumber_air_lain_update').val(data.jml_sumber_air_lain);
                $('#beras_update').val(data.jml_beras);
                $('#non_beras_update').val(data.jml_non_beras);
                $('#mengikuti_up2k_update').val(data.jml_mengikuti_up2k);
                $('#pemanfaatan_tanah_update').val(data.jml_pemanfaatan_tanah);
                $('#industri_rumah_tangga_update').val(data.jml_industri_rumah_tangga);
                $('#kerja_bhakti_update').val(data.jml_kerja_bhakti);
            }
        });
    } else if ($('#level').val() == 'rw') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'block';
        e_rw.style.display = 'block';
        e_rt.style.display = 'none';
        e_dasawisma.style.display = 'none';
        $.ajax({
            dataType: 'json',
            url: site_url + "api/dasawisma/Api_keluarga/get_rw/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#dusun').val() + "/" + $('#rw').val(),
            success: function(data) {
                $('#jumlah_kk_update').val(data.jml_jumlah_kk);
                $('#total_laki_update').val(data.jml_total_laki);
                $('#total_perempuan_update').val(data.jml_total_perempuan);
                $('#balita_laki_update').val(data.jml_balita_laki);
                $('#balita_perempuan_update').val(data.jml_balita_perempuan);
                $('#jumlah_PUS_update').val(data.jml_jumlah_PUS);
                $('#jumlah_WUS_update').val(data.jml_jumlah_WUS);
                $('#jumlah_ibu_hamil_update').val(data.jml_jumlah_ibu_hamil);
                $('#jumlah_menyusui_update').val(data.jml_jumlah_menyusui);
                $('#jumlah_lansia_update').val(data.jml_jumlah_lansia);
                $('#jumlah_buta_update').val(data.jml_jumlah_buta);
                $('#berkebutuhan_khusus_update').val(data.jml_berkebutuhan_khusus);
                $('#rumah_sehat_layak_huni_update').val(data.jml_rumah_sehat_layak_huni);
                $('#rumah_tidak_sehat_layak_huni_update').val(data.jml_rumah_tidak_sehat_layak_huni);
                $('#rumah_memiliki_tps_update').val(data.jml_rumah_memiliki_tps);
                $('#rumah_memiliki_spal_update').val(data.jml_rumah_memiliki_spal);
                $('#rumah_memiliki_jamban_update').val(data.jml_rumah_memiliki_jamban);
                $('#rumah_menempel_sp4k_update').val(data.jml_rumah_menempel_sp4k);
                $('#pdam_update').val(data.jml_pdam);
                $('#sumur_update').val(data.jml_sumur);
                $('#sumber_air_lain_update').val(data.jml_sumber_air_lain);
                $('#beras_update').val(data.jml_beras);
                $('#non_beras_update').val(data.jml_non_beras);
                $('#mengikuti_up2k_update').val(data.jml_mengikuti_up2k);
                $('#pemanfaatan_tanah_update').val(data.jml_pemanfaatan_tanah);
                $('#industri_rumah_tangga_update').val(data.jml_industri_rumah_tangga);
                $('#kerja_bhakti_update').val(data.jml_kerja_bhakti);
            }
        });
    } else if ($('#level').val() == 'rt') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'block';
        e_rw.style.display = 'block';
        e_rt.style.display = 'block';
        e_dasawisma.style.display = 'none';
        $.ajax({
            dataType: 'json',
            url: site_url + "api/dasawisma/Api_keluarga/get_rt/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#dusun').val() + "/" + $('#rw').val() + "/" + $('#rt').val(),
            success: function(data) {
                $('#jumlah_kk_update').val(data.jml_jumlah_kk);
                $('#total_laki_update').val(data.jml_total_laki);
                $('#total_perempuan_update').val(data.jml_total_perempuan);
                $('#balita_laki_update').val(data.jml_balita_laki);
                $('#balita_perempuan_update').val(data.jml_balita_perempuan);
                $('#jumlah_PUS_update').val(data.jml_jumlah_PUS);
                $('#jumlah_WUS_update').val(data.jml_jumlah_WUS);
                $('#jumlah_ibu_hamil_update').val(data.jml_jumlah_ibu_hamil);
                $('#jumlah_menyusui_update').val(data.jml_jumlah_menyusui);
                $('#jumlah_lansia_update').val(data.jml_jumlah_lansia);
                $('#jumlah_buta_update').val(data.jml_jumlah_buta);
                $('#berkebutuhan_khusus_update').val(data.jml_berkebutuhan_khusus);
                $('#rumah_sehat_layak_huni_update').val(data.jml_rumah_sehat_layak_huni);
                $('#rumah_tidak_sehat_layak_huni_update').val(data.jml_rumah_tidak_sehat_layak_huni);
                $('#rumah_memiliki_tps_update').val(data.jml_rumah_memiliki_tps);
                $('#rumah_memiliki_spal_update').val(data.jml_rumah_memiliki_spal);
                $('#rumah_memiliki_jamban_update').val(data.jml_rumah_memiliki_jamban);
                $('#rumah_menempel_sp4k_update').val(data.jml_rumah_menempel_sp4k);
                $('#pdam_update').val(data.jml_pdam);
                $('#sumur_update').val(data.jml_sumur);
                $('#sumber_air_lain_update').val(data.jml_sumber_air_lain);
                $('#beras_update').val(data.jml_beras);
                $('#non_beras_update').val(data.jml_non_beras);
                $('#mengikuti_up2k_update').val(data.jml_mengikuti_up2k);
                $('#pemanfaatan_tanah_update').val(data.jml_pemanfaatan_tanah);
                $('#industri_rumah_tangga_update').val(data.jml_industri_rumah_tangga);
                $('#kerja_bhakti_update').val(data.jml_kerja_bhakti);
            }
        });
    } else if ($('#level').val() == 'dasawisma') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'block';
        e_rw.style.display = 'block';
        e_rt.style.display = 'block';
        e_dasawisma.style.display = 'block';
        $.ajax({
            dataType: 'json',
            url: site_url + "api/dasawisma/Api_keluarga/get_dasawisma/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#dusun').val() + "/" + $('#rw').val() + "/" + $('#rt').val() + "/" + $('#dasawisma').val(),
            success: function(data) {
                $('#jumlah_kk_update').val(data.jml_jumlah_kk);
                $('#total_laki_update').val(data.jml_total_laki);
                $('#total_perempuan_update').val(data.jml_total_perempuan);
                $('#balita_laki_update').val(data.jml_balita_laki);
                $('#balita_perempuan_update').val(data.jml_balita_perempuan);
                $('#jumlah_PUS_update').val(data.jml_jumlah_PUS);
                $('#jumlah_WUS_update').val(data.jml_jumlah_WUS);
                $('#jumlah_ibu_hamil_update').val(data.jml_jumlah_ibu_hamil);
                $('#jumlah_menyusui_update').val(data.jml_jumlah_menyusui);
                $('#jumlah_lansia_update').val(data.jml_jumlah_lansia);
                $('#jumlah_buta_update').val(data.jml_jumlah_buta);
                $('#berkebutuhan_khusus_update').val(data.jml_berkebutuhan_khusus);
                $('#rumah_sehat_layak_huni_update').val(data.jml_rumah_sehat_layak_huni);
                $('#rumah_tidak_sehat_layak_huni_update').val(data.jml_rumah_tidak_sehat_layak_huni);
                $('#rumah_memiliki_tps_update').val(data.jml_rumah_memiliki_tps);
                $('#rumah_memiliki_spal_update').val(data.jml_rumah_memiliki_spal);
                $('#rumah_memiliki_jamban_update').val(data.jml_rumah_memiliki_jamban);
                $('#rumah_menempel_sp4k_update').val(data.jml_rumah_menempel_sp4k);
                $('#pdam_update').val(data.jml_pdam);
                $('#sumur_update').val(data.jml_sumur);
                $('#sumber_air_lain_update').val(data.jml_sumber_air_lain);
                $('#beras_update').val(data.jml_beras);
                $('#non_beras_update').val(data.jml_non_beras);
                $('#mengikuti_up2k_update').val(data.jml_mengikuti_up2k);
                $('#pemanfaatan_tanah_update').val(data.jml_pemanfaatan_tanah);
                $('#industri_rumah_tangga_update').val(data.jml_industri_rumah_tangga);
                $('#kerja_bhakti_update').val(data.jml_kerja_bhakti);
            }
        });

    } else if ($('#level').val() == 'keluarga') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'block';
        e_rw.style.display = 'block';
        e_rt.style.display = 'block';
        e_dasawisma.style.display = 'block';
    }
    $('select[name=level]').on('change', function() {
        if ($('#level').val() == 'kecamatan') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'none';
            e_dusun.style.display = 'none';
            e_rw.style.display = 'none';
            e_rt.style.display = 'none';
            e_dasawisma.style.display = 'none';
        } else if ($('#level').val() == 'desa') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'none';
            e_rw.style.display = 'none';
            e_rt.style.display = 'none';
            e_dasawisma.style.display = 'none';
        } else if ($('#level').val() == 'dusun') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'block';
            e_rw.style.display = 'none';
            e_rt.style.display = 'none';
            e_dasawisma.style.display = 'none';
        } else if ($('#level').val() == 'rw') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'block';
            e_rw.style.display = 'block';
            e_rt.style.display = 'none';
            e_dasawisma.style.display = 'none';
        } else if ($('#level').val() == 'rt') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'block';
            e_rw.style.display = 'block';
            e_rt.style.display = 'block';
            e_dasawisma.style.display = 'block';
        } else if ($('#level').val() == 'dasawisma') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'block';
            e_rw.style.display = 'block';
            e_rt.style.display = 'block';
            e_dasawisma.style.display = 'block';
        }
    });

    $('select[name=dasawisma]').select2({
        ajax: {
            url: site_url + 'api/wilayah/dasawisma?desa=' + $('#kd_desa').val() + '&dusun=' + $('#dusun').val() + '&rw=' + $('#rw').val() + '&rt=' + $('#rt').val(),
            dataType: 'json',
            data: function(param) {
                return {
                    delay: 0.3,
                    q: param.term
                }
            },
            processResults: function(data) {
                return {
                    results: $.map(data.items || data, function(obj) {
                        return {
                            id: obj.id,
                            text: obj.text,
                        }
                    })
                }
            },
            cache: false,
            minimumInputLength: 3,
        }
    });
}).trigger('change');
$("#kt_stepper_form").validate({
    submitHandler: function(form) {
        var formInput = new FormData();
        formInput.append('nama_kepala_keluarga', $('#nama_kepala_keluarga').val());
        formInput.append('dasawisma', $('#dasawisma').val());
        formInput.append('jumlah_kk', $('#jumlah_kk').val());
        formInput.append('jumlah_kk', $('#jumlah_kk').val());
        formInput.append('jumlah_PUS', $('#jumlah_PUS').val());
        formInput.append('jumlah_WUS', $('#jumlah_WUS').val());
        formInput.append('jumlah_buta', $('#jumlah_buta').val());
        formInput.append('jumlah_ibu_hamil', $('#jumlah_ibu_hamil').val());
        formInput.append('jumlah_menyusui', $('#jumlah_menyusui').val());
        formInput.append('jumlah_lansia', $('#jumlah_lansia').val());
        formInput.append('total_laki', $('#total_laki').val());
        formInput.append('total_perempuan', $('#total_perempuan').val());
        formInput.append('balita_laki', $('#balita_laki').val());
        formInput.append('balita_perempuan', $('#balita_perempuan').val());
        formInput.append('berkebutuhan_khusus', $('#berkebutuhan_khusus').val());
        formInput.append('rumah_sehat_layak_huni', $('#rumah_sehat_layak_huni').val());
        formInput.append('rumah_tidak_sehat_layak_huni', $('#rumah_tidak_sehat_layak_huni').val());
        formInput.append('rumah_memiliki_tps', $('#rumah_memiliki_tps').val());
        formInput.append('rumah_memiliki_spal', $('#rumah_memiliki_spal').val());
        formInput.append('rumah_memiliki_jamban', $('#rumah_memiliki_jamban').val());
        formInput.append('rumah_menempel_sp4k', $('#rumah_menempel_sp4k').val());
        formInput.append('pdam', $('#pdam').val());
        formInput.append('sumur', $('#sumur').val());
        formInput.append('sumber_air_lain', $('#sumber_air_lain').val());
        formInput.append('beras', $('#beras').val());
        formInput.append('non_beras', $('#non_beras').val());
        formInput.append('mengikuti_up2k', $('#mengikuti_up2k').val());
        formInput.append('pemanfaatan_tanah', $('#pemanfaatan_tanah').val());
        formInput.append('industri_rumah_tangga', $('#industri_rumah_tangga').val());
        formInput.append('kerja_bhakti', $('#kerja_bhakti').val());
        formInput.append('ket', $('#ket').val());
        $.ajax({
            url: site_url + "api/dasawisma/Api_keluarga/edit/" + $('#id_data_keluarga').val(),
            method: 'post',
            dataType: 'json',
            data: formInput,
            contentType: false,
            processData: false,
            success: function() {
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "timeOut": "3000"
                };
                toastr.success("Berhasil diubah!", "Data keluarga");
                setTimeout(function() {
                    window.location.href = site_url + "dasawisma/keluarga/";
                }, 2000);
                // location.reload();
            },
            error: function(err) {
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "timeOut": "3000"
                };
                toastr.error("Gagal Disimpan!", "Data keluarga");
                // console.log('error', err);
                // window.stop();
            },
        });
    }
});

function getData() {
    if ($('#level').val() == 'kecamatan') {
        $.ajax({
            dataType: 'json',
            url: site_url + "api/dasawisma/Api_keluarga/get_kecamatan/" + year + "/" + $('#kd_kec').val(),
            success: function(data) {
                $('#jumlah_kk').val(data.jml_jumlah_kk);
                $('#total_laki').val(data.jml_total_laki);
                $('#total_perempuan').val(data.jml_total_perempuan);
                $('#balita_laki').val(data.jml_balita_laki);
                $('#balita_perempuan').val(data.jml_balita_perempuan);
                $('#jumlah_PUS').val(data.jml_jumlah_PUS);
                $('#jumlah_WUS').val(data.jml_jumlah_WUS);
                $('#jumlah_ibu_hamil').val(data.jml_jumlah_ibu_hamil);
                $('#jumlah_menyusui').val(data.jml_jumlah_menyusui);
                $('#jumlah_lansia').val(data.jml_jumlah_lansia);
                $('#jumlah_buta').val(data.jml_jumlah_buta);
                $('#berkebutuhan_khusus').val(data.jml_berkebutuhan_khusus);
                $('#rumah_sehat_layak_huni').val(data.jml_rumah_sehat_layak_huni);
                $('#rumah_tidak_sehat_layak_huni').val(data.jml_rumah_tidak_sehat_layak_huni);
                $('#rumah_memiliki_tps').val(data.jml_rumah_memiliki_tps);
                $('#rumah_memiliki_spal').val(data.jml_rumah_memiliki_spal);
                $('#rumah_memiliki_jamban').val(data.jml_rumah_memiliki_jamban);
                $('#rumah_menempel_sp4k').val(data.jml_rumah_menempel_sp4k);
                $('#pdam').val(data.jml_pdam);
                $('#sumur').val(data.jml_sumur);
                $('#sumber_air_lain').val(data.jml_sumber_air_lain);
                $('#beras').val(data.jml_beras);
                $('#non_beras').val(data.jml_non_beras);
                $('#mengikuti_up2k').val(data.jml_mengikuti_up2k);
                $('#pemanfaatan_tanah').val(data.jml_pemanfaatan_tanah);
                $('#industri_rumah_tangga').val(data.jml_industri_rumah_tangga);
                $('#kerja_bhakti').val(data.jml_kerja_bhakti);
            }
        });
    } else if ($('#level').val() == 'desa') {
        $.ajax({
            dataType: 'json',
            url: site_url + "api/dasawisma/Api_keluarga/get_desa/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val(),
            success: function(data) {
                $('#jumlah_kk').val(data.jml_jumlah_kk);
                $('#total_laki').val(data.jml_total_laki);
                $('#total_perempuan').val(data.jml_total_perempuan);
                $('#balita_laki').val(data.jml_balita_laki);
                $('#balita_perempuan').val(data.jml_balita_perempuan);
                $('#jumlah_PUS').val(data.jml_jumlah_PUS);
                $('#jumlah_WUS').val(data.jml_jumlah_WUS);
                $('#jumlah_ibu_hamil').val(data.jml_jumlah_ibu_hamil);
                $('#jumlah_menyusui').val(data.jml_jumlah_menyusui);
                $('#jumlah_lansia').val(data.jml_jumlah_lansia);
                $('#jumlah_buta').val(data.jml_jumlah_buta);
                $('#berkebutuhan_khusus').val(data.jml_berkebutuhan_khusus);
                $('#rumah_sehat_layak_huni').val(data.jml_rumah_sehat_layak_huni);
                $('#rumah_tidak_sehat_layak_huni').val(data.jml_rumah_tidak_sehat_layak_huni);
                $('#rumah_memiliki_tps').val(data.jml_rumah_memiliki_tps);
                $('#rumah_memiliki_spal').val(data.jml_rumah_memiliki_spal);
                $('#rumah_memiliki_jamban').val(data.jml_rumah_memiliki_jamban);
                $('#rumah_menempel_sp4k').val(data.jml_rumah_menempel_sp4k);
                $('#pdam').val(data.jml_pdam);
                $('#sumur').val(data.jml_sumur);
                $('#sumber_air_lain').val(data.jml_sumber_air_lain);
                $('#beras').val(data.jml_beras);
                $('#non_beras').val(data.jml_non_beras);
                $('#mengikuti_up2k').val(data.jml_mengikuti_up2k);
                $('#pemanfaatan_tanah').val(data.jml_pemanfaatan_tanah);
                $('#industri_rumah_tangga').val(data.jml_industri_rumah_tangga);
                $('#kerja_bhakti').val(data.jml_kerja_bhakti);
            }
        });
    } else if ($('#level').val() == 'dusun') {
        $.ajax({
            dataType: 'json',
            url: site_url + "api/dasawisma/Api_keluarga/get_dusun/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#dusun').val(),
            success: function(data) {
                $('#jumlah_kk').val(data.jml_jumlah_kk);
                $('#total_laki').val(data.jml_total_laki);
                $('#total_perempuan').val(data.jml_total_perempuan);
                $('#balita_laki').val(data.jml_balita_laki);
                $('#balita_perempuan').val(data.jml_balita_perempuan);
                $('#jumlah_PUS').val(data.jml_jumlah_PUS);
                $('#jumlah_WUS').val(data.jml_jumlah_WUS);
                $('#jumlah_ibu_hamil').val(data.jml_jumlah_ibu_hamil);
                $('#jumlah_menyusui').val(data.jml_jumlah_menyusui);
                $('#jumlah_lansia').val(data.jml_jumlah_lansia);
                $('#jumlah_buta').val(data.jml_jumlah_buta);
                $('#berkebutuhan_khusus').val(data.jml_berkebutuhan_khusus);
                $('#rumah_sehat_layak_huni').val(data.jml_rumah_sehat_layak_huni);
                $('#rumah_tidak_sehat_layak_huni').val(data.jml_rumah_tidak_sehat_layak_huni);
                $('#rumah_memiliki_tps').val(data.jml_rumah_memiliki_tps);
                $('#rumah_memiliki_spal').val(data.jml_rumah_memiliki_spal);
                $('#rumah_memiliki_jamban').val(data.jml_rumah_memiliki_jamban);
                $('#rumah_menempel_sp4k').val(data.jml_rumah_menempel_sp4k);
                $('#pdam').val(data.jml_pdam);
                $('#sumur').val(data.jml_sumur);
                $('#sumber_air_lain').val(data.jml_sumber_air_lain);
                $('#beras').val(data.jml_beras);
                $('#non_beras').val(data.jml_non_beras);
                $('#mengikuti_up2k').val(data.jml_mengikuti_up2k);
                $('#pemanfaatan_tanah').val(data.jml_pemanfaatan_tanah);
                $('#industri_rumah_tangga').val(data.jml_industri_rumah_tangga);
                $('#kerja_bhakti').val(data.jml_kerja_bhakti);
            }
        });
    } else if ($('#level').val() == 'rw') {
        $.ajax({
            dataType: 'json',
            url: site_url + "api/dasawisma/Api_keluarga/get_rw/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#dusun').val() + "/" + $('#rw').val(),
            success: function(data) {
                $('#jumlah_kk').val(data.jml_jumlah_kk);
                $('#total_laki').val(data.jml_total_laki);
                $('#total_perempuan').val(data.jml_total_perempuan);
                $('#balita_laki').val(data.jml_balita_laki);
                $('#balita_perempuan').val(data.jml_balita_perempuan);
                $('#jumlah_PUS').val(data.jml_jumlah_PUS);
                $('#jumlah_WUS').val(data.jml_jumlah_WUS);
                $('#jumlah_ibu_hamil').val(data.jml_jumlah_ibu_hamil);
                $('#jumlah_menyusui').val(data.jml_jumlah_menyusui);
                $('#jumlah_lansia').val(data.jml_jumlah_lansia);
                $('#jumlah_buta').val(data.jml_jumlah_buta);
                $('#berkebutuhan_khusus').val(data.jml_berkebutuhan_khusus);
                $('#rumah_sehat_layak_huni').val(data.jml_rumah_sehat_layak_huni);
                $('#rumah_tidak_sehat_layak_huni').val(data.jml_rumah_tidak_sehat_layak_huni);
                $('#rumah_memiliki_tps').val(data.jml_rumah_memiliki_tps);
                $('#rumah_memiliki_spal').val(data.jml_rumah_memiliki_spal);
                $('#rumah_memiliki_jamban').val(data.jml_rumah_memiliki_jamban);
                $('#rumah_menempel_sp4k').val(data.jml_rumah_menempel_sp4k);
                $('#pdam').val(data.jml_pdam);
                $('#sumur').val(data.jml_sumur);
                $('#sumber_air_lain').val(data.jml_sumber_air_lain);
                $('#beras').val(data.jml_beras);
                $('#non_beras').val(data.jml_non_beras);
                $('#mengikuti_up2k').val(data.jml_mengikuti_up2k);
                $('#pemanfaatan_tanah').val(data.jml_pemanfaatan_tanah);
                $('#industri_rumah_tangga').val(data.jml_industri_rumah_tangga);
                $('#kerja_bhakti').val(data.jml_kerja_bhakti);
            }
        });
    } else if ($('#level').val() == 'rt') {
        $.ajax({
            dataType: 'json',
            url: site_url + "api/dasawisma/Api_keluarga/get_rt/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#dusun').val() + "/" + $('#rw').val() + "/" + $('#rt').val(),
            success: function(data) {
                $('#jumlah_kk').val(data.jml_jumlah_kk);
                $('#total_laki').val(data.jml_total_laki);
                $('#total_perempuan').val(data.jml_total_perempuan);
                $('#balita_laki').val(data.jml_balita_laki);
                $('#balita_perempuan').val(data.jml_balita_perempuan);
                $('#jumlah_PUS').val(data.jml_jumlah_PUS);
                $('#jumlah_WUS').val(data.jml_jumlah_WUS);
                $('#jumlah_ibu_hamil').val(data.jml_jumlah_ibu_hamil);
                $('#jumlah_menyusui').val(data.jml_jumlah_menyusui);
                $('#jumlah_lansia').val(data.jml_jumlah_lansia);
                $('#jumlah_buta').val(data.jml_jumlah_buta);
                $('#berkebutuhan_khusus').val(data.jml_berkebutuhan_khusus);
                $('#rumah_sehat_layak_huni').val(data.jml_rumah_sehat_layak_huni);
                $('#rumah_tidak_sehat_layak_huni').val(data.jml_rumah_tidak_sehat_layak_huni);
                $('#rumah_memiliki_tps').val(data.jml_rumah_memiliki_tps);
                $('#rumah_memiliki_spal').val(data.jml_rumah_memiliki_spal);
                $('#rumah_memiliki_jamban').val(data.jml_rumah_memiliki_jamban);
                $('#rumah_menempel_sp4k').val(data.jml_rumah_menempel_sp4k);
                $('#pdam').val(data.jml_pdam);
                $('#sumur').val(data.jml_sumur);
                $('#sumber_air_lain').val(data.jml_sumber_air_lain);
                $('#beras').val(data.jml_beras);
                $('#non_beras').val(data.jml_non_beras);
                $('#mengikuti_up2k').val(data.jml_mengikuti_up2k);
                $('#pemanfaatan_tanah').val(data.jml_pemanfaatan_tanah);
                $('#industri_rumah_tangga').val(data.jml_industri_rumah_tangga);
                $('#kerja_bhakti').val(data.jml_kerja_bhakti);
            }
        });
    } else if ($('#level').val() == 'dasawisma') {
        $.ajax({
            dataType: 'json',
            url: site_url + "api/dasawisma/Api_keluarga/get_dasawisma/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#dusun').val() + "/" + $('#rw').val() + "/" + $('#rt').val() + "/" + $('#dasawisma').val(),
            success: function(data) {
                $('#jumlah_kk').val(data.jml_jumlah_kk);
                $('#total_laki').val(data.jml_total_laki);
                $('#total_perempuan').val(data.jml_total_perempuan);
                $('#balita_laki').val(data.jml_balita_laki);
                $('#balita_perempuan').val(data.jml_balita_perempuan);
                $('#jumlah_PUS').val(data.jml_jumlah_PUS);
                $('#jumlah_WUS').val(data.jml_jumlah_WUS);
                $('#jumlah_ibu_hamil').val(data.jml_jumlah_ibu_hamil);
                $('#jumlah_menyusui').val(data.jml_jumlah_menyusui);
                $('#jumlah_lansia').val(data.jml_jumlah_lansia);
                $('#jumlah_buta').val(data.jml_jumlah_buta);
                $('#berkebutuhan_khusus').val(data.jml_berkebutuhan_khusus);
                $('#rumah_sehat_layak_huni').val(data.jml_rumah_sehat_layak_huni);
                $('#rumah_tidak_sehat_layak_huni').val(data.jml_rumah_tidak_sehat_layak_huni);
                $('#rumah_memiliki_tps').val(data.jml_rumah_memiliki_tps);
                $('#rumah_memiliki_spal').val(data.jml_rumah_memiliki_spal);
                $('#rumah_memiliki_jamban').val(data.jml_rumah_memiliki_jamban);
                $('#rumah_menempel_sp4k').val(data.jml_rumah_menempel_sp4k);
                $('#pdam').val(data.jml_pdam);
                $('#sumur').val(data.jml_sumur);
                $('#sumber_air_lain').val(data.jml_sumber_air_lain);
                $('#beras').val(data.jml_beras);
                $('#non_beras').val(data.jml_non_beras);
                $('#mengikuti_up2k').val(data.jml_mengikuti_up2k);
                $('#pemanfaatan_tanah').val(data.jml_pemanfaatan_tanah);
                $('#industri_rumah_tangga').val(data.jml_industri_rumah_tangga);
                $('#kerja_bhakti').val(data.jml_kerja_bhakti);
            }
        });

    }
}

function addAnggota() {

    var formInput = new FormData();
    formInput.append('id_data_keluarga', $('#id_data_keluarga').val());
    formInput.append('level', $('#level').val());
    formInput.append('kd_kec', $('#kd_kec').val());
    formInput.append('kd_desa', $('#kd_desa').val());
    formInput.append('dusun', $('#dusun').val());
    formInput.append('rt', $('#rt').val());
    formInput.append('rw', $('#rw').val());
    formInput.append('dasawisma', $('#dasawisma').val());
    formInput.append('addnik', $('#addnik').val());
    formInput.append('addkk', $('#addkk').val());
    formInput.append('addnama', $('#addnama').val());
    formInput.append('addjenis_kelamin', $('#addjenis_kelamin').val());
    formInput.append('addagama', $('#addagama').val());
    formInput.append('addtempat_lahir', $('#addtempat_lahir').val());
    formInput.append('addtanggal_lahir', $('#addtanggal_lahir').val());
    formInput.append('addstatus_dalam_keluarga', $('#addstatus_dalam_keluarga').val());
    formInput.append('addstatus_kawin', $('#addstatus_kawin').val());
    formInput.append('addpendidikan', $('#addpendidikan').val());
    formInput.append('addpekerjaan', $('#addpekerjaan').val());
    formInput.append('addcacat', $('#addcacat').val());
    formInput.append('addpancasila', $('#addpancasila').val());
    formInput.append('addgotong_royong', $('#addgotong_royong').val());
    formInput.append('addketrampilan', $('#addketrampilan').val());
    formInput.append('addkoperasi', $('#addkoperasi').val());
    formInput.append('addpangan', $('#addpangan').val());
    formInput.append('addsandang', $('#addsandang').val());
    formInput.append('addkesehatan', $('#addkesehatan').val());
    formInput.append('addperencanaan_sehat', $('#addperencanaan_sehat').val());
    formInput.append('addketerangan', $('#addketerangan').val());
    formInput.append('adddate', $('#date_year').val());


    $.ajax({
        url: site_url + "api/dasawisma/Api_keluarga/add_anggota/",
        method: 'post',
        dataType: 'json',
        data: formInput,
        contentType: false,
        processData: false,
        success: function() {
            toastr.success("Berhasil Disimpan!", "Data Desa");
            window.location.href = site_url + "dasawisma/keluarga/edit/" + $('#id_data_keluarga').val();

        },
        error: function(err) {
            toastr.error("Gagal Disimpan!", "Data Desa");
            console.log('error', err);
            window.stop();
        },
    });

}

function editAnggota($id) {
    var formInput = new FormData();
    formInput.append('editnama', $('#editnama' + $id).val());
    formInput.append('editnik', $('#editnik' + $id).val());
    formInput.append('editkk', $('#editkk' + $id).val());
    formInput.append('editnama', $('#editnama' + $id).val());
    formInput.append('editjenis_kelamin', $('#editjenis_kelamin' + $id).val());
    formInput.append('editagama', $('#editagama' + $id).val());
    formInput.append('edittempat_lahir', $('#edittempat_lahir' + $id).val());
    formInput.append('edittanggal_lahir', $('#edittanggal_lahir' + $id).val());
    formInput.append('editstatus_dalam_keluarga', $('#editstatus_dalam_keluarga' + $id).val());
    formInput.append('editstatus_kawin', $('#editstatus_kawin' + $id).val());
    formInput.append('editpendidikan', $('#editpendidikan' + $id).val());
    formInput.append('editpekerjaan', $('#editpekerjaan' + $id).val());
    formInput.append('editcacat', $('#editcacat' + $id).val());
    formInput.append('editpancasila', $('#editpancasila' + $id).val());
    formInput.append('editgotong_royong', $('#editgotong_royong' + $id).val());
    formInput.append('editketrampilan', $('#editketrampilan' + $id).val());
    formInput.append('editkoperasi', $('#editkoperasi' + $id).val());
    formInput.append('editpangan', $('#editpangan' + $id).val());
    formInput.append('editsandang', $('#editsandang' + $id).val());
    formInput.append('editkesehatan', $('#editkesehatan' + $id).val());
    formInput.append('editperencanaan_sehat', $('#editperencanaan_sehat' + $id).val());
    formInput.append('editketerangan', $('#editketerangan' + $id).val());
    $.ajax({
        url: site_url + "api/dasawisma/Api_keluarga/edit_anggota/" + $('#id_data_keluarga_anggota' + $id).val(),
        method: 'post',
        dataType: 'json',
        data: formInput,
        contentType: false,
        processData: false,
        success: function() {
            toastr.success("Berhasil Disimpan!", "Data Desa");
            window.location.href = site_url + "dasawisma/keluarga/edit/" + $('#id_data_keluarga').val();

        },
        error: function(err) {
            toastr.error("Gagal Disimpan!", "Data Desa");
            console.log('error', err);
            window.stop();
        },
    });
}

function deleteItemAnggota($id) {

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "100",
        "hideDuration": "1000",
        "timeOut": 0,
        "extendedTimeOut": 0,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "tapToDismiss": false
    };
    toastr.warning("Yakin akan menghapus data<br /><br /><a id='close-toastr' onclick='deleteAnggotaYes(" + $id + ")' type='button' class='btn btn-outline-light btn-sm'>Yes</a>", "Hapus Data")
        // $('body').on('click', 'a#close-toastr', function() {
        //     $(this).closest('.toast').remove();
        // });
}

function deleteAnggotaYes($id) {
    toastr.clear();
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "100",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    toastr.success("Berhasil Menghapus data", "Hapus Data");

    window.location = site_url + "api/dasawisma/Api_keluarga/deleteAnggota/" + $id;
}