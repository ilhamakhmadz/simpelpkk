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
                url: site_url + "api/pokja/Api_pokja1/check_kecamatan/" + year + "/" + $('#kd_kec').val(),
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
                            url: site_url + "api/pokja/Api_pokja1/get_kecamatan/" + year + "/" + $('#kd_kec').val(),
                            success: function(data) {
                                $('#kader_pkdrt').val(data.jml_kader_pkdrt);
                                $('#kader_pkbn').val(data.jml_kader_pkbn);
                                $('#kader_polaasuh').val(data.jml_kader_polaasuh);
                                $('#pkbn_klpsimulasi').val(data.jml_pkbn_klpsimulasi);
                                $('#pkbn_angg').val(data.jml_pkbn_angg);
                                $('#pkdrt_klpsimulasi').val(data.jml_pkdrt_klpsimulasi);
                                $('#pkdrt_angg').val(data.jml_pkdrt_angg);
                                $('#polaasuh_klp').val(data.jml_polaasuh_klp);
                                $('#polaasuh_anggota').val(data.jml_polaasuh_anggota);
                                $('#lansia_klp').val(data.jml_lansia_klp);
                                $('#lansia_angg').val(data.jml_lansia_angg);
                                $('#kelompok_kerjabakti').val(data.jml_kelompok_kerjabakti);
                                $('#kelompok_kematian').val(data.jml_kelompok_kematian);
                                $('#kelompok_keagamaan').val(data.jml_kelompok_keagamaan);
                                $('#kelompok_jimpitan').val(data.jml_kelompok_jimpitan);
                                $('#kelompok_arisan').val(data.jml_kelompok_arisan);
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
                url: site_url + "api/pokja/Api_pokja1/check_desa/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val(),
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
                            url: site_url + "api/pokja/Api_pokja1/get_desa/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val(),
                            success: function(data) {
                                $('#kader_pkdrt').val(data.jml_kader_pkdrt);
                                $('#kader_pkbn').val(data.jml_kader_pkbn);
                                $('#kader_polaasuh').val(data.jml_kader_polaasuh);
                                $('#pkbn_klpsimulasi').val(data.jml_pkbn_klpsimulasi);
                                $('#pkbn_angg').val(data.jml_pkbn_angg);
                                $('#pkdrt_klpsimulasi').val(data.jml_pkdrt_klpsimulasi);
                                $('#pkdrt_angg').val(data.jml_pkdrt_angg);
                                $('#polaasuh_klp').val(data.jml_polaasuh_klp);
                                $('#polaasuh_anggota').val(data.jml_polaasuh_anggota);
                                $('#lansia_klp').val(data.jml_lansia_klp);
                                $('#lansia_angg').val(data.jml_lansia_angg);
                                $('#kelompok_kerjabakti').val(data.jml_kelompok_kerjabakti);
                                $('#kelompok_kematian').val(data.jml_kelompok_kematian);
                                $('#kelompok_keagamaan').val(data.jml_kelompok_keagamaan);
                                $('#kelompok_jimpitan').val(data.jml_kelompok_jimpitan);
                                $('#kelompok_arisan').val(data.jml_kelompok_arisan);
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
                url: site_url + "api/pokja/Api_pokja1/check_dusun/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val(),
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
                            url: site_url + "api/pokja/Api_pokja1/get_dusun/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val(),
                            success: function(data) {
                                $('#kader_pkdrt').val(data.jml_kader_pkdrt);
                                $('#kader_pkbn').val(data.jml_kader_pkbn);
                                $('#kader_polaasuh').val(data.jml_kader_polaasuh);
                                $('#pkbn_klpsimulasi').val(data.jml_pkbn_klpsimulasi);
                                $('#pkbn_angg').val(data.jml_pkbn_angg);
                                $('#pkdrt_klpsimulasi').val(data.jml_pkdrt_klpsimulasi);
                                $('#pkdrt_angg').val(data.jml_pkdrt_angg);
                                $('#polaasuh_klp').val(data.jml_polaasuh_klp);
                                $('#polaasuh_anggota').val(data.jml_polaasuh_anggota);
                                $('#lansia_klp').val(data.jml_lansia_klp);
                                $('#lansia_angg').val(data.jml_lansia_angg);
                                $('#kelompok_kerjabakti').val(data.jml_kelompok_kerjabakti);
                                $('#kelompok_kematian').val(data.jml_kelompok_kematian);
                                $('#kelompok_keagamaan').val(data.jml_kelompok_keagamaan);
                                $('#kelompok_jimpitan').val(data.jml_kelompok_jimpitan);
                                $('#kelompok_arisan').val(data.jml_kelompok_arisan);
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
                url: site_url + "api/pokja/Api_pokja1/check_rw/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val() + "/" + $('#kd_rw').val(),
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
                            url: site_url + "api/pokja/Api_pokja1/get_rw/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val() + "/" + $('#kd_rw').val(),
                            success: function(data) {
                                $('#kader_pkdrt').val(data.jml_kader_pkdrt);
                                $('#kader_pkbn').val(data.jml_kader_pkbn);
                                $('#kader_polaasuh').val(data.jml_kader_polaasuh);
                                $('#pkbn_klpsimulasi').val(data.jml_pkbn_klpsimulasi);
                                $('#pkbn_angg').val(data.jml_pkbn_angg);
                                $('#pkdrt_klpsimulasi').val(data.jml_pkdrt_klpsimulasi);
                                $('#pkdrt_angg').val(data.jml_pkdrt_angg);
                                $('#polaasuh_klp').val(data.jml_polaasuh_klp);
                                $('#polaasuh_anggota').val(data.jml_polaasuh_anggota);
                                $('#lansia_klp').val(data.jml_lansia_klp);
                                $('#lansia_angg').val(data.jml_lansia_angg);
                                $('#kelompok_kerjabakti').val(data.jml_kelompok_kerjabakti);
                                $('#kelompok_kematian').val(data.jml_kelompok_kematian);
                                $('#kelompok_keagamaan').val(data.jml_kelompok_keagamaan);
                                $('#kelompok_jimpitan').val(data.jml_kelompok_jimpitan);
                                $('#kelompok_arisan').val(data.jml_kelompok_arisan);
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
                url: site_url + "api/pokja/Api_pokja1/check_rt/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val() + "/" + $('#kd_rw').val() + "/" + $('#kd_rt').val(),
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

        $.ajax({
            url: site_url + "api/pokja/Api_pokja1/add",
            method: 'post',
            dataType: 'json',
            data: formInput,
            contentType: false,
            processData: false,
            success: function() {
                toastr.success("Berhasil Disimpan!", "Data Kegiatan Pokja I");
                setTimeout(function() {
                        window.location.href = site_url + "pokja/pokja1/index/";
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