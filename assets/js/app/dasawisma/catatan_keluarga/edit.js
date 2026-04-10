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

$("#kt_stepper_form_edit").submit(function() {
    var formInput = new FormData();
    formInput.append('nama_kepala_keluarga', $('#nama_kepala_keluarga').val());
    formInput.append('dasawisma', $('#dasawisma').val());
    formInput.append('jumlah_anggota_keluarga', $('#jumlah_anggota_keluarga').val());
    formInput.append('jumlah_anggota_keluarga_laki', $('#jumlah_anggota_keluarga_laki').val());
    formInput.append('jumlah_anggota_keluarga_perempuan', $('#jumlah_anggota_keluarga_perempuan').val());
    formInput.append('jumlah_kk', $('#jumlah_kk').val());
    formInput.append('jumlah_balita', $('#jumlah_balita').val());
    formInput.append('jumlah_PUS', $('#jumlah_PUS').val());
    formInput.append('jumlah_WUS', $('#jumlah_WUS').val());
    formInput.append('jumlah_buta', $('#jumlah_buta').val());
    formInput.append('jumlah_ibu_hamil', $('#jumlah_ibu_hamil').val());
    formInput.append('jumlah_menyusui', $('#jumlah_menyusui').val());
    formInput.append('jumlah_lansia', $('#jumlah_lansia').val());
    formInput.append('makanan_pokok', $('#makanan_pokok').val());
    formInput.append('jamban_keluarga', $('#jamban_keluarga').val());
    formInput.append('sumber_air_keluarga', $('#sumber_air_keluarga').val());
    formInput.append('pembuangan_sampah', $('#pembuangan_sampah').val());
    formInput.append('saluran_air_limbah', $('#saluran_air_limbah').val());
    formInput.append('stiker_p4k', $('#stiker_p4k').val());
    formInput.append('kreteria_rumah', $('#kreteria_rumah').val());
    formInput.append('aktivitas_up2k', $('#aktivitas_up2k').val());
    formInput.append('aktivitas_kesehatan_lingkungan', $('#aktivitas_kesehatan_lingkungan').val());

    console.log(formInput);
    $.ajax({
        url: site_url + "api/dasawisma/Api_keluarga/edit/" + $('#id_data_keluarga').val(),
        method: 'post',
        dataType: 'json',
        data: formInput,
        contentType: false,
        processData: false,
        success: function() {
            toastr.success("Berhasil Disimpan!", "Data keluarga");
            window.location.href = site_url + "dasawisma/keluarga/edit/" + $('#id_data_keluarga').val();


        },
        error: function(err) {
            toastr.error("Gagal Disimpan!", "Data keluarga");
            console.log('error', err);
            window.stop();
        },
    });
});

function addAnggota() {

    var formInput = new FormData();
    formInput.append('id_data_keluarga', $('#id_data_keluarga').val());
    formInput.append('level', $('#level').val());
    formInput.append('kd_kec', $('#kd_kec').val());
    formInput.append('kd_desa', $('#kd_desa').val());
    formInput.append('dusun', $('#dusun').val());
    formInput.append('rt', $('#rt').val());
    formInput.append('rw', $('#rw').val());
    formInput.append('dasawisma', $('#dasawisma').val());
    formInput.append('ob_no_reg_tp_pkk', $('#addno_reg_tp_pkk').val());
    formInput.append('ob_nama', $('#addnama').val());
    formInput.append('jenis_kelamin', $('#addjenis_kelamin').val());
    formInput.append('tempat_lahir', $('#addtempat_lahir').val());
    formInput.append('tanggal_lahir', $('#addtanggal_lahir').val());
    formInput.append('status', $('#addstatus').val());
    formInput.append('status_kawin', $('#addstatus_kawin').val());
    formInput.append('pendidikan', $('#addpendidikan').val());
    formInput.append('pekerjaan', $('#addpekerjaan').val());

    $.ajax({
        url: site_url + "api/dasawisma/Api_keluarga/add_anggota/",
        method: 'post',
        dataType: 'json',
        data: formInput,
        contentType: false,
        processData: false,
        success: function() {
            toastr.success("Berhasil Disimpan!", "Data Desa");
            window.location.href = site_url + "dasawisma/keluarga/edit/" + $('#id_data_keluarga').val();

        },
        error: function(err) {
            toastr.error("Gagal Disimpan!", "Data Desa");
            console.log('error', err);
            window.stop();
        },
    });

}

function editAnggota($id) {
    var formInput = new FormData();
    formInput.append('ob_no_reg_tp_pkk', $('#editno_reg_tp_pkk' + $id).val());
    formInput.append('ob_nama', $('#editnama' + $id).val());
    formInput.append('jenis_kelamin', $('#editjenis_kelamin' + $id).val());
    formInput.append('tempat_lahir', $('#edittempat_lahir' + $id).val());
    formInput.append('tanggal_lahir', $('#edittanggal_lahir' + $id).val());
    formInput.append('status', $('#editstatus' + $id).val());
    formInput.append('status_kawin', $('#editstatus_kawin' + $id).val());
    formInput.append('pendidikan', $('#editpendidikan' + $id).val());
    formInput.append('pekerjaan', $('#editpekerjaan' + $id).val());
    $.ajax({
        url: site_url + "api/dasawisma/Api_keluarga/edit_anggota/" + $('#id_data_keluarga_anggota' + $id).val(),
        method: 'post',
        dataType: 'json',
        data: formInput,
        contentType: false,
        processData: false,
        success: function() {
            toastr.success("Berhasil Disimpan!", "Data Desa");
            window.location.href = site_url + "dasawisma/keluarga/edit/" + $('#id_data_keluarga').val();

        },
        error: function(err) {
            toastr.error("Gagal Disimpan!", "Data Desa");
            console.log('error', err);
            window.stop();
        },
    });
}

function deleteItemAnggota($id) {

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "100",
        "hideDuration": "1000",
        "timeOut": 0,
        "extendedTimeOut": 0,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "tapToDismiss": false
    };
    alert($id);
    toastr.warning("Yakin akan menghapus data<br /><br /><a id='close-toastr' onclick='deleteAnggotaYes(" + $id + ")' type='button' class='btn btn-outline-light btn-sm'>Yes</a>", "Hapus Data")
    $('body').on('click', 'a#close-toastr', function() {
        $(this).closest('.toast').remove();
    });
}

function deleteAnggotaYes($id) {
    toastr.clear();
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "100",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    toastr.success("Berhasil Menghapus data", "Hapus Data");

    window.location = site_url + "api/dasawisma/Api_keluarga/deleteAnggota/" + $id;
}