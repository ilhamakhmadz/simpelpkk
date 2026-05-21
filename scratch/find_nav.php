<?php
$content = file_get_contents('application/views/layouts/admin.php');
$pos = 0;
while (($pos = strpos($content, 'navigation', $pos)) !== false) {
    echo "Found 'navigation' at offset $pos\n";
    echo substr($content, max(0, $pos - 100), 200) . "\n\n";
    $pos += strlen('navigation');
}

$pos = 0;
while (($pos = strpos($content, 'site_url', $pos)) !== false) {
    echo "Found 'site_url' at offset $pos\n";
    echo substr($content, max(0, $pos - 100), 200) . "\n\n";
    $pos += strlen('site_url');
}
?>
