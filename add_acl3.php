<?php
$db = new mysqli('127.0.0.1', 'root', '', 'pkk2023');

$resources = [
    'sip/sip7_save',
    'sip/sip7_pdf',
    'sip/sip7_excel'
];

$roles = [];
$r = $db->query("SELECT id FROM acl_roles");
while($row = $r->fetch_assoc()){
    $roles[] = $row['id'];
}

foreach($resources as $res) {
    $parts = explode('/', $res);
    $parent = (count($parts) > 1) ? $parts[0] : null;
    $type = (count($parts) > 1) ? 'method' : 'controller';
    
    $check = $db->query("SELECT id FROM acl_resources WHERE name = '$res'");
    if($check->num_rows == 0) {
        $parent_name = $parent ? "'$parent'" : "NULL";
        $db->query("INSERT INTO acl_resources (parent, name, type) VALUES ($parent_name, '$res', '$type')");
        echo "Inserted resource: $res\n";
    }
}

foreach($resources as $res) {
    $res_query = $db->query("SELECT id FROM acl_resources WHERE name = '$res'");
    if($res_query->num_rows > 0) {
        $res_id = $res_query->fetch_assoc()['id'];
        
        foreach($roles as $role_id) {
            $check = $db->query("SELECT * FROM acl_rules WHERE role_id = $role_id AND resource_id = $res_id");
            if($check->num_rows == 0) {
                $db->query("INSERT INTO acl_rules (role_id, resource_id, access) VALUES ($role_id, $res_id, 'allow')");
            }
        }
    }
}
echo "Done granting permissions for sip7_save.\n";
