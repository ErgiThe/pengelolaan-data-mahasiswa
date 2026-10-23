# Tugas 2 - Membuat Sistem Informasi Manajemen Data Sederhana
Mahasiswa diminta untuk membangun *Sistem Informasi Manajemen Data Sederhana* (contoh kasus: Pengelolaan Data Mahasiswa, Inventaris Barang, atau Katalog Buku) menggunakan bahasa pemrograman PHP murni dan basis data MySQL/MariaDB. Aplikasi harus terproteksi oleh sistem otentikasi dan mendukung pergantian bahasa antarmuka.

## Kebutuhan Spesifikasi Teknis & Fitur Aplikasi:

### Modul Pengolahan Form Data & Validasi  
- Pembuatan form input HTML menggunakan metode pengiriman POST. 
- Penerapan struktur kontrol percabangan (if-else / switch) untuk memvalidasi kelengkapan data sebelum disimpan.
- Penerapan sanitasi data input (misalnya fungsi htmlspecialchars() atau filter_var()) untuk mencegah celah keamanan.

### Modul Integrasi Database & Operasi CRUD  
- Koneksi Database: Menghubungkan skrip PHP dengan database MySQL.
- Create: Menyimpan data baru dari form input ke tabel database. 
- Read: Menampilkan seluruh data dari database ke dalam tabel HTML yang rapi.
- Update: Menyediakan form untuk mengubah data yang sudah ada berdasarkan identitas unik.
- Delete: Memiliki fitur untuk menghapus data tertentu dari database.

### Modul Pengelolaan Session
- Sistem Otentikasi Login: Halaman login menggunakan $_SESSION untuk memproteksi halaman CRUD agar tidak dapat diakses tanpa otentikasi.
- Fitur Dual Bahasa: Pengaturan pilihan bahasa antarmuka (Bahasa Indonesia dan Bahasa Inggris) yang disimpan di dalam $_SESSION sehingga konsisten saat pengguna berpindah halaman.

### Ketentuan Pengumpulan
#### Berkas yang Diunggah:
- Seluruh file source code proyek dan skrip ekspor database (.sql).
- Laporan ringkas format PDF berisi tangkapan layar antarmuka aplikasi beserta penjelasan alur program.
- Upload di Github yang dapat diakses secara publik. Kemudian kirimkan link-nya melalui form tugas ini. 
- Batas Pengumpulan: 31 Oktober 2026