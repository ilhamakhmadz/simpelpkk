$(document).ready(function() {
    $('#form_add').validate({
        submitHandler: function(form) {
            var formInput = new FormData(form);
            formInput.append('nama', $('#nama').val());
            formInput.append('galeri', $('#galeri').val());
            if ($('#file').val()) {
                Upload.uploadFile($('#file')).then(function(result) {
                    formInput.append('file', result.file);

                    $.ajax({
                        url: site_url + "api/web/Api_galeri/add",
                        method: 'post',
                        dataType: 'json',
                        data: formInput,
                        contentType: false,
                        processData: false,
                        success: function() {
                            toastr.success("Berhasil Disimpan!", "Data Desa");
                            setTimeout(function() {
                                    window.location.href = site_url + "web/galeri";
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
                    url: site_url + "api/web/Api_galeri/add",
                    method: 'post',
                    dataType: 'json',
                    data: formInput,
                    contentType: false,
                    processData: false,
                    success: function() {
                        toastr.success("Berhasil Disimpan!", "Data Desa");
                        setTimeout(function() {
                                window.location.href = site_url + "web/galeri";
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