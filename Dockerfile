# Use an official PHP runtime as a parent image
FROM php:7.4-apache

RUN rm -rf /var/www/html

WORKDIR /var/www/html

COPY . .

ARG DB_USER
ARG DB_PASSWORD
ARG DB_NAME
ARG DB_HOST

RUN apt-get update && \
    apt-get install -y libpng-dev && \
    apt-get -y install sudo && \
    docker-php-ext-install pdo pdo_mysql gd
    
RUN adduser --disabled-password --gecos '' docker
RUN adduser docker sudo
RUN echo '%sudo ALL=(ALL) NOPASSWD:ALL' >> /etc/sudoers

USER docker

RUN sudo a2enmod rewrite && \
    sudo service apache2 restart

EXPOSE 80

CMD ["apache2-foreground"]
