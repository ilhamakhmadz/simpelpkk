<?php
define('ENVIRONMENT', 'development');
define('BASEPATH', 'c:/xampp/htdocs/simpelpkk/vendor/codeigniter/framework/system/');
define('APPPATH', 'c:/xampp/htdocs/simpelpkk/application/');
define('VIEWPATH', 'c:/xampp/htdocs/simpelpkk/application/views/');

require_once(BASEPATH . 'core/Common.php');
require_once(BASEPATH . 'database/DB.php');

$db = DB('default', true);
if ($db) {
    echo "=== Columns in pkk ===\n";
    $fields = $db->list_fields('pkk');
    print_r($fields);

    // Let's also check if there is a year or date field
    $query = $db->select('id, tahun, level, visible')->limit(5)->get('pkk');
    print_r($query->result_array());
}
unlink(__FILE__);
