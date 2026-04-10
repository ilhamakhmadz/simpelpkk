$(document).ready(function ()
{
    $("#form_add").validate({
        submitHandler: function (form)
        {
            var formInput = new FormData(form);
            formInput.append('nama_pelatihan', $('#nama_pelatihan').val());

            $.ajax({
                url: site_url + "api/master/Api_pelatihan/add",
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function ()
                {
                    toastr.success("Berhasil Disimpan!", "Data pelatihan");
                    setTimeout(function ()
                    {
                        window.location.href = site_url + "master/pelatihan";
                    }, 2000)
                },
                error: function (err)
                {
                    toastr.error("Gagal Disimpan!", "Data pelatihan");
                    console.log('error', err);
                },
            });
        }
    });
});