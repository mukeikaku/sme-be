#!/bin/bash

find /var/www/html/wp-content/themes -type d -exec chmod 705 {} \;
find /var/www/html/wp-content/themes -type f -exec chmod 604 {} \;
chown -R ec2-user:apache /var/www/html/wp-content/themes

find /var/www/html/wp-content/plugins -type d -exec chmod 705 {} \;
find /var/www/html/wp-content/plugins -type f -exec chmod 604 {} \;
chmod -R 777 /var/www/html/wp-content/plugins/siteguard/really-simple-captcha/tmp
chown -R ec2-user:apache /var/www/html/wp-content/plugins