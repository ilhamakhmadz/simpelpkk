var dataPrasarana = [];

$(document).ready(function() {

    var e_kec = document.getElementById("div-kec");
    var e_desa = document.getElementById("div-desa");
    var e_dusun = document.getElementById("div-dusun");
    var e_rt = document.getElementById("div-rt");
    var e_rw = document.getElementById("div-rw");
    if ($('#level').val() == 'kecamatan') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'none';
        e_dusun.style.display = 'none';
        e_rt.style.display = 'none';
        e_rw.style.display = 'none';
    } else if ($('#level').val() == 'desa') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'none';
        e_rt.style.display = 'none';
        e_rw.style.display = 'none';
    } else if ($('#level').val() == 'dusun') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'block';
        e_rt.style.display = 'none';
        e_rw.style.display = 'none';

    } else if ($('#level').val() == 'rt') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'block';
        e_rt.style.display = 'block';
        e_rw.style.display = 'none';

    } else if ($('#level').val() == 'rw') {
        e_kec.style.display = 'block';
        e_desa.style.display = 'block';
        e_dusun.style.display = 'block';
        e_rt.style.display = 'block';
        e_rw.style.display = 'block';

    } else {
        e_dusun.style.display = 'none';
        e_kec.style.display = 'none';
        e_desa.style.display = 'none';
        e_rt.style.display = 'none';
        e_rw.style.display = 'none';
    }
    $('select[name=level]').on('change', function() {
        if ($('#level').val() == 'kecamatan') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'none';
            e_dusun.style.display = 'none';
            e_rt.style.display = 'none';
            e_rw.style.display = 'none';
        } else if ($('#level').val() == 'desa') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'none';
            e_rt.style.display = 'none';
            e_rw.style.display = 'none';
        } else if ($('#level').val() == 'dusun') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'block';
            e_rt.style.display = 'none';
            e_rw.style.display = 'none';
        } else if ($('#level').val() == 'rt') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'block';
            e_rt.style.display = 'block';
            e_rw.style.display = 'none';
        } else if ($('#level').val() == 'rw') {
            e_kec.style.display = 'block';
            e_desa.style.display = 'block';
            e_dusun.style.display = 'block';
            e_rt.style.display = 'block';
            e_rw.style.display = 'block';
        }
    });

});


function editAnggota($id) {

    var formInput = new FormData();
    formInput.append('ob_no_reg_tp_pkk', $('#editno_reg_tp_pkk' + $id).val());
    formInput.append('editcacat', $('#editcacat' + $id).val());
    formInput.append('editpancasila', $('#editpancasila' + $id).val());
    formInput.append('editgotong_royong', $('#editgotong_royong' + $id).val());
    formInput.append('editketerampilan', $('#editketerampilan' + $id).val());
    formInput.append('editkoperasi', $('#editkoperasi' + $id).val());
    formInput.append('editsandang', $('#editsandang' + $id).val());
    formInput.append('editpangan', $('#editpangan' + $id).val());
    formInput.append('editkesehatan', $('#editkesehatan' + $id).val());
    formInput.append('editperencanaan_sehat', $('#editperencanaan_sehat' + $id).val());
    formInput.append('editket', $('#editket' + $id).val());
    $.ajax({
        url: site_url + "api/dasawisma/Api_keluarga/edit_anggota_keluarga/" + $('#id_data_keluarga_anggota' + $id).val(),
        method: 'post',
        dataType: 'json',
        data: formInput,
        contentType: false,
        processData: false,
        success: function() {
            toastr.success("Berhasil Disimpan!", "Data Anggota");
            window.location.href = site_url + "dasawisma/catatan_keluarga/detail/" + $('#id_data_keluarga').val();

        },
        error: function(err) {
            toastr.error("Gagal Disimpan!", "Data Anggota");
            console.log('error', err);
            window.stop();
        },
    });
}