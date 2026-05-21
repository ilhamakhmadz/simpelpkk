# DEVELOPER NOTES - SIMPEL PKK KABUPATEN BANDUNG

## 1. Deskripsi Umum Proyek
**SIMPEL PKK** (Sistem Informasi Pelaporan PKK) adalah sebuah sistem cerdas berbasis web yang digunakan untuk mendata, mengelola, dan memvisualisasikan laporan 10 Program Pokok PKK (Pemberdayaan Kesejahteraan Keluarga) di lingkup Pemerintah Kabupaten Bandung. Aplikasi ini mendata informasi rekapitulasi secara *real-time* mulai dari area Kecamatan, Desa, Dusun, RW, RT, Dasawisma, hingga ke tiap individual Anggota Keluarga.

## 2. Tech Stack & Library Utama
*   **Framework PHP**: CodeIgniter 3 (CI3)
*   **Database**: MySQL / MariaDB (Driver menggunakan query builder CI3 `mysqli`)
*   **Front-End**: 
    *   Tailwind CSS & Vanilla CSS (untuk Front-End Landing Page baru)
    *   Bootstrap (untuk halaman Admin / Dashboard internal)
    *   jQuery & jQuery Validation
*   **DataTables**: `Ignited-Datatables` (Library CI3 khusus untuk merender Datatables Server-Side Processing).
*   **Ekspor Data**: 
    *   `PhpSpreadsheet` (Library Composer untuk ekstrak Laporan Excel).
    *   `DomPDF` / Library sejenis untuk cetak PDF dokumen PKK.
*   **Visualisasi Data**: Seringkali menggunakan `Chart.js` untuk grafik di dashboard.

## 3. Struktur Direktori Penting
Proyek ini mengikuti patokan arsitektur MVC (Model-View-Controller) milik CodeIgniter 3.
*   `application/controllers/` : Berisi endpoint controller untuk mengontrol logika. Catatan tambahan: Request berformat AJAX biasanya dipisahkan ke dalam subfolder `api/`.
*   `application/models/` : Segala eksekusi *Query Builder* (*Select, Insert, Table Joins*, dll) ke eksekutor Database disimpan di sini. Sangat tidak disarankan memanggil `$this->db` secara langsung di dalam Controller.
*   `application/views/` : Kumpulan template antarmuka HTML/PHP. File admin berada di masing-masing modul, sementara tampilan utama warga ada di `frontend/index.php`.
*   `assets/` : Menyimpan assets CSS, JS, dan Gambar (Images). 
    *   **Catatan landing page baru:** Path gambar/assets untuk web utama terdapat pada `assets/tampilanbaru/assets/` bukan di folder lama (seperti `assetslandingbaru`).

## 4. Sistem Role dan Hak Akses (ACL)
Terdapat pemetaan peran (Roles) yang kompleks menyangkut tingkat dan sekuens wilayah pencatatan data keluarga. Kode hak akses umumnya menggunakan identifikasi `level_id` berdasarkan session:
*   **Level 1 & 2** : Administrator / Kabupaten (Hak pantau menyeluruh)
*   **Level 3** : Kecamatan
*   **Level 4** : Desa
*   **Level 5** : Dusun
*   **Level 6** : RW
*   **Level 7** : RT / Kader / Dasawisma / Keluarga (Ujung tombak pendata keluarga)
Masa-masing Modul & Query dibatasi ketersediaan datanya (*Where Clauses*) berpatokan pada *level_id* yang login agar Kader Desa/RT A tidak bisa melihat / mengganti data Desa/RT B.

## 5. Konvensi Code & Optimasi Performa
1.  **Optimasi Tabel**: Gunakan `Ignited-Datatables` (`$this->datatables->generate()`) bersama *AJAX* setiap kali ada tabel menampilkan ribuan data untuk mengaktifkan **Server-Side Processing**. 
2.  **Pemilihan Select Database**: Saat membuat fungsi di Model, haram memanggil `Select *` atau memanggil seluruh kolom di tabel master jika data yang ditampilkan ke View hanya 5-10 kolom saja. Gunakan string `$this->datatables->select("tabel1.field, tabel2.field")`. Hal ini akan sangat mereduksi letensi loading dan *Memory Exhausted* PHP saat aplikasi pindah ke Server Produksi.
3.  **Keamanan**: Memanfaatkan CI Query Builder seperti `$this->db->where()`, `$this->db->like()`, dsb untuk mencegah ancaman serangan *SQL Injection*. Selalu tangkap data input post dengan `$this->input->post('nama', true)` untuk proses disinfeksi *XSS*.

## 6. Persiapan Deployment (Pindah ke Server Utama)
Bila memindahkan aplikasi ini dari komputer Lokal (XAMPP) ke Main Server, mohon perhatikan 3 hal ini:
1.  Buka `application/config/config.php` dan sesuaikan parameter `$config['base_url']` ke alamat domain asli server.
2.  Buka `application/config/database.php` dan pastikan kredensial password, user, dan nama basis data di server disetel dengan tepat.
3.  Versi PHP di Server Utama sebaiknya minimal **PHP 7.4**. Terdapat beberapa metode / array yang mungkin akan menampilkan error atau _Deprecated Warning_ jika di paksa ke versi PHP > 8.1 tanpa adaptasi kode.

