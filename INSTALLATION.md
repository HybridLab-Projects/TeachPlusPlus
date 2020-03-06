# Installation

1. Naklonuj repozitár - **git clone https://github.com/TeachPlusPlus-Developers/TeachPlusPlus.git**
2. Prejdi do repozitára - **cd TeachPlusPlus**
3. Prepni sa do branchu develop - **git checkout develop**
4. Ak nemáš valstný branch, vytvor ho - **git branch meno-branchu**
5. Prepni sa do svojho branchu - **git checkout meno-branchu**
6. Nainštaluj Composer pluginy - **composer install**
7. Prejdi do storage - **cd storage** a vytvor súbor _database.sqlite_ - **touch database.sqlite**
8. Vráť sa späť do root - **cd ..** a zmigruj databázu - **php artisan october:up**
9. Prejdi do vuetobru - **cd themes/vuetober**
10. Nainštaluj npm packages - **npm install** a spusti server - **npm run serve**
11. Zapni laragon
