<?php
$db = new mysqli('127.0.0.1', 'root', '', 'pkk2023');
$res = $db->query('SELECT COUNT(*) FROM profil');
if($res) {
    echo "Profil: " . $res->fetch_row()[0] . "\n";
} else {
    echo $db->error;
}
