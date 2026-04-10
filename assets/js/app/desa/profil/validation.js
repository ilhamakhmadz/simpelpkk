"use strict";
var KTWizardPage = function() {
    var t, e, o, r, i = [];
    return {
        init: function() {
            t = document.querySelector("#kt_stepper"), e = document.querySelector("#kt_stepper_form"), o = document.querySelector('[data-kt-stepper-action="submit"]'), (r = new KTStepper(t)).on("kt.stepper.next", (function(t) {
                // console.log("stepper.next");
                var e = i[t.getCurrentStepIndex() - 1];
                e ? e.validate().then((function(e) {
                    console.log("validated!"), "Valid" == e ? (t.goNext(), KTUtil.scrollTop()) : Swal.fire({
                        text: "Maaf, Data yang anda masukkan kurang lengkap, Mohon Ulangi Kembali.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, Saya mengerti",
                        customClass: { confirmButton: "btn fw-bold btn-light" }
                    }).then((function() { KTUtil.scrollTop() }))
                })) : (t.goNext(), KTUtil.scrollTop())
            })), r.on("kt.stepper.previous", (function(t) {
                // console.log("stepper.previous"), t.goPrevious(), KTUtil.scrollTop()
            })), o.addEventListener("click", (function(t) {})), i.push(FormValidation.formValidation(e, {
                fields: {
                    kd_kec: { validators: { notEmpty: { message: "Kecamatan Tidak Boleh Kosong" } } },
                    level: { validators: { notEmpty: { message: "Level Tidak Boleh Kosong" } } },
                    jml_kelompok_pkk_rt: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jml_kelompok_dasawisma: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jml_krt: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jml_kk: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jml_laki: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jml_perempuan: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jml_penduduk: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jml_anggota_tp_pkk_laki: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jml_anggota_tp_pkk_perempuan: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jml_kader_umum_laki: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jml_kader_umum_perempuan: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jml_kader_khusus_laki: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jml_kader_khusus_perempuan: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jml_tenaga_sek_honorer_laki: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jml_tenaga_sek_honorer_perempuan: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jml_tenaga_sek_bantuan_laki: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jml_tenaga_sek_bantuan_perempuan: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },

                },
                plugins: { trigger: new FormValidation.plugins.Trigger, bootstrap: new FormValidation.plugins.Bootstrap5({ eleValidClass: "", rowSelector: ".fv-row" }) }
            })), i.push(FormValidation.formValidation(e, {
                fields: {
                    // kepala_desa: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    // sekertariat_desa: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    // kaur_tu: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    // kaur_perencanaan: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    // kaur_keuangan: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    // seksi_pemerintahan: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    // seksi_kerjasama: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    // seksi_pelayanan: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    // staf_1: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    // staf_2: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    // staf_3: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },

                },
                plugins: { trigger: new FormValidation.plugins.Trigger, bootstrap: new FormValidation.plugins.Bootstrap5({ eleValidClass: "", rowSelector: ".fv-row" }) }
            }))
        }
    }
}();
KTUtil.onDOMContentLoaded((function() { KTWizardPage.init() }));