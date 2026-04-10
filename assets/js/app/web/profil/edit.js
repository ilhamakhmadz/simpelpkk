$(document).ready(function() {
    // Email address
    Inputmask({
        mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
        greedy: false,
        onBeforePaste: function(pastedValue, opts) {
            pastedValue = pastedValue.toLowerCase();
            return pastedValue.replace("mailto:", "");
        },
        definitions: {
            "*": {
                validator: '[0-9A-Za-z!#$%&"*+/=?^_`{|}~-]',
                cardinality: 1,
                casing: "lower",
            },
        },
    }).mask("#email");

    Inputmask({
        mask: "9999-9999-9999",
    }).mask("#telepon");

    $("#sejarah").summernote();
    $("#sambutan").summernote();
    $("#tupoksi").summernote();
    $("#visi").summernote();
    $("#misi").summernote();
    $("#program_kerja").summernote();
    $("#mars_pkk").summernote();

    $("#form_edit").validate({
        submitHandler: function(form) {
            var formInput = new FormData(form);
            formInput.append("id", $("#id").val());
            formInput.append("nama_dinas", $("#nama_dinas").val());
            formInput.append("alamat", $("#alamat").val());
            formInput.append("email", $("#email").val());
            formInput.append("telepon", $("#telepon").val());
            formInput.append("facebook", $("#facebook").val());
            formInput.append("twitter", $("#twitter").val());
            formInput.append("whatsapp", $("#whatsapp").val());
            formInput.append("instagram", $("#instagram").val());
            formInput.append("sejarah", $("#sejarah").val());
            formInput.append("sambutan", $("#sambutan").val());
            formInput.append("tupoksi", $("#tupoksi").val());
            formInput.append("visi", $("#visi").val());
            formInput.append("misi", $("#misi").val());
            formInput.append("program_kerja", $("#program_kerja").val());
            formInput.append("mars_pkk", $("#mars_pkk").val());
            // formInput.append("kepala_dinas", $("#kepala_dinas").val());
            // formInput.append("sekretaris_dinas", $("#sekretaris_dinas").val());
            // formInput.append("bidang_peum", $("#bidang_peum").val());
            // formInput.append("bidang_kpm", $("#bidang_kpm").val());
            // formInput.append("bidang_pemerintahan", $("#bidang_pemerintahan").val());
            // formInput.append("bidang_pkald", $("#bidang_pkald").val());
            if ($("#logo").val()) {
                // alert($("#kepala_dinas").val() + ' ada');
                // alert($("#logo").val());
                Upload.uploadFile($('#logo')).then(function(result) {
                    // alert('sjkdha');
                    formInput.append("file_logo", result.file);
                    $.ajax({
                        url: site_url + "api/web/Api_profil/edit/" + $("#id").val(),
                        method: "post",
                        dataType: "json",
                        data: formInput,
                        contentType: false,
                        processData: false,
                        success: function() {
                            toastr.success("Berhasil Disimpan!", "Data Desa");
                            setTimeout(function() {
                                window.location.href = site_url + "web/profil";
                            }, 2000);
                        },
                        error: function(err) {
                            toastr.error("Gagal Disimpan!", "Data Desa");
                            console.log("error", err);
                            // window.location.href = site_url + "master/desa";
                            window.stop();
                        },
                    });
                });
            } else {
                // alert($("#kepala_dinas").val() + 'gak ada' + $("#id").val());

                formInput.append("file_logo", $("#logo_remove").val());
                $.ajax({
                    url: site_url + "api/web/Api_profil/edit/" + $("#id").val(),
                    method: 'post',
                    dataType: 'json',
                    data: formInput,
                    contentType: false,
                    processData: false,
                    success: function() {
                        toastr.success("Berhasil Disimpan!", "Data Desa");
                        setTimeout(function() {
                                window.location.href = site_url + "web/profil";

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
        }
    });







    // FUNCTION UPLOAD
    $("#form_edit_struktur").validate({
        submitHandler: function(form) {
            var formImage = new FormData(form);
            formImage.append("id", $("#id").val());
            if ($("#struktur_organisasi").val()) {
                Upload.uploadFile($('#struktur_organisasi')).then(function(result) {
                    // alert('sjkdha');
                    formImage.append("file_struktur_organisasi", result.file);
                    $.ajax({
                        url: site_url + "api/web/Api_profil/upload_struktur/" + $("#id").val(),
                        method: "post",
                        dataType: "json",
                        data: formImage,
                        contentType: false,
                        processData: false,
                        success: function() {
                            toastr.success("Berhasil Disimpan!", "Data Desa");
                        },
                        error: function(err) {
                            toastr.error("Gagal Disimpan!", "Data Desa");
                            console.log("error", err);
                            window.stop();
                        },
                    });
                });
            } else {
                alert('Tidak Ada');
            }
        }
    });
});