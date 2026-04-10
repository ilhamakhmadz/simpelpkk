
$(document).ready(function ()
{
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
            var formInput = new FormData(form);
            formInput.append('kd_kec', $('#kd_kec').val());
            formInput.append('kd_desa', $('#kd_desa').val());
            formInput.append('rt', $('#rt').val());
            formInput.append('rt_aktif', $('#rt_aktif').val());
            formInput.append('rw', $('#rw').val());
            formInput.append('rw_aktif', $('#rw_aktif').val());
            formInput.append('pkk', $('#pkk').val());
            formInput.append('pkk_aktif', $('#pkk_aktif').val());
            formInput.append('posyandu', $('#posyandu').val());
            formInput.append('posyandu_aktif', $('#posyandu_aktif').val());
            formInput.append('lpm', $('#lpm').val());
            formInput.append('lpm_aktif', $('#lpm_aktif').val());
            formInput.append('karang_taruna', $('#karang_taruna').val());
            formInput.append('karang_taruna_aktif', $('#karang_taruna_aktif').val());
            formInput.append('kampung_budaya', $('#kampung_budaya').val());
            formInput.append('kampung_budaya_aktif', $('#kampung_budaya_aktif').val());

            $.ajax({
                url: site_url + "api/desa/Api_lembaga/add",
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
                        window.location.href = site_url + "desa/lembaga";
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