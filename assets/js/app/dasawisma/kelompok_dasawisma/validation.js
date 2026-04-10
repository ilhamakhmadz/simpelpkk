"use strict";
var KTWizardPage = function() {
    var t, e, o, r, i = [];
    return {
        init: function() {
            t = document.querySelector("#kt_stepper"), e = document.querySelector("#kt_stepper_form"), o = document.querySelector('[data-kt-stepper-action="submit"]'), (r = new KTStepper(t)).on("kt.stepper.next", (function(t) {
                console.log("stepper.next");
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
                console.log("stepper.previous"), t.goPrevious(), KTUtil.scrollTop()
            })), o.addEventListener("click", (function(t) {})), i.push(FormValidation.formValidation(e, {
                fields: {
                    kd_kec: { validators: { notEmpty: { message: "Kecamatan Tidak Boleh Kosong" } } },
                    level: { validators: { notEmpty: { message: "Level Tidak Boleh Kosong" } } },


                },
                plugins: { trigger: new FormValidation.plugins.Trigger, bootstrap: new FormValidation.plugins.Bootstrap5({ eleValidClass: "", rowSelector: ".fv-row" }) }
            })), i.push(FormValidation.formValidation(e, {
                fields: {
                    // kepala_desa: { validators: { notEmpty: { message: "Ketua PKK Tidak Boleh Kosong" } } },
                    // sekertariat_desa: { validators: { notEmpty: { message: "Wakil Ketua PKK Tidak Boleh Kosong" } } },
                    // kaur_tu: { validators: { notEmpty: { message: "Sekertaris Tidak Boleh Kosong" } } },
                    // kaur_perencanaan: { validators: { notEmpty: { message: "Wakil Sekertaris Tidak Boleh Kosong" } } },
                    // kaur_keuangan: { validators: { notEmpty: { message: "Bendahara Tidak Boleh Kosong" } } },
                    // seksi_pemerintahan: { validators: { notEmpty: { message: "Wakil Bendahara Tidak Boleh Kosong" } } },
                    // seksi_kerjasama: { validators: { notEmpty: { message: "Ketua Pokja I Tidak Boleh Kosong" } } },
                    // seksi_pelayanan: { validators: { notEmpty: { message: "Ketua Pokja II Tidak Boleh Kosong" } } },
                    // staf_1: { validators: { notEmpty: { message: "Ketua Pokja III Tidak Boleh Kosong" } } },
                    // staf_2: { validators: { notEmpty: { message: "Ketua Pokja IV Tidak Boleh Kosong" } } }
                },
                plugins: { trigger: new FormValidation.plugins.Trigger, bootstrap: new FormValidation.plugins.Bootstrap5({ eleValidClass: "", rowSelector: ".fv-row" }) }
            }))
        }
    }
}();
KTUtil.onDOMContentLoaded((function() { KTWizardPage.init() }));