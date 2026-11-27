-- ============================================================
-- MIGRASI: Penyesuaian Kolom Program POKJA I
-- Menambahkan kolom program KISAH, KRISAN, KILAS, KIAT, KISAK, PKBN
-- ke tabel tbl_keg_pokja_1 (dan alias kijat/kuat untuk backwards-compatibility jika ada)
-- ============================================================

DELIMITER $$

CREATE PROCEDURE MigratePokja1Columns()
BEGIN
  -- 1. KISAH
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'kisah_kegiatan') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kisah_kegiatan` INT(11) DEFAULT 0;
  END IF;
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'kisah_vol_keg') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kisah_vol_keg` INT(11) DEFAULT 0;
  END IF;
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'kisah_metode') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kisah_metode` VARCHAR(100) DEFAULT NULL;
  END IF;
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'kisah_jml_sasaran') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kisah_jml_sasaran` INT(11) DEFAULT 0;
  END IF;

  -- 2. KRISAN
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'krisan_kegiatan') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `krisan_kegiatan` INT(11) DEFAULT 0;
  END IF;
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'krisan_vol_keg') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `krisan_vol_keg` INT(11) DEFAULT 0;
  END IF;
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'krisan_metode') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `krisan_metode` VARCHAR(100) DEFAULT NULL;
  END IF;
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'krisan_jml_sasaran') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `krisan_jml_sasaran` INT(11) DEFAULT 0;
  END IF;

  -- 3. KILAS
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'kilas_kegiatan') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kilas_kegiatan` INT(11) DEFAULT 0;
  END IF;
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'kilas_vol_keg') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kilas_vol_keg` INT(11) DEFAULT 0;
  END IF;
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'kilas_metode') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kilas_metode` VARCHAR(100) DEFAULT NULL;
  END IF;
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'kilas_jml_sasaran') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kilas_jml_sasaran` INT(11) DEFAULT 0;
  END IF;

  -- 4. KIAT
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'kiat_kegiatan') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kiat_kegiatan` INT(11) DEFAULT 0;
  END IF;
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'kiat_vol_keg') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kiat_vol_keg` INT(11) DEFAULT 0;
  END IF;
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'kiat_metode') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kiat_metode` VARCHAR(100) DEFAULT NULL;
  END IF;
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'kiat_jml_sasaran') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kiat_jml_sasaran` INT(11) DEFAULT 0;
  END IF;

  -- 5. KISAK
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'kisak_kegiatan') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kisak_kegiatan` INT(11) DEFAULT 0;
  END IF;
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'kisak_vol_keg') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kisak_vol_keg` INT(11) DEFAULT 0;
  END IF;
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'kisak_metode') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kisak_metode` VARCHAR(100) DEFAULT NULL;
  END IF;
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'kisak_jml_sasaran') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kisak_jml_sasaran` INT(11) DEFAULT 0;
  END IF;

  -- 6. PKBN
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'pkbn_kegiatan') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `pkbn_kegiatan` INT(11) DEFAULT 0;
  END IF;
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'pkbn_vol_keg') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `pkbn_vol_keg` INT(11) DEFAULT 0;
  END IF;
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'pkbn_metode') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `pkbn_metode` VARCHAR(100) DEFAULT NULL;
  END IF;
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'pkbn_jml_sasaran') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `pkbn_jml_sasaran` INT(11) DEFAULT 0;
  END IF;

  -- Alias kijat & kuat (jika ada script yang membaca field lama)
  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'kijat_kegiatan') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kijat_kegiatan` INT(11) DEFAULT 0;
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kijat_vol_keg` INT(11) DEFAULT 0;
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kijat_metode` VARCHAR(100) DEFAULT NULL;
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kijat_jml_sasaran` INT(11) DEFAULT 0;
  END IF;

  IF NOT EXISTS (SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'tbl_keg_pokja_1' AND COLUMN_NAME = 'kuat_kegiatan') THEN
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kuat_kegiatan` INT(11) DEFAULT 0;
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kuat_vol_keg` INT(11) DEFAULT 0;
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kuat_metode` VARCHAR(100) DEFAULT NULL;
    ALTER TABLE `tbl_keg_pokja_1` ADD COLUMN `kuat_jml_sasaran` INT(11) DEFAULT 0;
  END IF;

END$$

DELIMITER ;

CALL MigratePokja1Columns();
DROP PROCEDURE IF EXISTS MigratePokja1Columns;
