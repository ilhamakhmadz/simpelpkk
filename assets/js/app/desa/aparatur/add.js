$(document).ready(function() {
    var e_kec = document.getElementById("div-kec");
    var e_desa = document.getElementById("div-desa");
    e_kec.style.display = 'none';
    e_desa.style.display = 'none';
    $('select[name=level]').on('change', function() {
        if ($('#level').val() == 'kecamatan') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'none';
        } else if ($('#level').val() == 'desa') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
        }
    });
    $('select[name=kd_kec]').on('change', function() {
        $('select[name=kd_desa]').empty();
        if ($('#level').val() == 'kecamatan') {
            cekDuplicationKecamatan($('#kd_kec').val());
        }
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
    });

    $('select[name=kd_desa]').on('change', function() {
        if ($('#level').val() == 'desa') {
            cekDuplicationDesa($('#kd_desa').val());
        }
    });


    $("#form_add").validate({
        submitHandler: function(form) {
            var formInput = new FormData(form);
            formInput.append('kd_kec', $('#kd_kec').val());
            formInput.append('kd_desa', $('#kd_desa').val());
            formInput.append('level', $('#level').val());
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
                url: site_url + "api/desa/Api_aparatur/add",
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function() {
                    toastr.success("Berhasil Disimpan!", "Data Desa");
                    setTimeout(function() {
                            window.location.href = site_url + "desa/aparatur";
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

function cekDuplicationKecamatan(kode) {
    $.ajax({
        url: site_url + "api/desa/Api_aparatur/validKodeKec/" + kode,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function(param) {
            console.log(param);
            if (param == null) {
                swal("Sesuai", "Silahkan Lanjutkan Mengisi Data", "success");
            } else {
                swal({
                        title: "Duplikat Data Kecamatan?",
                        text: "Pilih YA untuk melanjutkan mengubah data",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("Terimakasih", {
                                icon: "success",
                            });
                            window.location = site_url + "desa/aparatur/edit/" + param.id;
                        } else {
                            swal("Mengisi kembali kuesioner");
                        }
                    });
            }
        },
        error: function(err) {
            console.log('error', err);
        },
    });
}

function cekDuplicationDesa(kode) {
    $.ajax({
        url: site_url + "api/desa/Api_aparatur/validKodeDesa/" + kode,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function(param) {
            console.log(param);
            if (param == null) {
                swal("Sesuai", "Silahkan Lanjutkan Mengisi Data", "success");
            } else {
                swal({
                        title: "Duplikat Data Desa?",
                        text: "Pilih YA untuk melanjutkan mengubah data",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("Terimakasih", {
                                icon: "success",
                            });
                            window.location = site_url + "desa/aparatur/edit/" + param.id;
                        } else {
                            swal("Mengisi kembali kuesioner");
                        }
                    });
            }
        },
        error: function(err) {
            console.log('error', err);
        },
    });
}