$(document).ready(function() {
    $("#form_add").validate({
        submitHandler: function(form) {
            var formInput = new FormData(form);
            formInput.append('Kd_Kec', $('#kd_kabupaten').val() + $('#kd_kecamatan').val());
            formInput.append('Kd_Kabupaten', $('#kd_kabupaten').val());
            formInput.append('Nama_Kecamatan', $('#nama_kecamatan').val());

            $.ajax({
                url: site_url + "api/master/Api_kecamatan/add",
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function() {
                    toastr.success("Berhasil Disimpan!", "Data Kecamatan");
                    setTimeout(function() {
                        window.location.href = site_url + "master/kecamatan";
                    }, 2000)
                },
                error: function(err) {
                    toastr.error("Gagal Disimpan!", "Data Kecamatan");
                    console.log('error', err);
                },
            });
        }
    });
});