var dataKerjasama = [];
$(document).ready(function ()
{
    if ($('#bentuk_kerjasama').val() == 'Kerjasama Antar Desa')
    {
        document.getElementById("form_lembaga_kerjasama").style.display = 'flex';
        document.getElementById("form_lembaga_bumdes").style.display = 'flex';
    } else
    {
        document.getElementById("form_lembaga_kerjasama").style.display = 'none';
        document.getElementById("form_nomor_perdes").style.display = 'none';
        document.getElementById("form_lembaga_bumdes").style.display = 'none';
        document.getElementById("form_nama_bumdes").style.display = 'none';
    }

    $('#bentuk_kerjasama').change(function ()
    {

        if ($('#bentuk_kerjasama').val() == 'Kerjasama Antar Desa')
        {
            document.getElementById("form_lembaga_kerjasama").style.display = 'flex';
            document.getElementById("form_lembaga_bumdes").style.display = 'flex';
        } else
        {
            document.getElementById("form_lembaga_kerjasama").style.display = 'none';
            document.getElementById("form_nomor_perdes").style.display = 'none';
            document.getElementById("form_lembaga_bumdes").style.display = 'none';
            document.getElementById("form_nama_bumdes").style.display = 'none';
        }
    });

    $('#lembaga_kerjasama').change(function ()
    {
        if ($('#lembaga_kerjasama').val() == 'Ada')
        {
            document.getElementById("form_nomor_perdes").style.display = 'flex';
        } else
        {
            document.getElementById("form_nomor_perdes").style.display = 'none';

        }
    });

    $('#lembaga_bumdes').change(function ()
    {
        if ($('#lembaga_bumdes').val() == 'Ada')
        {
            document.getElementById("form_nama_bumdes").style.display = 'flex';
        } else
        {
            document.getElementById("form_nama_bumdes").style.display = 'none';

        }
    });
    $('#form_edit').validate({
        submitHandler: function (form)
        {

            var formInput = new FormData(form);
            formInput.append('kd_kec', $('#kd_kec').val());
            formInput.append('kd_desa', $('#kd_desa').val());
            formInput.append('bentuk_kerjasama', $('#bentuk_kerjasama').val());
            formInput.append('jenis_kerjasama', $('#jenis_kerjasama').val());
            formInput.append('nama_pihak', $('#nama_pihak').val());
            formInput.append('tmt_kerjasama', $('#tmt_kerjasama').val());
            formInput.append('lembaga_kerjasama', $('#lembaga_kerjasama').val());
            formInput.append('nomor_perdes', $('#nomor_perdes').val());
            formInput.append('lembaga_bumdes', $('#lembaga_bumdes').val());
            formInput.append('nama_bumdes', $('#nama_bumdes').val());

            $.ajax({
                url: site_url + "api/desa/Api_kerjasama/edit/" + $('#id').val(),
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
                        window.location.href = site_url + "desa/kerjasama/view/" + $('#kd_desa').val();
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