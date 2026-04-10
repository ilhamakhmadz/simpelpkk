var dataKerjasama = [];
$(document).ready(function() {
    // $('#kec_id').change(function() {
    //     $('#kd_kecamatan').val($('#kec_id').val());
    // });
    document.getElementById("form_lembaga_kerjasama").style.display = 'none';
    document.getElementById("form_nomor_perdes").style.display = 'none';
    document.getElementById("form_lembaga_bumdes").style.display = 'none';
    document.getElementById("form_nama_bumdes").style.display = 'none';

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

    $('#bentuk_kerjasama').change(function() {

        if ($('#bentuk_kerjasama').val() == 'Kerjasama Antar Desa') {
            document.getElementById("form_lembaga_kerjasama").style.display = 'flex';
            document.getElementById("form_lembaga_bumdes").style.display = 'flex';
        } else {
            document.getElementById("form_lembaga_kerjasama").style.display = 'none';
            document.getElementById("form_nomor_perdes").style.display = 'none';
            document.getElementById("form_lembaga_bumdes").style.display = 'none';
            document.getElementById("form_nama_bumdes").style.display = 'none';
        }
    });

    $('#lembaga_kerjasama').change(function() {
        if ($('#lembaga_kerjasama').val() == 'Ada') {
            document.getElementById("form_nomor_perdes").style.display = 'flex';
        } else {
            document.getElementById("form_nomor_perdes").style.display = 'none';

        }
    });

    $('#lembaga_bumdes').change(function() {
        if ($('#lembaga_bumdes').val() == 'Ada') {
            document.getElementById("form_nama_bumdes").style.display = 'flex';
        } else {
            document.getElementById("form_nama_bumdes").style.display = 'none';

        }
    });
    $('#form_add').validate({
        submitHandler: function(form) {
            // Bantuan
            var bentukKerjasama = $.map($('.bentukKerjasama'), function(el) {
                return $(el).val();
            });

            var jenisKerjasama = $.map($('.jenisKerjasama'), function(el) {
                return $(el).val();
            });
            var namaPihak = $.map($('.namaPihak'), function(el) {
                return $(el).val();
            });

            var tmtKerjasama = $.map($('.tmtKerjasama'), function(el) {
                return $(el).val();
            });

            var lembagaKerjasama = $.map($('.lembagaKerjasama'), function(el) {
                return $(el).val();
            });

            var nomorPerdes = $.map($('.nomorPerdes'), function(el) {
                return $(el).val();
            });

            var lembagaBumdes = $.map($('.lembagaBumdes'), function(el) {
                return $(el).val();
            });

            var namaBumdes = $.map($('.namaBumdes'), function(el) {
                return $(el).val();
            });


            dataKerjasama = $.map(dataKerjasama, function(o, i) {
                o.bentukKerjasama = bentukKerjasama[i];
                o.jenisKerjasama = jenisKerjasama[i];
                o.namaPihak = namaPihak[i];
                o.tmtKerjasama = tmtKerjasama[i];
                o.lembagaKerjasama = lembagaKerjasama[i];
                o.nomorPerdes = nomorPerdes[i];
                o.lembagaBumdes = lembagaBumdes[i];
                o.namaBumdes = namaBumdes[i];
                return o;
            });
            // alert(dataKerjasama);


            var formInput = new FormData(form);
            formInput.append('kd_kec', $('#kd_kec').val());
            formInput.append('kd_desa', $('#kd_desa').val());
            formInput.append('kerjasama', JSON.stringify(dataKerjasama));

            $.ajax({
                url: site_url + "api/desa/Api_kerjasama/add",
                method: 'post',
                dataType: 'json',
                data: formInput,
                contentType: false,
                processData: false,
                success: function() {
                    toastr.success("Berhasil Disimpan!", "Data Desa");
                    setTimeout(function() {
                            window.location.href = site_url + "desa/kerjasama";
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
var tambahKerjasama = tambahKerjasama;

function tambahKerjasama() {

    var row =
        "<tr class='row_harga'>" +
        "<td><input type='hidden' class='bentukKerjasama form-control' name='bentukKerjasama[]' value='" + $('#bentuk_kerjasama').val() + "'>" + $('#bentuk_kerjasama').val() + "</td>" +
        "<td><input type='hidden' class='jenisKerjasama form-control' name='jenisKerjasama[]' value='" + $('#jenis_kerjasama').val() + "'>" + $('#jenis_kerjasama').val() + "</td>" +
        "<td><input type='hidden' class='namaPihak form-control' name='namaPihak[]' value='" + $('#nama_pihak').val() + "'>" + $('#nama_pihak').val() + "</td>" +
        "<td><input type='hidden' class='tmtKerjasama form-control' name='tmtKerjasama[]' value='" + $('#tmt_kerjasama').val() + "'>" + $('#tmt_kerjasama').val() + "</td>" +
        "<td><input type='hidden' class='lembagaKerjasama form-control' name='lembagaKerjasama[]' value='" + $('#lembaga_kerjasama').val() + "'>" + $('#lembaga_kerjasama').val() + "</td>" +
        "<td><input type='hidden' class='nomorPerdes form-control' name='nomorPerdes[]' value='" + $('#nomor_perdes').val() + "'>" + $('#nomor_perdes').val() + "</td>" +
        "<td><input type='hidden' class='lembagaBumdes form-control' name='lembagaBumdes[]' value='" + $('#lembaga_bumdes').val() + "'>" + $('#lembaga_bumdes').val() + "</td>" +
        "<td><input type='hidden' class='namaBumdes form-control' name='namaBumdes[]' value='" + $('#nama_bumdes').val() + "'>" + $('#nama_bumdes').val() + "</td>" +
        '<td class="text-right"> <a class="btn btn-icon btn-google btn-sm me-3" onclick="deleteKerjasama($(this))"> <i class="fa fa-trash"></i> </a> </td>' +
        "</tr>";
    $(row).appendTo('#table-kerjasama > tbody');
    dataKerjasama.push({
        bentukKerjasama: $('.bentukKerjasama').val(),
        jenisKerjasama: $('.jenisKerjasama').val(),
        namaPihak: $('.namaPihak').val(),
        tmtKerjasama: $('.tmtKerjasama').val(),
        lembagaKerjasama: $('.lembagaKerjasama').val(),
        nomorPerdes: $('.nomorPerdes').val(),
        lembagaBumdes: $('.lembagaBumdes').val(),
        namaBumdes: $('.namaBumdes').val()

    });
    document.getElementById('lembaga_kerjasama').value = 'Tidak Ada';
    document.getElementById('nomor_perdes').value = '-';
    document.getElementById('lembaga_bumdes').value = 'Tidak Ada';
    document.getElementById('nama_bumdes').value = '-';
    document.getElementById('jenis_kerjasama').value = '';
    document.getElementById('nama_pihak').value = '';
    document.getElementById('tmt_kerjasama').value = '';
}

function deleteKerjasama(row) {

    row.closest('tr').remove();
}