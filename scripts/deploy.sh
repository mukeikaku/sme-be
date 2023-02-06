#!/bin/bash

find /var/www/html/wp-content/themes -type d -exec chmod 755 {} \;
find /var/www/html/wp-content/themes -type f -exec chmod 644 {} \;
chown -R ec2-user:apache /var/www/html/wp-content/themes

find /var/www/html/wp-content/plugins -type d -exec chmod 755 {} \;
find /var/www/html/wp-content/plugins -type f -exec chmod 644 {} \;
chmod -R 777 /var/www/html/wp-content/plugins/all-in-one-wp-migration/storage
chmod -R 777 /var/www/html/wp-content/plugins/siteguard/really-simple-captcha/tmp
chown -R ec2-user:apache /var/www/html/wp-content/plugins