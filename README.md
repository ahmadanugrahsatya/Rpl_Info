# Website Project RPL Info

# Web ini dibuat menggunakan
- XAMPP minimal Versi PHP 5 Keatas
- Visual Studio Code (VSC)
- Google Chrome
- PHP
- HTML
- CSS
- Bootstrap
# Cara Menggunakan
1. install xampp minimal versi PHP5 ke atas
2. Lalu import database yang terletak pada folder project1
3. sesuaikan nama database di dalam file db.php.
4. lalu pindahkan file yang ada di `Rpl_Info` ke folder htdocs.
5. jalankan apache dan mysql pada xampp.
6. lalu akses pada browser dengan url `localhost/namafoldernya/file`.
7. contoh cara mengakses di browser
```
http://localhost/Rpl_Info/home.php
```

# Username & Password
```
- username = `bakso`
- password = `makanbakso`
```

## Fitur Project 
- Admin
1. Login
2. Admin panel: crud info, notifikasi info, hapus info user
- User
1. Login
2. User panel: crud info, notifikasi komentar
3. Home page: responsive css, info, pagination

## Struktur project
Rpl_Info
 ┣ admin
 ┃ ┣ crud_info.php
 ┃ ┣ delete_user.php
 ┃ ┣ index.php
 ┃ ┗ notifications.php
 ┣ aset
 ┃ ┣ admin2.png
 ┃ ┣ blox.jpeg
 ┃ ┣ cpvp.jpg
 ┃ ┣ crud_info_admin.png
 ┃ ┣ crud_info_user2.png
 ┃ ┣ delete_user_admin.png
 ┃ ┣ fotokelas.jpeg
 ┃ ┣ levi.jpeg
 ┃ ┣ notifikasi_admin.png
 ┃ ┣ notifikasi_user.png
 ┃ ┣ portal.jpg
 ┃ ┣ ufo.jpeg
 ┃ ┗ xbox.jpeg
 ┣ Bootstrap
 ┃ ┣ css
 ┃ ┃ ┣ bootstrap-grid.css
 ┃ ┃ ┣ bootstrap-grid.css.map
 ┃ ┃ ┣ bootstrap-grid.min.css
 ┃ ┃ ┣ bootstrap-grid.min.css.map
 ┃ ┃ ┣ bootstrap-grid.rtl.css
 ┃ ┃ ┣ bootstrap-grid.rtl.css.map
 ┃ ┃ ┣ bootstrap-grid.rtl.min.css
 ┃ ┃ ┣ bootstrap-grid.rtl.min.css.map
 ┃ ┃ ┣ bootstrap-reboot.css
 ┃ ┃ ┣ bootstrap-reboot.css.map
 ┃ ┃ ┣ bootstrap-reboot.min.css
 ┃ ┃ ┣ bootstrap-reboot.min.css.map
 ┃ ┃ ┣ bootstrap-reboot.rtl.css
 ┃ ┃ ┣ bootstrap-reboot.rtl.css.map
 ┃ ┃ ┣ bootstrap-reboot.rtl.min.css
 ┃ ┃ ┣ bootstrap-reboot.rtl.min.css.map
 ┃ ┃ ┣ bootstrap-utilities.css
 ┃ ┃ ┣ bootstrap-utilities.css.map
 ┃ ┃ ┣ bootstrap-utilities.min.css
 ┃ ┃ ┣ bootstrap-utilities.min.css.map
 ┃ ┃ ┣ bootstrap-utilities.rtl.css
 ┃ ┃ ┣ bootstrap-utilities.rtl.css.map
 ┃ ┃ ┣ bootstrap-utilities.rtl.min.css
 ┃ ┃ ┣ bootstrap-utilities.rtl.min.css.map
 ┃ ┃ ┣ bootstrap.css
 ┃ ┃ ┣ bootstrap.css.map
 ┃ ┃ ┣ bootstrap.min.css
 ┃ ┃ ┣ bootstrap.min.css.map
 ┃ ┃ ┣ bootstrap.rtl.css
 ┃ ┃ ┣ bootstrap.rtl.css.map
 ┃ ┃ ┣ bootstrap.rtl.min.css
 ┃ ┃ ┗ bootstrap.rtl.min.css.map
 ┃ ┗ js
 ┃ ┃ ┣ bootstrap.bundle.js
 ┃ ┃ ┣ bootstrap.bundle.js.map
 ┃ ┃ ┣ bootstrap.bundle.min.js
 ┃ ┃ ┣ bootstrap.bundle.min.js.map
 ┃ ┃ ┣ bootstrap.esm.js
 ┃ ┃ ┣ bootstrap.esm.js.map
 ┃ ┃ ┣ bootstrap.esm.min.js
 ┃ ┃ ┣ bootstrap.esm.min.js.map
 ┃ ┃ ┣ bootstrap.js
 ┃ ┃ ┣ bootstrap.js.map
 ┃ ┃ ┣ bootstrap.min.js
 ┃ ┃ ┗ bootstrap.min.js.map
 ┣ includes
 ┃ ┣ db.php
 ┃ ┣ footer.php
 ┃ ┣ header.php
 ┃ ┗ header2.php
 ┣ styles
 ┃ ┣ crud_info.css
 ┃ ┗ style.css
 ┣ uploads
 ┃ ┣ blox.jpeg
 ┃ ┣ cpvp.jpg
 ┃ ┣ game.jpeg
 ┃ ┣ levi.jpeg
 ┃ ┣ portal.jpg
 ┃ ┣ ufo.jpeg
 ┃ ┗ xbox.jpeg
 ┣ user
 ┃ ┣ crud_info.php
 ┃ ┣ index.php
 ┃ ┣ notifications.php
 ┃ ┗ notiforang.php
 ┣ config.php
 ┣ detail.php
 ┣ home.php
 ┣ komentar.php
 ┣ login.php
 ┣ logout.php
