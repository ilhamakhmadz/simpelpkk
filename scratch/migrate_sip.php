<?php
$conn = new mysqli('localhost', 'root', '', 'pkk2023');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 1. Create table posyandu
$sql1 = "CREATE TABLE IF NOT EXISTS `posyandu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kecamatan` varchar(255) NOT NULL,
  `kode_desa` varchar(255) NOT NULL,
  `dusun_id` int(11) DEFAULT NULL,
  `rw` varchar(50) NOT NULL,
  `rt` varchar(50) DEFAULT NULL,
  `nama_posyandu` varchar(255) NOT NULL,
  `pengelola` varchar(255) NOT NULL,
  `sekretaris` varchar(255) NOT NULL,
  `jenis_posyandu` enum('Pratama','Madya','Purnama','Mandiri') NOT NULL DEFAULT 'Pratama',
  `jumlah_kader` int(11) NOT NULL DEFAULT 0,
  `visible` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

if ($conn->query($sql1) === TRUE) {
    echo "Table 'posyandu' created successfully or already exists.\n";
} else {
    echo "Error creating table 'posyandu': " . $conn->error . "\n";
}

// 2. Create table posyandu_kegiatan
$sql2 = "CREATE TABLE IF NOT EXISTS `posyandu_kegiatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `posyandu_id` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `jenis_kegiatan` varchar(255) NOT NULL,
  `frekuensi` int(11) NOT NULL DEFAULT 0,
  `pengunjung_l` int(11) NOT NULL DEFAULT 0,
  `pengunjung_p` int(11) NOT NULL DEFAULT 0,
  `petugas_l` int(11) NOT NULL DEFAULT 0,
  `petugas_p` int(11) NOT NULL DEFAULT 0,
  `keterangan` text DEFAULT NULL,
  `visible` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`posyandu_id`) REFERENCES `posyandu` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

if ($conn->query($sql2) === TRUE) {
    echo "Table 'posyandu_kegiatan' created successfully or already exists.\n";
} else {
    echo "Error creating table 'posyandu_kegiatan': " . $conn->error . "\n";
}

$conn->close();
?>
