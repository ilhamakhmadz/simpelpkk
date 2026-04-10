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
                url: site_url + "api/pokja/Api_pokja4/check_kecamatan/" + year + "/" + $('#kd_kec').val(),
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
                    } else {
                        $.ajax({
                            dataType: 'json',
                            url: site_url + "api/pokja/Api_pokja4/get_kecamatan/" + year + "/" + $('#kd_kec').val(),
                            success: function(data) {
                                $('#kader_posyandu').val(data.jml_kader_posyandu);
                                $('#kader_gizi').val(data.jml_kader_gizi);
                                $('#kader_kesling').val(data.jml_kader_kesling);
                                $('#kader_penyuluhan_narkoba').val(data.jml_kader_penyuluhan_narkoba);
                                $('#kader_phbs').val(data.jml_kader_phbs);
                                $('#kader_kb').val(data.jml_kader_kb);
                                $('#kes_posyandu_jml').val(data.jml_kes_posyandu_jml);
                                $('#kes_posyandu_terintegrasi').val(data.jml_kes_posyandu_terintegrasi);
                                $('#kes_posyandu_klp').val(data.jml_kes_posyandu_klp);
                                $('#kes_posyandu_lansia_anggota').val(data.jml_kes_posyandu_lansia_anggota);
                                $('#kes_posyandu_lansia_kartu_gratis').val(data.jml_kes_posyandu_lansia_kartu_gratis);
                                $('#rumah_jamban').val(data.jml_rumah_jamban);
                                $('#rumah_spai').val(data.jml_rumah_spai);
                                $('#rumah_pembuangan_sampah').val(data.jml_rumah_pembuangan_sampah);
                                $('#jml_mck').val(data.jml_jml_mck);
                                $('#krt_pdam').val(data.jml_krt_pdam);
                                $('#krt_sumur').val(data.jml_krt_sumur);
                                $('#krt_lainnya').val(data.jml_krt_lainnya);
                                $('#jum_pus').val(data.jml_jum_pus);
                                $('#jum_wus').val(data.jml_jum_wus);
                                $('#akseptor_kb_l').val(data.jml_akseptor_kb_l);
                                $('#akseptor_kb_p').val(data.jml_akseptor_kb_p);
                                $('#pnya_tab_keluarga').val(data.jml_pnya_tab_keluarga);
                            }
                        });

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
        $('select[name=kd_dusun]').empty();
        $('select[name=kd_dusun]').select2({
            ajax: {
                url: site_url + 'api/wilayah/dusun?desa=' + $('select[name=kd_desa]').val(),
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
                                id: obj.dusun,
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
        if ($('#level').val() == 'desa') {
            $.ajax({
                url: site_url + "api/pokja/Api_pokja4/check_desa/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val(),
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
                    } else {
                        $.ajax({
                            dataType: 'json',
                            url: site_url + "api/pokja/Api_pokja4/get_desa/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val(),
                            success: function(data) {
                                $('#kader_posyandu').val(data.jml_kader_posyandu);
                                $('#kader_gizi').val(data.jml_kader_gizi);
                                $('#kader_kesling').val(data.jml_kader_kesling);
                                $('#kader_penyuluhan_narkoba').val(data.jml_kader_penyuluhan_narkoba);
                                $('#kader_phbs').val(data.jml_kader_phbs);
                                $('#kader_kb').val(data.jml_kader_kb);
                                $('#kes_posyandu_jml').val(data.jml_kes_posyandu_jml);
                                $('#kes_posyandu_terintegrasi').val(data.jml_kes_posyandu_terintegrasi);
                                $('#kes_posyandu_klp').val(data.jml_kes_posyandu_klp);
                                $('#kes_posyandu_lansia_anggota').val(data.jml_kes_posyandu_lansia_anggota);
                                $('#kes_posyandu_lansia_kartu_gratis').val(data.jml_kes_posyandu_lansia_kartu_gratis);
                                $('#rumah_jamban').val(data.jml_rumah_jamban);
                                $('#rumah_spai').val(data.jml_rumah_spai);
                                $('#rumah_pembuangan_sampah').val(data.jml_rumah_pembuangan_sampah);
                                $('#jml_mck').val(data.jml_jml_mck);
                                $('#krt_pdam').val(data.jml_krt_pdam);
                                $('#krt_sumur').val(data.jml_krt_sumur);
                                $('#krt_lainnya').val(data.jml_krt_lainnya);
                                $('#jum_pus').val(data.jml_jum_pus);
                                $('#jum_wus').val(data.jml_jum_wus);
                                $('#akseptor_kb_l').val(data.jml_akseptor_kb_l);
                                $('#akseptor_kb_p').val(data.jml_akseptor_kb_p);
                                $('#pnya_tab_keluarga').val(data.jml_pnya_tab_keluarga);
                            }
                        });

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

    $('select[name=kd_dusun]').on('change', function() {
        $('select[name=kd_rw]').empty();
        $('select[name=kd_rw]').select2({
            ajax: {
                url: site_url + 'api/wilayah/rw?desa=' + $('select[name=kd_desa]').val() + '&dusun=' + $('select[name=kd_dusun]').val(),
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
                                id: obj.rw,
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
        if ($('#level').val() == 'dusun') {
            $.ajax({
                url: site_url + "api/pokja/Api_pokja4/check_dusun/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val(),
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

                        toastr.info("MAAF , Data Sudah dinputkan pada tahun ini, Mohon Pilih Dusun Dengan Benar !!!");
                        window.stop();
                    } else {
                        $.ajax({
                            dataType: 'json',
                            url: site_url + "api/pokja/Api_pokja4/get_dusun/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val(),
                            success: function(data) {
                                $('#kader_posyandu').val(data.jml_kader_posyandu);
                                $('#kader_gizi').val(data.jml_kader_gizi);
                                $('#kader_kesling').val(data.jml_kader_kesling);
                                $('#kader_penyuluhan_narkoba').val(data.jml_kader_penyuluhan_narkoba);
                                $('#kader_phbs').val(data.jml_kader_phbs);
                                $('#kader_kb').val(data.jml_kader_kb);
                                $('#kes_posyandu_jml').val(data.jml_kes_posyandu_jml);
                                $('#kes_posyandu_terintegrasi').val(data.jml_kes_posyandu_terintegrasi);
                                $('#kes_posyandu_klp').val(data.jml_kes_posyandu_klp);
                                $('#kes_posyandu_lansia_anggota').val(data.jml_kes_posyandu_lansia_anggota);
                                $('#kes_posyandu_lansia_kartu_gratis').val(data.jml_kes_posyandu_lansia_kartu_gratis);
                                $('#rumah_jamban').val(data.jml_rumah_jamban);
                                $('#rumah_spai').val(data.jml_rumah_spai);
                                $('#rumah_pembuangan_sampah').val(data.jml_rumah_pembuangan_sampah);
                                $('#jml_mck').val(data.jml_jml_mck);
                                $('#krt_pdam').val(data.jml_krt_pdam);
                                $('#krt_sumur').val(data.jml_krt_sumur);
                                $('#krt_lainnya').val(data.jml_krt_lainnya);
                                $('#jum_pus').val(data.jml_jum_pus);
                                $('#jum_wus').val(data.jml_jum_wus);
                                $('#akseptor_kb_l').val(data.jml_akseptor_kb_l);
                                $('#akseptor_kb_p').val(data.jml_akseptor_kb_p);
                                $('#pnya_tab_keluarga').val(data.jml_pnya_tab_keluarga);
                            }
                        });

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

    $('select[name=kd_rw]').on('change', function() {
        $('select[name=kd_rt]').empty();
        $('select[name=kd_rt]').select2({
            ajax: {
                url: site_url + 'api/wilayah/rt?desa=' + $('select[name=kd_desa]').val() + '&dusun=' + $('select[name=kd_dusun]').val() + '&rw=' + $('select[name=kd_rw]').val(),
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
                                id: obj.rt,
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
        if ($('#level').val() == 'rw') {
            $.ajax({
                url: site_url + "api/pokja/Api_pokja4/check_rw/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val() + "/" + $('#kd_rw').val(),
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

                        toastr.info("MAAF , Data Sudah dinputkan pada tahun ini, Mohon Pilih RW Dengan Benar !!!");
                        window.stop();
                    } else {
                        $.ajax({
                            dataType: 'json',
                            url: site_url + "api/pokja/Api_pokja4/get_rw/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val() + "/" + $('#kd_rw').val(),
                            success: function(data) {
                                $('#kader_posyandu').val(data.jml_kader_posyandu);
                                $('#kader_gizi').val(data.jml_kader_gizi);
                                $('#kader_kesling').val(data.jml_kader_kesling);
                                $('#kader_penyuluhan_narkoba').val(data.jml_kader_penyuluhan_narkoba);
                                $('#kader_phbs').val(data.jml_kader_phbs);
                                $('#kader_kb').val(data.jml_kader_kb);
                                $('#kes_posyandu_jml').val(data.jml_kes_posyandu_jml);
                                $('#kes_posyandu_terintegrasi').val(data.jml_kes_posyandu_terintegrasi);
                                $('#kes_posyandu_klp').val(data.jml_kes_posyandu_klp);
                                $('#kes_posyandu_lansia_anggota').val(data.jml_kes_posyandu_lansia_anggota);
                                $('#kes_posyandu_lansia_kartu_gratis').val(data.jml_kes_posyandu_lansia_kartu_gratis);
                                $('#rumah_jamban').val(data.jml_rumah_jamban);
                                $('#rumah_spai').val(data.jml_rumah_spai);
                                $('#rumah_pembuangan_sampah').val(data.jml_rumah_pembuangan_sampah);
                                $('#jml_mck').val(data.jml_jml_mck);
                                $('#krt_pdam').val(data.jml_krt_pdam);
                                $('#krt_sumur').val(data.jml_krt_sumur);
                                $('#krt_lainnya').val(data.jml_krt_lainnya);
                                $('#jum_pus').val(data.jml_jum_pus);
                                $('#jum_wus').val(data.jml_jum_wus);
                                $('#akseptor_kb_l').val(data.jml_akseptor_kb_l);
                                $('#akseptor_kb_p').val(data.jml_akseptor_kb_p);
                                $('#pnya_tab_keluarga').val(data.jml_pnya_tab_keluarga);
                            }
                        });

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

    $('select[name=kd_rt]').on('change', function() {
        var year = new Date().getFullYear();
        if ($('#level').val() == 'rt') {
            $.ajax({
                url: site_url + "api/pokja/Api_pokja4/check_rt/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val() + "/" + $('#kd_rw').val() + "/" + $('#kd_rt').val(),
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

                        toastr.info("MAAF , Data Sudah dinputkan pada tahun ini, Mohon Pilih RT Dengan Benar !!!");
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
    $("#form_add").validate({
        submitHandler: function(form) {
            var formInput = new FormData(form);
            formInput.append('kode_kecamatan', $('#kd_kec').val());
            formInput.append('kode_desa', $('#kd_desa').val());
            formInput.append('kd_dusun', $('#kd_dusun').val());
            formInput.append('kd_rw', $('#kd_rw').val());
            formInput.append('kd_rt', $('#kd_rt').val());
            formInput.append('level', $('#level').val());
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
                url: site_url + "api/pokja/Api_pokja4/add",
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function() {
                    toastr.success("Berhasil Disimpan!", "Data Kegiatan Pokja IV");
                    setTimeout(function() {
                            window.location.href = site_url + "pokja/pokja4/index/";
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