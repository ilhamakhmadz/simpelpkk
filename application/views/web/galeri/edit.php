<div class="card">
    <!--begin::Form-->
    <form class="form d-flex flex-center" id="form_edit" name="form_edit" method="post">
        <div class="card-body mw-800px py-20">
            <div class="fv-row row ">
                <div class="col-lg-12 col-md-12">
                    <label class="fs-6 mt-5 form-label fw-bolder required">Jenis Galeri</label>
                    <select class="form-select form-select-lg form-select-solid" data-control="select2"
                        data-control="select2" data-placeholder="Pilih galeri" name="galeri" id="galeri" required>
                        <option value="<?= $galeri->id_galeri; ?>"><?= $galeri->nama_galeri; ?></option>
                        <?php
                        foreach ($m_galeri as $nama) {
                            echo "<option value='" . $nama->id . "'>" . $nama->nama_galeri . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="fv-row row ">
                <div class="col-lg-12 col-md-12">
                    <label class="fs-6 mt-5 form-label fw-bolder required">Nama Galeri</label>
                    <input type="hidden" id="id" name="id" value="<?= $galeri->id ?>">
                    <input class="form-control form-control-lg form-control-solid" type="text" id="nama" name="nama"
                        value="<?= $galeri->nama; ?>" required>
                </div>
            </div>
            <div class="fv-row row ">
                <div class="col-lg-12 col-md-12">
                    <label class="fs-6 mt-5 form-label fw-bolder required">Upload File</label>
                    <input class="form-control form-control-lg form-control-solid" type="file" name="file" id="file">
                    <input type="hidden" name="file_remove" id="file_remove" value="<?= $galeri->file; ?>">
                    <div class="form-text">Lihat galeri yang telah di upload.
                        <a href="<?= base_url() . base64_decode($galeri->file); ?>" class="fw-bold"
                            target="_blank">download</a>.
                    </div>
                </div>
            </div>
            <br>

            <div class="fv-row row">
                <div class="col-lg-12 col-md-12">
                    <button type="submit" class="btn btn-primary fw-bolder px-6 py-3 me-3">Ubah</button>
                </div>

            </div>
        </div>
</div>

</div>
</form>
<!--end::Form-->
</div>
