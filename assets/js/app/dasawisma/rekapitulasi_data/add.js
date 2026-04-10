var dataAnggota = [];
$(document).ready(function() {
    $("#ket").summernote();
    $("#sebab").summernote();

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
        e_rt.style.display = 'block';
        e_rw.style.display = 'none';

    } else if ($('#level').val() == 'rw') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'block';
        e_rt.style.display = 'block';
        e_rw.style.display = 'block';

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
        } else if ($('#level').val() == 'rt') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'block';
            e_rt.style.display = 'block';
            e_rw.style.display = 'none';
        } else if ($('#level').val() == 'rw') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'block';
            e_rt.style.display = 'block';
            e_rw.style.display = 'block';
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
                url: site_url + 'api/dasawisma/Api_rekapitulasi_data/level?levelId=' + $('select[name=level]').val(),
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
            url: site_url + 'api/dasawisma/Api_rekapitulasi_data/get_nama/' + $('select[name=nama_kepala_keluarga]').val(),
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
            formInput.append('nama_ibu', $('#nama_ibu').val());
            formInput.append('nama_suami', $('#nama_suami').val());
            formInput.append('status', $('#status').val());
            formInput.append('nama_bayi', $('#nama_bayi').val());
            if ($('#jenis_kelamin').val() == 1) {
                formInput.append('laki_laki', 1);
                formInput.append('perempuan', 0);
            } else if ($('#jenis_kelamin').val() == 2) {
                formInput.append('laki_laki', 0);
                formInput.append('perempuan', 1);

            }

            formInput.append('tanggal_lahir', $('#tanggal_lahir').val());

            if ($('#akte_kelahiran').val() == 1) {
                formInput.append('ada_akte_kelahiran', 1);
                formInput.append('tidak_ada_akte_kelahiran', 0);
            } else if ($('#akte_kelahiran').val() == 2) {
                formInput.append('ada_akte_kelahiran', 0);
                formInput.append('tidak_ada_akte_kelahiran', 1);
            }
            formInput.append('nama_meninggal', $('#nama_meninggal').val());

            if ($('#jenis_kelamin_meninggal').val() == 1) {
                formInput.append('laki_laki_meninggal', 1);
                formInput.append('perempuan_meninggal', 0);
            } else if ($('#jenis_kelamin_meninggal').val() == 2) {
                formInput.append('laki_laki_meninggal', 0);
                formInput.append('perempuan_meninggal', 1);

            }
            formInput.append('tanggal_meninggal', $('#tanggal_meninggal').val());
            formInput.append('sebab', $('#sebab').val());
            formInput.append('ket', $('#ket').val());
            $.ajax({
                url: site_url + "api/dasawisma/Api_rekapitulasi_data/add",
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function() {
                    toastr.success("Berhasil Disimpan!", "Data Desa");
                    // setTimeout(function() {
                    window.location.href = site_url + "dasawisma/rekapitulasi_data";
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