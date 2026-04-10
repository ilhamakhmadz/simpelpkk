<?php

/**
 * Main Navigation.
 * Primarily being used in views/layouts/admin.php
 *
 */
$config['navigation'] = array(
    'dashboard' => array(
        'title' => 'Dashboard',
        'icon' => '1.png',
        'children' => array(
            'kabupaten' => array(
                'uri' => 'dashboard/home',
                'title' => 'Home'
            ),
        )
    ),
    'desa' => array(
        'title' => 'Data PKK',
        'icon' => 'icon-folder',
        'children' => array(
            'profil' => array(
                'uri' => 'desa/profil',
                'title' => 'Profil PKK'
            ),
            'aparatur' => array(
                'uri' => 'desa/aparatur',
                'title' => 'Struktur Organisasi PKK'
            ),
            'anggota' => array(
                'uri' => 'desa/anggota',
                'title' => 'Buku Anggota PKK'
            ),

        )
    ),
    'pokja' => array(
        'title' => 'Kegiatan Pokja PKK',
        'icon' => 'icon-folder',
        'children' => array(
            'pokja1' => array(
                'uri' => 'pokja/pokja1',
                'title' => 'Pokja I'
            ),
            'pokja2' => array(
                'uri' => 'pokja/pokja2',
                'title' => 'Pokja II'
            ),
            'pokja3' => array(
                'uri' => 'pokja/pokja3',
                'title' => 'Pokja III'
            ),
            'pokja4' => array(
                'uri' => 'pokja/pokja4',
                'title' => 'Pokja IV'
            ),

        )
    ),

    'report' => array(
        'title' => 'Report',
        'icon' => 'icon-folder',
        'children' => array(
            'report_profil' => array(
                'uri' => 'report/profil',
                'title' => 'Profil PKK'
            ),
            'report_anggota' => array(
                'uri' => 'report/anggota',
                'title' => 'Anggota PKK'
            ),
            'report_pokja1' => array(
                'uri' => 'report/pokja1',
                'title' => 'Pokja I'
            ),
            'report_pokja2' => array(
                'uri' => 'report/pokja2',
                'title' => 'Pokja II'
            ),
            'report_pokja3' => array(
                'uri' => 'report/pokja3',
                'title' => 'Pokja III'
            ),
            'report_pokja4' => array(
                'uri' => 'report/pokja4',
                'title' => 'Pokja IV'
            ),
            'report_dasawisma' => array(
                'uri' => 'report/dasawisma',
                'title' => 'Dasawisma'
            ),

        )
    ),
    'dasawisma' => array(
        'title' => 'Dasa Wisma',
        'icon' => 'icon-woman',
        'children' => array(
            'dasawisma_keluarga' => array(
                'uri' => 'dasawisma/keluarga',
                'title' => 'Data Keluarga'
            ),
            'dasawisma_rekapitulasi' => array(
                'uri' => 'dasawisma/rekapitulasi_data',
                'title' => 'Rekapitulasi Data'
            ),
        )
    ),
    'web' => array(
        'title' => 'Pengelolaan Website',
        'icon' => 'icon-folder',
        'children' => array(
            'profil' => array(
                'uri' => 'web/profil',
                'title' => 'Profil PKK'
            ),
            'berita' => array(
                'uri' => 'web/berita',
                'title' => 'Berita'
            ),
            'pegawai' => array(
                'uri' => 'web/pegawai',
                'title' => 'Pegawai'
            ),
            'dokumen' => array(
                'uri' => 'web/dokumen',
                'title' => 'Dokumen Publik'
            ),
            'galeri' => array(
                'uri' => 'web/galeri',
                'title' => 'Galeri'
            ),
            // 'kinerja' => array(
            //     'uri' => 'web/kinerja',
            //     'title' => 'Kinerja'
            // ),
        )
    ),
    'master' => array(
        'title' => 'Master Data',
        'icon' => '15.png',
        'children' => array(

            'kabupaten' => array(
                'uri' => 'master/kabupaten',
                'title' => 'Kabupaten'
            ),
            'kecamatan' => array(
                'uri' => 'master/kecamatan',
                'title' => 'Kecamatan'
            ),
            'desa' => array(
                'uri' => 'master/desa',
                'title' => 'Desa'
            ),
            'jabatan' => array(
                'uri' => 'master/jabatan',
                'title' => 'Jabatan Dinas'
            ),
            'dokumen' => array(
                'uri' => 'master/dokumen',
                'title' => 'Jenis Dokument'
            ),
            'galeri' => array(
                'uri' => 'master/galeri',
                'title' => 'Jenis Galeri'
            ),
            // 'pelatihan' => array(
            //     'uri' => 'master/pelatihan',
            //     'title' => 'Jenis Pelatihan'
            // ),


        )
    ),
	'laporan' => array(
        'title' => 'Laporan',
        'icon' => 'fa fa-newspaper-o',
        'children' => array(
				'data_umum' => array(
					'title' => 'Data Umum PKK',
					'uri' => 'laporan/data_umum',
				),
			)
        	
	),
    'user-management' => array(
        'title' => 'Administrator',
        'icon' => '10.png',
        'children' => array(
            'kabupaten' => array(
                'uri' => 'auth/user',
                'title' => 'Management User'
            ),
            'rules' => array(
                'uri' => 'acl/rule',
                'title' => 'Hak Akses User'
            ),
            'roles' => array(
                'uri' => 'acl/role',
                'title' => 'Jenis Akses'
            ),
            'resources' => array(
                'uri' => 'acl/resource',
                'title' => 'Modul Apps'
            )
        )
    ),

    // 'pro' => array(
    // 	'uri' => 'pro/myprofile/edit/',
    // 	'title' => 'profile',
    // 	'icon' => ' icon-user'
    // ),
    // 'acl' => array(
    // 	'title' => 'Hak Akses',
    // 	'icon' => '11.png',
    // 	'children' => array(
    // 		'rules' => array(
    // 			'uri' => 'acl/rule',
    // 			'title' => 'Rules'
    // 		),
    // 		'roles' => array(
    // 			'uri' => 'acl/role',
    // 			'title' => 'Roles'
    // 		),
    // 		'resources' => array(
    // 			'uri' => 'acl/resource',
    // 			'title' => 'Resources'
    // 		)
    // 	)
    // ),
    // 'utils' => array(
    //     'title' => 'Utils',
    //     'icon' => ' icon-archive',
    //     'children' => array(
    //         'system_logs' => array(
    //             'uri' => 'utils/logs/system',
    //             'title' => 'System Logs'
    //         ),
    //         'deploy_logs' => array(
    //             'uri' => 'utils/logs/deploy',
    //             'title' => 'Deploy Logs'
    //         ),
    //         'info' => array(
    //             'uri' => 'utils/info',
    //             'title' => 'Info'
    //         )
    //     )
    // )
);
