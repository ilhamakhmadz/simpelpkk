$(document).ready(function ()
{
    $('#isi_pegawai').summernote({
        height: 200
    });
    $('#form_edit').validate({
        submitHandler: function (form)
        {

            var formInput = new FormData(form);
            formInput.append('id', $('#id').val());
            formInput.append('nama', $('#nama').val());
            formInput.append('nip', $('#nip').val());
            formInput.append('jabatan', $('#jabatan').val());
            if ($('#gambar').val())
            {
                Upload.uploadFile($('#gambar')).then(function (result)
                {
                    formInput.append('gambar', result.file);
                    formInput.append('gambar_remove', $('#gambar_remove').val());

                    $.ajax({
                        url: site_url + "api/web/Api_pegawai/edit/" + $('#id').val(),
                        method: 'post',
                        dataType: 'json',
                        data: formInput,
                        contentType: false,
                        processData: false,
                        success: function ()
                        {
                            toastr.success("Berhasil Disimpan!", "Data Desa");
                            setTimeout(function ()
                            {
                                window.location.href = site_url + "web/pegawai";
                            },
                                2000)
                        },
                        error: function (err)
                        {
                            toastr.error("Gagal Disimpan!", "Data Desa");
                            console.log('error', err)
                            // window.location.href = site_url + "master/desa";
                            window.stop();

                        },
                    });
                });

            } else
            {
                $.ajax({
                    url: site_url + "api/web/Api_pegawai/edit/" + $('#id').val(),
                    method: 'post',
                    dataType: 'json',
                    data: formInput,
                    contentType: false,
                    processData: false,
                    success: function ()
                    {
                        toastr.success("Berhasil Disimpan!", "Data Desa");
                        setTimeout(function ()
                        {
                            window.location.href = site_url + "web/pegawai";
                        },
                            2000)
                    },
                    error: function (err)
                    {
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