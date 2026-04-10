$(document).ready(function ()
{
    $("#form_edit").validate({
        submitHandler: function (form)
        {
            var formInput = new FormData(form);
            formInput.append('nama_jabatan', $('#nama_jabatan').val());

            $.ajax({
                url: site_url + "api/master/Api_jabatan/edit/" + $('#id').val(),
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function ()
                {
                    toastr.success("Berhasil Disimpan!", "Data jabatan");
                    setTimeout(function ()
                    {
                        window.location.href = site_url + "master/jabatan";
                    }, 2000)
                },
                error: function (err)
                {
                    toastr.error("Gagal Disimpan!", "Data jabatan");
                    console.log('error', err);
                },
            });
        }
    });
});