# XABER – The College Disciplinary System

XABER (The Xaber Ruling System) adalah sistem tata tertib digital yang dirancang untuk menjaga kedisiplinan di lingkungan kampus.  
Sistem ini membantu proses pencatatan, verifikasi, dan pengelolaan pelanggaran mahasiswa secara **terpusat, transparan, dan efisien**.

---

##  Fitur Utama

###  **Login Page**
- Autentikasi pengguna (Admin, Dosen, DPA, dan Mahasiswa)
- Form input Email & Password
- Fungsi “Forgot Password” yang terhubung ke admin

###  **Admin Panel**
- Manajemen pengguna (tambah, edit, ubah password)
- Verifikasi pelanggaran & pemberian sanksi
- Manajemen daftar pelanggaran dan tingkat keparahan
- Layanan kontak untuk menanggapi pertanyaan pengguna

###  **Student Dashboard**
- Melihat daftar pelanggaran pribadi
- Melihat sanksi dan status verifikasi
- Menghubungi admin melalui form layanan
- Mengunduh panduan tata tertib dalam format PDF

###  **Dosen & DPA Dashboard**
- Melaporkan dan memantau pelanggaran mahasiswa bimbingannya
- Mengedit atau memperbarui data pelanggaran sebelum diverifikasi
- Fitur layanan komunikasi ke tim admin

---

##  **Database**

Sistem ini menggunakan **Microsoft SQL Server Management Studio (SSMS)** sebagai database utama.  
SSMS digunakan untuk:
- Menyimpan data pengguna (Admin, Dosen, DPA, Mahasiswa)
- Mencatat seluruh data pelanggaran, tingkat keparahan, dan status verifikasi
- Menyimpan riwayat layanan (pesan/tiket) dari pengguna
- Mendukung operasi CRUD penuh (Create, Read, Update, Delete)

**Struktur utama tabel meliputi:**
- `Users` → Menyimpan akun dan peran pengguna  
- `Violations` → Data pelanggaran dan tingkat sanksi  
- `Services` → Pesan dan laporan pengguna  
- `Rules` → Daftar aturan dan kategori pelanggaran  



