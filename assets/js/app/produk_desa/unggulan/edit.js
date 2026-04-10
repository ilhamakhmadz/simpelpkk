
$(document).ready(function ()
{
    $('#deskripsi_produk').summernote();

    $('#form_edit').validate({
        submitHandler: function (form)
        {


            if ($('#gambar_produk').val())
            {
                Upload.uploadFile($('#gambar_produk')).then(function (result)
                {
                    // params.gambar_produk = result.file;
                    var formInput = new FormData(form);
                    formInput.append('kd_kec', $('#kd_kec').val());
                    formInput.append('kd_desa', $('#kd_desa').val());
                    formInput.append('nama_produk', $('#nama_produk').val());
                    formInput.append('old_img', $('#old_img').val());
                    formInput.append('deskripsi_produk', $('#deskripsi_produk').val());
                    formInput.append('harga_produk', $('#harga_produk').val());
                    formInput.append('gambar_produk', result.file);
                    $.ajax({
                        url: site_url + "api/produk_desa/Api_unggulan/edit/" + $('#id').val(),
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
                                window.location.href = site_url + "produk_desa/unggulan/view/" + $('#kd_desa').val();
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
                // params.gambar_produk = result.file;
                var formInput = new FormData(form);
                formInput.append('kd_kec', $('#kd_kec').val());
                formInput.append('kd_desa', $('#kd_desa').val());
                formInput.append('nama_produk', $('#nama_produk').val());
                formInput.append('deskripsi_produk', $('#deskripsi_produk').val());
                formInput.append('harga_produk', $('#harga_produk').val());
                $.ajax({
                    url: site_url + "api/produk_desa/Api_unggulan/edit/" + $('#id').val(),
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
                            window.location.href = site_url + "produk_desa/unggulan/view/" + $('#kd_desa').val();
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