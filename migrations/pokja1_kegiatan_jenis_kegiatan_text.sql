-- ============================================================
-- MIGRASI: Pokja I - ubah field "Jenis Kegiatan" tiap program
-- dari angka (INT) menjadi teks (VARCHAR) sesuai panduan
-- "CARA PENGISIAN DATA KEGIATAN POKJA I" (kolom 4,8,12,16,20,24).
--
-- Field _kegiatan = NAMA jenis kegiatan yang dilaksanakan (teks),
-- contoh: CEPAK, CATIN, JUPITER, LANSIAU, Webinar Obros, dll.
-- Nilai lama berupa 0 (sisa tipe INT) dibersihkan menjadi NULL.
-- ============================================================

ALTER TABLE `tbl_keg_pokja_1`
  MODIFY COLUMN `kisah_kegiatan`  VARCHAR(150) NULL DEFAULT NULL,
  MODIFY COLUMN `krisan_kegiatan` VARCHAR(150) NULL DEFAULT NULL,
  MODIFY COLUMN `kilas_kegiatan`  VARCHAR(150) NULL DEFAULT NULL,
  MODIFY COLUMN `kiat_kegiatan`   VARCHAR(150) NULL DEFAULT NULL,
  MODIFY COLUMN `kisak_kegiatan`  VARCHAR(150) NULL DEFAULT NULL,
  MODIFY COLUMN `pkbn_kegiatan`   VARCHAR(150) NULL DEFAULT NULL,
  -- alias lama (backwards-compatibility) ikut disamakan tipenya
  MODIFY COLUMN `kijat_kegiatan`  VARCHAR(150) NULL DEFAULT NULL,
  MODIFY COLUMN `kuat_kegiatan`   VARCHAR(150) NULL DEFAULT NULL;

-- Bersihkan nilai '0' warisan tipe INT menjadi kosong (NULL)
UPDATE `tbl_keg_pokja_1` SET
  `kisah_kegiatan`  = NULLIF(`kisah_kegiatan`,'0'),
  `krisan_kegiatan` = NULLIF(`krisan_kegiatan`,'0'),
  `kilas_kegiatan`  = NULLIF(`kilas_kegiatan`,'0'),
  `kiat_kegiatan`   = NULLIF(`kiat_kegiatan`,'0'),
  `kisak_kegiatan`  = NULLIF(`kisak_kegiatan`,'0'),
  `pkbn_kegiatan`   = NULLIF(`pkbn_kegiatan`,'0'),
  `kijat_kegiatan`  = NULLIF(`kijat_kegiatan`,'0'),
  `kuat_kegiatan`   = NULLIF(`kuat_kegiatan`,'0');
