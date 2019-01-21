FROM ubuntu:latest
MAINTAINER Pablo Weslly <pablo_weslly@hotmail.com>

ENV TERM=xterm

RUN apt-get update
RUN apt-get -y upgrade

RUN apt-get install -y vim

RUN DEBIAN_FRONTEND=noninteractive apt-get -y --fix-missing install apache2 \
      php \
      php-cli \
      php-gd \
      php-json \
      php-mbstring \
      php-xml \
      php-xsl \
      php-zip \
      php-soap \
      php-pear \
      php-intl \
      php-mysql \     
      libapache2-mod-php \
      curl \
      php-curl \
      #apt-transport-https \
      nano      

#RUN docker-php-ext-install pdo pdo_mysql

RUN a2enmod rewrite
RUN phpenmod mcrypt
RUN phpenmod mbstring
RUN phpenmod pdo_mysql  

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

ADD config/apache-virtual-hosts.conf /etc/apache2/sites-enabled/000-default.conf

#RUN -- sh -c "echo '\n127.0.0.1 \timoveis.com.br'>> /etc/hosts"

RUN service apache2 restart

RUN chgrp -R www-data /var/www
RUN chown -R www-data:www-data /var/www

WORKDIR /var/www/

EXPOSE 80 443

