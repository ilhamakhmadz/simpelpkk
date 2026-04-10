var dataAnggota = [];
$(document).ready(function() {
    $("#alamat").summernote();

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
    $("#kt_stepper_form").submit(function(event) {

        var ob_no_reg_tp_pkk = $.map($('.ob_no_reg_tp_pkk'), function(el) {
            return $(el).val();
        });

        var ob_nama = $.map($('.ob_nama'), function(el) {
            return $(el).val();
        });

        var ob_nama = $.map($('.ob_nama'), function(el) {
            return $(el).val();
        });

        var jenis_kelamin = $.map($('.jenis_kelamin'), function(el) {
            return $(el).val();
        });

        var tempat_lahir = $.map($('.tempat_lahir'), function(el) {
            return $(el).val();
        });

        var tanggal_lahir = $.map($('.tanggal_lahir'), function(el) {
            return $(el).val();
        });

        var jabatan = $.map($('.jabatan'), function(el) {
            return $(el).val();
        });

        var kedudukan_fungsi = $.map($('.kedudukan_fungsi'), function(el) {
            return $(el).val();
        });

        var status = $.map($('.status'), function(el) {
            return $(el).val();
        });
        var status_kawin = $.map($('.status_kawin'), function(el) {
            return $(el).val();
        });
        var pendidikan = $.map($('.pendidikan'), function(el) {
            return $(el).val();
        });
        var pekerjaan = $.map($('.pekerjaan'), function(el) {
            return $(el).val();
        });
        var alamat = $.map($('.alamat'), function(el) {
            return $(el).val();
        });
        var keterangan = $.map($('.keterangan'), function(el) {
            return $(el).val();
        });

        dataAnggota = $.map(dataAnggota, function(o, i) {
            o.ob_no_reg_tp_pkk = ob_no_reg_tp_pkk[i];
            o.ob_nama = ob_nama[i];
            o.jenis_kelamin = jenis_kelamin[i];
            o.tempat_lahir = tempat_lahir[i];
            o.tanggal_lahir = tanggal_lahir[i];
            o.jabatan = jabatan[i];
            o.kedudukan_fungsi = kedudukan_fungsi[i];
            o.status = status[i];
            o.status_kawin = status_kawin[i];
            o.pendidikan = pendidikan[i];
            o.pekerjaan = pekerjaan[i];
            o.alamat = alamat[i];
            o.keterangan = keterangan[i];
            return o;
        });
        // alert(dataAnggota);

        var formInput = new FormData();
        formInput.append('level', $('#level').val());
        formInput.append('kd_kec', $('#kd_kec').val());
        formInput.append('kd_desa', $('#kd_desa').val());
        formInput.append('dusun', $('#dusun').val());
        formInput.append('rt', $('#rt').val());
        formInput.append('rw', $('#rw').val());
        formInput.append('nama_kepala_keluarga', $('#nama_kepala_keluarga').val());
        formInput.append('dasawisma', $('#dasawisma').val());
        formInput.append('jumlah_anggota_keluarga', $('#jumlah_anggota_keluarga').val());
        formInput.append('jumlah_anggota_keluarga_laki', $('#jumlah_anggota_keluarga_laki').val());
        formInput.append('jumlah_anggota_keluarga_perempuan', $('#jumlah_anggota_keluarga_perempuan').val());
        formInput.append('jumlah_kk', $('#jumlah_kk').val());
        formInput.append('jumlah_balita', $('#jumlah_balita').val());
        formInput.append('jumlah_PUS', $('#jumlah_PUS').val());
        formInput.append('jumlah_WUS', $('#jumlah_WUS').val());
        formInput.append('jumlah_buta', $('#jumlah_buta').val());
        formInput.append('jumlah_ibu_hamil', $('#jumlah_ibu_hamil').val());
        formInput.append('jumlah_menyusui', $('#jumlah_menyusui').val());
        formInput.append('jumlah_lansia', $('#jumlah_lansia').val());
        formInput.append('makanan_pokok', $('#makanan_pokok').val());
        formInput.append('jamban_keluarga', $('#jamban_keluarga').val());
        formInput.append('sumber_air_keluarga', $('#sumber_air_keluarga').val());
        formInput.append('pembuangan_sampah', $('#pembuangan_sampah').val());
        formInput.append('saluran_air_limbah', $('#saluran_air_limbah').val());
        formInput.append('stiker_p4k', $('#stiker_p4k').val());
        formInput.append('kreteria_rumah', $('#kreteria_rumah').val());
        formInput.append('aktivitas_up2k', $('#aktivitas_up2k').val());
        formInput.append('aktivitas_kesehatan_lingkungan', $('#aktivitas_kesehatan_lingkungan').val());

        // console.log(JSON.stringify(dataAnggota));
        formInput.append('dataAnggota', JSON.stringify(dataAnggota));



        $.ajax({
            url: site_url + "api/dasawisma/Api_keluarga/add",
            method: 'post',
            dataType: 'json',
            data: formInput,
            contentType: false,
            processData: false,
            success: function() {
                toastr.success("Berhasil Disimpan!", "Data Desa");
                // setTimeout(function() {
                window.location.href = site_url + "dasawisma/keluarga";
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