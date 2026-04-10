$(document).ready(function() {
    $("#form_edit").validate({
        submitHandler: function(form) {
            var formInput = new FormData(form);
            formInput.append('kd_kabupaten', $('#kd_kabupaten').val());
            formInput.append('nama_kabupaten', $('#nama_kabupaten').val());

            $.ajax({
                url: site_url + "api/master/Api_kabupaten/edit/" + $('#id').val(),
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function(){
                        toastr.success("Berhasil Disimpan!", "Data Kabupaten");
                        setTimeout(function(){
                            window.location.href = site_url + "master/kabupaten";
                        }, 2000)
                },
                error: function (err)
                {
                    toastr.error("Gagal Disimpan!", "Data Kabupaten");
                    console.log('error',err);
                },
            });
        }
    });
});