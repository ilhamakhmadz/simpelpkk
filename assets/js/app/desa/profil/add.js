var dataAnggota = [];
var currentYear = new Date().getFullYear();
var year = new Date().getFullYear();

$(document).ready(function() {
    $("#alamat").summernote();
    $("#keterangan").summernote();
    var e_kec = document.getElementById("div-kec");
    var e_desa = document.getElementById("div-desa");
    var e_dusun = document.getElementById("div-dusun");
    var e_rw = document.getElementById("div-rw");
    var e_rt = document.getElementById("div-rt");
    var e_formrw = document.getElementById("div-formrw");

    if ($('#level').val() == 'kecamatan') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'none';
        e_dusun.style.display = 'none';
        e_rw.style.display = 'none';
        e_rt.style.display = 'none';
        e_formrw.style.display = 'block';
        $.ajax({
            dataType: 'json',
            url: site_url + "api/desa/Api_Profil/get_desa/" + year + "/" + $('#kd_kec').val(),
            success: function(data) {
                $('#jml_kk').val(data.jml_kk);
                $('#jml_laki').val(data.jml_laki);
                $('#jml_perempuan').val(data.jml_perempuan);
                $('#jml_kelompok_pkk_rt').val(data.jml_kelompok_pkk_rt);
                $('#jml_kelompok_pkk_rw').val(data.jml_kelompok_pkk_rw);
                $('#jml_kelompok_dasawisma').val(data.jml_kelompok_dasawisma);
                $('#jml_krt').val(data.jml_krt);
                $('#jml_penduduk').val(data.jml_penduduk);
                $('#jml_anggota_tp_pkk_laki').val(data.jml_anggota_tp_pkk_laki);
                $('#jml_anggota_tp_pkk_perempuan').val(data.jml_anggota_tp_pkk_perempuan);
                $('#jml_kader_umum_laki').val(data.jml_kader_umum_laki);
                $('#jml_kader_umum_perempuan').val(data.jml_kader_umum_perempuan);
                $('#jml_kader_khusus_laki').val(data.jml_kader_khusus_laki);
                $('#jml_kader_khusus_perempuan').val(data.jml_kader_khusus_perempuan);
                $('#jml_tenaga_sek_honorer_laki').val(data.jml_tenaga_sek_honorer_laki);
                $('#jml_tenaga_sek_honorer_perempuan').val(data.jml_tenaga_sek_honorer_perempuan);
                $('#jml_tenaga_sek_bantuan_laki').val(data.jml_tenaga_sek_bantuan_laki);
                $('#jml_tenaga_sek_bantuan_perempuan').val(data.jml_tenaga_sek_bantuan_perempuan);
            }
        });
    } else if ($('#level').val() == 'desa') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'none';
        e_rw.style.display = 'none';
        e_rt.style.display = 'none';
        e_formrw.style.display = 'block';
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
        e_formrw.style.display = 'block';
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
    } else if ($('#level').val() == 'rw') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'block';
        e_rw.style.display = 'block';
        e_rt.style.display = 'none';
        e_formrw.style.display = 'block';
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
    } else if ($('#level').val() == 'rt') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'block';
        e_rw.style.display = 'block';
        e_rt.style.display = 'block';
        e_formrw.style.display = 'none';
        // console.log(site_url + 'api/wilayah/rt?desa=' + $('select[name=kd_desa]').val() + '&dusun=' + $('select[name=kd_dusun]').val() + '&rw=' + $('select[name=kd_rw]').val());
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
    } else if ($('#level').val() == 'dasawisma') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'block';
        e_rw.style.display = 'block';
        e_rt.style.display = 'block'

        $('select[name=dasawisma]').select2({
            ajax: {
                url: site_url + 'api/wilayah/dasawisma?desa=' + $('select[name=kd_desa]').val() + '&dusun=' + $('select[name=kd_dusun]').val() + '&rw=' + $('select[name=kd_rw]').val() + '&rt=' + $('select[name=kd_rt]').val(),
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
        e_rt.style.display = 'block'

        $('select[name=dasawisma]').select2({
            ajax: {
                url: site_url + 'api/wilayah/dasawisma?desa=' + $('select[name=kd_desa]').val() + '&dusun=' + $('select[name=kd_dusun]').val() + '&rw=' + $('select[name=kd_rw]').val() + '&rt=' + $('select[name=kd_rt]').val(),
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
        e_formrw.style.display = 'block';
    }
    $('select[name=level]').on('change', function() {
        if ($('#level').val() == 'kecamatan') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'none';
            e_dusun.style.display = 'none';
            e_rw.style.display = 'none';
            e_rt.style.display = 'none';
            e_formrw.style.display = 'block';
            $.ajax({
                dataType: 'json',
                url: site_url + "api/desa/Api_Profil/get_desa/" + year + "/" + $('#kd_kec').val(),
                success: function(data) {
                    $('#jml_kk').val(data.jml_kk);
                    $('#jml_laki').val(data.jml_laki);
                    $('#jml_perempuan').val(data.jml_perempuan);
                    $('#jml_kelompok_pkk_rt').val(data.jml_kelompok_pkk_rt);
                    $('#jml_kelompok_pkk_rw').val(data.jml_kelompok_pkk_rw);
                    $('#jml_kelompok_dasawisma').val(data.jml_kelompok_dasawisma);
                    $('#jml_krt').val(data.jml_krt);
                    $('#jml_penduduk').val(data.jml_penduduk);
                    $('#jml_anggota_tp_pkk_laki').val(data.jml_anggota_tp_pkk_laki);
                    $('#jml_anggota_tp_pkk_perempuan').val(data.jml_anggota_tp_pkk_perempuan);
                    $('#jml_kader_umum_laki').val(data.jml_kader_umum_laki);
                    $('#jml_kader_umum_perempuan').val(data.jml_kader_umum_perempuan);
                    $('#jml_kader_khusus_laki').val(data.jml_kader_khusus_laki);
                    $('#jml_kader_khusus_perempuan').val(data.jml_kader_khusus_perempuan);
                    $('#jml_tenaga_sek_honorer_laki').val(data.jml_tenaga_sek_honorer_laki);
                    $('#jml_tenaga_sek_honorer_perempuan').val(data.jml_tenaga_sek_honorer_perempuan);
                    $('#jml_tenaga_sek_bantuan_laki').val(data.jml_tenaga_sek_bantuan_laki);
                    $('#jml_tenaga_sek_bantuan_perempuan').val(data.jml_tenaga_sek_bantuan_perempuan);
                }
            });

        } else if ($('#level').val() == 'desa') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'none';
            e_rw.style.display = 'none';
            e_rt.style.display = 'none';

            e_formrw.style.display = 'block';
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

            e_formrw.style.display = 'block';
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
        } else if ($('#level').val() == 'rw') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'block';
            e_rw.style.display = 'block';
            e_rt.style.display = 'none';

            e_formrw.style.display = 'block';
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
        } else if ($('#level').val() == 'rt') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'block';
            e_rw.style.display = 'block';
            e_rt.style.display = 'block';

            e_formrw.style.display = 'block';
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
        } else if ($('#level').val() == 'dasawisma') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'block';
            e_rw.style.display = 'block';
            e_rt.style.display = 'block';

            $('select[name=dasawisma]').select2({
                ajax: {
                    url: site_url + 'api/wilayah/dasawisma?desa=' + $('select[name=kd_desa]').val() + '&dusun=' + $('select[name=kd_dusun]').val() + '&rw=' + $('select[name=kd_rw]').val() + '&rt=' + $('select[name=kd_rt]').val(),
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
        if ($('#level').val() == 'kecamatan') {
            $.ajax({
                url: site_url + "api/desa/Api_profil/check_kecamatan/" + year + "/" + $('#kd_kec').val(),
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

                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);


                    } else {
                        $.ajax({
                            dataType: 'json',
                            url: site_url + "api/desa/Api_Profil/get_desa/" + year + "/" + $('#kd_kec').val(),
                            success: function(data) {
                                $('#jml_kk').val(data.jml_kk);
                                $('#jml_laki').val(data.jml_laki);
                                $('#jml_perempuan').val(data.jml_perempuan);
                                $('#jml_kelompok_pkk_rt').val(data.jml_kelompok_pkk_rt);
                                $('#jml_kelompok_pkk_rw').val(data.jml_kelompok_pkk_rw);
                                $('#jml_kelompok_dasawisma').val(data.jml_kelompok_dasawisma);
                                $('#jml_krt').val(data.jml_krt);
                                $('#jml_penduduk').val(data.jml_penduduk);
                                $('#jml_anggota_tp_pkk_laki').val(data.jml_anggota_tp_pkk_laki);
                                $('#jml_anggota_tp_pkk_perempuan').val(data.jml_anggota_tp_pkk_perempuan);
                                $('#jml_kader_umum_laki').val(data.jml_kader_umum_laki);
                                $('#jml_kader_umum_perempuan').val(data.jml_kader_umum_perempuan);
                                $('#jml_kader_khusus_laki').val(data.jml_kader_khusus_laki);
                                $('#jml_kader_khusus_perempuan').val(data.jml_kader_khusus_perempuan);
                                $('#jml_tenaga_sek_honorer_laki').val(data.jml_tenaga_sek_honorer_laki);
                                $('#jml_tenaga_sek_honorer_perempuan').val(data.jml_tenaga_sek_honorer_perempuan);
                                $('#jml_tenaga_sek_bantuan_laki').val(data.jml_tenaga_sek_bantuan_laki);
                                $('#jml_tenaga_sek_bantuan_perempuan').val(data.jml_tenaga_sek_bantuan_perempuan);
                            }
                        });
                    }
                },
                error: function(err) {
                    toastr.error("Gagal Disimpan!", "Data Desa");
                    console.log('error', err)
                    window.stop();

                }
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
                url: site_url + "api/desa/Api_profil/check_desa/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val(),
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
                            "showDuration": "1000",
                            "hideDuration": "1000",
                            "timeOut": "10000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        };
                        toastr.info("MAAF , Data Sudah dinputkan pada tahun " + currentYear + ", Mohon Pilih Desa Dengan Benar !!!");

                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);

                        // Delay redirect for 2 seconds (2000 milliseconds)
                    } else {
                        // console.log(site_url + "api/dasawisma/Api_keluarga/get_rt/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val() + "/" + $('#kd_rw').val() + "/" + $('#kd_rt').val());
                        $.ajax({
                            dataType: 'json',
                            url: site_url + "api/desa/Api_Profil/get_dusun/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val(),
                            success: function(data) {
                                $('#jml_kk').val(data.jml_kk);
                                $('#jml_laki').val(data.jml_laki);
                                $('#jml_perempuan').val(data.jml_perempuan);
                                $('#jml_kelompok_pkk_rt').val(data.jml_kelompok_pkk_rt);
                                $('#jml_kelompok_pkk_rw').val(data.jml_kelompok_pkk_rw);
                                $('#jml_kelompok_dasawisma').val(data.jml_kelompok_dasawisma);
                                $('#jml_krt').val(data.jml_krt);
                                $('#jml_penduduk').val(data.jml_penduduk);
                                $('#jml_anggota_tp_pkk_laki').val(data.jml_anggota_tp_pkk_laki);
                                $('#jml_anggota_tp_pkk_perempuan').val(data.jml_anggota_tp_pkk_perempuan);
                                $('#jml_kader_umum_laki').val(data.jml_kader_umum_laki);
                                $('#jml_kader_umum_perempuan').val(data.jml_kader_umum_perempuan);
                                $('#jml_kader_khusus_laki').val(data.jml_kader_khusus_laki);
                                $('#jml_kader_khusus_perempuan').val(data.jml_kader_khusus_perempuan);
                                $('#jml_tenaga_sek_honorer_laki').val(data.jml_tenaga_sek_honorer_laki);
                                $('#jml_tenaga_sek_honorer_perempuan').val(data.jml_tenaga_sek_honorer_perempuan);
                                $('#jml_tenaga_sek_bantuan_laki').val(data.jml_tenaga_sek_bantuan_laki);
                                $('#jml_tenaga_sek_bantuan_perempuan').val(data.jml_tenaga_sek_bantuan_perempuan);
                            }
                        });
                    }

                },
                error: function(err) {
                    toastr.error("Gagal Disimpan!", "Data Desa");
                    console.log('error', err)
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
                url: site_url + "api/desa/Api_profil/check_dusun/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val(),
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

                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);


                    } else {
                        // console.log(site_url + "api/dasawisma/Api_keluarga/get_rt/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val() + "/" + $('#kd_rw').val() + "/" + $('#kd_rt').val());
                        $.ajax({
                            dataType: 'json',
                            url: site_url + "api/desa/Api_Profil/get_rw/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val(),
                            success: function(data) {
                                $('#jml_kk').val(data.jml_kk);
                                $('#jml_laki').val(data.jml_laki);
                                $('#jml_perempuan').val(data.jml_perempuan);
                                $('#jml_kelompok_pkk_rt').val(data.jml_kelompok_pkk_rt);
                                $('#jml_kelompok_pkk_rw').val(data.jml_kelompok_pkk_rw);
                                $('#jml_kelompok_dasawisma').val(data.jml_kelompok_dasawisma);
                                $('#jml_krt').val(data.jml_krt);
                                $('#jml_penduduk').val(data.jml_penduduk);
                                $('#jml_anggota_tp_pkk_laki').val(data.jml_anggota_tp_pkk_laki);
                                $('#jml_anggota_tp_pkk_perempuan').val(data.jml_anggota_tp_pkk_perempuan);
                                $('#jml_kader_umum_laki').val(data.jml_kader_umum_laki);
                                $('#jml_kader_umum_perempuan').val(data.jml_kader_umum_perempuan);
                                $('#jml_kader_khusus_laki').val(data.jml_kader_khusus_laki);
                                $('#jml_kader_khusus_perempuan').val(data.jml_kader_khusus_perempuan);
                                $('#jml_tenaga_sek_honorer_laki').val(data.jml_tenaga_sek_honorer_laki);
                                $('#jml_tenaga_sek_honorer_perempuan').val(data.jml_tenaga_sek_honorer_perempuan);
                                $('#jml_tenaga_sek_bantuan_laki').val(data.jml_tenaga_sek_bantuan_laki);
                                $('#jml_tenaga_sek_bantuan_perempuan').val(data.jml_tenaga_sek_bantuan_perempuan);
                            }
                        });
                    }
                },
                error: function(err) {
                    toastr.error("Gagal Disimpan!", "Data Desa");
                    console.log('error', err)
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
                url: site_url + "api/desa/Api_profil/check_rw/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val() + "/" + $('#kd_rw').val(),
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

                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);

                    } else {
                        console.log(site_url + "api/desa/Api_Profil/get_rt/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val() + "/" + $('#kd_rw').val());

                        $.ajax({
                            dataType: 'json',
                            url: site_url + "api/desa/Api_Profil/get_rt/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val() + "/" + $('#kd_rw').val(),
                            success: function(data) {
                                $('#jml_kk').val(data.jml_laki);
                                $('#jml_laki').val(data.jml_laki);
                                $('#jml_perempuan').val(data.jml_perempuan);
                                $('#jml_kelompok_pkk_rt').val(data.jml_kelompok_pkk_rt);
                                $('#jml_kelompok_pkk_rw').val(data.jml_kelompok_pkk_rw);
                                $('#jml_kelompok_dasawisma').val(data.jml_kelompok_dasawisma);
                                $('#jml_krt').val(data.jml_krt);
                                $('#jml_penduduk').val(data.jml_penduduk);
                                $('#jml_anggota_tp_pkk_laki').val(data.jml_anggota_tp_pkk_laki);
                                $('#jml_anggota_tp_pkk_perempuan').val(data.jml_anggota_tp_pkk_perempuan);
                                $('#jml_kader_umum_laki').val(data.jml_kader_umum_laki);
                                $('#jml_kader_umum_perempuan').val(data.jml_kader_umum_perempuan);
                                $('#jml_kader_khusus_laki').val(data.jml_kader_khusus_laki);
                                $('#jml_kader_khusus_perempuan').val(data.jml_kader_khusus_perempuan);
                                $('#jml_tenaga_sek_honorer_laki').val(data.jml_tenaga_sek_honorer_laki);
                                $('#jml_tenaga_sek_honorer_perempuan').val(data.jml_tenaga_sek_honorer_perempuan);
                                $('#jml_tenaga_sek_bantuan_laki').val(data.jml_tenaga_sek_bantuan_laki);
                                $('#jml_tenaga_sek_bantuan_perempuan').val(data.jml_tenaga_sek_bantuan_perempuan);
                            }
                        });
                    }

                },
                error: function(err) {
                    toastr.error("Gagal Disimpan!", "Data Desa");
                    console.log('error', err)
                    window.stop();

                },
            });
        }
    });

    $('select[name=kd_rt]').on('change', function() {
        var year = new Date().getFullYear();
        if ($('#level').val() == 'rt') {
            $.ajax({
                url: site_url + "api/desa/Api_profil/check_rt/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val() + "/" + $('#kd_rw').val() + "/" + $('#kd_rt').val(),
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

                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);

                    } else {
                        // console.log(site_url + "api/dasawisma/Api_keluarga/get_rt/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val() + "/" + $('#kd_rw').val() + "/" + $('#kd_rt').val());
                        $.ajax({
                            dataType: 'json',
                            url: site_url + "api/dasawisma/Api_keluarga/get_rt/" + year + "/" + $('#kd_kec').val() + "/" + $('#kd_desa').val() + "/" + $('#kd_dusun').val() + "/" + $('#kd_rw').val() + "/" + $('#kd_rt').val(),
                            success: function(data) {
                                $('#jml_kk').val(data.jml_jumlah_kk);
                                $('#jml_laki').val(data.jml_total_laki);
                                $('#jml_perempuan').val(data.jml_total_perempuan);
                                $('#jml_kelompok_pkk_rw').val(0);
                                $('#jml_kelompok_pkk_rt').val(0);
                                $('#jml_kelompok_dasawisma').val(0);
                                $('#jml_krt').val(0);
                                $('#jml_penduduk').val(0);
                                $('#jml_anggota_tp_pkk_laki').val(0);
                                $('#jml_anggota_tp_pkk_perempuan').val(0);
                                $('#jml_kader_umum_laki').val(0);
                                $('#jml_kader_umum_perempuan').val(0);
                                $('#jml_kader_khusus_laki').val(0);
                                $('#jml_kader_khusus_perempuan').val(0);
                                $('#jml_tenaga_sek_honorer_laki').val(0);
                                $('#jml_tenaga_sek_honorer_perempuan').val(0);
                                $('#jml_tenaga_sek_bantuan_laki').val(0);
                                $('#jml_tenaga_sek_bantuan_perempuan').val(0);
                            }
                        });
                    }
                },
                error: function(err) {
                    toastr.error("Gagal Disimpan!", "Data RT");
                    console.log('error', err)
                    window.stop();

                },
            });
        }
    });

    // $("#kt_stepper_form").submit(function(event) {
    // $('button[type=submit]').prop('disabled', true);

    $("#kt_stepper_form").submit(function(event) {
        event.preventDefault(); // Mencegah reload halaman
        $('button[type=submit]').prop('disabled', true);

        var formInput = new FormData(this); // Lebih ringkas
        formInput.append('level', $('#level').val());
        formInput.append('kd_kec', $('#kd_kec').val());
        formInput.append('kd_desa', $('#kd_desa').val());
        formInput.append('kd_dusun', $('#kd_dusun').val());
        formInput.append('kd_rw', $('#kd_rw').val());
        formInput.append('kd_rt', $('#kd_rt').val());
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
        $.ajax({
            url: site_url + "api/desa/Api_profil/add",
            method: 'POST',
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

                toastr.success("Berhasil Disimpan!", "Profil PKK");

                setTimeout(function() {
                    window.location.replace(site_url + "desa/anggota/detail/" + response.id);
                }, 2000);
            },
            error: function(err) {
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "timeOut": "5000"
                };

                toastr.error("Gagal Disimpan!", "Profil PKK");
                console.log('Error:', err);

                $('button[type=submit]').prop('disabled', false);
            }
        });
    });

});