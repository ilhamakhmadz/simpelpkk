var dataAnggota = [];
$(document).ready(function() {
    $("#ket").summernote();

    var e_kec = document.getElementById("div-kec");
    var e_desa = document.getElementById("div-desa");
    var e_dusun = document.getElementById("div-dusun");
    var e_rt = document.getElementById("div-rt");
    var e_rw = document.getElementById("div-rw");
    if ($('#level').val() == 'kecamatan') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'none';
        e_dusun.style.display = 'none';
        e_rt.style.display = 'none';
        e_rw.style.display = 'none';
    } else if ($('#level').val() == 'desa') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'none';
        e_rt.style.display = 'none';
        e_rw.style.display = 'none';
    } else if ($('#level').val() == 'dusun') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'block';
        e_rt.style.display = 'none';
        e_rw.style.display = 'none';

    } else if ($('#level').val() == 'rt') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'block';
        e_rw.style.display = 'block';
        e_rt.style.display = 'block';

    } else if ($('#level').val() == 'rw') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'block';
        e_rw.style.display = 'block';
        e_rt.style.display = 'none';

    } else {
        e_dusun.style.display = 'none';
        e_kec.style.display = 'none';
        e_desa.style.display = 'none';
        e_rt.style.display = 'none';
        e_rw.style.display = 'none';
    }
    $('select[name=level]').on('change', function() {
        if ($('#level').val() == 'kecamatan') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'none';
            e_dusun.style.display = 'none';
            e_rt.style.display = 'none';
            e_rw.style.display = 'none';
        } else if ($('#level').val() == 'desa') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'none';
            e_rt.style.display = 'none';
            e_rw.style.display = 'none';
        } else if ($('#level').val() == 'dusun') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'block';
            e_rt.style.display = 'none';
            e_rw.style.display = 'none';
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

    $('select[name=kd_kec]').on('change', function() {
        $('select[name=kd_desa]').empty();
        $('select[name=kd_desa]').select2({
            ajax: {
                url: site_url + 'api/wilayah/desa?desaId=' + $('select[name=kd_kec]').val(),
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
                                id: obj.Kd_Desa,
                                text: obj.text,
                            }
                        })
                    }
                },
                cache: false,
                minimumInputLength: 3,

            }
        });
        var year = new Date().getFullYear();

        if ($('#level').val() == 'kecamatan') {
            $.ajax({
                url: site_url + "api/dasawisma/Api_keluarga/check_kecamatan/" + year + "/" + $('#kd_kec').val(),
                type: 'POST',
                success: function(response) {
                    if (response != 'null') {
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-center",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        };

                        toastr.info("MAAF , Data Sudah dinputkan pada tahun ini, Mohon Pilih Kecamatan Dengan Benar !!!");
                        window.stop();
                    }
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

    $('select[name=kd_desa]').on('change', function() {
        var year = new Date().getFullYear();
        if ($('#level').val() == 'desa') {
            $.ajax({
                url: site_url + "api/dasawisma/Api_keluarga/check_desa/" + year + "/" + $('#kd_desa').val(),
                type: 'POST',
                success: function(response) {
                    if (response != 'null') {
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-center",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        };

                        toastr.info("MAAF , Data Sudah dinputkan pada tahun ini, Mohon Pilih Desa Dengan Benar !!!");
                        window.stop();
                    }
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

    $('select[name=level]').on('change', function() {
        $('select[name=nama_kepala_keluarga]').empty();
        $('select[name=nama_kepala_keluarga]').select2({
            ajax: {
                url: site_url + 'api/dasawisma/Api_kelompok_dasawisma/level?levelId=' + $('select[name=level]').val(),
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
                                id: obj.id_data_keluarga,
                                text: obj.text,
                            }
                        })
                    }
                },
                cache: false,
                minimumInputLength: 3,

            }
        });
    });

    $('select[name=nama_kepala_keluarga]').on('change', function() {
        $.ajax({
            url: site_url + 'api/dasawisma/Api_kelompok_dasawisma/get_nama/' + $('select[name=nama_kepala_keluarga]').val(),
            dataType: 'json',
            success: function(data) {
                $('#kd_kec').val(data.kecamatan);
                $('#kd_desa').val(data.desa);
                $('#nama_desa').val(data.Nama_Desa);
                $('#dusun').val(data.dusun);
                $('#rt').val(data.rt);
                $('#rw').val(data.rw);
                $('#dasawisma').val(data.dasawisma);
                $('#id_data_keluarga').val(data.id_data_keluarga);
                $('#jumlah_kk').val(data.jumlah_kk);
                $('#jumlah_PUS').val(data.jumlah_PUS);
                $('#jumlah_WUS').val(data.jumlah_WUS);
                $('#total_laki').val(data.total_laki);
                $('#total_perempuan').val(data.total_perempuan);
                $('#balita_laki').val(data.balita_laki);
                $('#balita_perempuan').val(data.balita_perempuan);
                $('#jumlah_buta').val(data.jumlah_buta);
                $('#jumlah_ibu_hamil').val(data.jumlah_ibu_hamil);
                $('#jumlah_menyusui').val(data.jumlah_menyusui);
                $('#jumlah_lansia').val(data.jumlah_lansia);
                $('#berkebutuhan_khusus').val(data.berkebutuhan_khusus);
                if (data.kreteria_rumah == 'Sehat') {
                    $('#rumah_sehat_layak_huni').val('1');
                    $('#rumah_tidak_sehat_layak_huni').val('0');
                } else if (data.kreteria_rumah == 'Kurang Sehat') {
                    $('#rumah_sehat_layak_huni').val('0');
                    $('#rumah_tidak_sehat_layak_huni').val('1');
                }

                if (data.pembuangan_sampah == 'Ya') {
                    $('#rumah_memiliki_tps').val('1');
                } else if (data.pembuangan_sampah == 'Tidak') {
                    $('#rumah_memiliki_tps').val('0');
                }

                if (data.saluran_air_limbah == 'Ya') {
                    $('#rumah_memiliki_spal').val('1');
                } else if (data.saluran_air_limbah == 'Tidak') {
                    $('#rumah_memiliki_spal').val('0');
                }

                if (data.jamban_keluarga == 'Ya') {
                    $('#rumah_memiliki_jamban').val('1');
                } else if (data.jamban_keluarga == 'Tidak') {
                    $('#rumah_memiliki_jamban').val('0');
                }

                if (data.stiker_p4k == 'Ya') {
                    $('#rumah_menempel_sp4k').val('1');
                } else if (data.stiker_p4k == 'Tidak') {
                    $('#rumah_menempel_sp4k').val('0');
                }

                if (data.sumber_air_keluarga == 'PDAM') {
                    $('#pdam').val('1');
                    $('#sumur').val('0');
                    $('#sumber_air_lain').val('0');
                } else if (data.sumber_air_keluarga == 'Sumur') {
                    $('#pdam').val('0');
                    $('#sumur').val('1');
                    $('#sumber_air_lain').val('0');
                } else {
                    $('#pdam').val('0');
                    $('#sumur').val('0');
                    $('#sumber_air_lain').val('1');
                }

                if (data.makanan_pokok == 'Beras') {
                    $('#beras').val('1');
                    $('#non_beras').val('0');
                } else if (data.makanan_pokok == 'Non Beras') {
                    $('#beras').val('0');
                    $('#non_beras').val('1');
                }

                if (data.aktivitas_up2k == 'Ya') {
                    $('#mengikuti_up2k').val('1');
                } else if (data.aktivitas_up2k == 'Tidak') {
                    $('#mengikuti_up2k').val('0');
                }

                $('#pemanfaatan_tanah').val(data.pemanfaatan_tanah);
                $('#industri_rumah_tangga').val(data.industri_rumah_tangga);
                $('#kerja_bhakti').val(data.kerja_bhakti);
                $('#ket').val(data.ket);


            }
        })

    });


    $('#form_add').validate({
        submitHandler: function(form) {
            var formInput = new FormData();
            formInput.append('level', $('#level').val());
            formInput.append('kd_kec', $('#kd_kec').val());
            formInput.append('kd_desa', $('#kd_desa').val());
            formInput.append('dusun', $('#dusun').val());
            formInput.append('rt', $('#rt').val());
            formInput.append('rw', $('#rw').val());
            formInput.append('dasawisma', $('#dasawisma').val());
            formInput.append('id_data_keluarga', $('#id_data_keluarga').val());
            formInput.append('nama_kepala_keluarga', $('#nama_kepala_keluarga').text());
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
                url: site_url + "api/dasawisma/Api_kelompok_dasawisma/add",
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function() {
                    toastr.success("Berhasil Disimpan!", "Data Desa");
                    // setTimeout(function() {
                    window.location.href = site_url + "dasawisma/kelompok_dasawisma";
                    // },
                    // 2000)
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
var tambahPrasarana = tambahPrasarana;

function tambahPrasarana() {

    var row =
        "<tr class='row_harga'>" +
        "<td>" + $('#no_reg_tp_pkk').val() + "<br>" + $('#nama').val() + "<input type='hidden' class='ob_no_reg_tp_pkk form-control' name='ob_no_reg_tp_pkk[]' value='" + $('#no_reg_tp_pkk').val() + "'> " +
        "<input type='hidden' class='ob_nama form-control' name='ob_nama[]' value='" + $('#nama').val() + "'></td>" +
        "<td>" + $('#jenis_kelamin').val() + "<input type='hidden' class='jenis_kelamin form-control' name='jenis_kelamin[]' value='" + $('#jenis_kelamin').val() + "'><br /> </td>" +
        "<td>" + $('#tempat_lahir').val() + "," + $('#tanggal_lahir').val() + "<input type='hidden' class='tanggal_lahir form-control' name='tanggal_lahir[]' value='" + $('#tanggal_lahir').val() + "'><input type='hidden' class='tempat_lahir form-control' name='tempat_lahir[]' value='" + $('#tempat_lahir').val() + "'><br /> </td>" +
        "<td>" +
        $('#status').val() + ', ' + $('#status_kawin').val() +
        "<input type='hidden' class='status form-control' name='status[]' value='" + $('#status').val() + "'><br /> " +
        "<input type='hidden' class='status_kawin form-control' name='status_kawin[]' value='" + $('#status_kawin').val() + "'><br /> " +
        $('#pendidikan').val() + "<input type='hidden' class='pendidikan form-control' name='pendidikan[]' value='" + $('#pendidikan').val() + "'><br /> " +
        $('#pekerjaan').val() + "<input type='hidden' class='pekerjaan form-control' name='pekerjaan[]' value='" + $('#pekerjaan').val() + "'><br /> </td>" +
        '<td class="text-right"> <a class="btn btn-icon btn-google btn-sm me-3" onclick="deletePrasarana($(this))"> <i class="fa fa-trash"></i> </a> </td>' +
        "</tr>";
    $(row).appendTo('#table-prasarana > tbody');
    dataAnggota.push({
        ob_no_reg_tp_pkk: $('.ob_no_reg_tp_pkk').val(),
        ob_nama: $('.ob_nama').val(),
        jenis_kelamin: $('.jenis_kelamin').val(),
        tempat_lahir: $('.tempat_lahir').val(),
        tanggal_lahir: $('.tanggal_lahir').val(),
        status: $('.status').val(),
        status_kawin: $('.status_kawin').val(),
        pendidikan: $('.pendidikan').val(),
        pekerjaan: $('.pekerjaan').val()
    });
}

function deletePrasarana(row) {

    row.closest('tr').remove();
}