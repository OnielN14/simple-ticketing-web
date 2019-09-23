# SIMPLE MUSIC EVENT TICKETING WEBAPP

## Cara Pemakaian
1. Jalankan perintah di bawah untuk memasang dependency yang diperlukan oleh aplikasi

        composer install

    dan

        npm run i


2. Ubah berkas `.env.example` menjadi `.env`
3. Sesuaikan isi `.env` dengan konfigurasi databse dan server yang digunakan

4. Jalankan perintah di bawah untuk membuat *secret key* (wajib)

        php artisan key:generate

5. Jalankan perintah di bawah untuk menyiapkan tabel (wajib)
        
        php artisan migrate

6. Jalankan perintah di bawah untuk mengkompilasi aset (.vue/.js/.scss)

        npm run dev

7. Jalankan perintah di bawah untuk menjalankan backend

        php artisan serve

## Akses Admin
Pembuatan akun admin (saat ini) dilakukan dengan masuk ke `http://alamat_aplikasi/register`. Adapun proses login dapat dilakukan dengan masuk ke `http://alamat_aplikasi/login`.