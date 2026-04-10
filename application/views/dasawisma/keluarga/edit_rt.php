<div class="card">
    <!--begin::Card Body-->
    <div class="card-body p-10 p-lg-15 p-xxl-30">
        <!--begin::Stepper 1-->
        
            <!--begin::Content-->
            <div class="d-flex flex-row-fluid justify-content-center">
                <!--begin::Form-->
                <form class="pt-10 w-100 w-md-400px w-xl-800px" name="form_add" method="post"
                    action="" id="kt_stepper_form">
                    <!--begin::Step 1-->
                    <div class="current" data-kt-stepper-element="content">
                        <div class="w-100">
                            <div class="fv-row row ">
                                <div class="col-lg-12 col-md-12 mb-10">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Level/Kelompok</label>
                                        <select class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-placeholder="Pilih Level" name="level"
                                            id="level" disabled>
                                            <option value="<?=$keluarga->level?>"><?=$keluarga->level?></option>
                                            <option value="kecamatan">Kecamatan</option>
                                            <option value="desa">Desa</option>
                                            <option value="dusun">Dusun</option>
                                            <option value="rw">RW</option>
                                            <option value="rt">RT</option>

                                        </select>
                                    </div>
                                    <!--begin::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div id="div-kec">
                                        <label class="fs-6 form-label fw-bolder text-dark">Nama Kecamatan</label>
                                        <select class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-control="select2"
                                            data-placeholder="Pilih Kecamatan" name="kd_kec" id="kd_kec" disabled>
                                            <option value="<?=$keluarga->kecamatan?>"><?=$keluarga->Nama_Kecamatan?>
                                            </option>
                                            <?php
                                            foreach ($kecamatan as $nama) {
                                                echo "<option value='" . $nama->Kd_Kec . "'>" . $nama->Nama_Kecamatan . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!--begin::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div id="div-desa">
                                        <label class="fs-6 form-label fw-bolder text-dark">Nama Desa</label>
                                        <select class="form-select form-select-lg form-select-solid"
                                            data-control="select2" data-control="select2" data-placeholder="Pilih Desa"
                                            name="kd_desa" id="kd_desa" disabled>
                                            <?php
                                                if (!empty($keluarga->desa)) {
                                                    echo '<option value="'.$keluarga->desa.'">'.$keluarga->Nama_Desa.'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <!--end::Form Group-->
                                    <div id="div-dusun">
                                        <label class="fs-6 form-label fw-bolder text-dark">Nama Dusun</label>
                                        <?php
                                                if (!empty($keluarga->dusun)) {
                                                    echo '<input disabled class="form-control form-control-lg form-control-solid" type="text" placeholder="Dusun I" id="nama_dusun" name="nama_dusun" value="'.$keluarga->nama_dusun.'">
                                                    <input disabled class="form-control form-control-lg form-control-solid" type="hidden" placeholder="Dusun I" id="dusun" name="dusun" value="'.$keluarga->dusun.'">';
                                                }
                                            ?>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6 mt-6">
                                    <!--end::Form Group-->
                                    <div id="div-rw">
                                        <label class="fs-6 form-label fw-bolder text-dark">RW</label>
                                        <input class="form-control form-control-lg form-control-solid" type="number"
                                            placeholder="007" id="rw" name="rw" value="<?=$keluarga->rw?>" disabled>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6 mt-6">
                                    <!--end::Form Group-->
                                    <div id="div-rt">
                                        <label class="fs-6 form-label fw-bolder text-dark">RT</label>
                                        <input class="form-control form-control-lg form-control-solid" type="number"
                                            placeholder="007" id="rt" name="rt" value="<?=$keluarga->rt?>" disabled>
                                        <input class="form-control form-control-lg form-control-solid" type="hidden"
                                            placeholder="007" id="id_data_keluarga" name="id_data_keluarga"
                                            value="<?=$keluarga->id_data_keluarga?>" disabled>
                                        <input class="form-control form-control-lg form-control-solid" type="hidden"
                                            placeholder="" id="date_year" name="date_year"
                                            value="<?=$keluarga->date_year?>" disabled>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <br>
                            <div class="fv-row row ">
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Dasawisma</label>
                                        <select class="form-select form-select-lg form-control-solid"
                                            data-control="select2" data-control="select2"
                                            data-placeholder="Pilih Dasawisma"
                                            name="dasawisma" id="dasawisma">
                                            <?php
                                            foreach ($dasawisma as $value) {
                                                $selected = ($value->id == $keluarga->dasawisma) ? 'selected' : '';
                                                echo "<option value='" . $value->id . "' $selected>" . $value->dasawisma . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!--begin::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Nama Kepala Keluarga</label>
                                        <input type="text" placeholder="-"
                                            class="form-control form-control-lg form-control"
                                            name="nama_kepala_keluarga" id="nama_kepala_keluarga"
                                            value="<?=$keluarga->nama_kepala_keluarga?>">
                                    </div>
                                    <!--begin::Form Group-->
                                </div>
                            </div>
                            <div class="fv-row row mt-5">
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah KK</label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg form-control" name="jumlah_kk"
                                            id="jumlah_kk" value="<?=$keluarga->jumlah_kk?>" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah PUS
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg form-control" name="jumlah_PUS"
                                            id="jumlah_PUS" value="<?=$keluarga->jumlah_PUS?>" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah WUS
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg form-control" name="jumlah_WUS"
                                            id="jumlah_WUS" value="<?=$keluarga->jumlah_WUS?>" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <div class="fv-row row mt-5">
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Total Laki-Laki
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg form-control" name="total_laki"
                                            id="total_laki" value="<?=$keluarga->total_laki?>" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Total Perempuan
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg form-control"
                                            name="total_perempuan" id="total_perempuan"
                                            value="<?=$keluarga->total_perempuan?>" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Balita Laki-Laki
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg form-control" name="balita_laki"
                                            id="balita_laki" value="<?=$keluarga->balita_laki?>" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Balita Perempuan
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg form-control"
                                            name="balita_perempuan" id="balita_perempuan"
                                            value="<?=$keluarga->balita_perempuan?>" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <div class="fv-row row mt-5">
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Anggota 3 Buta</label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg form-control" name="jumlah_buta"
                                            id="jumlah_buta" value="<?=$keluarga->jumlah_buta?>" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Ibu Hamil
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg form-control"
                                            name="jumlah_ibu_hamil" id="jumlah_ibu_hamil"
                                            value="<?=$keluarga->jumlah_ibu_hamil?>" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Ibu Menyusui
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg form-control"
                                            name="jumlah_menyusui" id="jumlah_menyusui"
                                            value="<?=$keluarga->jumlah_menyusui?>" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <div class="fv-row row mt-5">
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jumlah Lansia
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg form-control" name="jumlah_lansia"
                                            id="jumlah_lansia" value="<?=$keluarga->jumlah_lansia?>" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Berkebutuhan Khusus
                                        </label>
                                        <input required type="number" placeholder="0"
                                            class="form-control form-control-lg form-control"
                                            name="berkebutuhan_khusus" id="berkebutuhan_khusus"
                                            value="<?=$keluarga->berkebutuhan_khusus?>" />
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <div class="fv-row row mt-5">
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Rumah Sehat</label>
                                        <select required name="rumah_sehat_layak_huni" id="rumah_sehat_layak_huni"
                                            class="form-select form-select-lg form-select-solid"
                                            data-placeholder="Pilih" data-control="select2">
                                            <?php 
                                            if($keluarga->rumah_sehat_layak_huni ==  1){
                                                echo '<option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }elseif($keluarga->rumah_sehat_layak_huni ==  0){
                                                echo '<option value="0">Tidak</option>
                                                <option value="1">Ya</option>';
                                            }elseif(empty($keluarga->rumah_sehat_layak_huni)){
                                                echo '<option value="">Pilih</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Rumah Tidak Sehat</label>
                                        <select required name="rumah_tidak_sehat_layak_huni"
                                            id="rumah_tidak_sehat_layak_huni"
                                            class="form-select form-select-lg form-select-solid"
                                            data-placeholder="Pilih" data-control="select2">
                                            <?php 
                                            if($keluarga->rumah_tidak_sehat_layak_huni ==  1){
                                                echo '<option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }elseif($keluarga->rumah_tidak_sehat_layak_huni ==  0){
                                                echo '<option value="0">Tidak</option>
                                                <option value="1">Ya</option>';
                                            }elseif(empty($keluarga->rumah_tidak_sehat_layak_huni)){
                                                echo '<option value="">Pilih</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Memiliki TPS</label>
                                        <select required name="rumah_memiliki_tps" id="rumah_memiliki_tps"
                                            class="form-select form-select-lg form-select-solid"
                                            data-placeholder="Pilih" data-control="select2">
                                            <?php 
                                            if($keluarga->rumah_memiliki_tps ==  1){
                                                echo '<option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }elseif($keluarga->rumah_memiliki_tps ==  0){
                                                echo '<option value="0">Tidak</option>
                                                <option value="1">Ya</option>';
                                            }elseif(empty($keluarga->rumah_sehat_layak_huni)){
                                                echo '<option value="">Pilih</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <div class="fv-row row mt-5">
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Memiliki SPAL</label>
                                        <select required name="rumah_memiliki_spal" id="rumah_memiliki_spal"
                                            class="form-select form-select-lg form-select-solid"
                                            data-placeholder="Pilih" data-control="select2">
                                            <?php 
                                            if($keluarga->rumah_memiliki_spal ==  1){
                                                echo '<option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }elseif($keluarga->rumah_memiliki_spal ==  0){
                                                echo '<option value="0">Tidak</option>
                                                <option value="1">Ya</option>';
                                            }elseif(empty($keluarga->rumah_sehat_layak_huni)){
                                                echo '<option value="">Pilih</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Jamban Keluarga</label>
                                        <select required name="rumah_memiliki_jamban" id="rumah_memiliki_jamban"
                                            class="form-select form-select-lg form-select-solid"
                                            data-placeholder="Pilih" data-control="select2">
                                            <?php 
                                            if($keluarga->rumah_memiliki_jamban ==  1){
                                                echo '<option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }elseif($keluarga->rumah_memiliki_jamban ==  0){
                                                echo '<option value="0">Tidak</option>
                                                <option value="1">Ya</option>';
                                            }elseif(empty($keluarga->rumah_sehat_layak_huni)){
                                                echo '<option value="">Pilih</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Menempel Stiker P4K</label>
                                        <select required name="rumah_menempel_sp4k" id="rumah_menempel_sp4k"
                                            class="form-select form-select-lg form-select-solid"
                                            data-placeholder="Pilih" data-control="select2">
                                            <?php 
                                            if($keluarga->rumah_menempel_sp4k ==  1){
                                                echo '<option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }elseif($keluarga->rumah_menempel_sp4k ==  0){
                                                echo '<option value="0">Tidak</option>
                                                <option value="1">Ya</option>';
                                            }elseif(empty($keluarga->rumah_sehat_layak_huni)){
                                                echo '<option value="">Pilih</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <div class="fv-row row mt-5">
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">PDAM</label>
                                        <select required name="pdam" id="pdam"
                                            class="form-select form-select-lg form-select-solid"
                                            data-placeholder="Pilih" data-control="select2">
                                            <?php 
                                            if($keluarga->pdam ==  1){
                                                echo '<option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }elseif($keluarga->pdam ==  0){
                                                echo '<option value="0">Tidak</option>
                                                <option value="1">Ya</option>';
                                            }elseif(empty($keluarga->rumah_sehat_layak_huni)){
                                                echo '<option value="">Pilih</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Sumur</label>
                                        <select required name="sumur" id="sumur"
                                            class="form-select form-select-lg form-select-solid"
                                            data-placeholder="Pilih" data-control="select2">
                                            <?php 
                                            if($keluarga->sumur ==  1){
                                                echo '<option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }elseif($keluarga->sumur ==  0){
                                                echo '<option value="0">Tidak</option>
                                                <option value="1">Ya</option>';
                                            }elseif(empty($keluarga->rumah_sehat_layak_huni)){
                                                echo '<option value="">Pilih</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Sumber Lainnya</label>
                                        <select required name="sumber_air_lain" id="sumber_air_lain"
                                            class="form-select form-select-lg form-select-solid"
                                            data-placeholder="Pilih" data-control="select2">
                                            <?php 
                                            if($keluarga->sumber_air_lain ==  1){
                                                echo '<option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }elseif($keluarga->sumber_air_lain ==  0){
                                                echo '<option value="0">Tidak</option>
                                                <option value="1">Ya</option>';
                                            }elseif(empty($keluarga->rumah_sehat_layak_huni)){
                                                echo '<option value="">Pilih</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Beras</label>
                                        <select required name="beras" id="beras"
                                            class="form-select form-select-lg form-select-solid"
                                            data-placeholder="Pilih" data-control="select2">
                                            <?php 
                                            if($keluarga->beras ==  1){
                                                echo '<option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }elseif($keluarga->beras ==  0){
                                                echo '<option value="0">Tidak</option>
                                                <option value="1">Ya</option>';
                                            }elseif(empty($keluarga->rumah_sehat_layak_huni)){
                                                echo '<option value="">Pilih</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Non Beras</label>
                                        <select required name="non_beras" id="non_beras"
                                            class="form-select form-select-lg form-select-solid"
                                            data-placeholder="Pilih" data-control="select2">
                                            <?php 
                                            if($keluarga->non_beras ==  1){
                                                echo '<option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }elseif($keluarga->non_beras ==  0){
                                                echo '<option value="0">Tidak</option>
                                                <option value="1">Ya</option>';
                                            }elseif(empty($keluarga->rumah_sehat_layak_huni)){
                                                echo '<option value="">Pilih</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <div class="fv-row row mt-5">
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Aktifitas UP2K</label>
                                        <select required name="mengikuti_up2k" id="mengikuti_up2k"
                                            class="form-select form-select-lg form-select-solid"
                                            data-placeholder="Pilih" data-control="select2">
                                            <?php 
                                            if($keluarga->mengikuti_up2k ==  1){
                                                echo '<option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }elseif($keluarga->mengikuti_up2k ==  0){
                                                echo '<option value="0">Tidak</option>
                                                <option value="1">Ya</option>';
                                            }elseif(empty($keluarga->rumah_sehat_layak_huni)){
                                                echo '<option value="">Pilih</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }
                                            ?>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Pemanfaatan Tanah
                                            Pekarangan</label>
                                        <select required name="pemanfaatan_tanah" id="pemanfaatan_tanah"
                                            class="form-select form-select-lg form-select-solid" data-control="select2"
                                            data-placeholder="Pilih">
                                            <?php 
                                            if($keluarga->pemanfaatan_tanah ==  1){
                                                echo '<option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }elseif($keluarga->pemanfaatan_tanah ==  0){
                                                echo '<option value="0">Tidak</option>
                                                <option value="1">Ya</option>';
                                            }elseif(empty($keluarga->rumah_sehat_layak_huni)){
                                                echo '<option value="">Pilih</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Industri rumah tangga</label>
                                        <select required name="industri_rumah_tangga" id="industri_rumah_tangga"
                                            class="form-select form-select-lg form-select-solid" data-control="select2"
                                            data-placeholder="Pilih">
                                            <?php 
                                            if($keluarga->industri_rumah_tangga ==  1){
                                                echo '<option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }elseif($keluarga->industri_rumah_tangga ==  0){
                                                echo '<option value="0">Tidak</option>
                                                <option value="1">Ya</option>';
                                            }elseif(empty($keluarga->rumah_sehat_layak_huni)){
                                                echo '<option value="">Pilih</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Kerja Bhakti</label>
                                        <select required name="kerja_bhakti" id="kerja_bhakti"
                                            class="form-select form-select-lg form-select-solid" data-control="select2"
                                            data-placeholder="Pilih">
                                            <?php 
                                            if($keluarga->kerja_bhakti ==  1){
                                                echo '<option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }elseif($keluarga->kerja_bhakti ==  0){
                                                echo '<option value="0">Tidak</option>
                                                <option value="1">Ya</option>';
                                            }elseif(empty($keluarga->rumah_sehat_layak_huni)){
                                                echo '<option value="">Pilih</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                            <div class="fv-row row mt-5">
                                <div class="col-lg-12 col-md-12">
                                    <!--end::Form Group-->
                                    <div class="">
                                        <label class="fs-6 form-label fw-bolder text-dark">Alamat</label>
                                        <textarea class="form-control form-control-lg form-control" name="ket"
                                            id="ket"><?=$keluarga->ket?></textarea>
                                    </div>
                                    <!--end::Form Group-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Step 1-->


                    <!--begin::Actions-->
                    <div class="d-flex justify-content-between pt-10">
                        <div>
                            <button type="submit" class="btn btn-lg btn-primary fw-bolder py-4 ps-8 me-3"
                                data-kt-stepper-action="submit">Simpan
                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Right-2.svg-->
                                <span class="svg-icon svg-icon-4 ms-2">
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                        </div>



                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Stepper 1-->
</div>
<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Anggota Keluarga</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span class="svg-icon svg-icon-1"></span>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                <!--begin::Form Group-->
                <div class="fv-row row mb-5">
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">NIK</label>
                            <input type="text" class="form-control form-control-lg form-control-solid" name="addnik"
                                id="addnik" />
                        </div>
                        <!--end::Form Group-->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">No KK
                            </label>
                            <input type="text" class="form-control form-control-lg form-control-solid" name="addkk"
                                id="addkk" />
                        </div>
                        <!--end::Form Group-->
                    </div>
                </div>
                <!--begin::Form Group-->
                <!--begin::Form Group-->
                <div class="fv-row row ">
                    <div class="col-lg-4 col-md-4">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Nama
                            </label>
                            <input type="text" class="form-control form-control-lg form-control-solid" name="addnama"
                                id="addnama" />
                        </div>
                        <!--end::Form Group-->
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Jenis Kelamin
                            </label>
                            <select class="form-control form-control-lg form-control-solid" name="addjenis_kelamin"
                                id="addjenis_kelamin" data-control="select2" data-placeholder="Pilih Jenis Kelamin">
                                <option></option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Agama
                            </label>
                            <select class="form-control form-control-lg form-control-solid" name="addagama"
                                id="addagama" data-control="select2" data-placeholder="Pilih Jenis Kelamin">
                                <option></option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Khonghucu">Khonghucu</option>
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                </div>
                <br>
                <!--end::Form Group-->
                <!--begin::Form Group-->
                <div class="fv-row row ">
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Tempat Lahir</label>
                            <input type="input" class="form-control form-control-lg form-control-solid"
                                name="addtempat_lahir" id="addtempat_lahir" />
                        </div>
                        <!--end::Form Group-->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Tanggal Lahir
                            </label>
                            <input type="date" class="form-control form-control-lg form-control-solid"
                                name="addtanggal_lahir" id="addtanggal_lahir" />
                        </div>
                        <!--end::Form Group-->
                    </div>
                </div>
                <br>
                <!--end::Form Group-->
                <!--begin::Form Group-->
                <div class="fv-row row ">
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Status dalam keluarga</label>
                            <select class="form-control form-control-lg form-control-solid"
                                name="addstatus_dalam_keluarga" id="addstatus_dalam_keluarga" data-control="select2"
                                data-placeholder="Pilih Status Keluarga">
                                <option></option>
                                <option value="Kepala Keluarga">Kepala Keluarga</option>
                                <option value="Cucu">Cucu</option>
                                <option value="Suami">Suami</option>
                                <option value="Orang Tua">Orang Tua</option>
                                <option value="Istri">Istri</option>
                                <option value="Mertua">Mertua</option>
                                <option value="Anak">Anak</option>
                                <option value="Famili">Famili</option>
                                <option value="Menantu">Menantu</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Status Perkawinan</label>
                            <select class="form-control form-control-lg form-control-solid" name="addstatus_kawin"
                                id="addstatus_kawin" data-control="select2" data-placeholder="Pilih Status Keluarga">
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Kawin">Kawin</option>
                                <option value="Cerai Hidup">Cerai Hidup</option>
                                <option value="Cerai Mati">Cerai Mati</option>
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                </div>
                <br>
                <!--end::Form Group-->
                <!--begin::Form Group-->
                <div class="fv-row row ">
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Pendidikan
                            </label>
                            <select class="form-control form-control-lg form-control-solid" name="addpendidikan"
                                id="addpendidikan" data-control="select2" data-placeholder="Pilih Pendidikan Terakhir">
                                <option></option>
                                <option value="BELUM MASUK TK/KELOMPOK BERMAIN">BELUM MASUK TK/KELOMPOK
                                    BERMAIN</option>
                                <option value="TK/KELOMPOK BERMAIN">TK/KELOMPOK BERMAIN
                                </option>
                                <option value="TIDAK PERNAH SEKOLAH">TIDAK PERNAH SEKOLAH</option>
                                <option value="SD/SEDERAJAT">SD/SEDERAJAT</option>
                                <option value="TIDAK TAMAT SD/SEDERAJAT">TIDAK TAMAT SD/SEDERAJAT</option>
                                <option value="SLTP/SEDERAJAT">SLTP/SEDERAJAT</option>
                                <option value="SLTA/SEDERAJAT">SLTA/SEDERAJAT</option>
                                <option value="D-1/SEDERAJAT">D-1/SEDERAJAT</option>
                                <option value="D-2/SEDERAJAT">D-2/SEDERAJAT</option>
                                <option value="D-3/SEDERAJAT">D-3/SEDERAJAT</option>
                                <option value="S-1/SEDERAJAT">S-1/SEDERAJAT</option>
                                <option value="S-2/SEDERAJAT">S-2/SEDERAJAT</option>
                                <option value="S-3/SEDERAJAT">S-3/SEDERAJAT</option>
                                <option value="SLB A/SEDERAJAT">SLB A/SEDERAJAT</option>
                                <option value="SLB B/SEDERAJAT">SLB B/SEDERAJAT</option>
                                <option value="SLB C/SEDERAJAT">SLB C/SEDERAJAT</option>
                                <option value="TIDAK DAPAT MEMBACA DAN MENULIS HURUF LATIN/ARAB">TIDAK DAPAT
                                    MEMBACA DAN MENULIS HURUF LATIN/ARAB</option>
                                <option value="TIDAK SEKOLAH">TIDAK SEKOLAH</option>


                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Pekerjaan
                            </label>
                            <select class="form-control form-control-lg form-control-solid" name="addpekerjaan"
                                id="addpekerjaan" data-control="select2" data-placeholder="Pilih Pekerjaan">
                                <option></option>
                                <?php
                                            foreach ($pekerjaan as $value) {
                                                echo "<option value='" . $value->nama . "'>" . $value->nama . "</option>";
                                            }
                                            ?>
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                </div>
                <!--end::Form Group-->
                <!--begin::Form Group-->
                <div class="fv-row row ">
                    <div class="col-lg-12 col-md-12 mt-5">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Kebutuhan Khusus
                            </label>
                            <select class="form-control form-control-lg form-control-solid" name="addcacat"
                                id="addcacat" data-control="select2" data-placeholder="Pilih Kebutuhan Khusus">
                                <option value="0">Tidak Berkebutuhan Khusus</option>
                                <?php
                                            foreach ($kebutuhan_khusus as $value) {
                                                echo "<option value='" . $value->nama . "'>" . $value->nama . "</option>";
                                            }
                                            ?>
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                </div>
                <!--end::Form Group-->
                <br>

                <div class="col-lg-6 col-md-6 mb-8">
                    <label class="fs-6 form-label fw-bolder"><b>Kegiatan PKK yang diikuti</b></label>
                </div>
                <!--begin::Form Group-->
                <div class="fv-row row mb-5">
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Penghayatan dan Pengamalan
                                Pancasila</label>
                            <select class="form-control form-control-lg form-control-solid" name="addpancasila"
                                id="addpancasila" data-control="select2" data-placeholder="Pilih Kegiatan">
                                <option value="0">Tidak Ada</option>
                                <?php
                                            foreach ($pancasila as $value) {
                                                echo "<option value='" . $value->id . "'>" . $value->nama . "</option>";
                                            }
                                            ?>
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Gotong Royong</label>
                            <select class="form-control form-control-lg form-control-solid" name="addgotong_royong"
                                id="addgotong_royong" data-control="select2" data-placeholder="Pilih Kegiatan">
                                <option value="0">Tidak Ada</option>
                                <?php
                                            foreach ($gotong_royong as $value) {
                                                echo "<option value='" . $value->id . "'>" . $value->nama . "</option>";
                                            }
                                            ?>
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                </div>
                <!--begin::Form Group-->
                <div class="fv-row row mb-5">
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Pendidikan dan ketrampilan</label>
                            <select class="form-control form-control-lg form-control-solid" name="addketrampilan"
                                id="addketrampilan" data-control="select2" data-placeholder="Pilih Kegiatan">
                                <option value="0">Tidak Ada</option>
                                <?php
                                            foreach ($ketrampilan as $value) {
                                                echo "<option value='" . $value->id . "'>" . $value->nama . "</option>";
                                            }
                                            ?>
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Pengembangan Kehidupan
                                Berkoperasi</label>
                            <select class="form-control form-control-lg form-control-solid" name="addkoperasi"
                                id="addkoperasi" data-control="select2" data-placeholder="Pilih Kegiatan">
                                <option value="0">Tidak Ada</option>
                                <?php
                                            foreach ($koperasi as $value) {
                                                echo "<option value='" . $value->id . "'>" . $value->nama . "</option>";
                                            }
                                            ?>
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                </div>
                <!--begin::Form Group-->
                <div class="fv-row row mb-5">
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Pangan</label>
                            <select class="form-control form-control-lg form-control-solid" name="addpangan"
                                id="addpangan" data-control="select2" data-placeholder="Pilih Kegiatan">
                                <option value="0">Tidak Ada</option>
                                <?php
                                            foreach ($pangan as $value) {
                                                echo "<option value='" . $value->id . "'>" . $value->nama . "</option>";
                                            }
                                            ?>
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Sandang</label>
                            <select class="form-control form-control-lg form-control-solid" name="addsandang"
                                id="addsandang" data-control="select2" data-placeholder="Pilih Kegiatan">
                                <option value="0">Tidak Ada</option>
                                <?php
                                            foreach ($sandang as $value) {
                                                echo "<option value='" . $value->id . "'>" . $value->nama . "</option>";
                                            }
                                            ?>
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                </div>
                <!--begin::Form Group-->
                <div class="fv-row row mb-5">
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Kesehatan</label>
                            <select class="form-control form-control-lg form-control-solid" name="addkesehatan"
                                id="addkesehatan" data-control="select2" data-placeholder="Pilih Kegiatan">
                                <option value="0">Tidak Ada</option>
                                <?php
                                            foreach ($kesehatan as $value) {
                                                echo "<option value='" . $value->id . "'>" . $value->nama . "</option>";
                                            }
                                            ?>
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Perencanaan Sehat</label>
                            <select class="form-control form-control-lg form-control-solid" name="addperencanaan_sehat"
                                id="addperencanaan_sehat" data-control="select2" data-placeholder="Pilih Kegiatan">
                                <option value="0">Tidak Ada</option>
                                <?php
                                            foreach ($perencanaan_sehat as $value) {
                                                echo "<option value='" . $value->id . "'>" . $value->nama . "</option>";
                                            }
                                            ?>
                            </select>
                        </div>
                        <!--end::Form Group-->
                    </div>
                </div>
                <div class="fv-row row ">
                    <div class="col-lg-12 col-md-12">
                        <!--end::Form Group-->
                        <div class="">
                            <label class="fs-6 form-label fw-bolder text-dark">Keterangan
                            </label>
                            <textarea class="form-control form-control-lg form-control-solid" name="addketerangan"
                                id="addketerangan"></textarea>
                        </div>
                        <!--end::Form Group-->
                    </div>
                </div>
                <br>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <a onclick="addAnggota()" class="btn btn-primary">Simpan</a>
            </div>
        </div>
    </div>
</div>