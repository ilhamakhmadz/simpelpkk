$(document).ready(function ()
{
    $("#form_edit").validate({
        submitHandler: function (form)
        {
            var formInput = new FormData(form);
            formInput.append('nama_dokumen', $('#nama_dokumen').val());

            $.ajax({
                url: site_url + "api/master/Api_dokumen/edit/" + $('#id').val(),
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function ()
                {
                    toastr.success("Berhasil Disimpan!", "Data dokumen");
                    setTimeout(function ()
                    {
                        window.location.href = site_url + "master/dokumen";
                    }, 2000)
                },
                error: function (err)
                {
                    toastr.error("Gagal Disimpan!", "Data dokumen");
                    console.log('error', err);
                },
            });
        }
    });
});