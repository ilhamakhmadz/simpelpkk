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
                url: site_url + "api/pokja/Api_pokja2/check_kecamatan/" + year + "/" + $('#kd_kec').val(),
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
                            url: site_url + "api/pokja/Api_pokja2/get_kecamatan/" + year + "/" + $('#kd_kec').val(),
                            success: function(data) {
                                $('#butahuruf').val(data.jml_butahuruf);
                                $('#jmltamanbacaan').val(data.jml_jmltamanbacaan);
                                $('#paketAklpbelajar').val(data.jml_paketAklpbelajar);
                                $('#paketAwargabelajar').val(data.jml_paketAwargabelajar);
                                $('#paketBklpbelajar').val(data.jml_paketBklpbelajar);
                                $('#paketBwargabelajar').val(data.jml_paketBwargabelajar);
                                $('#paketCklpbelajar').val(data.jml_paketCklpbelajar);
                                $('#paketCwargabelajar').val(data.jml_paketCwargabelajar);
                                $('#kfklpbelajar').val(data.jml_kfklpbelajar);
                                $('#kfwargabelajar').val(data.jml_kfwargabelajar);
                                $('#paudsejenis').val(data.jml_paudsejenis);
                                $('#bkbklp').val(data.jml_bkbklp);
                                $('#bkbibupeserta').val(data.jml_bkbibupeserta);
                                $('#bkbape').val(data.jml_bkbape);
                                $('#bkbsimulasi').val(data.jml_bkbsimulasi);
                                $('#kaderkhusus_tutorkf').val(data.jml_kaderkhusus_tutorkf);
                                $('#kaderkhusus_tutorpaud').val(data.jml_kaderkhusus_tutorpaud);
                                $('#kaderkhusus_bkb').val(data.jml_kaderkhusus_bkb);
                                $('#kaderkhusus_koperasi').val(data.jml_kaderkhusus_koperasi);
                                $('#kaderkhusus_keterampilan').val(data.jml_kaderkhusus_keterampilan);
                                $('#kaderdilatih_lp3pkk').val(data.jml_kaderdilatih_lp3pkk);
                                $('#kaderdilatih_tpk3pkk').val(data.jml_kaderdilatih_tpk3pkk);
                                $('#kaderdilatih_damaspkk').val(data.jml_kaderdilatih_damaspkk);
                                $('#koperasi_pemula_klp').val(data.jml_koperasi_pemula_klp);
                                $('#koperasi_pemula_peserta').val(data.jml_koperasi_pemula_peserta);
                                $('#koperasi_madya_klp').val(data.jml_koperasi_madya_klp);
                                $('#koperasi_madya_peserta').val(data.jml_koperasi_madya_peserta);
                                $('#koperasi_utama_klp').val(data.jml_koperasi_utama_klp);
                                $('#koperasi_utama_peserta').val(data.jml_koperasi_utama_peserta);
                                $('#koperasi_mandiri_klp').val(data.jml_koperasi_mandiri_klp);
                                $('#koperasi_mandiri_peserta').val(data.jml_koperasi_mandiri_peserta);
                                $('#koperasi_badanhukum_klp').val(data.jml_koperasi_badanhukum_klp);
                                $('#koperasi_badanhukum_angg').val(data.jml_koperasi_badanhukum_angg);
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
                url: site_url + "api/pokja/Api_pokja2/check_desa/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val(),
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
                            url: site_url + "api/pokja/Api_pokja2/get_desa/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val(),
                            success: function(data) {
                                $('#butahuruf').val(data.jml_butahuruf);
                                $('#jmltamanbacaan').val(data.jml_jmltamanbacaan);
                                $('#paketAklpbelajar').val(data.jml_paketAklpbelajar);
                                $('#paketAwargabelajar').val(data.jml_paketAwargabelajar);
                                $('#paketBklpbelajar').val(data.jml_paketBklpbelajar);
                                $('#paketBwargabelajar').val(data.jml_paketBwargabelajar);
                                $('#paketCklpbelajar').val(data.jml_paketCklpbelajar);
                                $('#paketCwargabelajar').val(data.jml_paketCwargabelajar);
                                $('#kfklpbelajar').val(data.jml_kfklpbelajar);
                                $('#kfwargabelajar').val(data.jml_kfwargabelajar);
                                $('#paudsejenis').val(data.jml_paudsejenis);
                                $('#bkbklp').val(data.jml_bkbklp);
                                $('#bkbibupeserta').val(data.jml_bkbibupeserta);
                                $('#bkbape').val(data.jml_bkbape);
                                $('#bkbsimulasi').val(data.jml_bkbsimulasi);
                                $('#kaderkhusus_tutorkf').val(data.jml_kaderkhusus_tutorkf);
                                $('#kaderkhusus_tutorpaud').val(data.jml_kaderkhusus_tutorpaud);
                                $('#kaderkhusus_bkb').val(data.jml_kaderkhusus_bkb);
                                $('#kaderkhusus_koperasi').val(data.jml_kaderkhusus_koperasi);
                                $('#kaderkhusus_keterampilan').val(data.jml_kaderkhusus_keterampilan);
                                $('#kaderdilatih_lp3pkk').val(data.jml_kaderdilatih_lp3pkk);
                                $('#kaderdilatih_tpk3pkk').val(data.jml_kaderdilatih_tpk3pkk);
                                $('#kaderdilatih_damaspkk').val(data.jml_kaderdilatih_damaspkk);
                                $('#koperasi_pemula_klp').val(data.jml_koperasi_pemula_klp);
                                $('#koperasi_pemula_peserta').val(data.jml_koperasi_pemula_peserta);
                                $('#koperasi_madya_klp').val(data.jml_koperasi_madya_klp);
                                $('#koperasi_madya_peserta').val(data.jml_koperasi_madya_peserta);
                                $('#koperasi_utama_klp').val(data.jml_koperasi_utama_klp);
                                $('#koperasi_utama_peserta').val(data.jml_koperasi_utama_peserta);
                                $('#koperasi_mandiri_klp').val(data.jml_koperasi_mandiri_klp);
                                $('#koperasi_mandiri_peserta').val(data.jml_koperasi_mandiri_peserta);
                                $('#koperasi_badanhukum_klp').val(data.jml_koperasi_badanhukum_klp);
                                $('#koperasi_badanhukum_angg').val(data.jml_koperasi_badanhukum_angg);
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
                url: site_url + "api/pokja/Api_pokja2/check_dusun/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val(),
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
                            url: site_url + "api/pokja/Api_pokja2/get_dusun/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val(),
                            success: function(data) {
                                $('#butahuruf').val(data.jml_butahuruf);
                                $('#jmltamanbacaan').val(data.jml_jmltamanbacaan);
                                $('#paketAklpbelajar').val(data.jml_paketAklpbelajar);
                                $('#paketAwargabelajar').val(data.jml_paketAwargabelajar);
                                $('#paketBklpbelajar').val(data.jml_paketBklpbelajar);
                                $('#paketBwargabelajar').val(data.jml_paketBwargabelajar);
                                $('#paketCklpbelajar').val(data.jml_paketCklpbelajar);
                                $('#paketCwargabelajar').val(data.jml_paketCwargabelajar);
                                $('#kfklpbelajar').val(data.jml_kfklpbelajar);
                                $('#kfwargabelajar').val(data.jml_kfwargabelajar);
                                $('#paudsejenis').val(data.jml_paudsejenis);
                                $('#bkbklp').val(data.jml_bkbklp);
                                $('#bkbibupeserta').val(data.jml_bkbibupeserta);
                                $('#bkbape').val(data.jml_bkbape);
                                $('#bkbsimulasi').val(data.jml_bkbsimulasi);
                                $('#kaderkhusus_tutorkf').val(data.jml_kaderkhusus_tutorkf);
                                $('#kaderkhusus_tutorpaud').val(data.jml_kaderkhusus_tutorpaud);
                                $('#kaderkhusus_bkb').val(data.jml_kaderkhusus_bkb);
                                $('#kaderkhusus_koperasi').val(data.jml_kaderkhusus_koperasi);
                                $('#kaderkhusus_keterampilan').val(data.jml_kaderkhusus_keterampilan);
                                $('#kaderdilatih_lp3pkk').val(data.jml_kaderdilatih_lp3pkk);
                                $('#kaderdilatih_tpk3pkk').val(data.jml_kaderdilatih_tpk3pkk);
                                $('#kaderdilatih_damaspkk').val(data.jml_kaderdilatih_damaspkk);
                                $('#koperasi_pemula_klp').val(data.jml_koperasi_pemula_klp);
                                $('#koperasi_pemula_peserta').val(data.jml_koperasi_pemula_peserta);
                                $('#koperasi_madya_klp').val(data.jml_koperasi_madya_klp);
                                $('#koperasi_madya_peserta').val(data.jml_koperasi_madya_peserta);
                                $('#koperasi_utama_klp').val(data.jml_koperasi_utama_klp);
                                $('#koperasi_utama_peserta').val(data.jml_koperasi_utama_peserta);
                                $('#koperasi_mandiri_klp').val(data.jml_koperasi_mandiri_klp);
                                $('#koperasi_mandiri_peserta').val(data.jml_koperasi_mandiri_peserta);
                                $('#koperasi_badanhukum_klp').val(data.jml_koperasi_badanhukum_klp);
                                $('#koperasi_badanhukum_angg').val(data.jml_koperasi_badanhukum_angg);
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
                url: site_url + "api/pokja/Api_pokja2/check_rw/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val() + "/" + $('#kd_rw').val(),
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
                            url: site_url + "api/pokja/Api_pokja2/get_rw/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val() + "/" + $('#kd_rw').val(),
                            success: function(data) {
                                $('#butahuruf').val(data.jml_butahuruf);
                                $('#jmltamanbacaan').val(data.jml_jmltamanbacaan);
                                $('#paketAklpbelajar').val(data.jml_paketAklpbelajar);
                                $('#paketAwargabelajar').val(data.jml_paketAwargabelajar);
                                $('#paketBklpbelajar').val(data.jml_paketBklpbelajar);
                                $('#paketBwargabelajar').val(data.jml_paketBwargabelajar);
                                $('#paketCklpbelajar').val(data.jml_paketCklpbelajar);
                                $('#paketCwargabelajar').val(data.jml_paketCwargabelajar);
                                $('#kfklpbelajar').val(data.jml_kfklpbelajar);
                                $('#kfwargabelajar').val(data.jml_kfwargabelajar);
                                $('#paudsejenis').val(data.jml_paudsejenis);
                                $('#bkbklp').val(data.jml_bkbklp);
                                $('#bkbibupeserta').val(data.jml_bkbibupeserta);
                                $('#bkbape').val(data.jml_bkbape);
                                $('#bkbsimulasi').val(data.jml_bkbsimulasi);
                                $('#kaderkhusus_tutorkf').val(data.jml_kaderkhusus_tutorkf);
                                $('#kaderkhusus_tutorpaud').val(data.jml_kaderkhusus_tutorpaud);
                                $('#kaderkhusus_bkb').val(data.jml_kaderkhusus_bkb);
                                $('#kaderkhusus_koperasi').val(data.jml_kaderkhusus_koperasi);
                                $('#kaderkhusus_keterampilan').val(data.jml_kaderkhusus_keterampilan);
                                $('#kaderdilatih_lp3pkk').val(data.jml_kaderdilatih_lp3pkk);
                                $('#kaderdilatih_tpk3pkk').val(data.jml_kaderdilatih_tpk3pkk);
                                $('#kaderdilatih_damaspkk').val(data.jml_kaderdilatih_damaspkk);
                                $('#koperasi_pemula_klp').val(data.jml_koperasi_pemula_klp);
                                $('#koperasi_pemula_peserta').val(data.jml_koperasi_pemula_peserta);
                                $('#koperasi_madya_klp').val(data.jml_koperasi_madya_klp);
                                $('#koperasi_madya_peserta').val(data.jml_koperasi_madya_peserta);
                                $('#koperasi_utama_klp').val(data.jml_koperasi_utama_klp);
                                $('#koperasi_utama_peserta').val(data.jml_koperasi_utama_peserta);
                                $('#koperasi_mandiri_klp').val(data.jml_koperasi_mandiri_klp);
                                $('#koperasi_mandiri_peserta').val(data.jml_koperasi_mandiri_peserta);
                                $('#koperasi_badanhukum_klp').val(data.jml_koperasi_badanhukum_klp);
                                $('#koperasi_badanhukum_angg').val(data.jml_koperasi_badanhukum_angg);
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
                url: site_url + "api/pokja/Api_pokja2/check_rt/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val() + "/" + $('#kd_rw').val() + "/" + $('#kd_rt').val(),
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
            formInput.append('kode_kecamatan', $('#kd_kec').val());
            formInput.append('kode_desa', $('#kd_desa').val());
            formInput.append('kd_dusun', $('#kd_dusun').val());
            formInput.append('kd_rw', $('#kd_rw').val());
            formInput.append('kd_rt', $('#kd_rt').val());
            formInput.append('level', $('#level').val());

            $.ajax({
                url: site_url + "api/pokja/Api_pokja2/add",
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function() {
                    toastr.success("Berhasil Disimpan!", "Data Kegiatan Pokja II");
                    setTimeout(function() {
                            window.location.href = site_url + "pokja/pokja2/index/";
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