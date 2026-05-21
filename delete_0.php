<?php
$db = new mysqli('127.0.0.1', 'root', '', 'pkk2023');
$db->query("DELETE FROM posyandu_kegiatan WHERE jenis_kegiatan = '0'");
echo "Deleted " . $db->affected_rows . " rows with jenis_kegiatan = '0'.\n";
