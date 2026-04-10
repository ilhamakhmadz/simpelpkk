var dataPrasarana = [];

$(document).ready(function() {
    $('#dataTable_anggota').DataTable({
        responsive: true,
        searching: true,
        processing: true,
        "aaSorting": [
            [0, 'desc']
        ],
        "language": {
            "lengthMenu": "Show _MENU_",
        },
        stateSave: true,
        dom: 'Bfrtip',
        buttons: [
            // 'excel', 'pdf', 'print'
        ],
    });
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
    formInput.append('addnik', $('#addnik').val());
    formInput.append('addkk', $('#addkk').val());
    formInput.append('addnama', $('#addnama').val());
    formInput.append('addjenis_kelamin', $('#addjenis_kelamin').val());
    formInput.append('addagama', $('#addagama').val());
    formInput.append('addtempat_lahir', $('#addtempat_lahir').val());
    formInput.append('addtanggal_lahir', $('#addtanggal_lahir').val());
    formInput.append('addstatus_dalam_keluarga', $('#addstatus_dalam_keluarga').val());
    formInput.append('addstatus_kawin', $('#addstatus_kawin').val());
    formInput.append('addpendidikan', $('#addpendidikan').val());
    formInput.append('addpekerjaan', $('#addpekerjaan').val());
    formInput.append('addcacat', $('#addcacat').val());
    formInput.append('addpancasila', $('#addpancasila').val());
    formInput.append('addgotong_royong', $('#addgotong_royong').val());
    formInput.append('addketrampilan', $('#addketrampilan').val());
    formInput.append('addkoperasi', $('#addkoperasi').val());
    formInput.append('addpangan', $('#addpangan').val());
    formInput.append('addsandang', $('#addsandang').val());
    formInput.append('addkesehatan', $('#addkesehatan').val());
    formInput.append('addperencanaan_sehat', $('#addperencanaan_sehat').val());
    formInput.append('addketerangan', $('#addketerangan').val());
    formInput.append('adddate', $('#date_year').val());


    $.ajax({
        url: site_url + "api/dasawisma/Api_keluarga/add_anggota/",
        method: 'post',
        dataType: 'json',
        data: formInput,
        contentType: false,
        processData: false,
        success: function() {
            toastr.success("Berhasil Disimpan!", "Data Desa");
            window.location.href = site_url + "dasawisma/keluarga/detail/" + $('#id_data_keluarga').val();

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
    formInput.append('editnama', $('#editnama' + $id).val());
    formInput.append('editnik', $('#editnik' + $id).val());
    formInput.append('editkk', $('#editkk' + $id).val());
    formInput.append('editnama', $('#editnama' + $id).val());
    formInput.append('editjenis_kelamin', $('#editjenis_kelamin' + $id).val());
    formInput.append('editagama', $('#editagama' + $id).val());
    formInput.append('edittempat_lahir', $('#edittempat_lahir' + $id).val());
    formInput.append('edittanggal_lahir', $('#edittanggal_lahir' + $id).val());
    formInput.append('editstatus_dalam_keluarga', $('#editstatus_dalam_keluarga' + $id).val());
    formInput.append('editstatus_kawin', $('#editstatus_kawin' + $id).val());
    formInput.append('editpendidikan', $('#editpendidikan' + $id).val());
    formInput.append('editpekerjaan', $('#editpekerjaan' + $id).val());
    formInput.append('editcacat', $('#editcacat' + $id).val());
    formInput.append('editpancasila', $('#editpancasila' + $id).val());
    formInput.append('editgotong_royong', $('#editgotong_royong' + $id).val());
    formInput.append('editketrampilan', $('#editketrampilan' + $id).val());
    formInput.append('editkoperasi', $('#editkoperasi' + $id).val());
    formInput.append('editpangan', $('#editpangan' + $id).val());
    formInput.append('editsandang', $('#editsandang' + $id).val());
    formInput.append('editkesehatan', $('#editkesehatan' + $id).val());
    formInput.append('editperencanaan_sehat', $('#editperencanaan_sehat' + $id).val());
    formInput.append('editketerangan', $('#editketerangan' + $id).val());
    $.ajax({
        url: site_url + "api/dasawisma/Api_keluarga/edit_anggota/" + $('#id_data_keluarga_anggota' + $id).val(),
        method: 'post',
        dataType: 'json',
        data: formInput,
        contentType: false,
        processData: false,
        success: function() {
            toastr.success("Berhasil Disimpan!", "Data Desa");
            window.location.href = site_url + "dasawisma/keluarga/detail/" + $('#id_data_keluarga' + $id).val();

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
    toastr.warning("Yakin akan menghapus data<br /><br /><a id='close-toastr' onclick='deleteAnggotaYes(" + $id + ")' type='button' class='btn btn-outline-light btn-sm'>Yes</a>", "Hapus Data")
        // $('body').on('click', 'a#close-toastr', function() {
        //     $(this).closest('.toast').remove();
        // });
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

    window.location = site_url + "api/dasawisma/Api_keluarga/deleteAnggotaKeluarga/" + $id;
}