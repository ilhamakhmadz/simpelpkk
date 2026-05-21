<?php
$db = new mysqli('127.0.0.1', 'root', '', 'pkk2023');
$res = $db->query('SELECT id, posyandu_id, jenis_kegiatan, frekuensi FROM posyandu_kegiatan');
while($row = $res->fetch_assoc()) { 
    print_r($row); 
}
