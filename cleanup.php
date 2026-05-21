<?php
$db = new mysqli('127.0.0.1', 'root', '', 'pkk2023');
$db->query("DELETE FROM posyandu_kegiatan WHERE jenis_kegiatan = '0' OR jenis_kegiatan = '' OR jenis_kegiatan IS NULL");
echo "Deleted " . $db->affected_rows . " rows.\n";
