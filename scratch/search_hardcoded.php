<?php
$content = file_get_contents('application/views/layouts/admin.php');

// Search for sip occurrences in layout
$pos = 0;
while (($pos = stripos($content, 'sip', $pos)) !== false) {
    echo "Found 'sip' at offset $pos:\n";
    echo substr($content, max(0, $pos - 50), 100) . "\n\n";
    $pos += strlen('sip');
}
?>
