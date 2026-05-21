<?php
$db = new mysqli('127.0.0.1', 'root', '', 'pkk2023');
// Try updating a row manually
$data = [
    'posyandu_id' => 1,
    'bulan' => 5,
    'tahun' => 2026,
    'jenis_kegiatan' => 'Pelayanan Sosial',
    'frekuensi' => 99,
    'pengunjung_l' => 99,
    'pengunjung_p' => 99,
    'petugas_l' => 99,
    'petugas_p' => 99,
    'keterangan' => 'Test',
    'visible' => 1
];

$query = $db->query("SELECT id FROM posyandu_kegiatan WHERE posyandu_id = 1 AND bulan = 5 AND tahun = 2026 AND jenis_kegiatan = 'Pelayanan Sosial'");
if($query->num_rows > 0) {
    $row = $query->fetch_assoc();
    $id = $row['id'];
    $db->query("UPDATE posyandu_kegiatan SET frekuensi=99, pengunjung_l=99 WHERE id=$id");
    echo "Updated row $id. Affected: " . $db->affected_rows . "\n";
} else {
    $db->query("INSERT INTO posyandu_kegiatan (posyandu_id, bulan, tahun, jenis_kegiatan, frekuensi, pengunjung_l, pengunjung_p, petugas_l, petugas_p, keterangan, visible) VALUES (1, 5, 2026, 'Pelayanan Sosial', 99, 99, 99, 99, 99, 'Test', 1)");
    echo "Inserted row. Affected: " . $db->affected_rows . "\n";
}
