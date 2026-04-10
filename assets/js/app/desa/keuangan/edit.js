
$(document).ready(function ()
{
    Inputmask("999.999.999.999", {
        reverse: true,
        "numericInput": true
    }).mask("#add");

    Inputmask("999.999.999.999", {
        "numericInput": true
    }).mask("#adpd");

    Inputmask("999.999.999.999", {
        "numericInput": true
    }).mask("#raksa_desa");


    $("#form_edit").validate({
        submitHandler: function (form)
        {
            var formInput = new FormData(form);
            formInput.append('id', $('#id').val());
            var unformattedAdd = Inputmask.unmask($('#add').val(), { mask: "999.999.999.999" });
            var unformattedAdpd = Inputmask.unmask($('#adpd').val(), { mask: "999.999.999.999" });
            var unformattedRaksa = Inputmask.unmask($('#raksa_desa').val(), { mask: "999.999.999.999" });

            formInput.append('kd_kec', $('#kd_kec').val());
            formInput.append('kd_desa', $('#kd_desa').val());
            formInput.append('add', unformattedAdd);
            formInput.append('adpd', unformattedAdpd);
            formInput.append('raksa_desa', unformattedRaksa);

            $.ajax({
                url: site_url + "api/desa/Api_keuangan/edit/" + $('#id').val(),
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
                        window.location.href = site_url + "desa/keuangan";
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
    });

});