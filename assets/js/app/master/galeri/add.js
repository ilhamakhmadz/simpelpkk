$(document).ready(function ()
{
    $("#form_add").validate({
        submitHandler: function (form)
        {
            var formInput = new FormData(form);
            formInput.append('nama_galeri', $('#nama_galeri').val());

            $.ajax({
                url: site_url + "api/master/Api_galeri/add",
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function ()
                {
                    toastr.success("Berhasil Disimpan!", "Data galeri");
                    setTimeout(function ()
                    {
                        window.location.href = site_url + "master/galeri";
                    }, 2000)
                },
                error: function (err)
                {
                    toastr.error("Gagal Disimpan!", "Data galeri");
                    console.log('error', err);
                },
            });
        }
    });
});