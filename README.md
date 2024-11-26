# Ivowaba Webhook sample

Aplikasi ini adalah contoh bagaimana menggunakan API dan Webhook yang sediakan Ivowaba.

## 1. Kebutuhan Server

### PHP
Dibutuhkan PHP versi 8.1 atau diatasnya, dengan ekstensi berikut:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Selain itu, pastikan ekstensi-ekstensi berikut telah diaktifkan pada pengaturan PHP anda:

- json (secara bawaan sudah aktif - jangan dinonaktifkan)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) jika anda berencana menggunakan librari HTTP\CURLRequest

### MySQL atau Database lain yang didukung
Jika Anda menggunakan MySQL, dibutuhkan versi 5.7 atau versi diatasnya.

## 2. Setup

- Buka aplikasi di dalam terminal, dan jalankan perintah `composer install`.
- Buat file `.env`. Anda bisa mengkopinya dari `env`
- Sesuaikan nilai `app.baseURL` di dalam file `.env` dengan URL aplikasi anda.
- Aktifkan variabel `WABA_API_KEY` dan isi dengan waba api key.
```
WABA_API_KEY = 'waba api key'
```
- Buka file `Database.php` di folder `app/Config` dan sesuaikan koneksi database anda.

```php
public array $default = [
    'DSN'          => '',
    'hostname'     => 'localhost',
    'username'     => 'root',
    'password'     => 'your db password',
    'database'     => 'your database',
        // ...
];
```
- Run database migration
```
php spark migrate 
```

## 3. Penggunaan
- Buka browser, dan akses aplikasi anda dengan memasukan URL seperti yang anda tentukan di `app.baseURL` file `.env`, diakhiri dengan `/public`.
- Sangat direkomendasikan untuk membuat virtual host untuk aplikasi anda.
- Lakukan kastemisasi pada file `SendMessage` dan `WebhookListener` pada `app/Controllers` sesuai dengan kebutuhan.
- Untuk detail penggunakan API Waba, bisa dilihat di [Sini](https://wabacdn.s45.in/docs/index.html)

## 4. Setup webhook di waba
- Login ke waba
- Akses halaman Webhook melalui menu **Developeer > Webhook**.
- Klik tombol **Create Webhook**
- Isi inputan name dan URL dari aplikasi anda, kemudian klik tombol **Save**.