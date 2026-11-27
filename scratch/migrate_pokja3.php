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

$check = mysqli_query($conn, "SHOW COLUMNS FROM tbl_keg_pokja_3 LIKE 'pangan_tanaman_lainnya'");
if (mysqli_num_rows($check) == 0) {
    $alter = mysqli_query($conn, "ALTER TABLE tbl_keg_pokja_3 ADD COLUMN pangan_tanaman_lainnya INT(11) DEFAULT 0 AFTER pangan_tanaman_keras");
    if ($alter) {
        echo "BERHASIL_TAMBAH_KOLOM\n";
    } else {
        echo "GAGAL: " . mysqli_error($conn) . "\n";
    }
} else {
    echo "KOLOM_SUDAH_ADA\n";
}
