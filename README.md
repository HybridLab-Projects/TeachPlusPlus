# TEACH++

## Installation

1. git clone https://github.com/TeachPlusPlus-Developers/TeachPlusPlus.git
2. cd TeachPlusPlus
3. composer install
4. cp .env.template .env
5. php artisan key:generate
6. paste generated app key into .env APP_KEY
7. php artisan jwt:generate
8. paste generated jwt secret into .env JWT_SECRET
9. touch storage/database.sqlite
10. php artisan october:up
11. cd themes/vuetober
12. npm install
13. npm run serve / npm run build
