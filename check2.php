<?php
$db = new mysqli('127.0.0.1', 'root', '', 'pkk2023');
foreach(['tbl_keg_pokja_1', 'tbl_keg_pokja_2', 'tbl_keg_pokja_3', 'tbl_keg_pokja_4'] as $tbl) {
    echo "=== $tbl ===" . PHP_EOL;
    $res = $db->query('SELECT visible, count(*) as c FROM ' . $tbl . ' WHERE level="kecamatan" GROUP BY visible');
    while($row = $res->fetch_assoc()){
        echo ($row['visible'] === null ? 'NULL' : $row['visible']) . ' : ' . $row['c'] . PHP_EOL;
    }
}
?>
