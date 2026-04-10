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
                url: site_url + "api/pokja/Api_pokja3/check_kecamatan/" + year + "/" + $('#kd_kec').val(),
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
                            url: site_url + "api/pokja/Api_pokja3/get_kecamatan/" + year + "/" + $('#kd_kec').val(),
                            success: function(data) {
                                $('#kader_pangan').val(data.jml_kader_pangan);
                                $('#kader_sandang').val(data.jml_kader_sandang);
                                $('#kader_tatalaksana_rumahtangga').val(data.jml_kader_tatalaksana_rumahtangga);
                                $('#pangan_beras').val(data.jml_pangan_beras);
                                $('#pangan_nonberas').val(data.jml_pangan_nonberas);
                                $('#pangan_peternakan').val(data.jml_pangan_peternakan);
                                $('#pangan_perikanan').val(data.jml_pangan_perikanan);
                                $('#pangan_warunghidup').val(data.jml_pangan_warunghidup);
                                $('#pangan_lumbunghidup').val(data.jml_pangan_lumbunghidup);
                                $('#pangan_toga').val(data.jml_pangan_toga);
                                $('#pangan_tanaman_keras').val(data.jml_pangan_tanaman_keras);
                                $('#industri_pangan').val(data.jml_industri_pangan);
                                $('#insdustri_sandang').val(data.jml_insdustri_sandang);
                                $('#industri_jasa').val(data.jml_industri_jasa);
                                $('#rumah_sehat').val(data.jml_rumah_sehat);
                                $('#rumah_tidaksehat').val(data.jml_rumah_tidaksehat);
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
                url: site_url + "api/pokja/Api_pokja3/check_desa/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val(),
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
                            url: site_url + "api/pokja/Api_pokja3/get_desa/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val(),
                            success: function(data) {
                                $('#kader_pangan').val(data.jml_kader_pangan);
                                $('#kader_sandang').val(data.jml_kader_sandang);
                                $('#kader_tatalaksana_rumahtangga').val(data.jml_kader_tatalaksana_rumahtangga);
                                $('#pangan_beras').val(data.jml_pangan_beras);
                                $('#pangan_nonberas').val(data.jml_pangan_nonberas);
                                $('#pangan_peternakan').val(data.jml_pangan_peternakan);
                                $('#pangan_perikanan').val(data.jml_pangan_perikanan);
                                $('#pangan_warunghidup').val(data.jml_pangan_warunghidup);
                                $('#pangan_lumbunghidup').val(data.jml_pangan_lumbunghidup);
                                $('#pangan_toga').val(data.jml_pangan_toga);
                                $('#pangan_tanaman_keras').val(data.jml_pangan_tanaman_keras);
                                $('#industri_pangan').val(data.jml_industri_pangan);
                                $('#insdustri_sandang').val(data.jml_insdustri_sandang);
                                $('#industri_jasa').val(data.jml_industri_jasa);
                                $('#rumah_sehat').val(data.jml_rumah_sehat);
                                $('#rumah_tidaksehat').val(data.jml_rumah_tidaksehat);
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
                url: site_url + "api/pokja/Api_pokja3/check_dusun/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val(),
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
                            url: site_url + "api/pokja/Api_pokja3/get_dusun/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val(),
                            success: function(data) {
                                $('#kader_pangan').val(data.jml_kader_pangan);
                                $('#kader_sandang').val(data.jml_kader_sandang);
                                $('#kader_tatalaksana_rumahtangga').val(data.jml_kader_tatalaksana_rumahtangga);
                                $('#pangan_beras').val(data.jml_pangan_beras);
                                $('#pangan_nonberas').val(data.jml_pangan_nonberas);
                                $('#pangan_peternakan').val(data.jml_pangan_peternakan);
                                $('#pangan_perikanan').val(data.jml_pangan_perikanan);
                                $('#pangan_warunghidup').val(data.jml_pangan_warunghidup);
                                $('#pangan_lumbunghidup').val(data.jml_pangan_lumbunghidup);
                                $('#pangan_toga').val(data.jml_pangan_toga);
                                $('#pangan_tanaman_keras').val(data.jml_pangan_tanaman_keras);
                                $('#industri_pangan').val(data.jml_industri_pangan);
                                $('#insdustri_sandang').val(data.jml_insdustri_sandang);
                                $('#industri_jasa').val(data.jml_industri_jasa);
                                $('#rumah_sehat').val(data.jml_rumah_sehat);
                                $('#rumah_tidaksehat').val(data.jml_rumah_tidaksehat);
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
                url: site_url + "api/pokja/Api_pokja3/check_rw/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val() + "/" + $('#kd_rw').val(),
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
                            url: site_url + "api/pokja/Api_pokja3/get_rw/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val() + "/" + $('#kd_rw').val(),
                            success: function(data) {
                                $('#kader_pangan').val(data.jml_kader_pangan);
                                $('#kader_sandang').val(data.jml_kader_sandang);
                                $('#kader_tatalaksana_rumahtangga').val(data.jml_kader_tatalaksana_rumahtangga);
                                $('#pangan_beras').val(data.jml_pangan_beras);
                                $('#pangan_nonberas').val(data.jml_pangan_nonberas);
                                $('#pangan_peternakan').val(data.jml_pangan_peternakan);
                                $('#pangan_perikanan').val(data.jml_pangan_perikanan);
                                $('#pangan_warunghidup').val(data.jml_pangan_warunghidup);
                                $('#pangan_lumbunghidup').val(data.jml_pangan_lumbunghidup);
                                $('#pangan_toga').val(data.jml_pangan_toga);
                                $('#pangan_tanaman_keras').val(data.jml_pangan_tanaman_keras);
                                $('#industri_pangan').val(data.jml_industri_pangan);
                                $('#insdustri_sandang').val(data.jml_insdustri_sandang);
                                $('#industri_jasa').val(data.jml_industri_jasa);
                                $('#rumah_sehat').val(data.jml_rumah_sehat);
                                $('#rumah_tidaksehat').val(data.jml_rumah_tidaksehat);
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
                url: site_url + "api/pokja/Api_pokja3/check_rt/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val() + "/" + $('#kd_rw').val() + "/" + $('#kd_rt').val(),
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
                url: site_url + "api/pokja/Api_pokja3/add",
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function() {
                    toastr.success("Berhasil Disimpan!", "Data Kegiatan Pokja III");
                    setTimeout(function() {
                            window.location.href = site_url + "pokja/pokja3/index/";
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