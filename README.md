# Profile Sekolah

Aplikasi web profile sekolah dengan fitur pendaftaran siswa berbasis Laravel.

## Fitur

- Profil Sekolah (Visi & Misi, Struktur Organisasi)
- Berita & Pengumuman
- Pendaftaran Siswa Online
- Sistem Poin Pendaftaran
- Admin Dashboard dengan Leaderboard
- Responsive Design

## Persyaratan Sistem

- PHP >= 8.1
- Composer
- MySQL/MariaDB
- Node.js & NPM
- Web Server (Apache/Nginx)

## Instalasi

1. Clone repository
```bash
git clone [URL_REPOSITORY]
cd profile-sekolah
```

2. Install dependencies PHP
```bash
composer install
```

3. Install dependencies JavaScript
```bash
npm install
```

4. Salin file .env
```bash
cp .env.example .env
```

5. Generate application key
```bash
php artisan key:generate
```

6. Konfigurasi database di file .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=profile_sekolah
DB_USERNAME=root
DB_PASSWORD=
```

7. Jalankan migrasi dan seeder
```bash
php artisan migrate --seed
```

8. Compile assets
```bash
npm run dev
```

9. Jalankan server development
```bash
php artisan serve
```

## Akses Admin

Gunakan kredensial berikut untuk login ke dashboard admin:
- URL: `/admin/login`
- Email: admin@admin.com
- Password: password

## Struktur Database

### Tabel Utama:
- registrations: Data pendaftaran siswa
- registration_points: Sistem poin pendaftaran
- articles: Berita sekolah
- struktur_organisasis: Data struktur organisasi

## Pengembangan

Untuk pengembangan:
1. Fork repository ini
2. Buat branch fitur baru
```bash
git checkout -b nama-fitur
```
3. Commit perubahan
```bash
git commit -m 'Tambah fitur baru'
```
4. Push ke branch
```bash
git push origin nama-fitur
```
5. Buat Pull Request

## Lisensi

[MIT License](LICENSE.md)

## Kontribusi

Kontribusi selalu diterima. Untuk perubahan besar, harap buka issue terlebih dahulu untuk mendiskusikan perubahan yang diinginkan.

## Support

Untuk bantuan dan pertanyaan, silakan buat issue baru di repository ini.
