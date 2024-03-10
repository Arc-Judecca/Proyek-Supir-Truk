## Catatan:

Login diperlukan untuk mengakses fitur membuat/menghapus.

## Instruksi Peluncuran:

-   Jika Anda belum menginstal composer di sistem Anda, instal terlebih dahulu (petunjuk instalasi [di sini](https://getcomposer.org/download)).
-   Klona repositori ini atau unduh sebagai paket ZIP.
-   Buka dengan Visual Studio Code atau editor kode pilihan Anda.
-   Buat skema baru di server MySQL Anda.
-   Ganti nama file **'.env.example'** menjadi **'.env'** di dalam direktori utama proyek dan konfigurasikan informasi database.
-   Menggunakan GitBash, CMD, atau terminal lain di editor kode Anda:
    -   jika composer terinstal secara lokal: jalankan **php <'lokasi file composer.phar'>/composer.phar install**
    -   jika composer terinstal secara global di sistem Anda: jalankan **composer install**
-   Jalankan **php artisan key:generate**
-   Jalankan **php artisan migrate** untuk membuat tabel.
-   Jalankan **php artisan db:seed** untuk mengisi tabel dengan data.
-   Jalankan **php artisan serve**
-   Ikuti tautan yang muncul di terminal setelah menjalankan 'php artisan serve'.

## Detail Login Uji Coba:

E-mail: admin@admin.com
Password: 123456789

**Catatan:** Hanya berfungsi jika langkah **php artisan db:seed** tidak dilewati.
