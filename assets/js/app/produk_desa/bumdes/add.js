
$(document).ready(function ()
{
    Inputmask("999.999.999.999", {
        "numericInput": true
    }).mask("#omset");

    Inputmask("999.999.999.999", {
        "numericInput": true
    }).mask("#profit");

    Inputmask("999.999.999.999", {
        "numericInput": true
    }).mask("#kontribusi_pad");


    $('select[name=kd_kec]').on('change', function ()
    {
        $('select[name=kd_desa]').empty();
        $('select[name=kd_desa]').select2({
            ajax: {
                url: site_url + 'api/wilayah/desa?desaId=' + $('select[name=kd_kec]').val(),
                dataType: 'json',
                data: function (param)
                {
                    return {
                        delay: 0.3,
                        q: param.term
                    }
                },
                processResults: function (data)
                {
                    return {
                        results: $.map(data.items || data, function (obj)
                        {
                            return {
                                id: obj.Kd_Desa,
                                text: obj.text,
                            }
                        })
                    }
                },
                cache: false,
                minimumInputLength: 3,

            }
        });
    });
    $("#form_add").validate({
        submitHandler: function (form)
        {
            var unformattedOmset = Inputmask.unmask($('#omset').val(), { mask: "999.999.999.999" });
            var unformattedProfit = Inputmask.unmask($('#profit').val(), { mask: "999.999.999.999" });
            var unformattedPad = Inputmask.unmask($('#kontribusi_pad').val(), { mask: "999.999.999.999" });

            var formInput = new FormData(form);
            formInput.append('kd_kec', $('#kd_kec').val());
            formInput.append('kd_desa', $('#kd_desa').val());
            formInput.append('nama', $('#nama').val());
            formInput.append('status', $('#status').val());
            formInput.append('alamat', $('#alamat').val());
            formInput.append('jenis_usaha', $('#jenis_usaha').val());
            formInput.append('omset', unformattedOmset);
            formInput.append('profit', unformattedProfit);
            formInput.append('kontribusi_pad', unformattedPad);

            $.ajax({
                url: site_url + "api/produk_desa/Api_bumdes/add",
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
                        window.location.href = site_url + "produk_desa/bumdes";
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