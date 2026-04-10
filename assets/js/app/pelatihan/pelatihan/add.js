var dataPelatihan = [];
var hastagPeserta = [];




$('#kd_desa').on('change', function ()
{

    tag = "<span class='badge badge-success fw-bold fs-9 px-2 ms-2 cursor-default ms-2' data-bs-toggle='tooltip' title='' >" +
        "<input type='hidden' class='peserta form-control' name='peserta[]' value='" + $('select[name=kd_desa]').val() + "'> " +
        "<input type='hidden' class='namapeserta form-control' name='namapeserta[]' value='" + $('select[name=kd_desa]').text() + "'> " +
        $('select[name=kd_desa]').text() + ' <a href="#" onclick="deleteTag($(this))"><i class="fa fa-close text-white"></i></a></span >';

    $(tag).appendTo('.hastag_peserta');
    hastagPeserta.push({
        peserta: $('.peserta').val(),
        namapeserta: $('.namapeserta').val(),

    });
    $('select[name=kd_desa]').empty();

});


$(document).ready(function ()
{

    // $('#table-pelatihan').DataTable();
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



    $('#form_add').validate({
        submitHandler: function (form)
        {
            // Bantuan
            var jenisPelatihan = $.map($('.jenisPelatihan'), function (el)
            {
                return $(el).val();
            });

            var namaPelatihan = $.map($('.namaPelatihan'), function (el)
            {
                return $(el).val();
            });
            var jumlahPelatihan = $.map($('.jumlahPelatihan'), function (el)
            {
                return $(el).val();
            });

            var pesertaPelatihan = $.map($('.pesertaPelatihan'), function (el)
            {
                return $(el).val();
            });

            var desaPelatihan = $.map($('.desaPelatihan'), function (el)
            {
                return $(el).val();
            });




            dataPelatihan = $.map(dataPelatihan, function (o, i)
            {
                o.jenisPelatihan = jenisPelatihan[i];
                o.namaPelatihan = namaPelatihan[i];
                o.jumlahPelatihan = jumlahPelatihan[i];
                o.pesertaPelatihan = pesertaPelatihan[i];
                o.desaPelatihan = desaPelatihan[i];
                return o;
            });
            // alert(dataPelatihan);


            var formInput = new FormData(form);
            formInput.append('pelatihan', JSON.stringify(dataPelatihan));

            $.ajax({
                url: site_url + "api/pelatihan/Api_pelatihan/add",
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
                        window.location.href = site_url + "pelatihan/pelatihan";
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



var tambahPelatihan = tambahPelatihan;

function tambahPelatihan()
{
    listPeserta = '';
    var peserta = $.map($('.peserta'), function (el)
    {
        return $(el).val();
    });
    var namapeserta = $.map($('.namapeserta'), function (el)
    {
        return $(el).val();
    });

    hastagPeserta = $.map(hastagPeserta, function (o, i)
    {
        o.peserta = peserta[i];
        o.namapeserta = namapeserta[i];
        return o;
    });

    $.each(hastagPeserta, function (i, z)
    {
        // var peserta = hastagPeserta[i].peserta;
        var namapeserta = hastagPeserta[i].namapeserta;
        // console.log("kdDesa: " + peserta + "; nama: " + namapeserta);
        listPeserta += namapeserta + ', ';
    });

    var row =
        "<tr class='row_harga'>" +
        "<td><input type='hidden' class='jenisPelatihan form-control' name='jenisPelatihan[]' value='" + $('#id_pelatihan').val() + "'>" + $('#id_pelatihan').text() + "</td>" +
        "<td><input type='hidden' class='namaPelatihan form-control' name='namaPelatihan[]' value='" + $('#nama').val() + "'>" + $('#nama').val() + "</td>" +
        "<td><input type='hidden' class='jumlahPelatihan form-control' name='jumlahPelatihan[]' value='" + $('#jumlah').val() + "'>" + $('#jumlah').val() + "</td>" +
        "<td><input type='hidden' class='pesertaPelatihan form-control' name='pesertaPelatihan[]' value='" + $(' #peserta').val() + "'>" + $('#peserta').val() + "</td>" +
        "<td><input type='hidden' class='desaPelatihan form-control' name='desaPelatihan[]' value='" + JSON.stringify(hastagPeserta) + "'>" + listPeserta + "</td>" +
        '<td class="text-right"> <a class="btn btn-icon btn-google btn-sm me-3" onclick="deletePelatihan($(this))"> <i class="fa fa-trash"></i> </a> </td>' +
        "</tr>";
    $(row).appendTo('#table-pelatihan > tbody');
    dataPelatihan.push({
        jenisPelatihan: $('.jenisPelatihan').val(),
        namaPelatihan: $('.namaPelatihan').val(),
        jumlahPelatihan: $('.jumlahPelatihan').val(),
        pesertaPelatihan: $('.pesertaPelatihan').val(),
        desaPelatihan: $('.desaPelatihan').val()

    });
}

function deletePelatihan(row)
{

    row.closest('tr').remove();
}

function deleteTag(tag)
{
    tag.closest('span').remove();
}