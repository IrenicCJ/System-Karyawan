# System-Karyawan

System-Karyawan adalah aplikasi monolith berbasis CodeIgniter 4 yang dibuat untuk membantu pengelolaan data karyawan dan departemen dalam sebuah perusahaan. Aplikasi ini menggunakan SQL Server sebagai database utama dan menerapkan fitur CRUD (Create, Read, Update, Delete) untuk mengelola data secara efisien.

## Deskripsi Aplikasi

Aplikasi ini dirancang sebagai sistem sederhana untuk:

* Menambahkan data karyawan
* Mengedit data karyawan
* Menghapus data karyawan
* Mengelola data departemen
* Menampilkan data menggunakan DataTables
* Melakukan pencarian dan sorting data secara dinamis menggunakan AJAX
* Menghubungkan tabel karyawan dan departemen menggunakan JOIN query

Aplikasi dibuat menggunakan arsitektur monolith pada framework CodeIgniter 4 sehingga frontend dan backend berada dalam satu project yang sama.

## Fitur Utama

### CRUD Karyawan

Pengguna dapat:

* Menambahkan data karyawan baru
* Mengubah data karyawan
* Menghapus data karyawan
* Melihat daftar seluruh karyawan

### CRUD Departemen

Pengguna dapat:

* Menambahkan departemen
* Mengubah data departemen
* Menghapus departemen
* Melihat daftar departemen

### DataTables & AJAX

Halaman karyawan menggunakan:

* DataTables
* AJAX request
* Search realtime
* Sorting data
* Pagination otomatis

### JOIN Query

Data karyawan dihubungkan dengan tabel departemen menggunakan JOIN query untuk menampilkan nama departemen dari setiap karyawan.

## Teknologi yang Digunakan

* PHP 8.5
* CodeIgniter 4
* SQL Server
* ODBC Driver 17 for SQL Server
* Bootstrap
* jQuery
* DataTables

## Struktur Database

Database yang digunakan:

* `karyawan`
* `departemen`

Relasi:

* Setiap karyawan terhubung ke satu departemen melalui foreign key.

## Cara Menjalankan Project

### 1. Clone Repository

```bash
git clone https://github.com/username/System-Karyawan.git
```

### 2. Install Dependency

```bash
composer install
```

### 3. Konfigurasi Database

Edit file `.env`

```env
database.default.hostname = localhost
database.default.database = db_karyawan
database.default.username = sa
database.default.password = yourpassword
database.default.DBDriver = SQLSRV
database.default.port = 1434
```

### 4. Jalankan Server

```bash
php spark serve
```

### 5. Akses Aplikasi

```txt
http://localhost:8080
```

## Endpoint

* `/`
* `/karyawan`
* `/departemen`

## Tujuan Pembuatan

Project ini dibuat sebagai implementasi aplikasi monolith sederhana menggunakan CodeIgniter 4 dengan integrasi SQL Server, serta memenuhi kebutuhan fitur CRUD, DataTables AJAX, dan JOIN query.
