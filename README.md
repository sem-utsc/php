# php

After container start up execute the following commands to complete the local configuration:
```shell
sudo sed -i 's/Listen 80$//' /etc/apache2/ports.conf
```
```shell
sudo sed -i 's/<VirtualHost \*:80>/ServerName 127.0.0.1\n<VirtualHost \*:8080>/' /etc/apache2/sites-enabled/000-default.conf
```
```shell
apache2ctl start
```