---
*Catatan ini dibuat otomatis untuk mempermudah onboarding developer.*

Panduan Deployment & Rangkuman Perubahan (Changelog)
Dokumen ini berisi daftar lengkap semua file source code yang diubah/ditambahkan serta script database yang wajib dieksekusi saat melakukan deployment ke server production.

1. Daftar File yang Diubah & Ditambahkan
Anda wajib mengunggah (upload) dan menimpa (replace) file-file berikut dari localhost ke server production:

A. File Baru (Wajib Diunggah)
Controllers:
application/controllers/Sip.php (Menangani logic menu SIP 6 dan SIP 7)
Models:
application/models/Sip_model.php (Menangani logic database, rekapitulasi, dan query SIP)
Views:
application/views/sip/sip6.php (Tampilan Daftar Posyandu & Rekapitulasi Berjenjang)
application/views/sip/sip7.php (Tampilan Rekap Kegiatan & Rekapitulasi Bulanan Berjenjang)
B. File yang Diubah (Wajib Ditimpa/Replace)
Config:
application/config/navigation.php (Menambahkan menu sidebar "SIP (Posyandu)" dengan child SIP 6 & SIP 7)
application/config/config.php (Konfigurasi base URL)
application/config/database.php (Koneksi database)
Libraries:
application/libraries/Acl.php (Menambahkan bypass pengecekan hak akses untuk prefix 'sip' agar tidak terhambat)
Controllers:
application/controllers/auth/Login.php (Logic Impersonate Auto Login & Exit Impersonate)
application/controllers/dashboard/Home.php (Peta Kependudukan Chart.js & CDN load)
application/controllers/data/umum/Index.php (Mengambil data filter Kecamatan & Tahun)
application/controllers/data/pokja1/Index.php (Mengambil data filter Kecamatan & Tahun)
application/controllers/data/pokja2/Index.php (Mengambil data filter Kecamatan & Tahun)
application/controllers/data/pokja3/Index.php (Mengambil data filter Kecamatan & Tahun)
application/controllers/data/pokja4/Index.php (Mengambil data filter Kecamatan & Tahun)
application/controllers/api/data/Api_umum.php (Menerima parameter query filter year & kec_id)
application/controllers/api/data/Api_pokja1.php (Menerima parameter query filter year & kec_id)
application/controllers/api/data/Api_pokja2.php (Menerima parameter query filter year & kec_id)
application/controllers/api/data/Api_pokja3.php (Menerima parameter query filter year & kec_id)
application/controllers/api/data/Api_pokja4.php (Menerima parameter query filter year & kec_id)
Models:
application/models/data/Umum_model.php (Query data dengan filter tahun & kecamatan)
application/models/data/Pokja1_model.php (Query data dengan filter tahun & kecamatan)
application/models/data/Pokja2_model.php (Query data dengan filter tahun & kecamatan)
application/models/data/Pokja3_model.php (Query data dengan filter tahun & kecamatan)
application/models/data/Pokja4_model.php (Query data dengan filter tahun & kecamatan)
Views (UI):
application/views/layouts/admin.php (Menampilkan banner indikator saat dalam mode Impersonate)
application/views/auth/index.php (Tombol aksi "Masuk sebagai user ini" di tabel Management User)
application/views/data/umum/index.php (Dropdown filter Kecamatan & Tahun, Chart responsive, AJAX reload)
application/views/data/pokja1/index.php (Dropdown filter Kecamatan & Tahun, Chart responsive, AJAX reload)
application/views/data/pokja2/index.php (Dropdown filter Kecamatan & Tahun, Chart responsive, AJAX reload)
application/views/data/pokja3/index.php (Dropdown filter Kecamatan & Tahun, Chart responsive, AJAX reload)
application/views/data/pokja4/index.php (Dropdown filter Kecamatan & Tahun, Chart responsive, AJAX reload)
Assets / Javascript:
assets/js/app/data/umum/index.js (Penyesuaian inisialisasi DataTables)
assets/js/app/dashboard/home/graph.js (Rendering grafik peta kependudukan)
Lainnya:
.htaccess (Konfigurasi routing server)
2. Perubahan Database (SQL Script)
Jalankan script SQL berikut pada PHPMyAdmin atau console database server production Anda:

A. Pembuatan Tabel Baru (Jika Belum Ada)
sql

