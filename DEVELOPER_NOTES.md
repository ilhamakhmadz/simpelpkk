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
