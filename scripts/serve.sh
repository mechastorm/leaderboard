#!/usr/bin/env bash

block="server {
    listen 80;
    server_name $1;
    root $2;

    index index.html index.htm index.php;

    charset utf-8;

    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    access_log off;
    error_log  /var/log/nginx/$1-error.log error;

    error_page 404 /index.php;

    sendfile off;

    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
"

echo "$block" > "/etc/nginx/sites-available/$1"
ln -s "/etc/nginx/sites-available/$1" "/etc/nginx/sites-enabled/$1"
service nginx restart
service php5-fpm restart

# Run Site Specific Commands
echo "Create MySQL Database"
echo "create database leaderboard" | mysql -u homestead -psecret
echo "Go to site app root"
cd /var/www/vhosts/leaderboard/
echo "Install Composer"
composer install
echo "Set up tables and seed data for database"
php artisan migrate
php artisan db:seed
echo "Setup WebSocket Server via Supervisor"
sudo apt-get install supervisor
sudo service supervisor restart
sudo cp /var/www/vhosts/leaderboard/app/config/brainsocket_server.conf /etc/supervisor/conf.d/brainsocket_server.conf
sudo supervisorctl reread
sudo supervisorctl update