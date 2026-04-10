var dataUnggulan = [];
$(document).ready(function() {
    // $('#kec_id').change(function() {
    //     $('#kd_kecamatan').val($('#kec_id').val());
    // });
    // ClassicEditor
    //     .create(document.querySelector('#deskripsi_produk'))
    //     .then(editor =>
    //     {
    //         console.log(editor);
    //     })
    //     .catch(error =>
    //     {
    //         console.error(error);
    //     });
    $('#deskripsi_produk').summernote();
    $('select[name=kd_kec]').on('change', function() {
        $('select[name=kd_desa]').empty();
        $('select[name=kd_desa]').select2({
            ajax: {
                url: site_url + 'api/wilayah/desa?desaId=' + $('select[name=kd_kec]').val(),
                dataType: 'json',
                data: function(param) {
                    return {
                        delay: 0.3,
                        q: param.term
                    }
                },
                processResults: function(data) {
                    return {
                        results: $.map(data.items || data, function(obj) {
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
        submitHandler: function(form) {
            // Bantuan
            var namaProduk = $.map($('.namaProduk'), function(el) {
                return $(el).val();
            });

            var deskripsiProduk = $.map($('.deskripsiProduk'), function(el) {
                return $(el).val();
            });
            var hargaProduk = $.map($('.hargaProduk'), function(el) {
                return $(el).val();
            });

            var gambarProduk = $.map($('.gambarProduk'), function(el) {
                return $(el).val();
            });




            dataUnggulan = $.map(dataUnggulan, function(o, i) {
                o.namaProduk = namaProduk[i];
                o.deskripsiProduk = deskripsiProduk[i];
                o.hargaProduk = hargaProduk[i];
                o.gambarProduk = gambarProduk[i];

                return o;
            });
            // alert(dataUnggulan);


            var formInput = new FormData(form);
            formInput.append('kd_kec', $('#kd_kec').val());
            formInput.append('kd_desa', $('#kd_desa').val());
            formInput.append('unggulan', JSON.stringify(dataUnggulan));

            $.ajax({
                url: site_url + "api/produk_desa/Api_unggulan/add",
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function() {
                    toastr.success("Berhasil Disimpan!", "Data Desa");
                    setTimeout(function() {
                            window.location.href = site_url + "produk_desa/unggulan";
                        },
                        2000)
                },
                error: function(err) {
                    toastr.error("Gagal Disimpan!", "Data Desa");
                    console.log('error', err)
                        // window.location.href = site_url + "master/desa";
                    window.stop();

                },
            });
        }
    });

});
var tambahProduk = tambahProduk;

function tambahProduk() {
    imagesPreview(document.getElementById("gambar_produk"));

    function imagesPreview(input) {

        if (input.files) {
            if ($('#gambar_produk').val()) {
                Upload.uploadFile($('#gambar_produk')).then(function(result) {
                    nameFile = result.file;
                    var row =
                        "<tr class='row_harga'>" +
                        "<td><input type='hidden' class='namaProduk form-control' name='namaProduk[]' value='" + $('#nama_produk').val() + "'>" + $('#nama_produk').val() + "</td>" +
                        "<td><input type='hidden' class='hargaProduk form-control' name='hargaProduk[]' value='" + $('#harga_produk').val() + "'>" + $('#harga_produk').val() + "</td>" +
                        "<td><input type='hidden' class='deskripsiProduk form-control' name='deskripsiProduk[]' value='" + $('#deskripsi_produk').val() + "'>" + $('#deskripsi_produk').val() + "</td>" +
                        "<td><input type='hidden' class='gambarProduk form-control' name='gambarProduk[]' value='" + nameFile + "'>" + $('#gambar_produk').val() + "</td> " +
                        '<td class="text-right"> <a class="btn btn-icon btn-google btn-sm me-3" onclick="deleteUnggulan($(this))"> <i class="fa fa-trash"></i> </a> </td>' +
                        "</tr>";
                    $(row).appendTo('#table-produk> tbody');
                    dataUnggulan.push({
                        namaProduk: $('.namaProduk').val(),
                        deskripsiProduk: $('.deskripsiProduk').val(),
                        hargaProduk: $('.hargaProduk').val(),
                        gambarProduk: $('.gambarProduk').val()

                    });

                    return nameFile;
                });

            } else {
                nameFile = "";
                var row =
                    "<tr class='row_harga'>" +
                    "<td><input type='hidden' class='namaProduk form-control' name='namaProduk[]' value='" + $('#nama_produk').val() + "'>" + $('#nama_produk').val() + "</td>" +
                    "<td><input type='hidden' class='deskripsiProduk form-control' name='deskripsiProduk[]' value='" + $('#harga_produk').val() + "'>" + $('#harga_produk').val() + "</td>" +
                    "<td><input type='hidden' class='hargaProduk form-control' name='hargaProduk[]' value='" + $('#deskripsi_produk').val() + "'>" + $('#deskripsi_produk').val() + "</td>" +
                    "<td><input type='hidden' class='gambarProduk form-control' name='gambarProduk[]' value='" + nameFile + "'></td> " +
                    '<td class="text-right"> <a class="btn btn-icon btn-google btn-sm me-3" onclick="deleteUnggulan($(this))"> <i class="fa fa-trash"></i> </a> </td>' +
                    "</tr>";
                $(row).appendTo('#table-produk> tbody');
                dataUnggulan.push({
                    namaProduk: $('.namaProduk').val(),
                    deskripsiProduk: $('.deskripsiProduk').val(),
                    hargaProduk: $('.hargaProduk').val(),
                    gambarProduk: $('.gambarProduk').val()

                });

            }

            // document.getElementById('nama_produk').value = '';
            // document.getElementById('harga_produk').value = '';
            // // document.getElementById('deskripsi_produk').val('');
            // document.getElementById('gambar_produk').value = '';



        }

    };

}


function deleteUnggulan(row) {

    row.closest('tr').remove();
}