-- 1. Membuat tabel master posyandu (SIP 6)
CREATE TABLE IF NOT EXISTS `posyandu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kecamatan` varchar(255) NOT NULL,
  `kode_desa` varchar(255) NOT NULL,
  `dusun_id` int(11) DEFAULT NULL,
  `rw` varchar(50) NOT NULL,
  `rt` varchar(50) DEFAULT NULL,
  `nama_posyandu` varchar(255) NOT NULL,
  `pengelola` varchar(255) NOT NULL,
  `sekretaris` varchar(255) NOT NULL,
  `jenis_posyandu` enum('Pratama','Madya','Purnama','Mandiri') NOT NULL DEFAULT 'Pratama',
  `jumlah_kader` int(11) NOT NULL DEFAULT 0,
  `visible` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- 2. Membuat tabel detail kegiatan posyandu (SIP 7)
CREATE TABLE IF NOT EXISTS `posyandu_kegiatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `posyandu_id` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `jenis_kegiatan` varchar(255) NOT NULL,
  `frekuensi` int(11) NOT NULL DEFAULT 0,
  `pengunjung_l` int(11) NOT NULL DEFAULT 0,
  `pengunjung_p` int(11) NOT NULL DEFAULT 0,
  `petugas_l` int(11) NOT NULL DEFAULT 0,
  `petugas_p` int(11) NOT NULL DEFAULT 0,
  `keterangan` text DEFAULT NULL,
  `visible` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `posyandu_id` (`posyandu_id`),
  CONSTRAINT `posyandu_kegiatan_ibfk_1` FOREIGN KEY (`posyandu_id`) REFERENCES `posyandu` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

B. Registrasi Resource ACL & Perbaikan Hubungan Hirarki Parent
Agar menu SIP dapat diakses oleh user, resource harus terdaftar dengan benar di tabel ACL server:

sql

-- 1. Daftarkan resource modul utama 'sip' jika belum ada
INSERT IGNORE INTO `acl_resources` (`name`, `type`, `parent`) VALUES 
('sip', 'module', NULL);
-- 2. Daftarkan resource method/halaman anak (child) di bawah 'sip'
INSERT IGNORE INTO `acl_resources` (`name`, `type`, `parent`) VALUES 
('sip/sip6', 'controller', NULL),
('sip/sip7', 'controller', NULL),
('sip/sip7_save', 'action', NULL),
('sip/sip7_pdf', 'action', NULL),
('sip/sip7_excel', 'action', NULL);
-- 3. Update kolom parent dari resource anak agar menunjuk ke ID dari resource utama 'sip'
UPDATE acl_resources 
SET parent = (SELECT id FROM (SELECT id FROM acl_resources WHERE name = 'sip') AS temp)
WHERE name IN ('sip/sip6', 'sip/sip7', 'sip/sip7_save', 'sip/sip7_pdf', 'sip/sip7_excel');
-- 4. Berikan akses 'allow' ke seluruh Roles (Hak Akses) untuk resource SIP tersebut
INSERT INTO acl_rules (role_id, resource_id, access)
SELECT r.id, res.id, 'allow'
FROM acl_roles r
CROSS JOIN acl_resources res
WHERE res.name IN ('sip', 'sip/sip6', 'sip/sip7', 'sip/sip7_save', 'sip/sip7_pdf', 'sip/sip7_excel')
ON DUPLICATE KEY UPDATE access = 'allow';
3. Cara Penggunaan Fitur Baru
A. Menu SIP 6 & SIP 7 (Posyandu)
Menu Baru: Terletak di sidebar menu dengan judul SIP (Posyandu).
SIP 6 (Register Posyandu): Menampilkan daftar posyandu yang terdaftar. Dilengkapi rekapitulasi jumlah Posyandu & Kader per tingkatan Dusun, Desa, dan Kecamatan (sesuai level wewenang user yang sedang login).
SIP 7 (Rekap Kegiatan): Menampilkan detail rekapitulasi data kegiatan bulanan posyandu. Dilengkapi tab rekapitulasi berjenjang per wilayah dengan filter pencarian instan (DataTables).
B. Fitur Impersonate / Auto Login
Cara Masuk: Masuk ke menu Administrator -> Management User.
Pada kolom Aksi, cari user target dan klik tombol berwarna biru muda/cyan (ikon masuk/login). Anda akan langsung dialihkan masuk sebagai user tersebut.
Banner Indikator: Di atas halaman akan muncul banner kuning bertuliskan "Anda sedang login sebagai [Nama User] (Impersonate)".
Cara Keluar: Klik tombol "Kembali ke User Utama" pada banner kuning tersebut untuk mengembalikan sesi login Anda ke akun administratif Anda semula.
Catatan Keamanan: Fitur ini dibatasi agar hanya bisa login ke user yang memiliki level di bawah level pengakses.
C. Filter Data Umum & Pokja I - IV
Di bagian atas dashboard halaman Data Umum dan masing-masing Pokja I sampai Pokja IV, kini terdapat box filter dropdown Kecamatan dan Tahun.
Pilihlah Kecamatan dan Tahun yang diinginkan lalu klik tombol Filter. Halaman akan memuat data ringkasan (summary cards), tabel, serta grafik visualisasi (Bar/Pie Chart) secara otomatis sesuai filter yang dipilih.