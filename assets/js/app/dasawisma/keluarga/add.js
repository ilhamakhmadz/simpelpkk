var currentYear = new Date().getFullYear();
$(document).ready(function() {
    $("#keterangan").summernote();
    var e_kec = document.getElementById("div-kec");
    var e_desa = document.getElementById("div-desa");
    var e_dusun = document.getElementById("div-dusun");
    var e_rw = document.getElementById("div-rw");
    var e_rt = document.getElementById("div-rt");
    var e_dasawisma = document.getElementById("div-dasawisma");
    var e_nama = document.getElementById("div-nama");
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
    } else if ($('#level').val() == 'dusun') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'block';
        e_rw.style.display = 'none';
        e_rt.style.display = 'none';
        e_dasawisma.style.display = 'none';
        $('select[name=dusun]').empty();
        $('select[name=dusun]').select2({
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
    } else if ($('#level').val() == 'rw') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'block';
        e_rw.style.display = 'block';
        e_rt.style.display = 'none';
        e_dasawisma.style.display = 'none';
        $('select[name=rw]').empty();
        $('select[name=rw]').select2({
            ajax: {
                url: site_url + 'api/wilayah/rw?desa=' + $('select[name=kd_desa]').val() + '&dusun=' + $('select[name=dusun]').val(),
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
    } else if ($('#level').val() == 'rt') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'block';
        e_rw.style.display = 'block';
        e_rt.style.display = 'block';
        e_dasawisma.style.display = 'none';
        $('select[name=rt]').empty();
        $('select[name=rt]').select2({
            ajax: {
                url: site_url + 'api/wilayah/rt?desa=' + $('select[name=kd_desa]').val() + '&dusun=' + $('select[name=dusun]').val() + '&rw=' + $('select[name=rw]').val(),
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
    } else if ($('#level').val() == 'dasawisma') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'block';
        e_rw.style.display = 'block';
        e_rt.style.display = 'block';
        e_dasawisma.style.display = 'block';

        $('select[name=dasawisma]').select2({
            ajax: {
                url: site_url + 'api/wilayah/dasawisma?desa=' + $('select[name=kd_desa]').val() + '&dusun=' + $('select[name=dusun]').val() + '&rw=' + $('select[name=rw]').val() + '&rt=' + $('select[name=rt]').val(),
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
    } else if ($('#level').val() == 'keluarga') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'block';
        e_rw.style.display = 'block';
        e_rt.style.display = 'block';
        e_dasawisma.style.display = 'block';

        $('select[name=dasawisma]').select2({
            ajax: {
                url: site_url + 'api/wilayah/dasawisma?desa=' + $('select[name=kd_desa]').val() + '&dusun=' + $('select[name=dusun]').val() + '&rw=' + $('select[name=rw]').val() + '&rt=' + $('select[name=rt]').val(),
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
    } else {
        e_kec.style.display = 'none';
        e_desa.style.display = 'none';
        e_dusun.style.display = 'none';
        e_rw.style.display = 'none';
        e_rt.style.display = 'none';
        e_dasawisma.style.display = 'none';
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
        } else if ($('#level').val() == 'dusun') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'block';
            e_rw.style.display = 'none';
            e_rt.style.display = 'none';
            e_dasawisma.style.display = 'none';
            $('select[name=dusun]').empty();
            $('select[name=dusun]').select2({
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
        } else if ($('#level').val() == 'rw') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'block';
            e_rw.style.display = 'block';
            e_rt.style.display = 'none';
            e_dasawisma.style.display = 'none';
            $('select[name=rw]').empty();
            $('select[name=rw]').select2({
                ajax: {
                    url: site_url + 'api/wilayah/rw?desa=' + $('select[name=kd_desa]').val() + '&dusun=' + $('select[name=dusun]').val(),
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
        } else if ($('#level').val() == 'rt') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'block';
            e_rw.style.display = 'block';
            e_rt.style.display = 'block';
            e_dasawisma.style.display = 'none';
            $('select[name=rt]').empty();
            $('select[name=rt]').select2({
                ajax: {
                    url: site_url + 'api/wilayah/rt?desa=' + $('select[name=kd_desa]').val() + '&dusun=' + $('select[name=dusun]').val() + '&rw=' + $('select[name=rw]').val(),
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
        } else if ($('#level').val() == 'dasawisma') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'block';
            e_rw.style.display = 'block';
            e_rt.style.display = 'block';
            e_dasawisma.style.display = 'block';

            $('select[name=dasawisma]').select2({
                ajax: {
                    url: site_url + 'api/wilayah/dasawisma?desa=' + $('select[name=kd_desa]').val() + '&dusun=' + $('select[name=dusun]').val() + '&rw=' + $('select[name=rw]').val() + '&rt=' + $('select[name=rt]').val(),
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
        } else if ($('#level').val() == 'keluarga') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'block';
            e_rw.style.display = 'block';
            e_rt.style.display = 'block';
            e_dasawisma.style.display = 'block';
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

                        toastr.info("MAAF , Data Sudah dinputkan pada tahun " + currentYear + ", Mohon Pilih Kecamatan Dengan Benar !!!");
                        window.location.reload();
                     } else {
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
        $('select[name=dusun]').empty();
        $('select[name=dusun]').select2({
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
                url: site_url + "api/dasawisma/Api_keluarga/check_desa/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val(),
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

                        toastr.info("MAAF , Data Sudah dinputkan pada tahun " + currentYear + ", Mohon Pilih Desa Dengan Benar !!!");
                        window.location.reload();
                    } else {
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

    $('select[name=dusun]').on('change', function() {
        $('select[name=rw]').empty();
        $('select[name=rw]').select2({
            ajax: {
                url: site_url + 'api/wilayah/rw?desa=' + $('select[name=kd_desa]').val() + '&dusun=' + $('select[name=dusun]').val(),
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
                url: site_url + "api/dasawisma/Api_keluarga/check_dusun/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#dusun').val(),
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

                        toastr.info("MAAF , Data Sudah dinputkan pada tahun " + currentYear + ", Mohon Pilih Dusun Dengan Benar !!!");
                        window.location.reload();
                    } else {
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

    $('select[name=rw]').on('change', function() {
        $('select[name=rt]').empty();
        $('select[name=rt]').select2({
            ajax: {
                url: site_url + 'api/wilayah/rt?desa=' + $('select[name=kd_desa]').val() + '&dusun=' + $('select[name=dusun]').val() + '&rw=' + $('select[name=rw]').val(),
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
                url: site_url + "api/dasawisma/Api_keluarga/check_rw/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#dusun').val() + "/" + $('#rw').val(),
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

                        toastr.info("MAAF , Data Sudah dinputkan pada tahun " + currentYear + ", Mohon Pilih RW Dengan Benar !!!");
                        window.location.reload();
                    } else {
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
    $('select[name=rt]').on('change', function() {
        $('select[name=dasawisma]').empty();
        $('select[name=dasawisma]').select2({
            ajax: {
                url: site_url + 'api/wilayah/dasawisma?desa=' + $('select[name=kd_desa]').val() + '&dusun=' + $('select[name=dusun]').val() + '&rw=' + $('select[name=rw]').val() + '&rt=' + $('select[name=rt]').val(),
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
        var year = new Date().getFullYear();
        if ($('#level').val() == 'rt') {
            $.ajax({
                url: site_url + "api/dasawisma/Api_keluarga/check_rt/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#dusun').val() + "/" + $('#rw').val() + "/" + $('#rt').val(),
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

                        toastr.info("MAAF , Data Sudah dinputkan pada tahun " + currentYear + ", Mohon Pilih RT Dengan Benar !!!");
                        window.location.reload();
                    } else {
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
    $('select[name=dasawisma]').on('change', function() {
        var year = new Date().getFullYear();
        if ($('#level').val() == 'dasawisma') {
            $.ajax({
                url: site_url + "api/dasawisma/Api_keluarga/check_dasawisma/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#dusun').val() + "/" + $('#rw').val() + "/" + $('#rt').val() + "/" + $('#dasawisma').val(),
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

                        toastr.info("MAAF , Data Sudah dinputkan pada tahun " + currentYear + ", Mohon Pilih Dasawisma Dengan Benar !!!");
                        window.location.reload();
                    } else {
                        // console.log(site_url + "api/dasawisma/Api_keluarga/get_dasawisma/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#dusun').val() + "/" + $('#rw').val() + "/" + $('#rt').val() + "/" + $('#dasawisma').val())
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


    $("#kt_stepper_form").validate({
        submitHandler: function(form) {
            // alert(dataAnggota);

            var formInput = new FormData();
            formInput.append('level', $('#level').val());
            formInput.append('kd_kec', $('#kd_kec').val());
            formInput.append('kd_desa', $('#kd_desa').val());
            formInput.append('dusun', $('#dusun').val());
            formInput.append('rt', $('#rt').val());
            formInput.append('rw', $('#rw').val());
            formInput.append('dasawisma', $('#dasawisma').val());
            formInput.append('nama_kepala_keluarga', $('#nama_kepala_keluarga').val());
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
            formInput.append('ket', $('#ket').val());
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


            // console.log(JSON.stringify(dataAnggota));
            // alert(123);
            $.ajax({
                url: site_url + "api/dasawisma/Api_keluarga/add",
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function(response) {
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                        "positionClass": "toast-top-center",
                        "timeOut": "3000"
                    };
                    toastr.success("Berhasil Disimpan!", "Lanjutkan untuk mengisi anggota keluarga");
                    setTimeout(function() {
                        if ($('#level').val() == 'keluarga') {
                            window.location.href = site_url + "dasawisma/keluarga/detail/" + response.id;
                        } else {
                            window.location.href = site_url + "/dasawisma/keluarga/";
                        }
                    }, 2000)
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
