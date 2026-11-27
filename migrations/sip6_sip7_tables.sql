-- =========================================================================
-- SQL Migration: Tabel Catatan Warga & Catatan Ibu Bayi TP PKK (SIP 6 & SIP 7)
-- =========================================================================

-- 1. Tabel catatan_ibu_bayi_tp_pkk (digunakan oleh SIP 6)
--    Mencakup data ibu hamil, melahirkan, nifas, kematian ibu, kelahiran bayi, akta kelahiran, kematian bayi/balita
CREATE TABLE IF NOT EXISTS `catatan_ibu_bayi_tp_pkk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kecamatan` varchar(255) NOT NULL,
  `kode_desa` varchar(255) NOT NULL,
  `nama_dusun` varchar(255) DEFAULT '',
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `jml_rw` int(11) NOT NULL DEFAULT 0,
  `jml_rt` int(11) NOT NULL DEFAULT 0,
  `jml_dasawisma` int(11) NOT NULL DEFAULT 0,
  `ibu_hamil` int(11) NOT NULL DEFAULT 0,
  `ibu_melahirkan` int(11) NOT NULL DEFAULT 0,
  `ibu_nifas` int(11) NOT NULL DEFAULT 0,
  `ibu_meninggal` int(11) NOT NULL DEFAULT 0,
  `bayi_lahir_l` int(11) NOT NULL DEFAULT 0,
  `bayi_lahir_p` int(11) NOT NULL DEFAULT 0,
  `bayi_akte_ada` int(11) NOT NULL DEFAULT 0,
  `bayi_akte_tidak` int(11) NOT NULL DEFAULT 0,
  `bayi_meninggal_l` int(11) NOT NULL DEFAULT 0,
  `bayi_meninggal_p` int(11) NOT NULL DEFAULT 0,
  `balita_meninggal_l` int(11) NOT NULL DEFAULT 0,
  `balita_meninggal_p` int(11) NOT NULL DEFAULT 0,
  `keterangan` text DEFAULT NULL,
  `visible` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_wilayah_waktu` (`kode_kecamatan`, `kode_desa`, `bulan`, `tahun`, `visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- 2. Tabel catatan_warga_tp_pkk (digunakan oleh SIP 7)
--    Mencakup 33 indikator catatan data dan kegiatan warga TP PKK
CREATE TABLE IF NOT EXISTS `catatan_warga_tp_pkk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kecamatan` varchar(255) NOT NULL,
  `kode_desa` varchar(255) NOT NULL,
  `nama_dusun` varchar(255) DEFAULT '',
  `tahun` int(11) NOT NULL,
  `jml_rw` int(11) NOT NULL DEFAULT 0,
  `jml_rt` int(11) NOT NULL DEFAULT 0,
  `jml_dasawisma` int(11) NOT NULL DEFAULT 0,
  `jml_krt` int(11) NOT NULL DEFAULT 0,
  `jml_kk` int(11) NOT NULL DEFAULT 0,
  `total_l` int(11) NOT NULL DEFAULT 0,
  `total_p` int(11) NOT NULL DEFAULT 0,
  `balita_l` int(11) NOT NULL DEFAULT 0,
  `balita_p` int(11) NOT NULL DEFAULT 0,
  `pus` int(11) NOT NULL DEFAULT 0,
  `wus` int(11) NOT NULL DEFAULT 0,
  `ibu_hamil` int(11) NOT NULL DEFAULT 0,
  `ibu_menyusui` int(11) NOT NULL DEFAULT 0,
  `lansia` int(11) NOT NULL DEFAULT 0,
  `buta` int(11) NOT NULL DEFAULT 0,
  `buta_l` int(11) NOT NULL DEFAULT 0,
  `buta_p` int(11) NOT NULL DEFAULT 0,
  `sehat_layak_huni` int(11) NOT NULL DEFAULT 0,
  `tidak_sehat_layak_huni` int(11) NOT NULL DEFAULT 0,
  `tempat_sampah` int(11) NOT NULL DEFAULT 0,
  `spal` int(11) NOT NULL DEFAULT 0,
  `pdam` int(11) NOT NULL DEFAULT 0,
  `sumur` int(11) NOT NULL DEFAULT 0,
  `sungai` int(11) NOT NULL DEFAULT 0,
  `dll` int(11) NOT NULL DEFAULT 0,
  `jamban` int(11) NOT NULL DEFAULT 0,
  `beras` int(11) NOT NULL DEFAULT 0,
  `non_beras` int(11) NOT NULL DEFAULT 0,
  `up2k` int(11) NOT NULL DEFAULT 0,
  `pemanfaatan_tanah` int(11) NOT NULL DEFAULT 0,
  `industri_rumah_tangga` int(11) NOT NULL DEFAULT 0,
  `kesling` int(11) NOT NULL DEFAULT 0,
  `keterangan` text DEFAULT NULL,
  `visible` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_wilayah_tahun` (`kode_kecamatan`, `kode_desa`, `tahun`, `visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- 3. Memastikan ACL Resources terdaftar
INSERT IGNORE INTO `acl_resources` (`name`, `type`, `parent`) VALUES 
('sip', 'module', NULL),
('sip/sip6', 'controller', NULL),
('sip/sip6_save', 'action', NULL),
('sip/sip6_delete', 'action', NULL),
('sip/sip6_pdf', 'action', NULL),
('sip/sip6_excel', 'action', NULL),
('sip/rekap_ibu_bayi_kecamatan', 'action', NULL),
('sip/rekap_ibu_bayi_kecamatan_pdf', 'action', NULL),
('sip/rekap_ibu_bayi_kecamatan_excel', 'action', NULL),
('sip/sip7', 'controller', NULL),
('sip/sip7_save', 'action', NULL),
('sip/sip7_delete', 'action', NULL),
('sip/sip7_pdf', 'action', NULL),
('sip/sip7_excel', 'action', NULL),
('sip/rekap_kecamatan', 'action', NULL),
('sip/rekap_kecamatan_pdf', 'action', NULL),
('sip/rekap_kecamatan_excel', 'action', NULL);

UPDATE acl_resources 
SET parent = (SELECT id FROM (SELECT id FROM acl_resources WHERE name = 'sip') AS temp)
WHERE name LIKE 'sip/%' AND parent IS NULL;

INSERT INTO acl_rules (role_id, resource_id, access)
SELECT r.id, res.id, 'allow'
FROM acl_roles r
CROSS JOIN acl_resources res
WHERE res.name LIKE 'sip%'
ON DUPLICATE KEY UPDATE access = 'allow';
