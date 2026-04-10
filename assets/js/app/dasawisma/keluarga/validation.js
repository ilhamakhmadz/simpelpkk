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
                    kd_kec: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    kd_desa: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    dusun: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    rt: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    rw: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    dasawisma: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    nama_kepala_keluarga: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jumlah_kk: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jumlah_kk: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jumlah_PUS: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jumlah_WUS: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jumlah_buta: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jumlah_ibu_hamil: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jumlah_menyusui: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    jumlah_lansia: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    total_laki: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    total_perempuan: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    balita_laki: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    balita_perempuan: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    berkebutuhan_khusus: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    rumah_sehat_layak_huni: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    rumah_tidak_sehat_layak_huni: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    rumah_memiliki_tps: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    rumah_memiliki_spal: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    rumah_memiliki_jamban: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    rumah_menempel_sp4k: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    pdam: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    sumur: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    sumber_air_lain: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    beras: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    non_beras: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    mengikuti_up2k: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    pemanfaatan_tanah: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    industri_rumah_tangga: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
                    kerja_bhakti: { validators: { notEmpty: { message: "Tidak Boleh Kosong" } } },
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