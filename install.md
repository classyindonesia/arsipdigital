## Petunjuk Install Aplikasi

```
$ git clone git@bitbucket.org:reka2/somelier.git && cd somelier && cp .env.example .env && mkdir public/upload/arsip && chmod -R 777 public/upload/arsip/ && mkdir public/upload/avatars/ && chmod -R 777 public/upload/avatars/ && mkdir public/upload/logo_watermark/ && chmod -R 777 public/upload/logo_watermark/ 
```

edit file ".env", sesuaikan dgn konfigurasi yg dibutuhkan.

jika database sudah dibuat, 
ketik :
```
$ php artisan migrate && php artisan db:seed
```
 


Troubleshooting :

-jika muncul error saat migrate atau seed, ketik perintah ini terlebih dahulu :
```
$ composer dump-autoload && php artisan optimize
```

-tidak muncul pesan apa2 di layar, alias blank :
lakukan chmod -R 777 pada folder "storage"