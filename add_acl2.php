<?php
$db = new mysqli('127.0.0.1', 'root', '', 'pkk2023');

$resources = [
    'sip',
    'sip/sip6',
    'sip/sip6_add',
    'sip/sip6_edit',
    'sip/sip6_delete',
    'sip/sip7',
    'sip/sip7_detail'
];

$roles = [];
$r = $db->query("SELECT id FROM acl_roles");
while($row = $r->fetch_assoc()){
    $roles[] = $row['id'];
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
echo "Done granting permissions.\n";
