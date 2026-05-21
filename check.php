<?php 
$db = new mysqli('127.0.0.1', 'root', '', 'pkk2023'); 
foreach(['tbl_keg_pokja_1', 'tbl_keg_pokja_2', 'tbl_keg_pokja_3', 'tbl_keg_pokja_4'] as $tbl) { 
    $res = $db->query('SELECT level, count(*) as c FROM ' . $tbl . ' GROUP BY level'); 
    echo "=== $tbl ===" . PHP_EOL;
    while($row = $res->fetch_assoc()){
        echo $row['level'] . ' : ' . $row['c'] . PHP_EOL; 
    }
} 
?>
