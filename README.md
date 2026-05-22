# Starter Aplikasi CodeIgniter 4

## Apa itu CodeIgniter?

CodeIgniter adalah framework web full-stack PHP yang ringan, cepat, fleksibel, dan aman.
Informasi lebih lanjut dapat ditemukan di [website resmi](https://codeigniter.com).

Repository ini berisi starter aplikasi yang dapat diinstall menggunakan composer.

## Instalasi & Update

Gunakan perintah:

```bash
composer create-project codeigniter4/appstarter
```

lalu jalankan:

```bash
composer update
```

setiap ada versi terbaru framework.

Saat melakukan update, periksa release notes untuk melihat apakah ada perubahan yang perlu diterapkan pada folder `app` Anda.
File yang terdampak dapat disalin atau digabungkan dari:

```txt
vendor/codeigniter4/framework/app
```

## Setup

Copy file:

```txt
env
```

menjadi:

```txt
.env
```

lalu sesuaikan konfigurasi aplikasi Anda, terutama `baseURL`
dan pengaturan database.

## Perubahan Penting pada index.php

File `index.php` sekarang tidak lagi berada di root project!
File tersebut telah dipindahkan ke dalam folder *public*
untuk keamanan dan pemisahan komponen yang lebih baik.

Artinya, Anda harus mengatur web server agar mengarah ke folder *public* project,
bukan ke root project.

Praktik yang lebih baik adalah mengatur virtual host agar mengarah ke folder tersebut.
Praktik yang kurang baik adalah mengarahkan web server ke root project lalu mengakses *public/...* secara manual,
karena hal tersebut dapat mengekspos logic aplikasi dan framework Anda.

## Kebutuhan Server

Dibutuhkan PHP versi 8.2 atau lebih tinggi dengan extension berikut terinstall:

- intl
- mbstring
