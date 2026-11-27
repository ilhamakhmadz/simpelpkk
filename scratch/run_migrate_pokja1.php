<?php
define('ENVIRONMENT', 'development');
define('BASEPATH', 'system/');
define('APPPATH', 'application/');
require 'application/config/database.php';

$d = $db['default'];
$conn = mysqli_connect($d['hostname'], $d['username'], $d['password'], $d['database']);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$cols = [
    'kisah_kegiatan INT DEFAULT 0',
    'kisah_vol_keg INT DEFAULT 0',
    'kisah_metode VARCHAR(100) NULL',
    'kisah_jml_sasaran INT DEFAULT 0',

    'krisan_kegiatan INT DEFAULT 0',
    'krisan_vol_keg INT DEFAULT 0',
    'krisan_metode VARCHAR(100) NULL',
    'krisan_jml_sasaran INT DEFAULT 0',

    'kilas_kegiatan INT DEFAULT 0',
    'kilas_vol_keg INT DEFAULT 0',
    'kilas_metode VARCHAR(100) NULL',
    'kilas_jml_sasaran INT DEFAULT 0',

    'kiat_kegiatan INT DEFAULT 0',
    'kiat_vol_keg INT DEFAULT 0',
    'kiat_metode VARCHAR(100) NULL',
    'kiat_jml_sasaran INT DEFAULT 0',

    'kisak_kegiatan INT DEFAULT 0',
    'kisak_vol_keg INT DEFAULT 0',
    'kisak_metode VARCHAR(100) NULL',
    'kisak_jml_sasaran INT DEFAULT 0',

    'pkbn_kegiatan INT DEFAULT 0',
    'pkbn_vol_keg INT DEFAULT 0',
    'pkbn_metode VARCHAR(100) NULL',
    'pkbn_jml_sasaran INT DEFAULT 0',

    'kijat_kegiatan INT DEFAULT 0',
    'kijat_vol_keg INT DEFAULT 0',
    'kijat_metode VARCHAR(100) NULL',
    'kijat_jml_sasaran INT DEFAULT 0',

    'kuat_kegiatan INT DEFAULT 0',
    'kuat_vol_keg INT DEFAULT 0',
    'kuat_metode VARCHAR(100) NULL',
    'kuat_jml_sasaran INT DEFAULT 0',
];

foreach ($cols as $c) {
    $parts = explode(' ', $c);
    $colName = $parts[0];
    $check = mysqli_query($conn, "SHOW COLUMNS FROM tbl_keg_pokja_1 LIKE '$colName'");
    if (mysqli_num_rows($check) == 0) {
        $alter = mysqli_query($conn, "ALTER TABLE tbl_keg_pokja_1 ADD COLUMN $c");
        if ($alter) {
            echo "Added $colName\n";
        } else {
            echo "Failed adding $colName: " . mysqli_error($conn) . "\n";
        }
    } else {
        echo "Exists: $colName\n";
    }
}

echo "MIGRASI_BERHASIL\n";
