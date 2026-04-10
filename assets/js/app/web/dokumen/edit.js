$(document).ready(function() {
    $('#form_edit').validate({
        submitHandler: function(form) {

            var formInput = new FormData(form);
            formInput.append('id', $('#id').val());
            formInput.append('nama', $('#nama').val());
            formInput.append('dokumen', $('#dokumen').val());

            if ($('#file').val()) {
                Upload.uploadFileDoc($('#file')).then(function(result) {
                    formInput.append('file', result.file);
                    formInput.append('file_remove', $('#file_remove').val());

                    $.ajax({
                        url: site_url + "api/web/Api_dokumen/edit/" + $('#id').val(),
                        method: 'post',
                        dataType: 'json',
                        data: formInput,
                        contentType: false,
                        processData: false,
                        success: function() {
                            toastr.success("Berhasil Disimpan!", "Data Desa");
                            setTimeout(function() {
                                    window.location.href = site_url + "web/dokumen";
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
                });

            } else {
                $.ajax({
                    url: site_url + "api/web/Api_dokumen/edit/" + $('#id').val(),
                    method: 'post',
                    dataType: 'json',
                    data: formInput,
                    contentType: false,
                    processData: false,
                    success: function() {
                        toastr.success("Berhasil Disimpan!", "Data Desa");
                        setTimeout(function() {
                                window.location.href = site_url + "web/dokumen";
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
        }
    });

});