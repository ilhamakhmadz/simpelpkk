<div class="card">
    <!--begin::Form-->
    <form class="form d-flex flex-center" id="form_edit" name="form_edit" method="post">
        <div class="card-body mw-800px py-20">

            <!--begin::Form row-->
            <div class="row mb-8">
                <label class="col-lg-3 col-form-label required">Ketua PKK</label>
                <div class="col-lg-9">
                    <div class="spinner spinner-sm spinner-primary spinner-right">
                        <input type="hidden" name="id" id="id" value="<?=$aparatur->id?>">

                        <input class="form-control form-control-lg form-control-solid required" type="text"
                            id="kepala_desa" name="kepala_desa" value="<?=$aparatur->kepala_desa?>" disabled>
                    </div>
                </div>
            </div>
            <!--end::Form row-->
            <!--begin::Form row-->
            <div class="row mb-8">
                <label class="col-lg-3 col-form-label required">Wakil Ketua PKK</label>
                <div class="col-lg-9">
                    <div class="spinner spinner-sm spinner-primary spinner-right">
                        <input class="form-control form-control-lg form-control-solid required" type="text"
                            id="sekertariat_desa" name="sekertariat_desa" value="<?=$aparatur->sekertariat_desa?>"
                            disabled>
                    </div>
                </div>
            </div>
            <!--end::Form row-->
            <!--begin::Form row-->
            <div class="row mb-8">
                <label class="col-lg-3 col-form-label required">Sekertaris</label>
                <div class="col-lg-9">
                    <div class="spinner spinner-sm spinner-primary spinner-right">
                        <input class="form-control form-control-lg form-control-solid required" type="text" id="kaur_tu"
                            name="kaur_tu" value="<?=$aparatur->kaur_tu?>" disabled>
                    </div>
                </div>
            </div>
            <!--end::Form row-->
            <!--begin::Form row-->
            <div class="row mb-8">
                <label class="col-lg-3 col-form-label required">Wakil Sekertaris</label>
                <div class="col-lg-9">
                    <div class="spinner spinner-sm spinner-primary spinner-right">
                        <input class="form-control form-control-lg form-control-solid required" type="text"
                            id="kaur_perencanaan" name="kaur_perencanaan" value="<?=$aparatur->kaur_perencanaan?>"
                            disabled>
                    </div>
                </div>
            </div>
            <!--end::Form row-->
            <!--begin::Form row-->
            <div class="row mb-8">
                <label class="col-lg-3 col-form-label required">Bendahara</label>
                <div class="col-lg-9">
                    <div class="spinner spinner-sm spinner-primary spinner-right">
                        <input class="form-control form-control-lg form-control-solid required" type="text"
                            id="kaur_keuangan" name="kaur_keuangan" value="<?=$aparatur->kaur_keuangan?>" disabled>
                    </div>
                </div>
            </div>
            <!--end::Form row-->
            <!--begin::Form row-->
            <div class="row mb-8">
                <label class="col-lg-3 col-form-label required">Wakil Bendahara</label>
                <div class="col-lg-9">
                    <div class="spinner spinner-sm spinner-primary spinner-right">
                        <input class="form-control form-control-lg form-control-solid required" type="text"
                            id="seksi_pemerintahan" name="seksi_pemerintahan" value="<?=$aparatur->seksi_pemerintahan?>"
                            disabled>
                    </div>
                </div>
            </div>
            <!--end::Form row-->
            <!--begin::Form row-->
            <div class="row mb-8">
                <label class="col-lg-3 col-form-label required">Ketua Pokja I</label>
                <div class="col-lg-9">
                    <div class="spinner spinner-sm spinner-primary spinner-right">
                        <input class="form-control form-control-lg form-control-solid required" type="text"
                            id="seksi_kerjasama" name="seksi_kerjasama" value="<?=$aparatur->seksi_kerjasama?>"
                            disabled>
                    </div>
                </div>
            </div>
            <!--end::Form row-->
            <!--begin::Form row-->
            <div class="row mb-8">
                <label class="col-lg-3 col-form-label required">Ketua Pokja II</label>
                <div class="col-lg-9">
                    <div class="spinner spinner-sm spinner-primary spinner-right">
                        <input class="form-control form-control-lg form-control-solid required" type="text"
                            id="seksi_pelayanan" name="seksi_pelayanan" value="<?=$aparatur->seksi_pelayanan?>"
                            disabled>
                    </div>
                </div>
            </div>
            <!--end::Form row-->
            <!--begin::Form row-->
            <div class="row mb-8">
                <label class="col-lg-3 col-form-label ">Ketua Pokja III</label>
                <div class="col-lg-9">
                    <div class="spinner spinner-sm spinner-primary spinner-right">
                        <input class="form-control form-control-lg form-control-solid " type="text"
                            value="<?=$aparatur->staf_1?>" id="staf_1" name="staf_1" disabled>
                    </div>
                </div>
            </div>
            <!--end::Form row-->
            <!--begin::Form row-->
            <div class="row mb-8">
                <label class="col-lg-3 col-form-label ">Ketua Pokja IV</label>
                <div class="col-lg-9">
                    <div class="spinner spinner-sm spinner-primary spinner-right">
                        <input class="form-control form-control-lg form-control-solid " type="text"
                            value="<?=$aparatur->staf_2?>" id="staf_2" name="staf_2" disabled>
                    </div>
                </div>
            </div>
            <!--end::Form row-->
            <!--begin::Form row-->
            <!-- <div class="row mb-8">
												<label class="col-lg-3 col-form-label ">Staf 3</label>
												<div class="col-lg-9">
													<div class="spinner spinner-sm spinner-primary spinner-right">
														<input class="form-control form-control-lg form-control-solid " type="text" value="<?=$aparatur->staf_3?>"  id="staf_3" name="staf_3" >
													</div>
												</div>
											</div> -->
            <!--end::Form row-->

            <!--begin::Form row-->
            <!-- <div class="row">
                <label class="col-lg-3 col-form-label"></label>
                <div class="col-lg-9">
                    <button type="submit" class="btn btn-primary fw-bolder px-6 py-3 me-3">Ubah</button>
                </div>
            </div> -->
            <!--end::Form row-->
        </div>
    </form>
    <!--end::Form-->
</div>
