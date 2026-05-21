<?php
$db = new mysqli('127.0.0.1', 'root', '', 'pkk2023');

$sql = "SELECT 
    master_dusun.dusun as wilayah, 
    COUNT(posyandu.id) as total_posyandu, 
    SUM(posyandu.jumlah_kader) as total_kader
FROM posyandu
LEFT JOIN master_dusun ON master_dusun.id = posyandu.dusun_id
GROUP BY posyandu.dusun_id";

$res = $db->query($sql);
while($row = $res->fetch_assoc()) {
    print_r($row);
}
