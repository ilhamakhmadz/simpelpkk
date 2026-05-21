<?php
$_SERVER['REQUEST_METHOD'] = 'POST';
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
$_SERVER['REQUEST_URI'] = '/simpelpkk/index.php/sip/sip7_save';
$_POST = [
    'posyandu_id' => 1,
    'bulan' => 5,
    'tahun' => 2026,
    'kegiatan' => [
        'Pelayanan_Sosial' => [
            'frekuensi' => 5,
            'pengunjung_l' => 5,
            'pengunjung_p' => 5,
            'petugas_l' => 5,
            'petugas_p' => 5,
            'keterangan' => 'Test HTTP POST'
        ]
    ]
];

// Mock session 
// Actually, this is too hard without a real browser context because of CI session and ACL.
