$(document).ready(function() {

    $("#alamat").summernote();
    $("#keterangan").summernote();
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
    });
    $("#form_edit").validate({
        submitHandler: function(form) {
            var formInput = new FormData(form);
            formInput.append('id', $('#id').val());
            formInput.append('nik', $('#nik').val());
            formInput.append('kk', $('#kk').val());
            formInput.append('no_reg_tp_pkk', $('#no_reg_tp_pkk').val());
            formInput.append('nama', $('#nama').val());
            formInput.append('jenis_kelamin', $('#jenis_kelamin').val());
            formInput.append('jabatan', $('#jabatan').val());
            formInput.append('kedudukan_fungsi', $('#kedudukan_fungsi').val());
            formInput.append('tempat_lahir', $('#tempat_lahir').val());
            formInput.append('tanggal_lahir', $('#tanggal_lahir').val());
            formInput.append('status', $('#status').val());
            formInput.append('alamat', $('#alamat').val());
            formInput.append('pendidikan', $('#pendidikan').val());
            formInput.append('pekerjaan', $('#pekerjaan').val());
            formInput.append('keterangan', $('#keterangan').val());
            // console.log($('#id').val());
            $.ajax({
                url: site_url + "api/desa/Api_anggota/edit/" + $('#id').val(),
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function() {
                    toastr.success("Berhasil Disimpan!", "Data Desa");
                    setTimeout(function() {
                            window.location.href = site_url + "desa/anggota/detail/" + $('#aparatur_id').val();
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