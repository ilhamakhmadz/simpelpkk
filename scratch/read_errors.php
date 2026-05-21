<?php
$lines = file('application/logs/log-2026-05-20.php');
$found = [];
foreach ($lines as $line) {
    if (stripos($line, 'sip') !== false) {
        $found[] = trim($line);
    }
}
echo "Total log lines containing 'sip': " . count($found) . "\n";
echo "Last 30 matching logs:\n";
$last_30 = array_slice($found, -30);
foreach ($last_30 as $l) {
    echo $l . "\n";
}
?>
