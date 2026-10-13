# SILOGNESAS

### Sistem Informasi Pergudangan Berbasis Web untuk Mendukung Teaching Factory Program Keahlian Teknik Logistik

SILOGNESAS merupakan sistem informasi pergudangan berbasis web yang dikembangkan untuk mendukung kegiatan Teaching Factory (TEFA) pada Program Keahlian Teknik Logistik SMK Negeri 1 Subang.

Sistem ini dirancang untuk membantu proses pengelolaan data pergudangan secara terkomputerisasi, mulai dari pengelolaan data barang dan supplier, pencatatan transaksi barang masuk dan keluar, pengelolaan stok, hingga penyajian laporan pergudangan.

---

## 📸 Screenshot Aplikasi

### Dashboard
![Dashboard SILOGNESAS](screenshots/dashboard.png)

### Pengelolaan Barang
![Pengelolaan Barang SILOGNESAS](screenshots/barang.png)

### Transaksi Barang
![Transaksi SILOGNESAS](screenshots/transaksi.png)

### Laporan Pergudangan
![Laporan SILOGNESAS](screenshots/laporan.png)

---

## 📌 Latar Belakang

Pengelolaan data pergudangan pada kegiatan Teaching Factory membutuhkan pencatatan yang terstruktur agar informasi mengenai persediaan barang dapat dikelola dengan lebih efektif.

SILOGNESAS dikembangkan sebagai solusi berbasis web untuk membantu proses pencatatan dan pengelolaan data pergudangan sehingga informasi mengenai barang, stok, transaksi, dan laporan dapat dikelola dalam satu sistem.

---

## 🎯 Tujuan

Sistem ini dikembangkan untuk:

- Membantu proses pengelolaan data barang.
- Membantu proses pengelolaan data supplier.
- Membantu pencatatan transaksi barang masuk dan barang keluar.
- Membantu pemantauan stok barang.
- Menyediakan laporan transaksi dan stok.
- Mendukung digitalisasi pengelolaan pergudangan pada kegiatan Teaching Factory.

---

## ✨ Fitur

### 🔐 Autentikasi

- Login menggunakan username dan password.
- Hak akses berdasarkan role pengguna.
- Pengelolaan akun pengguna oleh Master Admin.
- Reset password pengguna.

### 📦 Pengelolaan Barang

- Menambahkan data barang.
- Mengubah data barang.
- Menonaktifkan barang.
- Mengaktifkan kembali barang.
- Menampilkan informasi stok barang.
- Menentukan supplier, rak, dan gudang barang.

### 🏢 Pengelolaan Supplier

- Menambahkan data supplier.
- Mengubah data supplier.
- Menghapus data supplier.
- Menampilkan daftar supplier.

### 🔄 Transaksi

- Mencatat transaksi barang masuk.
- Mencatat transaksi barang keluar.
- Memperbarui stok secara otomatis berdasarkan transaksi.
- Melakukan koreksi transaksi.
- Menampilkan riwayat transaksi.

### 📊 Dashboard

Dashboard menampilkan informasi yang disesuaikan dengan hak akses pengguna.

Untuk pengguna dengan hak akses pengelolaan sistem, dashboard menyediakan informasi ringkas mengenai kondisi data pergudangan.

Untuk pengguna siswa, dashboard digunakan sebagai halaman penyambutan tanpa menampilkan informasi analitik pergudangan.

### 📑 Laporan

- Laporan transaksi barang masuk dan keluar.
- Laporan stok barang.
- Filter laporan berdasarkan parameter yang tersedia.
- Export laporan ke PDF.
- Export laporan ke Excel.

### 🗄️ Pengelolaan Gudang

- Menambahkan data gudang.
- Menonaktifkan gudang.
- Mengaktifkan kembali gudang.
- Validasi gudang yang masih digunakan oleh barang.

### 🗃️ Pengelolaan Rak

- Menambahkan data rak.
- Menonaktifkan rak.
- Mengaktifkan kembali rak.
- Validasi rak yang masih digunakan oleh barang.

### 👥 Pengelolaan User

Fitur pengelolaan user hanya tersedia bagi Master Admin.

- Menambahkan user.
- Mengubah username.
- Mengubah email.
- Mengubah role.
- Menghapus user.
- Reset password user.

---

## 👤 Hak Akses Pengguna

| Fitur | Siswa | Guru | Master Admin |
|:---|:---:|:---:|:---:|
| Dashboard | ✓ | ✓ | ✓ |
| Data Barang | ✓ | ✓ | ✓ |
| Data Supplier | ✓ | ✓ | ✓ |
| Transaksi | ✓ | ✓ | ✓ |
| Laporan | - | ✓ | ✓ |
| Gudang | - | - | ✓ |
| Rak | - | - | ✓ |
| User | - | - | ✓ |

---

## 🛠️ Teknologi

SILOGNESAS dikembangkan menggunakan teknologi berikut:

- **PHP**
- **CodeIgniter 4**
- **MySQL**
- **Bootstrap 5**
- **JavaScript**
- **Myth/Auth**
- **HTML5**
- **CSS3**

---

## 🏗️ Metode Pengembangan

Pengembangan sistem menggunakan metode **Waterfall** yang terdiri dari beberapa tahapan:

1. Analisis kebutuhan
2. Perancangan sistem
3. Implementasi
4. Pengujian

---

## 🧪 Pengujian

Pengujian sistem dilakukan menggunakan metode **Black Box Testing**.

Pengujian dilakukan terhadap fungsi-fungsi utama sistem, meliputi:

- Login
- Dashboard
- Data Supplier
- Data Barang
- Transaksi
- Laporan
- Data Gudang
- Data Rak
- Data User

Hasil pengujian menunjukkan bahwa fungsi-fungsi yang diuji dapat berjalan sesuai dengan hasil yang diharapkan.

---

## ⚙️ Instalasi

### Prasyarat

Pastikan perangkat telah memiliki:

- PHP dengan versi yang kompatibel dengan proyek.
- Composer.
- MySQL atau MariaDB.
- Git.
- Web server lokal seperti Laragon.

### 1. Clone Repository

```bash
git clone https://github.com/ghazyal/silognesas.git
cd silognesas
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Konfigurasi Environment

Salin file `env` menjadi `.env`, lalu sesuaikan konfigurasi environment dan database berdasarkan kebutuhan aplikasi.

### 4. Konfigurasi Database

Buat database MySQL untuk SILOGNESAS, kemudian atur koneksi database di file `.env`.

### 5. Jalankan Aplikasi

Jalankan aplikasi menggunakan konfigurasi server lokal yang sesuai dengan struktur proyek CodeIgniter 4.

---

## 👨‍💻 Developer

Dikembangkan sebagai proyek tugas akhir untuk mendukung digitalisasi pengelolaan pergudangan pada kegiatan Teaching Factory (TEFA) Program Keahlian Teknik Logistik SMK Negeri 1 Subang.
