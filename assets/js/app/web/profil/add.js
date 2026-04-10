
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
            formInput.append('kepala_desa', $('#kepala_desa').val());
            formInput.append('sekertariat_desa', $('#sekertariat_desa').val());
            formInput.append('kaur_tu', $('#kaur_tu').val());
            formInput.append('kaur_perencanaan', $('#kaur_perencanaan').val());
            formInput.append('kaur_keuangan', $('#kaur_keuangan').val());
            formInput.append('seksi_pemerintahan', $('#seksi_pemerintahan').val());
            formInput.append('seksi_kerjasama', $('#seksi_kerjasama').val());
            formInput.append('seksi_pelayanan', $('#seksi_pelayanan').val());
            formInput.append('staf_1', $('#staf_1').val());
            formInput.append('staf_2', $('#staf_2').val());
            formInput.append('staf_3', $('#staf_3').val());

            $.ajax({
                url: site_url + "api/desa/Api_aparatur/add",
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
                        window.location.href = site_url + "desa/aparatur";
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